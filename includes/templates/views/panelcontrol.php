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
      <li class="nav-item">
          <a class="nav-link disabled">Bienvenido <?php echo $_SESSION['name']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" id="exit">Salir</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi Cuenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
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
              <div class="img d-flex align-items-center hero2">
                <h1 class="">2</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero3">
                <h1 class="">3</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero4">
                <h1 class="">4</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero5">
                <h1 class="">5</h1>
              </div>
          </div>
          <div class="col-6 col-md-4">
              <div class="img d-flex align-items-center hero6">
                <h1 class="">6</h1>
              </div>
          </div>          
      </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/main.js"></script>
</html>