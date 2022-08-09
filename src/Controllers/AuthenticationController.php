<?php

  class AuthenticationController
  
  {
  
      function homescreen() : void
      {
          require './src/Templates/home_screen.phtml'; 
      }
      
      function landing(array $post = null) : void
      {
        $currentUser = null;
        if (isset($_POST['usernameAdmin']) && isset($_POST['passwordAdmin']))
          {
            $userManager = new UserManager();
            $currentUser = $userManager->loadUser($_POST['usernameAdmin'],
            $_POST['passwordAdmin']); 
            $_SESSION['username'] = $_POST['usernameAdmin'];
            $_SESSION['password'] = $_POST['passwordAdmin'];
          } 
          require './src/Templates/landing.phtml';  
        
      }
      
      function login(array $post = null) : void
      {
          require './src/Templates/login.phtml'; 
          
      }
      function addCours(array $post = null) : void
      {
        if (isset($_SESSION['username']) && isset($_SESSION['password']))
        {
          $userManager = new UserManager();
          $currentUser = $userManager->loadUser($_SESSION['username'],
          $_SESSION['password']); 
        }
        if (isset($_POST['titreCour']) && isset($_POST['compteCour']) 
            && isset($_POST['murCour']) && isset($_POST['niveauCour']) 
            && isset($_POST['choregrapheCour']) && isset($_POST['musiqueCour']))
          {
            $coursManager = new CoursManager();
            $coursManager -> insertCour($_POST['titreCour'], $_POST['compteCour'], 
            $_POST['murCour'],$_POST['niveauCour'],$_POST['choregrapheCour'],$_POST['musiqueCour']);
          }
        require './src/Templates/addcours.phtml'; 
      }
      function allCours(array $post = null) : void
      {
          require_once "./src/Managers/CoursManager.php";
    
          $coursManager = new CoursManager;
          $allCours = $coursManager->getAllCours();
          
          require './src/Templates/allcours.phtml'; 
      }
      function lastCours(array $post = null) : void
      {
        
          require_once "./src/Managers/CoursManager.php";
          
          
          var_dump($lastCours);
          $coursManager = new CoursManager;
          $lastCours = $coursManager->getLastCours();
          
          require './src/Templates/lastcours.phtml'; 
      }
  
  }
?>