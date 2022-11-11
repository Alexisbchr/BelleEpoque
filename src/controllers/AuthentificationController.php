<?php
/**
  * This file contain all functions of the authentification system
  */
class AuthentificationController extends AbstractController
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

    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

  	$username = $this->clean_input($_POST["username"]);
  	$password = $this->clean_input($_POST["password"]);

    $userManager = new UserManager();
    $user = $userManager->getUserByUsername($username);
    $password = sha1($_POST['password']);
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
    if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
      $page = "logout";
      $pageName = "Déconnexion";
      header('Location: /BelleEpoque/login');
      exit;
    }
    else{
     header('Location: login');
     exit;
    }
  }
}