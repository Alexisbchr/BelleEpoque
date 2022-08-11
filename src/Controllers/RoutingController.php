<?php
  require 'src/Managers/UserManager.php';
  require 'src/Managers/PageManager.php';
  require './src/Managers/CoursManager.php';
  require 'AuthenticationController.php';
  require 'CoursController.php';
  
  class RoutingController
  {
    
    function matchRoute(string $route, array $post = null) : void
     {
       
       $authenticationController = new AuthenticationController();
       $coursController = new CoursController();
       if(isset($_GET['route'])){
         if($_GET['route'] === "homescreen")
         {
           $authenticationController->homescreen();
         }
          else if($_GET['route'] === "login")
         {
           $pageManager = new PageManager();
           $page = $pageManager->getPageByRoute($_GET['route']);
           $authenticationController->login(null,$page);
           
         }
         else if($_GET['route'] === "landing")
         {
           $authenticationController->landing($post);
           
         }
         else if($_GET['route'] === "allcours")
         {
           $coursController->allCours($post);
           
         }
         else if($_GET['route'] === "addcours")
         {
           $coursController->addCours();
         }
          else if($_GET['route'] === "singlecours")
         {
           $coursController->singleCours($post);
         }
         else{
           $authenticationController->homescreen();
         }
       }
       
     }
     
  }
  
?>