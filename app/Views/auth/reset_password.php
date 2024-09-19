<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/login/img/pol3.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            color: #007bff;
            margin-top: 15px;
        }

        .error-message {
            text-align: center;
            color: red;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="POST" action="/auth/update-password">
            <input type="hidden" name="token" value="<?= $token ?>">
            <div class="form-group">
                <label for="password">Password Baru:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Ubah Password</button>


        </form>
    </div>
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