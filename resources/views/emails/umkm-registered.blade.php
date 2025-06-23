<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Registrasi UMKM - Konfirmasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
            padding: 40px;
        }

        .card {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            padding: 32px;
            border: 1px solid #e5e7eb;
        }

        .success {
            background-color: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 24px;
            font-weight: 600;
        }

        .heading {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .section {
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        th,
        td {
            padding: 8px 0;
            text-align: left;
        }

        th {
            font-weight: 600;
            color: #6b7280;
            width: 40%;
        }

        .border-top {
            border-top: 1px solid #e5e7eb;
            margin-top: 16px;
            padding-top: 16px;
        }

        .footer {
            font-size: 13px;
            color: #6b7280;
            text-align: center;
            margin-top: 40px;
        }

        .text-right {
            text-align: right;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="success">✅ Registrasi UMKM berhasil!</div>

        <div class="section">
            <div class="heading">Hai, {{ strtoupper($umkm->name) }}</div>
            <p>Terima kasih telah melakukan registrasi UMKM. Berikut adalah detail akunmu:</p>
        </div>

        <div class="section">
            <div class="heading">Detail Registrasi</div>
            <table>
                <tr>
                    <th>Nama UMKM</th>
                    <td>{{ $umkm->name }}</td>
                </tr>
                <tr>
                    <th>Jenis Usaha</th>
                    <td>{{ $umkm->type }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $umkm->address }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $umkm->email }}</td>
                </tr>
                <tr>
                    <th>Status Akun</th>
                    <td style="font-weight: 600; color: #d97706;">{{ $umkm->status }}</td>
                </tr>
            </table>
        </div>

        <div class="section border-top">
            <div class="heading">Informasi Tambahan</div>
            <table>
                <tr>
                    <th>Tanggal Registrasi</th>
                    <td>{{ \Carbon\Carbon::parse($umkm->created_at)->translatedFormat('d F Y') }}</td>
                </tr>
               <tr>
    <th>Waktu</th>
    <td>{{ \Carbon\Carbon::parse($umkm->created_at)->timezone('Asia/Jakarta')->format('H:i') }} WIB</td>
</tr>
                    <!-- <th>Reference ID</th>
                    <td>{{ $umkm->id }}</td>
                </tr> -->
            </table>
        </div>

        <div class="footer">
            Jika kamu merasa tidak melakukan registrasi ini, silakan hubungi tim support kami.<br>
            &copy; {{ date('Y') }} UMKM Platform. All rights reserved.
        </div>
    </div>
</body>

</html>
