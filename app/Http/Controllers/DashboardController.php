<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $totalUser = User::count();
        $totalOrder = Order::count();
        $totalRevenue = Order::where('order_status', 'completed')->sum('total');

        // total order has paid status;
        $paidOrders = Order::where('order_status', 'paid')
            ->filter($request->only('search'))
            ->orderBy('order_date', 'desc')
            ->paginate(10)
            ->withQueryString();

        $dashboard = [
            'totalUser' => $totalUser,
            'totalOrder' => $totalOrder,
            'totalRevenue' => $totalRevenue,
            'paidOrders' => $paidOrders
        ];

        return view('admin.dashboard', compact('dashboard'));
    }
}
