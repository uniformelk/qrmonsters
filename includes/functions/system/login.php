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
                if($filaUser['totalUser'] > 0) throw new Exception('Ya existe una cuenta con este Usuario');
            }

            $insertarUser = $conexion->ejecutarConsulta('INSERT INTO mqr_users(username, email, names, password, date_creation) VALUES ("'.$user.'","'.$email.'","'.$names.'","'.$pass.'",NOW());');

            $consultaId = $conexion->ejecutarConsulta('SELECT id_user FROM mqr_users WHERE username = "'.$user.'"');

            foreach($consultaId as $filaId ){
                $key = md5($user.$filaId['id_user']);
                $insertKey = $conexion->ejecutarConsulta('INSERT INTO mqr_users_validate(id, key_activate) VALUES( '.$filaId['id_user'].', "'.$key.'" );');
                enviaEmail($key, $email, $names, $user);
            }

            
            
            $respuesta->mensaje = "El Usuario a sido creado con exito, te hemos enviado un correo electronico para validar tu correo";

        }

        if($flag == 3){
            $key = $_POST['key'];
            $id = 0 ;

            $resultadoVerificaKey = $conexion->ejecutarConsulta('SELECT COUNT(*) AS total FROM mqr_users_validate WHERE key_activate = "'.$key.'"');

            foreach($resultadoVerificaKey as $existeKey){
                if($existeKey['total']  == 0){
                    throw new Exception('ha ocurrido un error con esta URL, contactanos por medio del correo <br><br>soporte@monsteremms.com');
                }
            }

            $resultadoId = $conexion->ejecutarConsulta('SELECT id FROM mqr_users_validate WHERE key_activate = "'.$key.'"');

            foreach($resultadoId as $filaId){
                $id = intval($filaId['id']);
            }

            $verificaEstado = $conexion->ejecutarConsulta('SELECT state FROM mqr_users WHERE id_user = '.$id.'');

            foreach($verificaEstado as $estado){
                if($estado['state'] != 0){
                    $respuesta->estado = 2;
                }else{
                    $resultadoActivo = $conexion->ejecutarConsulta('UPDATE mqr_users SET date_update= NOW(),state= 1 WHERE id_user = '.$id.'');
                    $respuesta->estado = 1;
                }
            }

        }
        
      }
      catch(Exception $e){
          $respuesta->estado = 4;
          $respuesta->mensaje = $e->getMessage();
      }
  
      print_r(json_encode($respuesta));

      function enviaEmail($key, $email, $names, $user){
        $destinatario = $email;
        $cuerpo = ' 
            <html> 
                <head> 
                <title>Activa tu usuario en Monster Emms</title> 
                </head>
                <style>
                    h1{
                        width: 100%;
                        text-align: center;
                        color: #1e294b;
                    }
                    p{
                        width:100%;
                        text-align: center;
                        color: #53b5be;
                    }
                </style> 
                <body> 
                <h1>Activa tu usuario en Monster Emms</h1> 
                <div>
                    <p>Hola '.$names.', somos Monster Emms</p>
                    <p>Confirma tu correo electronico mediante el siguiente enlace, para poder activar tu cuenta en la plataforma de Beneficios de Monster Emms</p>
                    <a href="localhost/qrmonsters/confirm-email.php?id='.$key.'" target="_blank"><button>Activar Cuenta</button></a>
                </div>
                </body> 
            </html> 
            '; 
        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

        //dirección del remitente 
        $headers .= "From: Monster Emms <soporte@monsteremms.com>";
        mail($destinatario,'Activa tu usuario en Monster Emms',$cuerpo,$headers);  
      }
  ?>
