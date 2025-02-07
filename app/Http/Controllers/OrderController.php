<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::filter($request->only('search'))
            ->with('user', 'package')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function showOrderForm()
    {
        $packages = Package::all();
        return view('user.orders.index', compact('packages'));
    }

    public function createOrder(Request $request)
    {
        $package = Package::findOrFail($request->package);
        $validate = $request->validate([
            'package' => 'required|exists:packages,id',
            'fee' => 'required|numeric',
            'total' => 'required|numeric',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255'
        ]);

        $validate['installation_fee'] = (int) $request->installation_fee;
        $validate['total'] = (int) $request->total;
        $validate['package'] = $package->id;

        $order = Order::create([
            'user_id' => Auth::id(),
            'package_id' => $validate['package'],
            'installation_fee' => $validate['fee'],
            'total' => $validate['total'],
            'latitude' => $validate['latitude'],
            'longitude' => $validate['longitude'],
            'order_date' => now(),
            'order_status' => 'unpaid'
        ]);

        $code = substr(hash_hmac('sha256', json_encode([
            'name' => $order->user->name,
            'email' => $order->user->email,
            'total' => $order->total,
            'order_date' => $order->order_date
        ]), config('app.key')), 0, 16);

        $order->update([
            'code' => 'ORD-' . strtoupper($code)
        ]);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$is3ds = config('midtrans.is3ds');
        Config::$isSanitized = config('midtrans.isSanitized');

        try {
            $transaction = Snap::getSnapToken([
                'transaction_details' => [
                    'order_id' => $order->code,
                    'gross_amount' => $order->total,
                ],
                'cutomer_details' => [
                    'first_name' => $order->user->name,
                    'email' => $order->user->email,
                    'phone' => $order->user->phone_number
                ]
            ]);
            $order->update([
                'snap_token' => $transaction
            ]);
        } catch (\Exception $e) {
            return back()->withErrors('Failed to make a order, please try again later.');
        }


        return view('user.orders.payment', compact('order', 'transaction'));
    }

    public function showOrder($code)
    {
        $order = Order::with('user')->where('code', $code)->first();
        return view('user.orders.summary', compact('order'));
    }

    public function historyOrder(Request $request)
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', 'like', $user_id)->filter($request->only('search'))->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('user.orders.history', compact('orders'));
    }
}
