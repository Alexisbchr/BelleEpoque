<?php
  session_start();
  
  require 'src/Controllers/RoutingController.php';
  
  $routingController= new RoutingController();

  if(isset($_GET['route']))
  {
    $routingController-> matchRoute($_GET['route'],$_POST);
  }
  else
  {
      require './src/Templates/layout.phtml';
  }
?>

