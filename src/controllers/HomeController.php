<?php

class HomeController
{
    public function index()
    {
      $page = "home";
      $pageName = "Accueil";
      $lastCours = $this->lastcours();//On appelle la fonction qui récuperera les cours aupres du manager
      require "./src/templates/layout.phtml";
    }
    // Fonction privée car il y a juste le homecontroller qui en as besoin
    private function lastcours()
    {
      require_once './src/managers/CoursManager.php';
      $coursManager = new CoursManager;
      $lastCours = $coursManager->getLastCours();
      return $lastCours; // On renvoi les valeurs pour que index() puissent les utiliser
    }
}