<?php
/**
  * This file contain all the homepage functions
  */
class HomeController
{
  /**
  * index() is a function allowing the route
  */
  public function index()
  {
    $page = "home";
    $pageName = "Accueil";
    $lastCours = $this->lastcours();//On appelle la fonction qui récuperera les cours aupres du manager
    require "./src/templates/layout.phtml";
  }
  /**
   * lastcours() is a function who display the four last lessons
  */
  private function lastcours() // Fonction privée car il y a juste le homecontroller qui en as besoin
  {
    require_once './src/managers/CoursManager.php';
    $coursManager = new CoursManager;
    $lastCours = $coursManager->getLastCours();
    return $lastCours; // On renvoi les valeurs pour que index() puissent les utiliser
  }
}
?>