<?php
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.ico" type="image/x-icon">
    <title>Monster Emm's</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="assets/img/logo.png" class="img-fluid" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi Cuenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalFactura" href="">Añadir número de factura</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Bienvenido <?php echo $_SESSION['name']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" id="exit">Salir</a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>
  <div class="container-fluid">
      <div class="row">
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero">
                
                  <h1 class="">1</h1>
                
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero">
                <h1 class="">2</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero">
                <h1 class="">3</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero">
                <h1 class="">4</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero">
                <h1 class="">5</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero">
                <h1 class="">6</h1>
              </div>
          </div>          
      </div>
  </div>
  <div class="modal fade" id="modalFactura" tabindex="-1" aria-labelledby="modalFacturaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFacturaLabel">Canjear Numero de Factura</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form">
          <label for="input-factura" class="form-label">Codigo</label>
          <input type="text" id="input-factura" class="form-control" aria-describedby="facturaHelp" placeholder="Añade el codigo para poder redimir tu bono">
          <div id="facturaHelp" class="form-text">
            Añade el codigo recibido al momento de recibir tu producto o si prefieres canjearlo desde el codigo QR desde tu dispositivo movil.
          </div>
          <input type="hidden" id="inputId" value="<?php echo $_SESSION['id']; ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="redimirAction">Redimir</button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/main.js" type="module"></script>
</html>