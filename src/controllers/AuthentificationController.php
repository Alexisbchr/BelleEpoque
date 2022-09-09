<?php
/**
  * This file contain all functions of the authentification system
  */
class AuthentificationController
{
  /**
  * login() is a function allowing the route
  */
  public function login()
  {
      $page = "login";
      $pageName = "Connexion";
      require_once "./src/templates/layout.phtml";
      
  }
  /**
  * logincheck() is a function allowing the route and who checking the form
  * of login and who verifies the data in DataBase
  */
  
  public function logincheck()
  {

    $page = "logincheck";
    $pageName = "LoginCheck";
    require_once "./src/controllers/AdminController.php";
    require_once "./src/managers/UserManager.php";
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userManager = new UserManager();
    $user = $userManager->getUserByUsername($username);
    if ($user !== null && $password !== null)
    {
      if ($password === $user->getPassword() && $password !== null)
      {
        $_SESSION['user'] = $user;
        header('Location: admin');
      }
      else{
        header('Location: login');
        exit;
      }
    }
    else{
        header('Location: login');
        exit;
      }
    
    require './src/templates/logincheck.phtml';
    require "./src/templates/layout.phtml";
  }
  /**
  * logout() is a function allowing the route and who logout the user
  */
  public function logout()
  {
      $page = "logout";
      $pageName = "Déconnexion";
      header('Location: /BelleEpoque/login');
      exit;
  }
}    