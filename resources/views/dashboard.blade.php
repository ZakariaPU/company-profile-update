@extends('layouts.app_admin')

@section('title', 'Dashboard')

@php
// Query for Statistics
$totalOrders = DB::table('catering_orders')->count();
$totalCustomers = DB::table('catering_orders')->distinct('email')->count();
$avgOrdersPerDay = DB::table('catering_orders')
    ->selectRaw('ROUND(COUNT(*) / DATEDIFF(CURDATE(), MIN(created_at)), 1) as avg_orders')
    ->first()->avg_orders;

// Most Popular Menu
$popularMenu = DB::table('catering_orders')
    ->select('menu_type', DB::raw('count(*) as total'))
    ->groupBy('menu_type')
    ->orderByDesc('total')
    ->first();

// Monthly Orders for Chart
$monthlyOrders = DB::table('catering_orders')
    ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
    ->whereYear('created_at', date('Y'))
    ->groupBy('month')
    ->orderBy('month')
    ->get();

// Menu Distribution for Chart
$menuDistribution = DB::table('catering_orders')
    ->select('menu_type', DB::raw('count(*) as total'))
    ->groupBy('menu_type')
    ->get();

// Recent Orders
$recentOrders = DB::table('catering_orders')
    ->select('id', 'name', 'email', 'menu_type', 'created_at', 'status')
    ->orderByDesc('created_at')
    ->limit(10)
    ->get();
@endphp

@section('content')
    <div class="flex-1 overflow-auto bg-gray-50">
<!-- Top Header -->

        <!-- Main Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Total Orders -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-shopping-bag text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Pesanan</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ number_format($totalOrders) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Customers -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-users text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Pelanggan</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ number_format($totalCustomers) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Popular Menu -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-utensils text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Menu Terpopuler</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $popularMenu->menu_type }}</p>
                            <span class="text-gray-500 text-sm">{{ $popularMenu->total }} pesanan</span>
                        </div>
                    </div>
                </div>

                <!-- Average Orders Per Day -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-calendar-check text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Rata-rata Pesanan/Hari</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $avgOrdersPerDay }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                <!-- Orders Chart -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Trend Pesanan</h3>
                    <div class="h-80">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>

                <!-- Menu Distribution -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Distribusi Menu</h3>
                    <div class="h-80">
                        <canvas id="menuChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">10 Pesanan Terbaru</h3>
                        <a href="/laporan" class="text-red-900 hover:text-red-700">Lihat Semua</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentOrders as $order)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                                                <span class="text-red-900 text-sm font-medium">
                                                    {{ strtoupper(substr($order->name, 0, 2)) }}
                                                </span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $order->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $order->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->menu_type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                               ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                                'bg-gray-100 text-gray-800') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Orders Chart
    const monthlyOrdersData = @json($monthlyOrders);
    const monthLabels = monthlyOrdersData.map(item => {
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return monthNames[item.month - 1];
    });
    const orderCounts = monthlyOrdersData.map(item => item.total);

    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    new Chart(ordersCtx, {
        type: 'line',
        data: {
            labels: monthLabels,
            datasets: [{
                label: 'Pesanan',
                data: orderCounts,
                borderColor: '#7F1D1D',
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(127, 29, 29, 0.1)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + ' pesanan';
                        }
                    }
                }
            }
        }
    });

    // Menu Distribution Chart
    const menuData = @json($menuDistribution);
    const menuLabels = menuData.map(item => item.menu_type);
    const menuCounts = menuData.map(item => item.total);

    const menuCtx = document.getElementById('menuChart').getContext('2d');
    new Chart(menuCtx, {
        type: 'doughnut',
        data: {
            labels: menuLabels,
            datasets: [{
                data: menuCounts,
                backgroundColor: [
                    '#7F1D1D',
                    '#991B1B',
                    '#B91C1C',
                    '#DC2626'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        boxWidth: 12
                    }
                }
            },
            cutout: '60%'
        }
    });

    // Handle window resize
    function handleResize() {
        const width = window.innerWidth;
        const charts = document.querySelectorAll('canvas');
        charts.forEach(chart => {
            const container = chart.parentElement;
            container.style.height = width < 768 ? '300px' : '400px';
        });
    }

    handleResize();
    window.addEventListener('resize', handleResize);
});
</script>
@endpush