<?php

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
}