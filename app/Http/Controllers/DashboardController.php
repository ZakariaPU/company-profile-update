<?php

namespace App\Http\Controllers;

use App\Models\CateringOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the dashboard
     */
    public function index()
    {
        $data = [
            'statistics' => $this->getStatistics(),
            'chartData' => $this->getChartData(),
            'recentOrders' => $this->getRecentOrders(),
        ];

        return view('dashboard', $data);
    }

    /**
     * Get dashboard statistics
     */
    private function getStatistics()
    {
        return [
            'totalOrders' => $this->getTotalOrders(),
            'totalCustomers' => $this->getTotalCustomers(),
            'avgOrdersPerDay' => $this->getAverageOrdersPerDay(),
            'popularMenu' => $this->getPopularMenu(),
        ];
    }

    /**
     * Get total number of orders
     */
    private function getTotalOrders()
    {
        return CateringOrder::count();
    }

    /**
     * Get total number of unique customers
     */
    private function getTotalCustomers()
    {
        return CateringOrder::distinct('email')->count('email');
    }

    /**
     * Calculate average orders per day
     */
    private function getAverageOrdersPerDay()
    {
        $firstOrder = CateringOrder::oldest('created_at')->first();
        
        if (!$firstOrder) {
            return 0;
        }

        $daysSinceFirst = Carbon::parse($firstOrder->created_at)->diffInDays(Carbon::now()) + 1;
        $totalOrders = $this->getTotalOrders();

        return round($totalOrders / $daysSinceFirst, 1);
    }

    /**
     * Get most popular menu
     */
    private function getPopularMenu()
    {
        return CateringOrder::select('menu_type', DB::raw('count(*) as total'))
            ->groupBy('menu_type')
            ->orderByDesc('total')
            ->first();
    }

    /**
     * Get data for charts
     */
    private function getChartData()
    {
        return [
            'monthlyOrders' => $this->getMonthlyOrders(),
            'menuDistribution' => $this->getMenuDistribution(),
        ];
    }

    /**
     * Get monthly orders for current year
     */
    private function getMonthlyOrders()
    {
        return CateringOrder::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::create()->month($item->month)->format('M'),
                    'total' => $item->total
                ];
            });
    }

    /**
     * Get menu distribution data
     */
    private function getMenuDistribution()
    {
        return CateringOrder::select('menu_type', DB::raw('count(*) as total'))
            ->groupBy('menu_type')
            ->get()
            ->map(function ($item) {
                return [
                    'menu_type' => $item->menu_type,
                    'total' => $item->total,
                    'percentage' => round(($item->total / $this->getTotalOrders()) * 100, 1)
                ];
            });
    }

    /**
     * Get recent orders
     */
    private function getRecentOrders()
    {
        return CateringOrder::with(['user' => function ($query) {
                $query->select('id', 'name', 'email');
            }])
            ->select('id', 'user_id', 'menu_type', 'created_at', 'status')
            ->latest()
            ->limit(10)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'name' => $order->user->name ?? 'Guest',
                    'email' => $order->user->email ?? '-',
                    'menu_type' => $order->menu_type,
                    'created_at' => $order->created_at->format('d M Y'),
                    'status' => $this->getStatusBadgeClass($order->status)
                ];
            });
    }

    /**
     * Get status badge class
     */
    private function getStatusBadgeClass($status)
    {
        return [
            'status' => $status,
            'class' => match ($status) {
                'pending' => 'bg-yellow-100 text-yellow-800',
                'processing' => 'bg-blue-100 text-blue-800',
                'completed' => 'bg-green-100 text-green-800',
                'cancelled' => 'bg-red-100 text-red-800',
                default => 'bg-gray-100 text-gray-800',
            }
        ];
    }
}