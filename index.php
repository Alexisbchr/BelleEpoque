<?php
  session_start();
  require 'src/Controllers/RoutingController.php';
  
  
  $routingController= new RoutingController();
  $authenticationController = new AuthenticationController();
  $userManager = new UserManager();
  $coursManager = new CoursManager();
  $currentUser = null;
  
  if(isset($_GET['route']))
  {
    var_dump("index.php route : ".$_GET['route']);
    $routingController-> matchRoute($_GET['route'],$_POST);
  }
  else
  {
      require 'src/Templates/home_screen.phtml';
  }
?>

