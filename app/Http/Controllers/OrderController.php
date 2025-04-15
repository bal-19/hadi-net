<?php

namespace App\Http\Controllers;

use App\Mail\OrderComplete;
use App\Mail\PaymentConfirmed;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function update(Request $request, Order $order)
    {
        if (Auth::user()->role != 'super admin') {
            abort(404);
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'technician_id' => 'nullable|exists:users,id',
            'package_id' => 'required|exists:packages,id',
            'installation_fee' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'order_date' => 'required|date',
            'installation_date' => 'nullable|date',
            'expired_date' => 'nullable|date',
            'order_status' => 'required|in:expired,unpaid,paid,processing,hold,completed,cancelled',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function edit(Order $order)
    {
        if (Auth::user()->role != 'super admin') {
            abort(404);
        }

        $users = User::where('role', 'user')->get();
        $technicians = User::where('role', 'technician')->get();
        $packages = Package::all();

        return view('admin.orders.form-order', compact('order', 'users', 'technicians', 'packages'));
    }

    public function destroy(Order $order)
    {
        if (Auth::user()->role != 'super admin') {
            abort(404);
        }

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted succesfully!');
    }

    public function index(Request $request)
    {
        if (Auth::user()->role === 'technician') {
            $orders = Order::filter($request->only('search'))
                ->where('technician_id', Auth::id())
                ->where('order_status', 'processing')
                ->with('user', 'package')
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->withQueryString();
        } else {
            $orders = Order::filter($request->only('search'))
                ->with('user', 'package')
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->withQueryString();
        }

        $technicians = User::where('role', 'technician')->get();

        return view('admin.orders.index', compact('orders', 'technicians'));
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

        try {
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
                'order_id' => $order->id,
                'name' => $order->user->name,
                'email' => $order->user->email,
                'total' => $order->total,
                'order_date' => $order->order_date
            ]), config('app.key')), 0, 16);

            $order->update([
                'code' => 'ORD-' . strtoupper($code)
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to make a order, please try again later.');
        }


        return redirect()->route('user.order.show', $order->code)->with('success', 'Success to make a order!');
    }

    public function showOrder(Order $order)
    {
        return view('user.orders.summary', compact('order'));
    }

    public function historyOrder(Request $request)
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', 'like', $user_id)->filter($request->only('search'))->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('user.orders.history', compact('orders'));
    }

    public function cancelOrder(Order $order)
    {
        if (in_array($order->order_status, ['expired', 'paid', 'failed', 'processing', 'completed', 'cancelled'])) {
            return redirect()->route('user.order.history')->with('error', 'Orders cannot be cancelled as they are already in the shipping process.');
        }

        $order->update([
            'order_status' => 'cancelled'
        ]);

        return redirect()->route('user.order.history')->with('success', 'Order cancelled successfully!');
    }

    public function uploadPaymentProof(Request $request, Order $order)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('proofs', 'public');

            $order->payment_proof = $path;
            $order->order_status = 'paid';
            $order->save();

            return redirect()->route('user.order.show', $order)
                ->with('success', 'Order successfully paid!');
        }

        return redirect()->back()->with('error', 'No payment proof uploaded.');
    }

    public function assignTechnician(Request $request, $id)
    {
        $request->validate([
            'technician_id' => 'required|exists:users,id',
            'installation_date' => 'required|date'
        ]);

        $order = Order::findOrFail($id);
        $order->technician_id = $request->technician_id;
        $order->installation_date = $request->installation_date;
        $order->save();

        return redirect()->back()->with('success', 'Technician successfully assigned!');
    }

    public function confirmPayment($id)
    {
        $order = Order::findOrFail($id);

        $order->order_status = 'processing';
        $order->save();

        Mail::to($order->user->email)->send(new PaymentConfirmed($order));

        return redirect()->back()->with('success', 'Pembayaran telah dikonfirmasi dan email telah dikirim.');
    }

    public function approveInstallation(Order $order)
    {
        $order->order_status = 'completed';
        $order->expired_date = Carbon::now('Asia/Jakarta');
        $order->save();

        Mail::to($order->user->email)->send(new OrderComplete($order));


        return redirect()->back()->with('success', 'Installation has been approved.');
    }

    public function uploadInstallationProof(Request $request, Order $order)
    {
        $request->validate([
            'installation_proof' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('installation_proof')) {
            if ($order->installation_proof) {
                Storage::delete('public/' . $order->installation_proof);
            }

            $path = $request->file('installation_proof')->store('proofs', 'public');
            $order->installation_proof = $path;
            $order->save();
        }

        return redirect()->back()->with('success', 'Bukti instalasi berhasil diunggah.');
    }
}
