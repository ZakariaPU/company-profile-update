// Importing necessary libraries
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
                <div class="bg-red-800 p-4 text-white">
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
                        <a href="${createWhatsAppLink(order)}" target="_blank" class="px-4 py-2 text-sm bg-green-600 hover:bg-green-700 rounded-md text-white flex items-center">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Kirim Detail Pesanan
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

    // Fungsi untuk membuat link WhatsApp dengan detail pesanan
    function createWhatsAppLink(order) {
    // Format tanggal untuk pesan
    const formattedDate = order.order_date ? new Date(order.order_date).toLocaleDateString('id-ID') : '-';
    const formattedStartDate = order.start_date ? new Date(order.start_date).toLocaleDateString('id-ID') : '-';
    const formattedEndDate = order.end_date ? new Date(order.end_date).toLocaleDateString('id-ID') : '-';
    
    // Susun pesan yang akan dikirimkan
    const message = `
    *DETAIL PESANAN #${order.id}*
    ---------------------------
    *Informasi Pelanggan:*
    Nama: ${order.name}
    Email: ${order.email}
    Telepon: ${order.phone}
    Instagram: @${order.instagram}
    Alamat: ${order.address}

    *Detail Menu:*
    Jenis Menu: ${order.menu_type}
    Jenis Hidangan: ${order.meal_types}
    Alergi: ${order.allergies || '-'}
    Catatan: ${order.notes || '-'}

    *Informasi Jadwal:*
    Tanggal Pesanan: ${formattedDate}
    Tanggal Mulai: ${formattedStartDate}
    Tanggal Selesai: ${formattedEndDate}

    *Status:* ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
    `;

    // Dapatkan nomor telepon tanpa karakter non-numerik
    const phoneNumber = order.phone.replace(/\D/g, '');
    
    // Buat link WhatsApp dengan pesan yang terenkode
    return `https://wa.me/+62${phoneNumber}?text=${encodeURIComponent(message)}`;
    }
