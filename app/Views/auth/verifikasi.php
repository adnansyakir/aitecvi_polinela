<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Maintenance</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            background-image: url('https://r4.wallpaperflare.com/wallpaper/114/1008/41/one-piece-monkey-d-luffy-hd-wallpaper-9ef4b77cec0a1f27d70d79da37c4809a.jpg'); /* URL gambar server maintenance */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
	
        }

        p {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 20px;
            color: white;
            background-color: green;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #d32f2f;
        }
    </style>
  <script>
        setTimeout(function() {
            window.location.href = "/";
        }, 5000);
    </script>
</head>
<body>

   <div class="content">
    <h1>Halo, <?= esc($username); ?>!</h1>
    <h1>Terima kasih telah mendaftar.</h1>
    <p>Akun Anda sedang dalam proses verifikasi oleh admin.</p>
    <p>Anda akan menerima e-mail pemberitahuan ketika akun Anda sudah aktif.</p>
    <a class="button">Comeback again....</a>
</div>


</body>
</html>
