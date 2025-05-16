<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan Catering</title>
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
            text-align: center;
        }
        .thank-you-message {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .order-details {
            background-color: #f9f9f9;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: left;
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #FF6B35;
            margin-top: 0;
            margin-bottom: 15px;
            text-align: center;
        }
        .detail-item {
            display: flex;
            margin-bottom: 10px;
            border-bottom: 1px dashed #eee;
            padding-bottom: 10px;
        }
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .detail-label {
            font-weight: 600;
            width: 130px;
            flex-shrink: 0;
        }
        .detail-value {
            flex-grow: 1;
        }
        .button {
            display: inline-block;
            background-color: #FF6B35;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            margin-top: 10px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #e55a2a;
        }
        .logo {
            margin-bottom: 15px;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .social-links {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .social-link {
            display: inline-block;
            margin: 0 8px;
        }
        .social-icon {
            width: 32px;
            height: 32px;
            background-color: #666;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .contact-info {
            margin-top: 15px;
            font-size: 13px;
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
            .detail-item {
                flex-direction: column;
            }
            .detail-label {
                width: 100%;
                margin-bottom: 5px;
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
            <h1>Konfirmasi Pesanan Catering</h1>
        </div>

        <div class="content">
            <div class="thank-you-message">
                Terima kasih telah memesan catering kami, <strong>{{ $orderData['name'] }}</strong>!
            </div>

            <div class="order-details">
                <h2 class="section-title">Detail Pesanan Anda</h2>
                
                <div class="detail-item">
                    <div class="detail-label">Periode</div>
                    <div class="detail-value">{{ date('d/m/Y', strtotime($orderData['start_date'])) }} - {{ date('d/m/Y', strtotime($orderData['end_date'])) }}</div>
                </div>
                
                <div class="detail-item">
                    <div class="detail-label">Jenis Menu</div>
                    <div class="detail-value">{{ $orderData['menu_type'] }}</div>
                </div>
                
                <div class="detail-item">
                    <div class="detail-label">Jenis Makanan</div>
                    <div class="detail-value">{{ implode(', ', $orderData['meal_types']) }}</div>
                </div>
            </div>

            <p>Pesanan Anda sedang diproses dan tim kami akan segera menghubungi Anda jika ada informasi tambahan yang diperlukan.</p>

            <p style="font-size: 13px; margin-top: 30px;">Jika Anda memiliki pertanyaan, silakan hubungi tim layanan pelanggan kami.</p>
        </div>

        <div class="footer">
            <div class="social-links">
                <a href="#" class="social-link"><div class="social-icon">f</div></a>
                <a href="#" class="social-link"><div class="social-icon">in</div></a>
                <a href="#" class="social-link"><div class="social-icon">ig</div></a>
            </div>
            
            <p>Terima kasih,<br>{{ config('app.name') }}</p>
            
            <div class="contact-info">
                <p>Telepon: +62 811 2658 048 | Email: info@resapkitchen.com{{ strtolower(config('app.name')) }}.com</p>
                <p>Alamat: Jl. Amerta VII No.10, Jombor Lor, Sinduadi, Kec. Mlati, Kab. Sleman, DI Yogyakarta 55284</p>
            </div>
            
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>