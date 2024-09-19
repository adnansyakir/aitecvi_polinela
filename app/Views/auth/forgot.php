<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password - AITeC VI</title>

    <link rel="shortcut icon" href="landing/assets/images/L2.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="login/style.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Tambahkan CDN Toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <style>
        /* CSS tambahan untuk tampilan yang lebih menarik */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('/login/img/pol3.jpg'); 
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .card-body {
            text-align: center;
        }

        .app-brand img {
            margin-bottom: 1rem;
            transition: transform 0.3s;
        }

        .app-brand img:hover {
            transform: scale(1.1);
        }

        h4 {
            font-weight: 600;
            color: #333;
        }

        p {
            color: #666;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #2575fc;
            outline: none;
        }

        .btn {
            background: #2575fc;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #6a11cb;
        }

        .text-center a {
            color: #2575fc;
            text-decoration: none;
            transition: color 0.3s;
        }

        .text-center a:hover {
            color: #6a11cb;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="/" class="app-brand-link gap-2">
                    <span class="text-center">
                        <img src="login/img/L3.png" alt="" width="20%">
                    </span>
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Lupa Password? 🔒</h4>
            <p class="mb-4">Masukan Email anda yang valid dan telah terdaftar pada sistem!</p>

            <form method="POST" class="mb-3" action="/auth/send-password">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email yang valid" autofocus />
                </div>

                <div class="mb-3">
                    <button class="btn d-grid w-100" type="submit">Kirim Link Ubah Password</button>
                </div>
            </form>

            <div class="text-center">
                <a href="/loginn" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Kembali ke halaman Login
                </a>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk menampilkan pesan flash dengan Toastify -->
    <script>
        <?php if (session()->getFlashData('success')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('success') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#28a745",
            }).showToast();
        <?php endif; ?>
        
        <?php if (session()->getFlashData('error')) : ?>
            Toastify({
                text: "<?= session()->getFlashData('error') ?>",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#dc3545",
            }).showToast();
        <?php endif; ?>
    </script>
</body>

</html>
