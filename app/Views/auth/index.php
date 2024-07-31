<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AITECVI-POLINELA</title>

    <link rel="shortcut icon" href="landing/assets/images/L2.png" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="login/style.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form action="/auth/check-auth" method="POST" class="sign-in-form">

                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control form-control-md <?= isset($errors['username']) ? 'is-invalid ' : ''; ?>" placeholder="Username/email" name="username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control form-control-md <?= isset($errors['password']) ? 'is-invalid ' : ''; ?>" placeholder="Password" name="password">
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-1 mb-5">Log in</button>
                </form>


                <form action="/auth/check-auth" class="sign-up-form" method="POST">
                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control form-control-md <?= isset($errors['username']) ? 'is-invalid ' : ''; ?>" placeholder="Username/email" name="username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control form-control-md <?= isset($errors['password']) ? 'is-invalid ' : ''; ?>" placeholder="Password" name="password">
                    </div>
                    <input type="submit" value="Login" class="btn solid" />

                </form>

            </div>
        </div>
        <div class="panels-container">

            <div class="panel left-panel">
                <div class="content">
                    <!-- <h3>Click Here</h3> -->
                    <h2>Agricultural Innovation Technology</h2>
                    <button class="btn transparent" id="sign-up-btn">Sign In</button>
                </div>
                <img src="login/img/L3.png" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <!-- <h3>Click Here</h3> -->
                    <h2>Agricultural Innovation Technology</h2>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </div>
                <img src="login/img/L3.png" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="login/app.js"></script>
</body>

</html>