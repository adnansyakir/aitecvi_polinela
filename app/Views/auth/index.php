<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In - AITECVI-POLINELA</title>

    <link rel="shortcut icon" href="landing/assets/images/L2.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="login/style.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- Tambahkan Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        p {
            color: white;
        }

        .btn-link {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        .btn-link:hover {
            background-color: #45a049;
        }

        .panel.left-panel {
            color: #4CAF50;
        }

        .content h1 span {
            color: rgb(255, 211, 50);
        }

        /* Ubah warna teks "Lupa Password" menjadi putih */
        .sign-in-form a {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Form Sign In -->
                <form action="/auth/check-auth" method="POST" class="sign-in-form">
                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control form-control-md" placeholder="Username/email" name="username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control form-control-md" placeholder="Password" name="password">
                    </div>
                    <!-- Ubah warna teks menjadi putih -->
                    <!-- <a href="/auth/forgot"><small>Lupa Password</small></a> -->
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-1 mb-5">Log in</button>

                    <p>Belum punya akun? <a href="register" class="btn-link">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h1>AGRICULTURAL INNOVATION TECHNOLOGY COMPETITION VI <br><br>(AITeC VI) <br> <span class="text-two">2024</span> </h1>
                </div>
                <img src="login/img/L3.png" class="image" alt="">
            </div>
        </div>
    </div>

    <!-- Tambahkan Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
