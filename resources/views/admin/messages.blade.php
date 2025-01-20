@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section with Quick Stats -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800">
            <div class="container mx-auto px-4 py-8">
                <h1 class="text-3xl font-bold text-white mb-6">Messages Dashboard</h1>
                
                <!-- Quick Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <!-- Total Messages -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-lg p-4 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm opacity-80">Total Messages</p>
                                <p class="text-2xl font-bold" id="totalMessages">0</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Unique Senders -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-lg p-4 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm opacity-80">Unique Senders</p>
                                <p class="text-2xl font-bold" id="uniqueSenders">0</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Messages This Month -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-lg p-4 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm opacity-80">Messages This Month</p>
                                <p class="text-2xl font-bold" id="messagesThisMonth">0</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Average Messages Per Day -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-lg p-4 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm opacity-80">Avg Messages/Day</p>
                                <p class="text-2xl font-bold" id="avgMessagesPerDay">0</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8">
            <!-- Date Filter -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="startDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="endDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <button id="filterButton" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                            Apply Filter
                        </button>
                    </div>
                    <div>
                        <button id="clearFilter" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">
                            Clear Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Charts and Recent Messages Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Monthly Senders Chart - Takes up 2 columns -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Monthly Message Senders</h2>
                    <div class="h-[400px]">
                        <canvas id="monthlySendersChart"></canvas>
                    </div>
                </div>

                <!-- Recent Senders Card -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Message Senders</h2>
                    <div class="space-y-4" id="recentSendersList">
                        <!-- Recent senders will be populated here -->
                    </div>
                </div>
            </div>

            <!-- Messages by Sender Distribution -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Message Distribution by Sender</h2>
                <div class="h-[300px]">
                    <canvas id="sendersChart"></canvas>
                </div>
            </div>

            <!-- Messages Table -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Message Details</h2>
                <div class="overflow-x-auto">
                    <table id="messagesTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Received At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($messages as $message)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $message->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->subject }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $message->message }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $message->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                <div class="flex items-start p-3 bg-white hover:bg-gray-50 transition-colors duration-150 rounded-lg border border-gray-100 shadow-sm mb-2">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center">
                            <span class="text-white font-semibold">${message.name.charAt(0).toUpperCase()}</span>
                        </div>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-gray-900">${message.name}</p>
                        <p class="text-sm text-gray-500 truncate">${message.subject || 'No Subject'}</p>
                        <p class="text-xs text-gray-400 mt-1 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: 'rgb(59, 130, 246)',
                    pointRadius: 4,
                    pointHoverRadius: 6
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
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Total Messages'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Month'
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
                    backgroundColor: 'rgba(59, 130, 246, 0.5)',
                    borderColor: 'rgb(59, 130, 246)',
                    borderWidth: 1,
                    borderRadius: 4
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
                            precision: 0
                        },
                        title: {
                            display: true,
                            text: 'Number of Messages'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
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

    // Show notification function
    function showNotification(message, type = 'info') {
        const bgColor = type === 'error' ? 'bg-red-400' : 
                       type === 'success' ? 'bg-green-400' : 
                       type === 'success-filter' ? 'bg-yellow-400' : 
                       'bg-blue-500';

        const notification = $(`
            <div class="fixed top-4 right-4 flex items-center p-4 ${bgColor} text-white rounded-lg shadow-lg transform transition-all duration-300 opacity-0 z-50">
                <span class="mr-2">
                    ${type === 'error' ? '❌' : type === 'success' ? '✅' : 'ℹ️'}
                </span>
                ${message}
                <button class="ml-3 hover:text-gray-200" onclick="this.parentElement.remove()"></button>
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