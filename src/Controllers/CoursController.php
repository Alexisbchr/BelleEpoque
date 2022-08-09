<?php

    require "./Managers/CoursManager.php";
    
    $coursManager = new CoursManager;
    $allCours = $coursManager->getAllCours();
    var_dump($lastCours);
    $lastCours = $coursManager->getLastCours();
    
    require './src/Templates/allcours.phtml';
    require './src/Templates/lastcours.phtml';
    
    
?>