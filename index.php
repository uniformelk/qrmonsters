<?php
  include ('includes/functions/system/session.php');
  $session = new Session();

  if($session->checkSession()){
    require('includes/templates/views/panelcontrol.php');
  }else{
    require('includes/templates/views/login.php');
  }
?>