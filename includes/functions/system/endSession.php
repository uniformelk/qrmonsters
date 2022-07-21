<?php
	include ('session.php');
  	$session = new Session();
	
	$respuesta = new stdClass();
	$respuesta->estado = 1;
	$respuesta->mensaje = "";
    $respuesta->data = array();
    try{
        $session->endSession();
        
    }catch(Exception $e){
          $respuesta->estado = 2;
          $respuesta->mensaje = $e->getMessage();
      }
  
      print_r(json_encode($respuesta));
  ?>
