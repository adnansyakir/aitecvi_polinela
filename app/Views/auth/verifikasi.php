<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Halo, <?= esc($username); ?>!</h1>
    <p>Terima kasih telah mendaftar.</p>
    <p>Akun Anda sedang dalam proses verifikasi oleh admin.</p>
    <p>Anda akan menerima email pemberitahuan ketika akun Anda sudah aktif.</p>
</body>
</html>
