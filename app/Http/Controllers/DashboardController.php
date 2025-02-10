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

        // get all order year from database
        $years = Order::selectRaw("YEAR(order_date) as year")
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // get selected year from dashboard
        $selectedYear = $request->get('year', $currentYear);

        $totalUser = User::count();
        $totalOrder = Order::count();
        $totalRevenue = Order::whereYear('order_date', $selectedYear)
            ->where('order_status', 'completed')
            ->sum('total');

        // total order has paid status;
        $paidOrders = Order::where('order_status', 'paid')
            ->filter($request->only('search'))
            ->orderBy('order_date', 'desc')
            ->paginate(10)
            ->withQueryString();


        // total revenue every month
        $revenues = Order::selectRaw("DATE_FORMAT(order_date, '%M') as month, SUM(total) as revenue")
            ->whereYear('order_date', $selectedYear)
            ->where('order_status', 'completed')
            ->groupBy('month')
            ->orderByRaw("STR_TO_DATE(month, '%M')")
            ->get();

        $dashboard = [
            'totalUser' => $totalUser,
            'totalOrder' => $totalOrder,
            'totalRevenue' => $totalRevenue,
            'paidOrders' => $paidOrders,
            'revenues' => $revenues,
            'years' => $years,
            'selectedYear' => $selectedYear
        ];

        return view('admin.dashboard', compact('dashboard'));
    }
}
