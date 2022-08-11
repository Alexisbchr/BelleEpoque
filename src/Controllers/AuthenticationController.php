<?php

  class AuthenticationController
  
  {
  
      function homescreen() : void
      {
        
          require './src/Templates/layout.phtml'; 
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
      
      function login(array $post = null, array $page) : void
      {

          var_dump($page);
          if ($page['is_private']===0){
          require './src/Templates/login.phtml';
          }
          
          
      }
  }
?>