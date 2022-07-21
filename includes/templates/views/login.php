<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monster Emm's - Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- <main id="mobile">
        <div class="hero-login">
            <div class="login">
                <form id="form-login-mobile">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Correo</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Digita tu usuario...">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Contraseña</label>
                        <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Digita contraseña...">
                    </div>
                    <button class="btn btn-lg w-75">Iniciar sesion</button>
                </form>
            </div>
        </div>
    </main> -->

    <main id="desktop">
        <div class="row">
            <div class="col-12 col-md-4 d-flex align-items-center">
                <div class="w-50 m-auto ">
                    <img src="assets/img/logo.png" alt="" class="img-fluid">
                    <form id="form-login-desktop" class="form">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" id="user" placeholder="Digita tu usuario..." name="user">
                    </div>
                    <div class="form-group mt-3">
                        
                        <input type="password" class="form-control" id="password" placeholder="Digita contraseña..." name="password">
                    </div>
                    <button class="btn btn-lg w-75">Iniciar sesion</button>
                </form>
                <p class="text-center my-3">Si no tienes cuenta aun, <a href="register">registrate</a></p>
                </div>
            </div>
            <div class="col-8 p-0 d-none d-md-block ">
                <div class="hero-login"></div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/login.js" type="module"></script>
</body>
</html>