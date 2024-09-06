<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - AITECVI-POLINELA</title>

    <link rel="shortcut icon" href="landing/assets/images/L2.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="login/style.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <!-- Tambahkan Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .select2-container--default .select2-selection--single {
            height: 55px;
            border-radius: 55px;
            border: none;
            display: flex;
            align-items: center;
            width: 100%;
            padding-right: 40px;
            position: relative;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-left: 10px;
            font-size: 16px;
        }

        /* Mengubah teks <p> menjadi berwarna putih */
        p {
            color: white;
        }

        /* Mengatur tampilan tombol Sign In dan Sign Up */
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
    </style>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Form Sign In -->
                <form action="save" method="POST" class="sign-in-form">
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control form-control-md" placeholder="Username" name="username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-control form-control-md" placeholder="Email" name="email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control form-control-md" placeholder="Password" name="password">
                    </div>
                    <div class="input-field"> <i class="fas fa-university"></i> <!-- Dropdown Institusi menggunakan Select2 -->
                        <select class="form-control form-control-md select2-field <?= isset($errors['pt_id']) ? 'is-invalid ' : ''; ?>" name="pt_id" id="pt_id" style="width: 100%; padding: 10px;">
                            <option value="">Pilih Institusi</option> <?php foreach ($pt_id as $pt): ?> <option value="<?= $pt['id'] ?>"><?= $pt['nama_pt'] ?></option> <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-1 mb-5">Sign Up</button>

                    <p>Sudah punya akun? <a href="loginn" class="btn-link">Sign In</a></p>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h2>Agricultural Innovation Technology</h2>
                </div>
                <img src="login/img/L3.png" class="image" alt="">
            </div>
        </div>
    </div>

    <!-- Tambahkan Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#pt_id').select2({
                placeholder: "Cari institusi...",
                minimumInputLength: 3
            });
        });
    </script>
</body>

</html>