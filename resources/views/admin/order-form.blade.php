
<x-app-layout>
    <div class="min-h-screen bg-red-50 py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl p-6">
                <h2 class="text-2xl font-bold text-red-900 mb-6">Form Pemesanan</h2>
                
                <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
                    @csrf
                    
                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-red-900">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat Pengiriman -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-red-900">Alamat Pengiriman</label>
                        <div class="mt-1">
                            <input type="text" name="address" id="address" required
                                class="block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            <button type="button" onclick="getLocation()" 
                                class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Share Location
                            </button>
                        </div>
                        <div id="map" class="mt-2 h-48 rounded-lg"></div>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-red-900">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No. Handphone -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-red-900">No. Handphone</label>
                        <input type="tel" name="phone" id="phone" required pattern="[0-9]{10,13}"
                            class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Instagram ID -->
                    <div class="mb-4">
                        <label for="instagram" class="block text-sm font-medium text-red-900">Instagram ID (Opsional)</label>
                        <input type="text" name="instagram" id="instagram"
                            class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>

                    <!-- Pilihan Pesanan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-red-900">Pilihan Pesanan</label>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center">
                                <input type="radio" name="meal_type" id="nusantara_hype" value="nusantara_hype" required
                                    class="h-4 w-4 text-red-600 focus:ring-red-500 border-red-300">
                                <label for="nusantara_hype" class="ml-2 text-sm text-gray-700">Nusantara Hype</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="meal_type" id="nusantara_fit" value="nusantara_fit"
                                    class="h-4 w-4 text-red-600 focus:ring-red-500 border-red-300">
                                <label for="nusantara_fit" class="ml-2 text-sm text-gray-700">Nusantara Fit</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="meal_type" id="healthy_lite" value="healthy_lite"
                                    class="h-4 w-4 text-red-600 focus:ring-red-500 border-red-300">
                                <label for="healthy_lite" class="ml-2 text-sm text-gray-700">Healthy Lite</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="meal_type" id="healthy_gourmet" value="healthy_gourmet"
                                    class="h-4 w-4 text-red-600 focus:ring-red-500 border-red-300">
                                <label for="healthy_gourmet" class="ml-2 text-sm text-gray-700">Healthy Gourmet</label>
                            </div>
                        </div>
                        @error('meal_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Periode Pemesanan -->
                    <div class="mb-4">
                        <label for="order_period" class="block text-sm font-medium text-red-900">Periode Pemesanan</label>
                        <div class="flex space-x-4">
                            <input type="date" name="start_date" id="start_date" required
                                class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            <input type="date" name="end_date" id="end_date" required
                                class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-red-900">Keterangan</label>
                        <select name="meal_time" required
                            class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            <option value="">Pilih Waktu Makan</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                            <option value="custom">Custom</option>
                        </select>
                        @error('meal_time')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alergi -->
                    <div class="mb-4">
                        <label for="allergies" class="block text-sm font-medium text-red-900">Alergi</label>
                        <textarea name="allergies" id="allergies" rows="3" required
                            class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
                        @error('allergies')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Catatan -->
                    <div class="mb-6">
                        <label for="notes" class="block text-sm font-medium text-red-900">Catatan (Opsional)</label>
                        <textarea name="notes" id="notes" rows="3"
                            class="mt-1 block w-full rounded-md border-red-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Kirim Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Konfirmasi Modal -->
    <div id="confirmationModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg max-w-sm w-full">
            <h3 class="text-lg font-medium text-red-900 mb-4">Konfirmasi Pesanan</h3>
            <p class="text-sm text-gray-500 mb-4">Apakah Anda yakin ingin mengirim pesanan ini?</p>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="cancelOrder()"
                    class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Batal
                </button>
                <button type="button" onclick="confirmOrder()"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>
</x-app-layout>