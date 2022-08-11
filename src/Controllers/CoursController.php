<?php

    $coursManager = new CoursManager;
    $allCours = $coursManager->getAllCours();
    $lastCours = $coursManager->getLastCours();
    
  class CoursController
  
  {
  
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
          $coursManager = new CoursManager;
          $lastCours = $coursManager->getLastCours();
          
      }
  } 
?>