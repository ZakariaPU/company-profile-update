@extends('layouts.app_admin')

@section('title', 'Laporan Pesanan')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 overflow-auto bg-gray-50">
        <!-- Top Header -->
        <div class="bg-white shadow-sm">
            <div class="px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Laporan Pesanan</h1>
                        <p class="mt-1 text-sm text-gray-500">Kelola dan pantau semua pesanan catering</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Print Button -->
                        <a href="{{ request()->fullUrlWithQuery(['print' => 'true']) }}" 
                           class="inline-flex items-center px-4 py-2 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors duration-200 shadow-sm">
                            <i class="fas fa-print mr-2"></i> Print PDF
                        </a>
                        <div class="flex items-center space-x-3 bg-red-50 px-4 py-2 rounded-lg">
                            <span class="text-red-900 font-medium">Admin</span>
                            <img class="h-8 w-8 rounded-full ring-2 ring-red-900" src="/api/placeholder/32/32" alt="Profile">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <main class="p-4 md:p-6 max-w-7xl mx-auto">
            <!-- Filters -->
            <div class="mb-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-4 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900">Filter Data</h2>
                </div>
                <form action="" method="GET" class="p-4">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cari</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Cari nama, email, ID..."
                                       class="pl-10 w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}" 
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                                <option value="">Semua Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-red-900 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors duration-200 shadow-sm">
                                <i class="fas fa-filter mr-2"></i> Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-4 md:p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 md:px-6 py-4 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">ID</th>
                                    <th class="px-4 md:px-6 py-4 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                    <th class="px-4 md:px-6 py-4 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu</th>
                                    <th class="px-4 md:px-6 py-4 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-4 md:px-6 py-4 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 md:px-6 py-4 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($orders as $order)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $order->id }}</td>
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/32/32" alt="">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $order->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $order->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $order->menu_type }}</div>
                                        <div class="text-xs text-gray-500">{{ $order->quantity }} porsi</div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $order->created_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $order->status_class }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm space-x-3">
                                        <button onclick="showDetail({{ $order->id }})" 
                                                class="text-red-900 hover:text-red-700 transition-colors duration-200">
                                            <i class="fas fa-eye text-lg"></i>
                                        </button>
                                        <button onclick="openUpdateModal({{ $order->id }})" 
                                                class="text-red-900 hover:text-red-700 transition-colors duration-200">
                                            <i class="fas fa-edit text-lg"></i>
                                        </button>
                                        <button onclick="deleteOrder({{ $order->id }})" 
                                                class="text-red-900 hover:text-red-700 transition-colors duration-200">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Update Status Modal -->
    <div id="updateModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white transform transition-all">
            <div class="absolute top-3 right-3">
                <button onclick="closeUpdateModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <div class="mt-3">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status Pesanan</h3>
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeUpdateModal()" 
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors duration-200">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-[480px] shadow-lg rounded-xl bg-white transform transition-all">
            <div class="absolute top-3 right-3">
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <div class="mt-3">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Detail Pesanan</h3>
                <div id="orderDetails" class="space-y-6">
                    <!-- Content will be dynamically inserted here -->
                </div>
                <div class="mt-8 flex justify-end">
                    <button onclick="closeDetailModal()" 
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div id="notification" class="hidden fixed top-4 right-4 z-50">
        <div class="bg-white rounded-lg shadow-lg border border-gray-100 p-4 min-w-[320px] transform transition-all">
            <div class="flex items-start space-x-4">
                <div id="notifIcon" class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full">
                    <!-- Icon will be inserted here -->
                </div>
                <div class="flex-1">
                    <h4 id="notifTitle" class="text-sm font-medium text-gray-900">
                        <!-- Title will be inserted here -->
                    </h4>
                    <p id="notifMessage" class="mt-1 text-sm text-gray-500">
                        <!-- Message will be inserted here -->
                    </p>
                </div>
                <button onclick="closeNotification()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Notification Functions
function showNotification(title, message, type = 'success') {
    const notification = document.getElementById('notification');
    const notifTitle = document.getElementById('notifTitle');
    const notifMessage = document.getElementById('notifMessage');
    const notifIcon = document.getElementById('notifIcon');
    
    // Set icon and colors based on type
    if (type === 'success') {
        notifIcon.innerHTML = '<i class="fas fa-check text-green-500"></i>';
        notifIcon.className = 'flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-green-100';
    } else {
        notifIcon.innerHTML = '<i class="fas fa-exclamation-circle text-red-500"></i>';
        notifIcon.className = 'flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-red-100';
    }
    
    notifTitle.textContent = title;
    notifMessage.textContent = message;
    
    // Show notification with animation
    notification.classList.remove('hidden');
    notification.classList.add('animate-slide-in');
    
    // Auto close after 5 seconds
    setTimeout(() => {
        closeNotification();
    }, 5000);
}

function closeNotification() {
    const notification = document.getElementById('notification');
    notification.classList.add('animate-fade-out');
    setTimeout(() => {
        notification.classList.add('hidden');
        notification.classList.remove('animate-fade-out', 'animate-slide-in');
    }, 300);
}

