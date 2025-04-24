@component('mail::message')
# Pesanan Katering Baru

Pesanan baru telah diterima dengan detail sebagai berikut:

**Informasi Pelanggan:**
- Nama: {{ $orderData['name'] }}
- Email: {{ $orderData['email'] }}
- Telepon: {{ $orderData['phone'] }}
@if($orderData['instagram'])
- Instagram: {{ $orderData['instagram'] }}
@endif

**Detail Pesanan:**
- Menu: {{ $orderData['menu_type'] }}
- Periode: {{ date('d/m/Y', strtotime($orderData['start_date'])) }} - {{ date('d/m/Y', strtotime($orderData['end_date'])) }}
- Waktu Makan: {{ implode(', ', $orderData['meal_types']) }}

**Alamat Pengiriman:**  
{{ $orderData['address'] }}

**Informasi Alergi:**  
{{ $orderData['allergies'] }}

@if($orderData['notes'])
**Catatan Tambahan:**  
{{ $orderData['notes'] }}
@endif


Segera tindaklanjuti pesanan ini.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
