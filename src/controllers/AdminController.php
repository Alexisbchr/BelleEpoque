<?php

require_once "./src/managers/UserManager.php";

class AdminController
{
    public function dashboard()
    {
        $page = "dashboard";
        $pageName = "DashBoard";
        require_once './src/templates/admin/admlayout.phtml';
    }
    public function addcours()
    {
      if (isset($_POST['titre']) && isset($_POST['compte']) 
          && isset($_POST['mur']) && isset($_POST['niveau']) 
          && isset($_POST['choregraphe']) && isset($_POST['musique']))
        {
          $coursManager = new CoursManager();
          $cours = $coursManager -> insertCour($_POST['titre'], $_POST['compte'], 
          $_POST['mur'],$_POST['niveau'],$_POST['choregraphe'],$_POST['musique']);
        }
      $page = "addcours";
      $pageName = "Ajouter un cours";
      require_once './src/templates/admin/admlayout.phtml';
        
    }
    public function singlecours(int $id)
    {
        $page = "singlecours";
        $pageName = "Consulter un cours";
        require_once './src/managers/CoursManager.php';
        $coursManager = new CoursManager;
        $cours = $coursManager->getCoursById($id);
        require_once './src/templates/admin/admlayout.phtml';
    }
    public function allcours()
    {
        $page = "allcours";
        $pageName = "Consulter tous les cours";
        require_once './src/managers/CoursManager.php';
        $coursManager = new CoursManager;
        $allCours = $coursManager->getAllCours();
        require_once './src/templates/admin/admlayout.phtml';
    }
    
}