<?php
	class Session{

		private $codeSession = "monsters-login";

		public function __construct(){
			session_name($this->codeSession);
			session_start();		
		}

		public function checkSession(){
			$check = false;
			if( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
				$check = true;
			}
			return $check;
		}

		public function createSession( array $datos){
			$_SESSION = array();

			$_SESSION['user'] = $datos['username'];
			$_SESSION['name'] = $datos['names'];
			$_SESSION['mail'] = $datos['email'];
			$_SESSION['id'] =$datos['id_user'];			
		}

		public function endSession(){
			$_SESSION = array();

			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,$params['path'], $params['domain'], $params['secure'], $params['httponly']);
			}

			session_destroy();
		}
	}
	/*
	$session = new Session();

	if( !$session->checkSession() ){
		$session->createSession(
			array(
				'usuario' => 'test',
				'nombre' => 'cristian'
			)
		);
	}

	$session->endSession();
	*/
	

?>