// Detail Modal Functions
async function showDetail(orderId) {
    try {
        const response = await fetch(`/orders/${orderId}`);
        const order = await response.json();
        
        const detailsHtml = `
            <div class="space-y-6">
                <!-- Order Info Section -->
                <div class="bg-red-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-red-900 font-medium">ID Pesanan:</p>
                            <p class="text-lg font-semibold text-red-900">#${order.id}</p>
                        </div>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full ${order.status_class}">
                            ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
                        </span>
                    </div>
                </div>

                <!-- Customer Info Section -->
                <div class="border-b border-gray-100 pb-6">
                    <h4 class="text-sm font-medium text-gray-500 mb-4">Informasi Pelanggan</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Nama</p>
                            <p class="text-sm font-medium text-gray-900">${order.name}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="text-sm font-medium text-gray-900">${order.email}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Telepon</p>
                            <p class="text-sm font-medium text-gray-900">${order.phone || '-'}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Alamat</p>
                            <p class="text-sm font-medium text-gray-900">${order.address || '-'}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Details Section -->
                <div>
                    <h4 class="text-sm font-medium text-gray-500 mb-4">Detail Pesanan</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Menu</p>
                            <p class="text-sm font-medium text-gray-900">${order.menu_type}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jumlah</p>
                            <p class="text-sm font-medium text-gray-900">${order.quantity || 1} porsi</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Pesan</p>
                            <p class="text-sm font-medium text-gray-900">${new Date(order.created_at).toLocaleDateString('id-ID', {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            })}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Waktu Pesan</p>
                            <p class="text-sm font-medium text-gray-900">${new Date(order.created_at).toLocaleTimeString('id-ID')}</p>
                        </div>
                    </div>
                </div>

                ${order.notes ? `
                <!-- Notes Section -->
                <div class="border-t border-gray-100 pt-6">
                    <h4 class="text-sm font-medium text-gray-500 mb-2">Catatan</h4>
                    <p class="text-sm text-gray-900">${order.notes}</p>
                </div>
                ` : ''}
            </div>
        `;
        
        document.getElementById('orderDetails').innerHTML = detailsHtml;
        document.getElementById('detailModal').classList.remove('hidden');
    } catch (error) {
        showNotification('Error', 'Gagal memuat detail pesanan', 'error');
    }
}

// Update Status Functions
async function openUpdateModal(orderId) {
    const modal = document.getElementById('updateModal');
    const form = document.getElementById('updateForm');
    
    try {
        const response = await fetch(`/orders/${orderId}`);
        const order = await response.json();
        
        // Set current status in select
        document.getElementById('status').value = order.status;
        
        form.action = `/orders/${orderId}/update-status`;
        modal.classList.remove('hidden');
        
        // Add form submit handler
        form.onsubmit = async (e) => {
            e.preventDefault();
            
            try {
                const response = await fetch(form.action, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        status: document.getElementById('status').value
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showNotification('Berhasil', 'Status pesanan berhasil diperbarui');
                    closeUpdateModal();
                    window.location.reload();
                } else {
                    showNotification('Error', data.message || 'Gagal memperbarui status', 'error');
                }
            } catch (error) {
                showNotification('Error', 'Terjadi kesalahan saat memperbarui status', 'error');
            }
        };
    } catch (error) {
        showNotification('Error', 'Gagal memuat data pesanan', 'error');
    }
}

// Delete Function with Enhanced Confirmation
function deleteOrder(orderId) {
    // Create and show confirmation modal
    const confirmationHtml = `
        <div id="deleteConfirmation" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-white rounded-xl p-6 max-w-md mx-4 shadow-xl">
                <div class="text-center">
                    <div class="w-12 h-12 rounded-full bg-red-100 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Konfirmasi Hapus</h3>
                    <p class="text-gray-500 mb-6">Apakah Anda yakin ingin menghapus pesanan ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <div class="flex justify-center space-x-3">
                        <button onclick="document.getElementById('deleteConfirmation').remove()" 
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            Batal
                        </button>
                        <button onclick="confirmDelete(${orderId})" 
                                class="px-4 py-2 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors duration-200">
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', confirmationHtml);
}

async function confirmDelete(orderId) {
    try {
        const response = await fetch(`/orders/${orderId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });
        
        const data = await response.json();
        
        document.getElementById('deleteConfirmation').remove();
        
        if (data.success) {
            showNotification('Berhasil', 'Pesanan berhasil dihapus');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showNotification('Error', data.message || 'Gagal menghapus pesanan', 'error');
        }
    } catch (error) {
        document.getElementById('deleteConfirmation').remove();
        showNotification('Error', 'Terjadi kesalahan saat menghapus pesanan', 'error');
    }
}

// Add custom styles for animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    
    .animate-slide-in {
        animation: slideIn 0.3s ease-out;
    }
    
    .animate-fade-out {
        animation: fadeOut 0.3s ease-out;
    }
`;
document.head.appendChild(style);
</script>
@endpush