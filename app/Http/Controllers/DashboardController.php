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

        // total revenue every month
        $revenues = Order::selectRaw("DATE_FORMAT(order_date, '%M') as month, SUM(total) as revenue")
            ->where('order_status', 'completed')
            ->groupBy('month')
            ->orderByRaw("STR_TO_DATE(month, '%M')")
            ->pluck('revenue', 'month');

        $labels = $revenues->keys();
        $revenues = $revenues->values();

        $dashboard = [
            'totalUser' => $totalUser,
            'totalOrder' => $totalOrder,
            'totalRevenue' => $totalRevenue,
            'paidOrders' => $paidOrders,
            'labels' => $labels,
            'revenues' => $revenues
        ];

        return view('admin.dashboard', compact('dashboard'));
    }
}
