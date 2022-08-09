<?php
  require 'src/Managers/UserManager.php';
  require 'src/Managers/PageManager.php';
  require './src/Managers/CoursManager.php';
  require 'AuthenticationController.php';

  class RoutingController
  {
    
    function matchRoute(string $route, array $post = null) : void
     {
       
       $authenticationController = new AuthenticationController();
       if(isset($_GET['route'])){
         if($_GET['route'] === "home_screen")
         {
           $authenticationController->homescreen();
         }
          else if($_GET['route'] === "login")
         {
           $authenticationController->login();
           
         }
         else if($_GET['route'] === "landing")
         {
           $authenticationController->landing($post);
           
         }
         else if($_GET['route'] === "allcours")
         {
           $authenticationController->allCours($post);
           
         }
         else if($_GET['route'] === "addcours")
         {
           $authenticationController->addCours();
         }
          else if($_GET['route'] === "singlecours")
         {
           $authenticationController->singleCours($post);
         }
         else{
           $authenticationController->homescreen();
         }
       }
       
     }
     
  }
  
?>