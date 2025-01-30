<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::filter($request->only('search'))->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return;
    }

    public function create()
    {
        return view('admin.orders.form-order');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'code' => 'nullable',
            'user_id' => 'required|exists:users,id',
            'technician_id' => 'required|exists:users,id|different:user_id',
            'package_id' => 'required|exists:packages,id',
            'order_date' => 'required|date',
            'order_status' => 'required|in:pending,processing,completed,cancelled',
            'installation_date' => 'nullable|date|after_or_equal:order_date',
            'snap_token' => 'nullable|string|max:255'
        ]);
    }

    public function process($id)
    {
        $order = Order::with(['user', 'package'])->find($id);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->code,
                'gross_amount' => $order->package->price,
            ),
            'customer_details' => array(
                'first_name' => $order->user->name,
                'email' => $order->user->email
            )
        );

        $snapToken = Snap::getSnapToken($params);
        $order->snap_token = $snapToken;
        $order->save();
    }
}
