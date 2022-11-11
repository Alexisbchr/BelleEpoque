<?php
/**
* This file contain all fonctions who display the lessons in front
*/
require_once './src/entities/Cours.php';

class CoursController
{
    public function allcours()
    {
      $page = "allcours";
      $pageName = "Tous les cours";
      require_once './src/managers/CoursManager.php';
      $coursManager = new CoursManager;
      $allCours = $coursManager->getAllCours();

      require_once "./src/templates/layout.phtml";
    }
    public function singlecours(int $id)
    {
        $page = "singlecours";
        $pageName = "Consulter un cours";
        require_once './src/managers/CoursManager.php';
        $coursManager = new CoursManager;
        $cours = $coursManager->getCoursById($id);
        require_once './src/templates/layout.phtml';
    }
    public function ordercours()
    {
      $page = "ordercours";
      $pageName = "Trier les cours";
      require_once './src/managers/CoursManager.php';
      $coursManager = new CoursManager;
      $orderCoursByLetter = $coursManager->orderCoursByLetter(); // On récupère les cours par ordre alphabétique

      //Tri des cours dans une table adaptée (1ère lettre = clé)
      $coursByFirstLetter = []; // On crée un tableau contenant la première lettre
      $previousFirstLetter = null; // On initialise la variaable qui contiendra la lettre précédente
      $j = 0; // on initalise un compteur pour plus tard
      for($i = 0, $max = count($orderCoursByLetter); $i < $max; $i++){ // on parcourt le tableau par lettre jussqu'a la denière
        $orderCoursByLetter[$i]['title']." Premier Char : ".
        strtoupper(substr($orderCoursByLetter[$i]['title'],0,1)); // Substr on prends la première lettre ici, 0-1 =  A majusculee car strtoupper
        $title = $orderCoursByLetter[$i]['title']; // On enregistre le titre
        $id = $orderCoursByLetter[$i]['id']; // On enregistre l'id
        $firstLetter = strtoupper(substr($orderCoursByLetter[$i]['title'],0,1)); // Enregistre  la première lettre en majuscule
        if($firstLetter !== $previousFirstLetter){ // on compare la lettre avec la précédente lettre et si c'est la même on reste sur la même clef
          $j = 0; // on change pas de clef
        }
        $coursByFirstLetter[$firstLetter][$j]['title'] = $title; // FirstLetter = A, $j = Index du cours
        $coursByFirstLetter[$firstLetter][$j]['id'] = $id;
        $previousFirstLetter = $firstLetter;
        $j++;
      }
      return $coursByFirstLetter;
    }
    public function orderbyletter(string $letter)
    {
      $page = "ordercoursbyletter";
      $pageName = "Triage cours";
      require_once './src/managers/CoursManager.php';
      $coursByFirstLetter = $this->ordercours();
      require './src/templates/layout.phtml';
    }
}