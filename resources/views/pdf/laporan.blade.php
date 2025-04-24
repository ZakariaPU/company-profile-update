<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pesanan</title>
    <style>
        /* Reset dan Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11px;
            line-height: 1.5;
            color: #374151;
            padding: 15px;
            background-color: #f9fafb;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* Header Styles - More professional and compact */
        .company-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .company-info {
            flex: 1;
        }

        .company-logo {
            width: 90px; /* Reduced logo size */
            height: auto;
        }

        .company-name {
            font-size: 18px; /* Reduced size */
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 3px;
        }

        .company-address {
            font-size: 9px; /* Smaller text */
            color: #6b7280;
            line-height: 1.4;
        }

        /* Report Header - More subtle and professional */
        .report-header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            padding: 12px 0;
        }

        .report-header:before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px; /* Smaller accent line */
            height: 3px;
            background-color: #991b1b; /* Slightly less intense red */
            border-radius: 1px;
        }

        .report-header h1 {
            font-size: 16px; /* Smaller title */
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .report-header p {
            color: #6b7280;
            font-size: 11px;
            font-weight: 500;
        }

        /* Table Styles - More professional and clean */
        .table-container {
            overflow-x: auto;
            margin-bottom: 20px;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        thead {
            background-color: #f8fafc;
        }

        th {
            background-color: #991b1b; /* Slightly less intense red */
            color: white;
            padding: 10px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        th:last-child {
            border-right: none;
        }

        td {
            padding: 10px 12px;
            font-size: 10px;
            border-bottom: 1px solid #e5e7eb;
            word-wrap: break-word;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #fef2f2; /* Lighter red background */
        }

        tr:hover {
            background-color: #fee2e2; /* Slightly darker on hover */
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Status Badges - More subtle */
        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: 600;
            display: inline-block;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .status-completed {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-pending {
            background-color: #fef9c3;
            color: #854d0e;
        }

        .status-processing {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Summary Section - More professional */
        .summary-section {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            gap: 15px;
        }
        
        .summary-box {
            flex: 1;
            background-color: #fafafa;
            padding: 12px;
            border-radius: 4px;
            border-left: 3px solid #991b1b;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        
        .summary-box h3 {
            font-size: 12px;
            margin-bottom: 8px;
            color: #1f2937;
        }
        
        .summary-box p {
            font-size: 10px;
            margin-bottom: 4px;
            color: #4b5563;
        }

        /* Footer - More professional */
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #6b7280;
            font-size: 9px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
        }

        .page-number {
            position: absolute;
            bottom: 15px;
            right: 15px;
            font-size: 9px;
            color: #9ca3af;
        }

        /* Print Styles */
        @media print {
            body {
                padding: 0;
                background-color: white;
            }

            .container {
                padding: 10px;
                box-shadow: none;
            }

            table {
                font-size: 9px;
            }

            th, td {
                padding: 6px 8px;
            }

            @page {
                size: A4 landscape;
                margin: 0.5cm;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Company Header - Simplified to single line layout -->
        <div class="company-header" style="display: flex; align-items: center; gap: 15px;">
            <img src="assets/img/logo_resap_bulat.png" alt="Logo Resap Kitchen" class="company-logo">
            <div>
                <h2 class="company-name">PT Dayari Mitra Ciptakarya</h2>
                <div class="company-tagline" style="font-size:12px; color:#991b1b; font-weight:600; margin-bottom:6px;">Resap Kitchen</div>
                <p class="company-address">
                    Jl. Amerta VII No.10, Jombor Lor, Sinduadi, Kec. Mlati, Kabupaten Sleman, Yogyakarta 55284 | Telp: +62 811-2654-519 | Email: hi@resap.kitchen
                </p>
            </div>
        </div>

        <!-- Report Header -->
        <div class="report-header">
            <h1>Laporan Pesanan Catering</h1>
            <p>Periode: {{ now()->format('d M Y') }}</p>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 15%;">Pelanggan</th>
                        <th style="width: 15%;">Kontak</th>
                        <th style="width: 12%;">Menu</th>
                        <th style="width: 12%;">Jenis Makanan</th>
                        <th style="width: 10%;">Alergi</th>
                        <th style="width: 15%;">Periode</th>
                        <th style="width: 13%;">Catatan</th>
                        {{-- <th style="width: 8%;">Status</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><strong>{{ $order->name }}</strong></td>
                        <td>
                            {{ $order->email }}<br>
                            {{ $order->phone }}
                        </td>
                        <td>{{ $order->menu_type }}</td>
                        <td>{{ implode(', ', $order->meal_types ?? []) }}</td>
                        <td>{{ $order->allergies }}</td>
                        <td>{{ $order->start_date->format('d M Y') }} - {{ $order->end_date->format('d M Y') }}</td>
                        <td>{{ $order->notes }}</td>
                        {{-- <td>
                            <span class="status status-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Summary Section (Optional) - Redesigned to be more professional -->
        <div class="summary-section">
            <div class="summary-box">
                <h3>Ringkasan Pesanan</h3>
                <p>Total Pesanan: {{ count($orders) }}</p>
                <p>Pesanan Completed: {{ $orders->where('status', 'completed')->count() }}</p>
                <p>Pesanan Pending: {{ $orders->where('status', 'pending')->count() }}</p>
            </div>
            <div class="summary-box">
                <h3>Catatan</h3>
                <p>Laporan ini menampilkan data pesanan catering yang diterima oleh Resap Kitchen. Untuk informasi lebih lanjut, silakan hubungi admin.</p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>Dokumen ini digenerate secara otomatis pada {{ now()->format('d M Y, H:i') }} WIB | &copy; {{ now()->format('Y') }} Resap Kitchen. All Rights Reserved.</p>
        </div>
        
    </div>
</body>
</html>