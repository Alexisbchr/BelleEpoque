<?php
/**
* This file contain all fonctions who display the lessons in front
*/
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
      $orderCoursByLetter = $coursManager->orderCoursByLetter();
      
      //Tri des cours dans une table adaptée (1ère lettre = clé)
      $coursByFirstLetter = [];
      $previousFirstLetter = null;
      $j = 0;
      for($i = 0, $max = count($orderCoursByLetter); $i < $max; $i++){
        $orderCoursByLetter[$i]['title']." Premier Char : ".strtoupper(substr($orderCoursByLetter[$i]['title'],0,1));
        $title = $orderCoursByLetter[$i]['title'];
        $id = $orderCoursByLetter[$i]['id'];
        $firstLetter = strtoupper(substr($orderCoursByLetter[$i]['title'],0,1));
        if($firstLetter !== $previousFirstLetter){
          $j = 0;
        }
        $coursByFirstLetter[$firstLetter][$j]['title'] = $title;
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