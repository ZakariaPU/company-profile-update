@component('mail::message')
# Konfirmasi Pesanan Catering

Terima kasih telah memesan catering kami, {{ $orderData['name'] }}!

Detail pesanan Anda:
- Periode: {{ date('d/m/Y', strtotime($orderData['start_date'])) }} - {{ date('d/m/Y', strtotime($orderData['end_date'])) }}
- Jenis Menu: {{ $orderData['menu_type'] }}
- Jenis Makanan: {{ implode(', ', $orderData['meal_types']) }}

@component('mail::button', ['url' => config('app.url')])
Lihat Detail Pesanan
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
