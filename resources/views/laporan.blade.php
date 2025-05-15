@extends('layouts.app_admin')

@section('title', 'Laporan')

@section('content')
    <div class="flex-1 overflow-auto bg-gray-50">


            <!-- Search & Filter Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mt-6 mb-6 md:mb-8 ml-4 mr-4 md:ml-8 md:mr-8">
                <form action="" method="GET" class="flex flex-col md:flex-row md:items-end gap-4">
                    <div class="w-full md:w-1/5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                placeholder="Cari nama, email, ID..."
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">
                        </div>
                    </div>
                    <div class="w-full md:w-1/5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                        <input type="date" name="start_date" value="{{ request('start_date') }}" 
                            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div class="w-full md:w-1/5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                        <input type="date" name="end_date" value="{{ request('end_date') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div class="w-full md:w-1/5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="w-full md:w-auto md:ml-4">
                        <button type="submit" class="w-full md:w-auto bg-red-900 text-white px-6 py-2 rounded-lg hover:bg-red-800 transition-colors duration-200">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Orders Tabel -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-4 mt-6 mb-6 md:mb-8 ml-4 mr-4 md:ml-8 md:mr-8">
                <div class="p-4">
                    <!-- Print Button -->
                    <a href="{{ request()->fullUrlWithQuery(['print' => 'true']) }}" 
                        class="inline-flex items-center px-4 py-2 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors duration-200">
                        <i class="fas fa-print mr-2"></i> Print PDF
                    </a>
                    
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($orders as $order)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                                    <span class="text-red-900 font-medium text-sm">
                                                        {{ strtoupper(substr($order->name, 0, 2)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $order->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $order->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->menu_type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $order->status_class }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex space-x-3">
                                            <button onclick="showDetail({{ $order->id }})" 
                                                    class="text-gray-500 hover:text-gray-700">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="openUpdateModal({{ $order->id }})" 
                                                    class="text-blue-500 hover:text-blue-700">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button onclick="deleteOrder({{ $order->id }})" 
                                                    class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- No Data Row -->
                                @if($orders->isEmpty())
                                <tr>
                                    <<td colspan="6" class="text-center align-middle py-8 text-gray-500">
                                        Tidak ada data pesanan ditemukan.
                                    </td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Update Status Modal -->
    <div id="updateModal" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white">
            <div class="absolute top-3 right-3">
                <button type="button" onclick="closeUpdateModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mt-3">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Update Status Pesanan</h3>
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeUpdateModal()" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 text-sm font-medium text-white bg-red-900 rounded-lg hover:bg-red-800">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border max-w-4xl w-full md:w-3/4 lg:w-2/3 shadow-lg rounded-xl bg-white">
            <div class="absolute top-3 right-3">
                <button type="button" onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mt-3">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Detail Pesanan</h3>
                <div id="orderDetails" class="bg-gray-50 rounded-lg p-4"></div>
            </div>
        </div>
    </div> 

    <!-- Toast Notification -->
    <div id="toast" class="hidden fixed bottom-5 right-5 z-50">
        <div id="toastContent" class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0 mr-3">
                        <!-- Success Icon (shown conditionally via JS) -->
                        <div id="successIcon" class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <!-- Error Icon (shown conditionally via JS) -->
                        <div id="errorIcon" class="hidden h-8 w-8 rounded-full bg-red-100 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p id="toastMessage" class="text-sm font-medium text-gray-900"></p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button type="button" onclick="closeToast()" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none">
                            <span class="sr-only">Close</span>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>

    // Toggle mobile menu
    window.toggleMobileMenu = function() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    };

// Toast Notification Functions
// Toast Notification Functions - Fixed Version
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    const toastContent = document.getElementById('toastContent');
    const toastMessage = document.getElementById('toastMessage');
    
    // Set the appropriate styling based on notification type
    toastContent.className = `max-w-sm w-full shadow-lg rounded-lg pointer-events-auto overflow-hidden ${
        type === 'success' ? 'bg-green-50 ring-1 ring-green-500' : 'bg-red-50 ring-1 ring-red-500'
    }`;
    
    // Set the message text and color
    toastMessage.textContent = message;
    toastMessage.className = `text-sm font-medium ${
        type === 'success' ? 'text-green-800' : 'text-red-800'
    }`;
    
    // Show the toast
    toast.classList.remove('hidden');
    
    // Auto-hide after 8 seconds
    setTimeout(() => {
        closeToast();
    }, 8000);
}

function closeToast() {
    const toast = document.getElementById('toast');
    toast.classList.add('hidden');
}

// Make sure the toast container has the correct positioning
document.addEventListener('DOMContentLoaded', function() {
    // Fix toast container positioning
    const toastContainer = document.getElementById('toast');
    if (toastContainer) {
        toastContainer.className = 'hidden fixed bottom-5 right-5 z-50';
    }
});

// Enhanced Toast Notification Function with Icon Support
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    const toastContent = document.getElementById('toastContent');
    const toastMessage = document.getElementById('toastMessage');
    const successIcon = document.getElementById('successIcon');
    const errorIcon = document.getElementById('errorIcon');
    
    // Set the appropriate styling based on notification type
    if (type === 'success') {
        toastContent.className = 'max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-green-500 overflow-hidden';
        toastMessage.className = 'text-sm font-medium text-gray-900';
        successIcon.classList.remove('hidden');
        errorIcon.classList.add('hidden');
    } else {
        toastContent.className = 'max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-red-500 overflow-hidden';
        toastMessage.className = 'text-sm font-medium text-gray-900';
        successIcon.classList.add('hidden');
        errorIcon.classList.remove('hidden');
    }
    
    // Set the message text
    toastMessage.textContent = message;
    
    // Show the toast with proper positioning
    toast.className = 'fixed bottom-5 right-5 z-50';
    
    // Auto-hide after 8 seconds
    setTimeout(() => {
        closeToast();
    }, 8000);
}

function closeToast() {
    const toast = document.getElementById('toast');
    toast.classList.add('hidden');
}

// Initialize toast positioning on page load
document.addEventListener('DOMContentLoaded', function() {
    const statusNotification = document.querySelector('.status-notification');
    if (statusNotification) {
        // Extract message from any existing notification
        const message = statusNotification.textContent.trim();
        if (message) {
            showToast(message, statusNotification.classList.contains('success') ? 'success' : 'error');
        }
    }
});

// Update Status Modal Functions
function openUpdateModal(orderId) {
const modal = document.getElementById('updateModal');
const form = document.getElementById('updateForm');
form.action = `/orders/${orderId}/update-status`;
modal.classList.remove('hidden');

// Add event listener for form submission
form.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    try {
        const response = await fetch(this.action, {
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
            showToast(data.message);
            closeUpdateModal();
            window.location.reload();
        } else {
            showToast(data.message, 'error');
        }
    } catch (error) {
        showToast('Terjadi kesalahan saat memperbarui status', 'error');
    }
});
}

