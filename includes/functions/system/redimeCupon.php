<?php
    include ('session.php');
    include ('conexion.php');
    $conexion = new Conexion('logs/');
    $conexion->conectar();
    $session = new Session();
    $respuesta = new stdClass();
	$respuesta->estado = 1;
	$respuesta->mensaje = "";
    try{

        $codigo = intval($_POST['code']);

        $validarExisteFactura = $conexion->ejecutarConsulta('SELECT COUNT(*) AS total FROM wpme_wc_order_stats WHERE order_id = '.$codigo.' ');

        foreach($validarExisteFactura as $filaExiste){
            if($filaExiste['total'] == 0) throw new Exception("Verifique el numero de factura");
        }

        
    }
    catch(Exception $e){
        $respuesta->estado = 2;
        $respuesta->mensaje = $e->getMessage();
    }
  
    print_r(json_encode($respuesta));
  ?>
