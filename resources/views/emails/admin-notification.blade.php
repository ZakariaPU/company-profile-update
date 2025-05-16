<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Katering Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .header {
            background-color: #FF6B35;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px 20px;
        }
        .section {
            margin-bottom: 25px;
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 20px;
        }
        .section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #FF6B35;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .customer-info, .order-details, .delivery-address, .allergy-info, .additional-notes {
            padding-left: 10px;
        }
        .item {
            margin-bottom: 8px;
        }
        .label {
            font-weight: 600;
            display: inline-block;
            min-width: 100px;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .cta-button {
            display: inline-block;
            background-color: #FF6B35;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .logo {
            margin-bottom: 15px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                border-radius: 0;
            }
            .header {
                padding: 20px 15px;
            }
            .content {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <!-- Placeholder untuk logo perusahaan -->
                <img src="{{ asset('assets/img/logo_resap_bulat.png') }}" alt="{{ config('app.name') }}" />
            </div>
            <h1>Pesanan Katering Baru</h1>
        </div>

        <div class="content">
            <p>Pesanan baru telah diterima dengan detail sebagai berikut:</p>

            <div class="section">
                <h2 class="section-title">Informasi Pelanggan</h2>
                <div class="customer-info">
                    <div class="item"><span class="label">Nama:</span> {{ $orderData['name'] }}</div>
                    <div class="item"><span class="label">Email:</span> {{ $orderData['email'] }}</div>
                    <div class="item"><span class="label">Telepon:</span> {{ $orderData['phone'] }}</div>
                    @if($orderData['instagram'])
                    <div class="item"><span class="label">Instagram:</span> {{ $orderData['instagram'] }}</div>
                    @endif
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Detail Pesanan</h2>
                <div class="order-details">
                    <div class="item"><span class="label">Menu:</span> {{ $orderData['menu_type'] }}</div>
                    <div class="item"><span class="label">Periode:</span> {{ date('d/m/Y', strtotime($orderData['start_date'])) }} - {{ date('d/m/Y', strtotime($orderData['end_date'])) }}</div>
                    <div class="item"><span class="label">Waktu Makan:</span> {{ implode(', ', $orderData['meal_types']) }}</div>
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Alamat Pengiriman</h2>
                <div class="delivery-address">
                    {{ $orderData['address'] }}
                </div>
            </div>

            <div class="section">
                <h2 class="section-title">Informasi Alergi</h2>
                <div class="allergy-info">
                    {{ $orderData['allergies'] }}
                </div>
            </div>

            @if($orderData['notes'])
            <div class="section">
                <h2 class="section-title">Catatan Tambahan</h2>
                <div class="additional-notes">
                    {{ $orderData['notes'] }}
                </div>
            </div>
            @endif

        </div>

        <div class="footer">
            <p>Terima kasih,<br>{{ config('app.name') }}</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>