function closeUpdateModal() {
const modal = document.getElementById('updateModal');
modal.classList.add('hidden');
}

// Detail Modal Functions
async function showDetail(orderId) {
    try {
        const response = await fetch(`/orders/${orderId}`);
        if (!response.ok) throw new Error('Failed to fetch order details');
        
        const order = await response.json();
        const formattedDate = new Date(order.created_at).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

        const formattedStartDate = new Date(order.start_date).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

        const formattedEndDate = new Date(order.end_date).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

        // Get status class for the badge
        const statusClasses = {
            'pending': 'bg-yellow-100 text-yellow-800',
            'processing': 'bg-blue-100 text-blue-800',
            'completed': 'bg-green-100 text-green-800',
            'cancelled': 'bg-red-100 text-red-800'
        };
        
        const detailsHtml = `
            <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-full">
                <!-- Header with customer avatar - now more horizontal -->
                <div class="bg-red-600 p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="h-16 w-16 rounded-full bg-white flex items-center justify-center border-2 border-white shadow-md">
                                <span class="text-red-600 font-bold text-xl">
                                    ${order.name.substring(0, 2).toUpperCase()}
                                </span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold">${order.name}</h3>
                                <p class="text-sm opacity-90">#${order.id}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium ${statusClasses[order.status] || 'bg-white bg-opacity-20 text-white'}">
                            ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
                        </span>
                    </div>
                </div>
                
                <!-- Order details section - now in 3 columns -->
                <div class="p-4">
                    <!-- Main information in 3 columns -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <!-- First column - Customer Info -->
                        <div class="border rounded-lg p-4 h-full">
                            <h4 class="text-base font-medium text-gray-900 mb-3 pb-2 border-b">Informasi Pelanggan</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs text-gray-500">Email</label>
                                    <p class="text-gray-800 font-medium">${order.email}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Telepon</label>
                                    <p class="text-gray-800 font-medium">${order.phone}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Instagram</label>
                                    <p class="text-gray-800 font-medium">@${order.instagram}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Alamat</label>
                                    <p class="text-gray-800 font-medium text-sm">${order.address}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Second column - Order Info -->
                        <div class="border rounded-lg p-4 h-full">
                            <h4 class="text-base font-medium text-gray-900 mb-3 pb-2 border-b">Detail Menu</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs text-gray-500">Jenis Menu</label>
                                    <p class="text-gray-800 font-medium">${order.menu_type}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Jenis Hidangan</label>
                                    <p class="text-gray-800 font-medium">${order.meal_types}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Alergi</label>
                                    <p class="text-gray-800 font-medium">${order.allergies || '-'}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Catatan</label>
                                    <p class="text-gray-800 font-medium">${order.notes || '-'}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Third column - Schedule Info -->
                        <div class="border rounded-lg p-4 h-full">
                            <h4 class="text-base font-medium text-gray-900 mb-3 pb-2 border-b">Informasi Jadwal</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs text-gray-500">Tanggal Pesanan</label>
                                    <p class="text-gray-800 font-medium">${formattedDate}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Tanggal Mulai</label>
                                    <p class="text-gray-800 font-medium">${formattedStartDate}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Tanggal Selesai</label>
                                    <p class="text-gray-800 font-medium">${formattedEndDate}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action buttons -->
                    <div class="flex justify-end space-x-3 mt-2">
                        <a href="https://wa.me/${order.phone.replace(/\D/g, '')}" target="_blank" class="px-4 py-2 text-sm bg-red-600 hover:bg-red-700 rounded-md text-white flex items-center">
                            <i class="fab fa-whatsapp mr-2"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('orderDetails').innerHTML = detailsHtml;
        document.getElementById('detailModal').classList.remove('hidden');
    } catch (error) {
        showToast('Gagal memuat detail pesanan', 'error');
        console.error('Error fetching order details:', error);
    }
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

// Delete Order Function
async function deleteOrder(orderId) {
    try {
        const result = await Swal.fire({
            title: 'Hapus Pesanan?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7f1d1d',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        });

        if (result.isConfirmed) {
            const response = await fetch(`/orders/${orderId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                await Swal.fire({
                    title: 'Terhapus!',
                    text: 'Pesanan berhasil dihapus.',
                    icon: 'success',
                    timer: 1500
                });
                window.location.reload();
            } else {
                showToast(data.message || 'Gagal menghapus pesanan', 'error');
            }
        }
    } catch (error) {
        showToast('Terjadi kesalahan saat menghapus pesanan', 'error');
        console.error('Error deleting order:', error);
    }
}

// Close modals when clicking outside
document.addEventListener('click', function(event) {
const updateModal = document.getElementById('updateModal');
const detailModal = document.getElementById('detailModal');

if (event.target === updateModal) {
    closeUpdateModal();
}

if (event.target === detailModal) {
    closeDetailModal();
}
});

// Initialize responsive features
document.addEventListener('DOMContentLoaded', function() {
// Responsive handling
function handleResize() {
    const width = window.innerWidth;
    if (width < 768) {
        document.querySelectorAll('table').forEach(table => {
            table.classList.add('text-sm');
        });
    } else {
        document.querySelectorAll('table').forEach(table => {
            table.classList.remove('text-sm');
        });
    }
}

// Initial call and event listener for resize
handleResize();
window.addEventListener('resize', handleResize);
});

    // Add smooth scrolling for mobile menu links
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            if (window.innerWidth < 768) {
                toggleMobileMenu();
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush