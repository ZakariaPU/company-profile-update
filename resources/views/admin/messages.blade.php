@extends('layouts.app_admin')
{{-- @extends('layouts.admin') --}}

@section('title', 'Messages')

@section('content')
    <div class="min-h-screen">
        <!-- Header Section with Quick Stats -->
        <div class="bg-gradient-to-r from-red-800 to-red-900 relative overflow-hidden">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
            <div class="container mx-auto px-4 py-8 relative">
                {{-- <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-4xl font-bold text-white mb-2">Messages Dashboard</h1>
                        <p class="text-red-100">Monitor and manage your customer inquiries</p>
                    </div>
                </div> --}}
                
                <!-- Quick Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Messages -->
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-red-700/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-red-100">Total Messages</p>
                                <p class="text-3xl font-bold text-white mt-1" id="totalMessages">0</p>
                            </div>
                            <div class="bg-red-700/30 p-3 rounded-lg">
                                <i class="fas fa-envelope text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Unique Senders -->
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-red-700/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-red-100">Unique Senders</p>
                                <p class="text-3xl font-bold text-white mt-1" id="uniqueSenders">0</p>
                            </div>
                            <div class="bg-red-700/30 p-3 rounded-lg">
                                <i class="fas fa-users text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Messages This Month -->
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-red-700/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-red-100">Messages This Month</p>
                                <p class="text-3xl font-bold text-white mt-1" id="messagesThisMonth">0</p>
                            </div>
                            <div class="bg-red-700/30 p-3 rounded-lg">
                                <i class="fas fa-calendar text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Average Messages Per Day -->
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-red-700/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-red-100">Avg Messages/Day</p>
                                <p class="text-3xl font-bold text-white mt-1" id="avgMessagesPerDay">0</p>
                            </div>
                            <div class="bg-red-700/30 p-3 rounded-lg">
                                <i class="fas fa-chart-line text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8 mt-6 ">
            <!-- Date Filter -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-red-100">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                    <div>
                        <label for="startDate" class="block text-sm font-medium text-red-800 mb-2">Start Date</label>
                        <input type="date" id="startDate" class="w-full rounded-lg border-red-200 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 transition-all">
                    </div>
                    <div>
                        <label for="endDate" class="block text-sm font-medium text-red-800 mb-2">End Date</label>
                        <input type="date" id="endDate" class="w-full rounded-lg border-red-200 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 transition-all">
                    </div>
                    <div>
                        <button id="filterButton" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center space-x-2">
                            <i class="fas fa-filter"></i>
                            <span>Apply Filter</span>
                        </button>
                    </div>
                    <div>
                        <button id="clearFilter" class="w-full bg-red-100 hover:bg-red-200 text-red-700 font-medium py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center space-x-2">
                            <i class="fas fa-times"></i>
                            <span>Clear Filter</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Charts and Recent Messages Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Monthly Senders Chart -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6 border border-red-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-red-900">Monthly Message Trends</h2>
                        <div class="bg-red-50 text-red-600 px-3 py-1 rounded-lg text-sm font-medium">Last 12 Months</div>
                    </div>
                    <div class="h-[400px]">
                        <canvas id="monthlySendersChart"></canvas>
                    </div>
                </div>

                <!-- Recent Senders Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-red-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-red-900">Recent Senders</h2>
                        <div class="bg-red-50 text-red-600 px-3 py-1 rounded-lg text-sm font-medium">Latest</div>
                    </div>
                    <div class="space-y-4" id="recentSendersList">
                        <!-- Recent senders will be populated here -->
                    </div>
                </div>
            </div>

            <!-- Messages by Sender Distribution -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-red-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-red-900">Message Distribution</h2>
                    <div class="bg-red-50 text-red-600 px-3 py-1 rounded-lg text-sm font-medium">By Sender</div>
                </div>
                <div class="h-[300px]">
                    <canvas id="sendersChart"></canvas>
                </div>
            </div>

            <!-- Messages Table -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-red-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-red-900">Message Details</h2>
                    <div class="bg-red-50 text-red-600 px-3 py-1 rounded-lg text-sm font-medium">All Messages</div>
                </div>
                <div class="overflow-x-auto">
                    <table id="messagesTable" class="min-w-full divide-y divide-red-100">
                        <thead class="bg-red-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-red-700 uppercase tracking-wider rounded-l-lg">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-red-700 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-red-700 uppercase tracking-wider">Subject</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-red-700 uppercase tracking-wider">Message</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-red-700 uppercase tracking-wider rounded-r-lg">Received At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-red-100">
                            @foreach($messages as $message)
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                                                <span class="text-red-700 font-medium">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                            </div>
                                            <span class="ml-3 font-medium text-gray-900">{{ $message->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->subject }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500 truncate max-w-xs">{{ $message->message }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Initialize charts with red color scheme
        const chartColors = {
            primary: '#991B1B',
            secondary: '#DC2626',
            background: '#FEF2F2',
            text: '#7F1D1D'
        };
    </script>
    @endpush

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
// Wait for document to be ready
$(document).ready(function() {
    // Global variables
    const messages = @json($messages);
    let currentChart1 = null;
    let currentChart2 = null;
    let originalMessages = messages; // Store original messages for reset
    
    // Initialize DataTable with export buttons
    const table = $('#messagesTable').DataTable({
        pageLength: 10,
        order: [[4, "desc"]],
        responsive: true,
    });

    // Calculate messages from previous period
    function getPreviousPeriodMessages(currentMessages) {
        const currentStartDate = new Date(Math.min(...currentMessages.map(m => new Date(m.created_at))));
        const currentEndDate = new Date(Math.max(...currentMessages.map(m => new Date(m.created_at))));
        const periodLength = currentEndDate - currentStartDate;
        
        const previousStartDate = new Date(currentStartDate - periodLength);
        return messages.filter(m => {
            const date = new Date(m.created_at);
            return date >= previousStartDate && date < currentStartDate;
        }).length || 1; // Prevent division by zero
    }

    // Calculate and update statistics
    function updateStatistics(filteredMessages = messages) {
        // Total Messages
        const totalMessages = filteredMessages.length;
        $('#totalMessages').text(totalMessages);

        // Unique Senders
        const uniqueSenders = new Set(filteredMessages.map(m => m.name)).size;
        $('#uniqueSenders').text(uniqueSenders);

        // Messages This Month
        const currentMonth = new Date().getMonth();
        const currentYear = new Date().getFullYear();
        const messagesThisMonth = filteredMessages.filter(m => {
            const date = new Date(m.created_at);
            return date.getMonth() === currentMonth && date.getFullYear() === currentYear;
        }).length;
        $('#messagesThisMonth').text(messagesThisMonth);

        // Average Messages Per Day
        const dates = filteredMessages.map(m => new Date(m.created_at).toDateString());
        const uniqueDates = new Set(dates).size || 1;
        const avgPerDay = (totalMessages / uniqueDates).toFixed(1);
        $('#avgMessagesPerDay').text(avgPerDay);

        // Percentage change from previous period
        const previousPeriodMessages = getPreviousPeriodMessages(filteredMessages);
        const percentageChange = ((totalMessages - previousPeriodMessages) / previousPeriodMessages * 100).toFixed(1);
        $('#messagesTrend').html(`
            <span class="${percentageChange >= 0 ? 'text-green-500' : 'text-red-500'}">
                ${percentageChange >= 0 ? '↑' : '↓'} ${Math.abs(percentageChange)}%
            </span>
        `);
    }

// Update Recent Senders List
function updateRecentSenders(filteredMessages = messages) {
    const recentMessages = [...filteredMessages]
        .sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
        .slice(0, 5);

    const recentSendersList = $('#recentSendersList');
    recentSendersList.empty();

    recentMessages.forEach(message => {
        const messageDate = new Date(message.created_at);
        const timeAgo = moment(messageDate).fromNow();
        
        recentSendersList.append(`
            <div class="flex items-start p-3 bg-white hover:bg-red-50 transition-colors duration-300 rounded-lg border border-red-200 shadow-md mb-3">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-red-800 to-red-600 flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-lg">${message.name.charAt(0).toUpperCase()}</span>
                    </div>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-base font-semibold text-red-900">${message.name}</p>
                    <p class="text-sm text-red-600 truncate">${message.subject || 'No Subject'}</p>
                    <p class="text-xs text-red-500 mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        ${timeAgo}
                    </p>
                </div>
            </div>
        `);
    });
}

// Create Monthly Messages Chart
function createMonthlyMessagesChart(filteredMessages = messages) {
    const monthlyData = {};
    
    filteredMessages.forEach(message => {
        const date = new Date(message.created_at);
        const monthYear = `${date.toLocaleString('default', { month: 'short' })} ${date.getFullYear()}`;
        monthlyData[monthYear] = (monthlyData[monthYear] || 0) + 1;
    });

    const labels = Object.keys(monthlyData).sort((a, b) => {
        const dateA = new Date(a);
        const dateB = new Date(b);
        return dateA - dateB;
    });

    const data = labels.map(month => monthlyData[month]);

    if (currentChart1) currentChart1.destroy();

    const ctx = document.getElementById('monthlySendersChart').getContext('2d');
    currentChart1 = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Messages',
                data: data,
                borderColor: '#991b1b', // red-700
                backgroundColor: 'rgba(153, 27, 27, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#991b1b',
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#7f1d1d',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    callbacks: {
                        label: function(context) {
                            return `${context.parsed.y} messages`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        stepSize: 1,
                        color: '#7f1d1d'
                    },
                    title: {
                        display: true,
                        text: 'Total Messages',
                        color: '#7f1d1d'
                    },
                    grid: {
                        color: 'rgba(127, 29, 29, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Month',
                        color: '#7f1d1d'
                    },
                    ticks: {
                        color: '#7f1d1d'
                    }
                }
            }
        }
    });
}

