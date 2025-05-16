@extends('layouts.app_admin')

@section('title', 'Dashboard')

@php
// Filter dates
$startDate = request()->input('start_date', \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d'));
$endDate = request()->input('end_date', \Carbon\Carbon::now()->format('Y-m-d'));

// Basic validation and conversion
try {
    $startDateObj = \Carbon\Carbon::parse($startDate)->startOfDay();
    $endDateObj = \Carbon\Carbon::parse($endDate)->endOfDay();
    
    // Ensure end date is not before start date
    if ($endDateObj->lt($startDateObj)) {
        $endDateObj = \Carbon\Carbon::now()->endOfDay();
        $endDate = $endDateObj->format('Y-m-d');
    }
} catch (\Exception $e) {
    $startDateObj = \Carbon\Carbon::now()->startOfMonth()->startOfDay();
    $endDateObj = \Carbon\Carbon::now()->endOfDay();
    $startDate = $startDateObj->format('Y-m-d');
    $endDate = $endDateObj->format('Y-m-d');
}

// Apply date filters to all queries
$dateFilterQuery = function($query) use ($startDateObj, $endDateObj) {
    return $query->whereBetween('created_at', [$startDateObj, $endDateObj]);
};

// Query for Statistics with date filter
$totalOrders = DB::table('catering_orders')
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->count();

$totalCustomers = DB::table('catering_orders')
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->distinct('email')
    ->count();

// Calculate average orders per day within the date range
$daysDiff = max(1, $startDateObj->diffInDays($endDateObj) + 1); // +1 to include both start and end dates
$avgOrdersPerDay = DB::table('catering_orders')
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->count() / $daysDiff;
$avgOrdersPerDay = round($avgOrdersPerDay, 1);

// Most Popular Menu
$popularMenu = DB::table('catering_orders')
    ->select('menu_type', DB::raw('count(*) as total'))
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->groupBy('menu_type')
    ->orderByDesc('total')
    ->first();

// If no orders in the selected period
if (!$popularMenu) {
    $popularMenu = (object) ['menu_type' => 'Tidak ada data', 'total' => 0];
}

// Daily Orders for Chart (improved granularity)
$dailyOrders = DB::table('catering_orders')
    ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->groupBy('date')
    ->orderBy('date')
    ->get();

// Menu Distribution for Chart
$menuDistribution = DB::table('catering_orders')
    ->select('menu_type', DB::raw('count(*) as total'))
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->groupBy('menu_type')
    ->get();

// Status Distribution for Chart
$statusDistribution = DB::table('catering_orders')
    ->select('status', DB::raw('count(*) as total'))
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->groupBy('status')
    ->get();

// Recent Orders with date filter
$recentOrders = DB::table('catering_orders')
    ->select('id', 'name', 'email', 'menu_type', 'created_at', 'status')
    ->where(function($query) use ($dateFilterQuery) {
        $dateFilterQuery($query);
    })
    ->orderByDesc('created_at')
    ->limit(10)
    ->get();

// Revenue calculations (assuming there's a price field or we can estimate from menu_type)
// Note: This is an example, you might need to adjust based on your actual data structure
$totalRevenue = 0;
$revenueByDay = [];

// Example revenue calculation (modify as needed for your actual data)
foreach ($dailyOrders as $day) {
    // Example: estimate revenue based on number of orders and average order value
    $estimatedRevenue = $day->total * 50000; // Assuming average order value of 50,000
    $totalRevenue += $estimatedRevenue;
    
    $revenueByDay[] = [
        'date' => $day->date,
        'revenue' => $estimatedRevenue
    ];
}
@endphp

@section('content')
    <div class="flex-1 overflow-auto bg-gray-50">
        <!-- Main Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Date Filter Section -->
            <div class="mb-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Dashboard Analisis</h2>
                            <p class="text-sm text-gray-500">Pantau performa bisnis katering Anda</p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-3">
                            <form id="date-filter-form" class="flex flex-wrap md:flex-nowrap items-center gap-3">
                                <div class="flex items-center">
                                    <label for="start_date" class="mr-2 text-sm font-medium text-gray-700">Dari:</label>
                                    <input type="date" id="start_date" name="start_date" value="{{ $startDate }}" 
                                        class="border-gray-300 rounded-lg text-sm focus:ring-red-500 focus:border-red-500">
                                </div>
                                <div class="flex items-center">
                                    <label for="end_date" class="mr-2 text-sm font-medium text-gray-700">Sampai:</label>
                                    <input type="date" id="end_date" name="end_date" value="{{ $endDate }}" 
                                        class="border-gray-300 rounded-lg text-sm focus:ring-red-500 focus:border-red-500">
                                </div>
                                <button type="submit" class="px-4 py-2 bg-red-900 text-white rounded-lg text-sm hover:bg-red-800 transition-colors">
                                    <i class="fas fa-filter mr-1"></i> Filter
                                </button>
                            </form>
                            
                            <div class="flex gap-2">
                                <button id="download-dashboard" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200 transition-colors flex items-center">
                                    <i class="fas fa-download mr-1"></i> Export
                                </button>
                                <button id="print-dashboard" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200 transition-colors flex items-center">
                                    <i class="fas fa-print mr-1"></i> Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Total Orders -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-shopping-bag text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Pesanan</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ number_format($totalOrders) }}</p>
                            <span class="text-xs text-gray-500">Periode: {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Total Customers -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-users text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Pelanggan</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ number_format($totalCustomers) }}</p>
                            <span class="text-xs text-gray-500">Unik berdasarkan email</span>
                        </div>
                    </div>
                </div>

                <!-- Estimated Revenue -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-coins text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Est. Pendapatan</p>
                            <p class="text-2xl font-semibold text-gray-900">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                            <span class="text-xs text-gray-500">Berdasarkan estimasi</span>
                        </div>
                    </div>
                </div>

                <!-- Average Orders Per Day -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-3">
                            <i class="fas fa-calendar-check text-red-900 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Rata-rata Pesanan/Hari</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $avgOrdersPerDay }}</p>
                            <span class="text-xs text-gray-500">Dalam periode terpilih</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                <!-- Orders Chart -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Trend Pesanan</h3>
                        <div class="flex gap-2">
                            <button class="chart-period-btn px-2 py-1 text-xs rounded-md bg-red-100 text-red-900 active" data-period="day">Harian</button>
                            <button class="chart-period-btn px-2 py-1 text-xs rounded-md bg-gray-100 text-gray-700" data-period="week">Mingguan</button>
                            <button class="chart-period-btn px-2 py-1 text-xs rounded-md bg-gray-100 text-gray-700" data-period="month">Bulanan</button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>

                <!-- Menu Distribution -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Distribusi Menu</h3>
                        <div class="flex">
                            <button class="chart-type-btn px-2 py-1 text-xs rounded-md bg-red-100 text-red-900 active mr-2" data-type="doughnut">Donat</button>
                            <button class="chart-type-btn px-2 py-1 text-xs rounded-md bg-gray-100 text-gray-700" data-type="bar">Batang</button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="menuChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Additional Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                <!-- Revenue Chart -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Trend Pendapatan (Estimasi)</h3>
                    <div class="h-80">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Status Distribution -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Status Pesanan</h3>
                    <div class="h-80">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Popular Menu Card -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Menu Terpopuler</h3>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-50 rounded-xl p-6">
                            <i class="fas fa-utensils text-red-900 text-4xl"></i>
                        </div>
                        <div class="ml-6">
                            <p class="text-2xl font-semibold text-gray-900">{{ $popularMenu->menu_type }}</p>
                            <p class="text-lg text-gray-700 mt-1">{{ $popularMenu->total }} pesanan</p>
                            @if($totalOrders > 0)
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                                    <div class="bg-red-900 h-2.5 rounded-full" style="width: {{ ($popularMenu->total / $totalOrders) * 100 }}%"></div>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">{{ round(($popularMenu->total / $totalOrders) * 100, 1) }}% dari total pesanan</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Insights -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Insight Cepat</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-50 rounded-full p-2">
                                <i class="fas fa-chart-line text-green-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Tren:</p>
                                <p class="text-sm text-gray-500">
                                    @if(count($dailyOrders) > 1)
                                        @php
                                            $first = $dailyOrders->first()->total ?? 0;
                                            $last = $dailyOrders->last()->total ?? 0;
                                            $trend = $first != 0 ? (($last - $first) / $first) * 100 : 0;
                                        @endphp
                                        @if($trend > 0)
                                            <span class="text-green-600">Naik {{ number_format(abs($trend), 1) }}%</span> dari awal periode
                                        @elseif($trend < 0)
                                            <span class="text-red-600">Turun {{ number_format(abs($trend), 1) }}%</span> dari awal periode
                                        @else
                                            Stabil sepanjang periode
                                        @endif
                                    @else
                                        Data tidak cukup untuk analisis tren
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-50 rounded-full p-2">
                                <i class="fas fa-calendar-day text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Hari terbaik:</p>
                                <p class="text-sm text-gray-500">
                                    @if(count($dailyOrders) > 0)
                                        @php
                                            $bestDay = $dailyOrders->sortByDesc('total')->first();
                                            $bestDayDate = \Carbon\Carbon::parse($bestDay->date)->locale('id');
                                        @endphp
                                        {{ $bestDayDate->translatedFormat('l, d M Y') }} ({{ $bestDay->total }} pesanan)
                                    @else
                                        Tidak ada data
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-50 rounded-full p-2">
                                <i class="fas fa-percentage text-purple-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Status pesanan:</p>
                                <p class="text-sm text-gray-500">
                                    @php
                                        $completedOrders = $statusDistribution->where('status', 'completed')->first()->total ?? 0;
                                        $completionRate = $totalOrders > 0 ? ($completedOrders / $totalOrders) * 100 : 0;
                                    @endphp
                                    {{ number_format($completionRate, 1) }}% pesanan telah selesai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Pesanan Terbaru</h3>
                        <a href="/laporan" class="text-red-900 hover:text-red-700 flex items-center">
                            <span>Lihat Semua</span>
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </a>
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
                                @forelse($recentOrders as $order)
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
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Tidak ada pesanan dalam periode yang dipilih
                                    </td>
                                </tr>
                                @endforelse
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ====== CHART DATA ======
    const dailyOrdersData = @json($dailyOrders);
    const menuData = @json($menuDistribution);
    const statusData = @json($statusDistribution);
    const revenueData = @json($revenueByDay);
    
    // ====== CHARTS ======
    // Global chart options
    Chart.defaults.font.family = "'Inter', 'Helvetica', 'Arial', sans-serif";
    Chart.defaults.color = '#6b7280';
    
    // Initialize chart objects
    let ordersChart;
    let menuChart;
    let revenueChart;
    let statusChart;
    
    // Orders Chart - Default Daily View
    function initOrdersChart(period = 'day') {
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        
        // Process data based on period
        let labels = [];
        let data = [];
        
        if (period === 'day') {
            // Daily data - use as is
            dailyOrdersData.forEach(item => {
                labels.push(formatDate(item.date));
                data.push(item.total);
            });
        } else if (period === 'week') {
            // Group by week
            const weeklyData = groupDataByPeriod(dailyOrdersData, 'week');
            weeklyData.forEach(item => {
                labels.push(`Week ${item.period}`);
                data.push(item.total);
            });
        } else if (period === 'month') {
            // Group by month
            const monthlyData = groupDataByPeriod(dailyOrdersData, 'month');
            monthlyData.forEach(item => {
                labels.push(getMonthName(item.period));
                data.push(item.total);
            });
        }
        
        // Destroy previous chart if exists
        if (ordersChart) {
            ordersChart.destroy();
        }
        
        ordersChart = new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pesanan',
                    data: data,
                    borderColor: '#7F1D1D',
                    backgroundColor: 'rgba(127, 29, 29, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#7F1D1D',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1f2937',
                        bodyColor: '#4b5563',
                        borderColor: '#e5e7eb',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return `Total Pesanan: ${context.parsed.y}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(243, 244, 246, 1)',
                            drawBorder: false
                        },
                        ticks: {
                            precision: 0,
                            callback: function(value) {
                                return value + ' pesanan';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });
    }
    
    // Menu Distribution Chart
    function initMenuChart(type = 'doughnut') {
        const menuCtx = document.getElementById('menuChart').getContext('2d');
        const menuLabels = menuData.map(item => item.menu_type);
        const menuCounts = menuData.map(item => item.total);
        
        // Color palette
        const backgroundColors = [
            '#7F1D1D', '#991B1B', '#B91C1C', '#DC2626',
            '#9D174D', '#BE185D', '#DB2777', '#EC4899'
        ];
        
        // Destroy previous chart if exists
        if (menuChart) {
            menuChart.destroy();
        }
        
        // Chart options based on type
        const options = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: type === 'doughnut' ? 'bottom' : 'top',
                    labels: {
                        padding: 20,
                        boxWidth: 12,
                        usePointStyle: type === 'doughnut',
                        font: {
                            size: 11
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1f2937',
                    bodyColor: '#4b5563',
                    borderColor: '#e5e7eb',
                    borderWidth: 1,
                    padding: 12,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((sum, val) => sum + val, 0);
                            const percentage = Math.round((context.parsed * 100) / total);
                            return `${context.label}: ${context.parsed} (${percentage}%)`;
                        }
                    }
                }
            }
        };
        
        // Add specific options based on chart type
        if (type === 'doughnut') {
            options.cutout = '60%';
        } else {
            options.indexAxis = 'y';
            options.scales = {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(243, 244, 246, 1)',
                        drawBorder: false
                    }
                },
                y: {
                    grid: {
                        display: false
                    }
                }
            };
        }
        
        menuChart = new Chart(menuCtx, {
            type: type,
            data: {
                labels: menuLabels,
                datasets: [{
                    data: menuCounts,
                    backgroundColor: backgroundColors.slice(0, menuLabels.length),
                    borderWidth: 0
                }]
            },
            options: options
        });
    }
    
    // Revenue Chart
    function initRevenueChart() {
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        
        const labels = revenueData.map(item => formatDate(item.date));
        const data = revenueData.map(item => item.revenue);
        
        // Destroy previous chart if exists
        if (revenueChart) {
            revenueChart.destroy();
        }
        
        revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: data,
                    backgroundColor: 'rgba(127, 29, 29, 0.7)',
                    borderColor: '#7F1D1D',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1f2937',
                        bodyColor: '#4b5563',
                        borderColor: '#e5e7eb',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return `Pendapatan: Rp ${formatCurrency(context.parsed.y)}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(243, 244, 246, 1)',
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + formatCurrency(value);
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });
    }
    
    // Status Distribution Chart
    function initStatusChart() {
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        
        const statusLabels = statusData.map(item => ucfirst(item.status));
        const statusCounts = statusData.map(item => item.total);
        
        // Color mapping for statuses
        const statusColors = {
            'completed': '#10B981', // Green
            'pending': '#F59E0B',   // Yellow
            'processing': '#3B82F6', // Blue
            'cancelled': '#EF4444'  // Red
        };
        
        // Generate background colors based on status
        const backgroundColors = statusData.map(item => {
            return statusColors[item.status] || '#6B7280'; // Default gray if status not found
        });
        
        // Destroy previous chart if exists
        if (statusChart) {
            statusChart.destroy();
        }
        
        statusChart = new Chart(statusCtx, {
            type: 'pie',
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusCounts,
                    backgroundColor: backgroundColors,
                    borderWidth: 0
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
                            boxWidth: 12,
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1f2937',
                        bodyColor: '#4b5563',
                        borderColor: '#e5e7eb',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((sum, val) => sum + val, 0);
                                const percentage = Math.round((context.parsed * 100) / total);
                                return `${context.label}: ${context.parsed} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    }
    
    // ====== UTILITY FUNCTIONS ======
    // Format date
    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
    }
    
    // Format currency
    function formatCurrency(value) {
        return new Intl.NumberFormat('id-ID').format(value);
    }
    
    // Capitalize first letter
    function ucfirst(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    
    // Group data by period (week or month)
    function groupDataByPeriod(data, periodType) {
        const result = {};
        
        data.forEach(item => {
            const date = new Date(item.date);
            let period;
            
            if (periodType === 'week') {
                // Get ISO week number
                const firstDayOfYear = new Date(date.getFullYear(), 0, 1);
                const pastDaysOfYear = (date - firstDayOfYear) / 86400000;
                period = Math.ceil((pastDaysOfYear + firstDayOfYear.getDay() + 1) / 7);
            } else if (periodType === 'month') {
                period = date.getMonth() + 1; // Month index starts at 0
            }
            
            if (!result[period]) {
                result[period] = { period: period, total: 0 };
            }
            
            result[period].total += item.total;
        });
        
        // Convert to array and sort
        return Object.values(result).sort((a, b) => a.period - b.period);
    }
    
    // Get month name
    function getMonthName(monthNumber) {
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return monthNames[monthNumber - 1];
    }
    
    // ====== EVENT LISTENERS ======
    // Initialize all charts
    initOrdersChart();
    initMenuChart();
    initRevenueChart();
    initStatusChart();
    
    // Orders chart period buttons
    document.querySelectorAll('.chart-period-btn').forEach(button => {
        button.addEventListener('click', function() {
            const period = this.getAttribute('data-period');
            
            // Update active button
            document.querySelectorAll('.chart-period-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-red-100', 'text-red-900');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
            
            this.classList.add('active', 'bg-red-100', 'text-red-900');
            this.classList.remove('bg-gray-100', 'text-gray-700');
            
            // Update chart
            initOrdersChart(period);
        });
    });
    
    // Menu chart type buttons
    document.querySelectorAll('.chart-type-btn').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            
            // Update active button
            document.querySelectorAll('.chart-type-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-red-100', 'text-red-900');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
            
            this.classList.add('active', 'bg-red-100', 'text-red-900');
            this.classList.remove('bg-gray-100', 'text-gray-700');
            
            // Update chart
            initMenuChart(type);
        });
    });
    
    // ====== EXPORT FUNCTIONALITY ======
    // Download dashboard as image
    document.getElementById('download-dashboard').addEventListener('click', function() {
        // Create a dropdown menu for export options
        const dropdown = document.createElement('div');
        dropdown.classList.add('absolute', 'mt-2', 'right-0', 'z-10', 'bg-white', 'rounded-md', 'shadow-lg', 'border', 'border-gray-100');
        dropdown.style.minWidth = '180px';
        
        // Add options
        const options = [
            { label: 'Download sebagai PNG', format: 'png' },
            { label: 'Download sebagai JPEG', format: 'jpeg' },
            // { label: 'Download sebagai PDF', format: 'pdf' }
        ];
        
        options.forEach(option => {
            const item = document.createElement('a');
            item.classList.add('block', 'px-4', 'py-2', 'text-sm', 'text-gray-700', 'hover:bg-gray-100', 'cursor-pointer');
            item.textContent = option.label;
            
            item.addEventListener('click', function() {
                exportDashboard(option.format);
                dropdown.remove();
            });
            
            dropdown.appendChild(item);
        });
        
        // Check if dropdown already exists and remove it
        const existingDropdown = document.querySelector('.export-dropdown');
        if (existingDropdown) {
            existingDropdown.remove();
        }
        
        // Add dropdown to button's parent
        dropdown.classList.add('export-dropdown');
        this.parentNode.style.position = 'relative';
        this.parentNode.appendChild(dropdown);
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function closeDropdown(e) {
            if (!dropdown.contains(e.target) && e.target !== document.getElementById('download-dashboard')) {
                dropdown.remove();
                document.removeEventListener('click', closeDropdown);
            }
        });
    });
    
    // Print dashboard
    document.getElementById('print-dashboard').addEventListener('click', function() {
        window.print();
    });
    
    // Export dashboard as image or PDF
    function exportDashboard(format) {
        const dashboardElement = document.querySelector('main');
        const exportOptions = {
            backgroundColor: '#f9fafb',
            scale: 2 // Better quality
        };
        
        // Show loading indicator
        const loader = document.createElement('div');
        loader.innerHTML = `
            <div class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded-lg shadow-xl flex items-center">
                    <svg class="animate-spin h-6 w-6 text-red-900 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-gray-700">Memproses export...</span>
                </div>
            </div>
        `;
        document.body.appendChild(loader);
        
        // Export process
        setTimeout(() => {
            html2canvas(dashboardElement, exportOptions).then(canvas => {
                // Remove loader
                document.body.removeChild(loader);
                
                if (format === 'pdf') {
                    // If we want to support PDF, we'd need to include a PDF library like jsPDF
                    alert('Export PDF requires additional library. Feature coming soon.');
                } else {
                    // For PNG and JPEG
                    const link = document.createElement('a');
                    link.download = `Dashboard-Katering-${new Date().toISOString().split('T')[0]}.${format}`;
                    link.href = canvas.toDataURL(`image/${format}`);
                    link.click();
                }
            }).catch(err => {
                // Remove loader and show error
                document.body.removeChild(loader);
                console.error('Export failed:', err);
                alert('Export gagal. Silakan coba lagi.');
            });
        }, 500);
    }
    
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
    
    // Add print styles
    const printStyles = document.createElement('style');
    printStyles.textContent = `
        @media print {
            body { background-color: white; }
            nav, footer, button, .chart-period-btn, .chart-type-btn { display: none !important; }
            main { padding: 0 !important; }
            .shadow-sm, .shadow-md, .hover\\:shadow-md { box-shadow: none !important; }
            .rounded-xl { border-radius: 0 !important; }
            input, button, select { border: 1px solid #e5e7eb !important; }
            canvas { max-height: 300px !important; }
        }
    `;
    document.head.appendChild(printStyles);
});
</script>
@endpush