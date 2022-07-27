<?php
    $key = $_GET['id'];
    echo $key;
?>
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
                    <input type="hidden" value="<?php echo $key;?>" id="key_id" disabled>
                    <div id="contenido">
                        <div class="spinner">
                            <div class="double-bounce1"></div>
                            <div class="double-bounce2"></div>
                        </div>
                        <h4 class="text-center mt-3">Estamos Activando tu cuenta</h4>
                    </div>
                </div>
            </div>
            <div class="col-8 p-0 d-none d-md-block ">
                <div class="hero-login"></div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/confirmEmail.js" type="module"></script>
</body>
</html>