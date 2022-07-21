<?php
    include ('session.php');
    include ('conexion.php');
    $conexion = new Conexion('logs/');
    $conexion->conectar();
    $session = new Session();
    $respuesta = new stdClass();
	$respuesta->estado = 1;
	$respuesta->mensaje = "";
    $respuesta->data = array();
    try{
        
        $flag  = $_POST['flag'];

        
        if($flag == 1){
            $user = $_POST['user'];
            $pass = $_POST['password'];
            $pass_cifrado = md5($pass);

            $consultaU = $conexion->ejecutarConsulta("SELECT id_user FROM mqr_users WHERE username = '".$user."'");
            $id_user = 0;

            foreach($consultaU as $filaU){
                $id_user = $filaU['id_user'];
            }

            $consultaE = $conexion->ejecutarConsulta(" SELECT COUNT(*) AS total FROM mqr_users WHERE (username = '".$user."') || (email = '".$user."');");

            foreach ($consultaE as $filaE) {
                if($filaE['total']==0) throw new Exception("Verifique sus datos");
            }
            
            $consultaP = $conexion->ejecutarConsulta(" SELECT COUNT(*) AS totalp FROM mqr_users WHERE ((username = '".$user."') AND (password = '".$pass_cifrado."')) || ((email = '".$user."') AND (password = '".$pass_cifrado."'))");

            foreach ($consultaP as $filaP) {
                if($filaP['totalp']==0){
                    throw new Exception("Verifique sus datos");
                }    
            }

            $consultaU = $conexion->ejecutarConsulta("SELECT * FROM mqr_users WHERE ((username = '".$user."') AND (password = '".$pass_cifrado."')) || ((email = '".$user."') AND (password = '".$pass_cifrado."')); ");
            foreach ($consultaU as $filaU) {
                if($filaU['state'] == 0){
                    throw new Exception('Tu cuenta no se encuentra activa, revisa tu correo electronico para confirmar tu cuenta');
                }else{
                    $session->createSession($filaU);
                }
                
            }
        }

        if($flag == 2){
            $user = $_POST['user'];
            $pass = md5($_POST['password']);
            $names = $_POST['names'];
            $email = $_POST['email'];

            if($user === '' || $pass === '' || $names === '' || $email === ''){
                throw new Exception('Faltan campos obligatorios por completar');
            }

            $resultadoEmail = $conexion->ejecutarConsulta('SELECT COUNT(*) AS totalEmail FROM mqr_users WHERE email = "'.$email.'";');

            foreach($resultadoEmail as $filaEmail){
                if($filaEmail['totalEmail'] > 0 ) throw new Exception('ya existe una cuenta con este Email');
            }

            $resultadoUser = $conexion->ejecutarConsulta('SELECT COUNT(*) AS totalUser FROM mqr_users WHERE username = "'.$user.'"');

            foreach($resultadoUser as $filaUser){
                if($filaUser['totalUser'] > 0) throw new Exception('Ya existe una cuenta de usuario con este Usuario');
            }

            $insertarUser = $conexion->ejecutarConsulta('INSERT INTO mqr_users(username, email, names, password, date_creation) VALUES ("'.$user.'","'.$email.'","'.$names.'","'.$pass.'",NOW());');
            
            $respuesta->mensaje = "El Usuario a sido creado con exito, te hemos enviado un correo electronico para validar tu correo";

        }
        
      }
      catch(Exception $e){
          $respuesta->estado = 2;
          $respuesta->mensaje = $e->getMessage();
      }
  
      print_r(json_encode($respuesta));
  ?>
