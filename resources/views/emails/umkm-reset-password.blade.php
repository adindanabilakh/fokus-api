<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reset Password UMKM</title>
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

        .notice {
            background-color: #e0f2fe;
            border: 1px solid #0284c7;
            color: #0369a1;
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

        .btn {
            display: inline-block;
            background-color: #3b82f6;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 16px;
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
        <div class="notice">🔐 Permintaan Reset Password</div>

        <div class="section">
            <div class="heading">Hai,</div>
            <p>Kami menerima permintaan untuk reset password akun UMKM anda.</p>
            <p>Klik tombol di bawah ini untuk mengatur ulang password anda:</p>

            <a href="{{ config('app.frontend_url') }}/reset-password?token={{ $token }}&email={{ urlencode($email) }}"
                style="
                    display: inline-block;
                    background-color: #3b82f6;
                    color: #ffffff;
                    text-decoration: none;
                    padding: 12px 24px;
                    border-radius: 6px;
                    font-weight: 600;
                    font-family: 'Segoe UI', Tahoma, sans-serif;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    margin-top: 12px;
                ">
                🔐 Reset Password
            </a>

        </div>

        <div class="section">
            <p>Link ini hanya berlaku selama <strong>60 menit</strong>.</p>
            <p>Jika kamu tidak meminta reset password, silakan abaikan email ini.</p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} UMKM Platform. All rights reserved.
        </div>
    </div>
</body>

</html>