// Create Senders Distribution Chart
function createSendersDistributionChart(filteredMessages = messages) {
    const senderCounts = {};
    filteredMessages.forEach(message => {
        senderCounts[message.name] = (senderCounts[message.name] || 0) + 1;
    });

    const topSenders = Object.entries(senderCounts)
        .sort(([,a], [,b]) => b - a)
        .slice(0, 10);

    if (currentChart2) currentChart2.destroy();

    const ctx = document.getElementById('sendersChart').getContext('2d');
    currentChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: topSenders.map(([name]) => name),
            datasets: [{
                label: 'Messages Sent',
                data: topSenders.map(([,count]) => count),
                backgroundColor: 'rgba(127, 29, 29, 0.6)', // red-900 with opacity
                borderColor: '#7f1d1d', // red-900
                borderWidth: 1,
                borderRadius: 6
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
                    backgroundColor: '#7f1d1d',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    callbacks: {
                        label: function(context) {
                            const total = filteredMessages.length;
                            const percentage = ((context.parsed.y / total) * 100).toFixed(1);
                            return `${context.parsed.y} messages (${percentage}%)`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: '#7f1d1d'
                    },
                    title: {
                        display: true,
                        text: 'Number of Messages',
                        color: '#7f1d1d'
                    },
                    grid: {
                        color: 'rgba(127, 29, 29, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#7f1d1d',
                        callback: function(val, index) {
                            const label = this.getLabelForValue(val);
                            return label.length > 10 ? label.substr(0, 10) + '...' : label;
                        }
                    }
                }
            }
        }
    });
}

    // Update all charts and statistics
    function updateChartsAndStats(filteredMessages) {
        updateStatistics(filteredMessages);
        updateRecentSenders(filteredMessages);
        createMonthlyMessagesChart(filteredMessages);
        createSendersDistributionChart(filteredMessages);
    }

    //Notification function
    function showNotification(message, type = 'info') {
    const bgColor = type === 'error' ? 'bg-red-500' :
        type === 'success' ? 'bg-green-500' :
        type === 'success-filter' ? 'bg-zinc-700/90' :
        'bg-blue-500';

    const notification = $(`
        <div class="fixed top-4 right-4 flex items-center p-4 ${bgColor} text-white rounded-lg shadow-lg transform transition-all duration-300 opacity-0 z-50">
            <div class="flex items-center space-x-3">
                <span class="text-xl">
                    <i class="fas fa-info-circle"></i>
                </span>
                <span class="flex-grow text-sm">${message}</span>
                <button class="ml-3 hover:bg-white/20 rounded-full p-1 transition-colors" onclick="this.parentElement.parentElement.remove()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    `).appendTo('body');

    setTimeout(() => notification.removeClass('opacity-0'), 100);
    setTimeout(() => {
        notification.addClass('opacity-0');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
    }

    // Clear/Reset Filter button click handler
    $('#clearFilter').on('click', function() {
        // Reset date inputs to default (last 30 days)
        const endDate = new Date();
        const startDate = new Date();
        startDate.setDate(startDate.getDate() - 30);

        $('#startDate').val(startDate.toISOString().split('T')[0]);
        $('#endDate').val(endDate.toISOString().split('T')[0]);

        // Reset table and charts to original data
        table.clear();
        originalMessages.forEach(message => {
            table.row.add([
                message.name,
                message.email,
                message.subject,
                message.message,
                message.created_at
            ]);
        });
        table.draw();

        // Update charts and stats with original data
        updateChartsAndStats(originalMessages);
        
        showNotification('Filters have been reset', 'success-filter');
    });

    // Filter button click handler
    $('#filterButton').on('click', function() {
        const startDate = new Date($('#startDate').val());
        const endDate = new Date($('#endDate').val());
        endDate.setHours(23, 59, 59, 999);

        if (!$('#startDate').val() || !$('#endDate').val()) {
            showNotification('Please select both start and end dates', 'error');
            return;
        }

        if (startDate > endDate) {
            showNotification('Start date cannot be after end date', 'error');
            return;
        }

        const filteredMessages = messages.filter(message => {
            const messageDate = new Date(message.created_at);
            return messageDate >= startDate && messageDate <= endDate;
        });

        if (filteredMessages.length === 0) {
            showNotification('No messages found in selected date range', 'info');
        }

        updateChartsAndStats(filteredMessages);
        
        table.clear();
        filteredMessages.forEach(message => {
            table.row.add([
                message.name,
                message.email,
                message.subject,
                message.message,
                message.created_at
            ]);
        });
        table.draw();
        
        showNotification(`Found ${filteredMessages.length} messages in selected range`, 'success');
    });

    // Initialize
    function init() {
        const endDate = new Date();
        const startDate = new Date();
        startDate.setDate(startDate.getDate() - 30);

        $('#startDate').val(startDate.toISOString().split('T')[0]);
        $('#endDate').val(endDate.toISOString().split('T')[0]);

        updateChartsAndStats(messages);
    }

    // Start the application
    init();
});
</script>
@endsection
@endsection