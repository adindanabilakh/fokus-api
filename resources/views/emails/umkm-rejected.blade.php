<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Penolakan UMKM</title>
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

        .rejected {
            background-color: #fef3c7;
            border: 1px solid #f59e0b;
            color: #92400e;
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

        .footer {
            font-size: 13px;
            color: #6b7280;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="rejected">⚠️ UMKM Anda ditolak</div>

        <div class="section">
            <div class="heading">Hai, {{ strtoupper($umkm->name) }}</div>
            <p>Mohon maaf, pendaftaran UMKM Anda <strong>belum dapat disetujui</strong> oleh tim kami.</p>
            <p>Silakan periksa kembali data yang telah Anda kirimkan atau hubungi admin untuk info lebih lanjut.</p>
        </div>

        <div class="section">
            <div class="heading">Detail Akun</div>
            <table>
                <tr>
                    <th>Nama UMKM</th>
                    <td>{{ $umkm->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $umkm->email }}</td>
                </tr>
                <tr>
                    <th>Status Akun</th>
                    <td style="font-weight: 600; color: #b45309;">{{ $umkm->status }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} UMKM Platform. All rights reserved.
        </div>
    </div>
</body>

</html>
