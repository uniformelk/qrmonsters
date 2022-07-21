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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Registrate con Monster Emm's</h2>
                    <form id="form-register" class="form">
                        <div class="form-group">
                            <label>Nombres Completos</label>
                            <input type="text" class="form-control" id="names" placeholder="Digita tu usuario..." name="names">
                        </div>
                        <div class="form-group">
                            <label>Correo Electronico</label>
                            <input type="text" class="form-control" id="email" placeholder="Digita tu Correo..." name="email">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="user" placeholder="Digita tu usuario..." name="user">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Digita Contraseña..." name="password">
                        </div>
                        <div class="row">
                            <div class="col-8 offset-2">
                                <button class="btn btn-lg w-100">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/register.js" type="module"></script>
</body>
</html>