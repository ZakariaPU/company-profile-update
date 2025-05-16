@extends('layouts.app_admin')

@section('title', 'Pengguna')

@section('content')

    <div class="flex-1 overflow-auto bg-gray-50">
        

        <!-- Main Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Search & Filter Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
                <form action="{{ route('users.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" id="search" name="search" value="{{ request('search') }}" 
                                   placeholder="Cari nama atau email..."
                                   class="pl-10 w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">
                        </div>
                    </div>
                    <div>
                        {{-- <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <select id="role" name="role" class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500">
                            <option value="">Semua Role</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ request('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        </select> --}}
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-red-900 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors duration-200">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Users Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto mt-4 mr-4 ml-4">
                    <button type="button" onclick="openCreateModal()" 
                    class="inline-flex items-center px-4 py-2 bg-red-900 text-white rounded-lg hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Pengguna
                    </button>
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead>
                            <tr class="bg-gray-50">
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terdaftar</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                                <span class="text-red-900 font-medium text-sm">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->created_at->isoFormat('D MMM Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex space-x-3">
                                        <button type="button" onclick="showDetail({{ $user->id }})" 
                                                class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" onclick="openEditModal({{ $user->id }})" 
                                                class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" onclick="deleteUser({{ $user->id }})" 
                                                class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada data pengguna yang ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        </main>
    </div>

<!-- Create/Edit Modal -->
<div id="userModal" class="hidden fixed inset-0 bg-black bg-opacity-20 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-xl rounded-xl bg-white transform transition-all">
        <div class="flex items-center justify-between pb-3 border-b">
            <h3 id="modalTitle" class="text-xl font-semibold text-gray-900"></h3>
            <button type="button" onclick="closeUserModal()" class="text-gray-400 hover:text-gray-500 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="mt-4">
            <form id="userForm" method="POST" class="space-y-5">
                @csrf
                <div id="methodField"></div>
                
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-red-400"></i>
                        </div>
                        <input type="text" name="name" id="name" required placeholder="Masukkan nama lengkap"
                               class="pl-10 w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-200">
                    </div>
                    <div class="error-message mt-1"></div>
                </div>
                
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-red-400"></i>
                        </div>
                        <input type="email" name="email" id="email" required placeholder="contoh@email.com"
                               class="pl-10 w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-200">
                    </div>
                    <div class="error-message mt-1"></div>
                </div>
                
                <div class="form-group">
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role Pengguna</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user-tag text-red-400"></i>
                        </div>
                        <select name="role" id="role" required
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-200 cursor-pointer">
                            <option value="" disabled selected>Pilih role</option>
                            <option value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                    <div class="error-message mt-1"></div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-red-400"></i>
                        </div>
                        <input type="password" name="password" id="password" placeholder="Masukkan password"
                               class="pl-10 pr-10 w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-200">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-1 italic">Kosongkan jika tidak ingin mengubah password</p>
                    <div class="error-message mt-1"></div>
                </div>
                
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeUserModal()" 
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-red-900 rounded-lg hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-20 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-xl rounded-xl bg-white transform transition-all">
        <div class="flex items-center justify-between pb-3 border-b">
            <h3 class="text-xl font-semibold text-gray-900">Detail Pengguna</h3>
            <button type="button" onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-500 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="mt-4">
            <div id="userDetails" class="space-y-4"></div>
            
            <div class="flex justify-end mt-6">
                <button type="button" onclick="closeDetailModal()" 
                        class="px-4 py-2 text-sm font-medium text-white bg-red-900 rounded-lg hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

    <!-- Toast Notification -->
    
    <div id="toast" class="hidden fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 z-50">
        <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
            <div id="toastContent" class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="flex-1 w-0">
                            <p id="toastMessage" class="text-sm font-medium text-gray-900"></p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button type="button" onclick="closeToast()" class="rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // Toggle mobile menu
    window.toggleMobileMenu = function() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    };
    
// Toast Functions
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    const toastContent = document.getElementById('toastContent');
    const toastMessage = document.getElementById('toastMessage');
    
    toastContent.className = `max-w-sm w-full shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden ${
        type === 'success' ? 'bg-green-50' : 'bg-red-50'
    }`;
    
    toastMessage.className = `text-sm font-medium ${
        type === 'success' ? 'text-green-900' : 'text-red-900'
    }`;
    
    toastMessage.textContent = message;
    toast.classList.remove('hidden');
    
    setTimeout(closeToast, 3000);
}

function closeToast() {
    document.getElementById('toast').classList.add('hidden');
}

// Clear Form Errors
function clearFormErrors() {
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    document.querySelectorAll('.border-red-500').forEach(el => el.classList.remove('border-red-500'));
}

// User Modal Functions
function openCreateModal() {
    const modal = document.getElementById('userModal');
    const form = document.getElementById('userForm');
    const title = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');
    
    clearFormErrors();
    title.textContent = 'Tambah Pengguna Baru';
    form.reset();
    form.action = '/users';
    methodField.innerHTML = '';
    
    modal.classList.remove('hidden');
    document.getElementById('name').focus();
}

async function openEditModal(userId) {
    try {
        const modal = document.getElementById('userModal');
        const form = document.getElementById('userForm');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');
        
        clearFormErrors();
        title.textContent = 'Edit Pengguna';
        form.action = `/users/${userId}`;
        methodField.innerHTML = `<input type="hidden" name="_method" value="PUT">`;
        
        const response = await fetch(`/users/${userId}/edit`);
        if (!response.ok) throw new Error('Failed to fetch user data');
        
        const data = await response.json();
        document.getElementById('name').value = data.name;
        document.getElementById('email').value = data.email;
        document.getElementById('role').value = data.role;
        document.getElementById('password').value = '';
        
        modal.classList.remove('hidden');
        document.getElementById('name').focus();
    } catch (error) {
        showToast('Gagal memuat data pengguna', 'error');
        console.error('Error fetching user data:', error);
    }
}

function closeUserModal() {
    document.getElementById('userModal').classList.add('hidden');
    clearFormErrors();
}

// Detail Modal Functions
async function showDetail(userId) {
    try {
        const response = await fetch(`/users/${userId}`);
        if (!response.ok) throw new Error('Failed to fetch user details');
        
        const user = await response.json();
        const formattedDate = new Date(user.created_at).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        
        const roleColor = user.role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800';
        const roleIcon = user.role === 'admin' ? 'fa-user-shield' : 'fa-user';
        
        const detailsHtml = `
            <div class="flex flex-col items-center justify-center mb-6">
                <div class="h-24 w-24 rounded-full bg-red-100 flex items-center justify-center mb-4">
                    <span class="text-red-900 font-bold text-2xl">
                        ${user.name.substring(0, 2).toUpperCase()}
                    </span>
                </div>
                <h4 class="text-lg font-semibold text-gray-900">${user.name}</h4>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${roleColor} mt-2">
                    <i class="fas ${roleIcon} mr-1"></i>
                    ${user.role.charAt(0).toUpperCase() + user.role.slice(1)}
                </span>
            </div>
            
            <div class="bg-gray-50 rounded-lg p-4 space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-md bg-gray-100 flex items-center justify-center">
                        <i class="fas fa-envelope text-gray-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-500">Email</p>
                        <p class="text-sm font-medium text-gray-900 mt-1">${user.email}</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-10 w-10 rounded-md bg-gray-100 flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-gray-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-xs font-medium text-gray-500">Terdaftar Pada</p>
                        <p class="text-sm font-medium text-gray-900 mt-1">${formattedDate}</p>
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('userDetails').innerHTML = detailsHtml;
        document.getElementById('detailModal').classList.remove('hidden');
    } catch (error) {
        showToast('Gagal memuat detail pengguna', 'error');
        console.error('Error fetching user details:', error);
    }
}

// Toggle Password Visibility
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    
    if (togglePassword && passwordField) {
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Change icon based on password visibility
            if (type === 'text') {
                togglePassword.innerHTML = '<i class="fas fa-eye-slash"></i>';
                togglePassword.setAttribute('title', 'Sembunyikan password');
            } else {
                togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
                togglePassword.setAttribute('title', 'Lihat password');
            }
        });
    }
});

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

// Delete User Function
async function deleteUser(userId) {
    try {
        const result = await Swal.fire({
            title: 'Hapus Pengguna?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7f1d1d',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        });

        if (result.isConfirmed) {
            const response = await fetch(`/users/${userId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                await Swal.fire({
                    title: 'Terhapus!',
                    text: 'Pengguna berhasil dihapus.',
                    icon: 'success',
                    timer: 1500
                });
                window.location.reload();
            } else {
                showToast(data.message || 'Gagal menghapus pengguna', 'error');
            }
        }
    } catch (error) {
        showToast('Terjadi kesalahan saat menghapus pengguna', 'error');
        console.error('Error deleting user:', error);
    }
}

// Form Submission Handler
document.getElementById('userForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    try {
        const form = this;
        const formData = new FormData(form);
        const method = form.querySelector('input[name="_method"]')?.value || 'POST';
        
        const response = await fetch(form.action, {
            method: method === 'PUT' ? 'POST' : method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showToast(data.message);
            closeUserModal();
            setTimeout(() => window.location.reload(), 1000);
        } else {
            clearFormErrors();
            if (data.errors) {
                Object.entries(data.errors).forEach(([key, messages]) => {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) {
                        input.classList.add('border-red-500');
                        const errorDiv = input.parentNode.querySelector('.error-message');
                        errorDiv.textContent = messages[0];
                        errorDiv.className = 'error-message text-red-500 text-sm mt-1';
                    }
                });
            }
            showToast(data.message || 'Terjadi kesalahan saat menyimpan data', 'error');
        }
    } catch (error) {
        showToast('Terjadi kesalahan saat menyimpan data', 'error');
        console.error('Error submitting form:', error);
    }
});

// Initialize when document is ready
document.addEventListener('DOMContentLoaded', function() {
    // Clear form errors on input
    const form = document.getElementById('userForm');
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('border-red-500');
            const errorDiv = this.parentNode.querySelector('.error-message');
            if (errorDiv) {
                errorDiv.textContent = '';
            }
        });
    });

    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
        const userModal = document.getElementById('userModal');
        const detailModal = document.getElementById('detailModal');
        
        if (event.target === userModal) {
            closeUserModal();
        }
        if (event.target === detailModal) {
            closeDetailModal();
        }
    });
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