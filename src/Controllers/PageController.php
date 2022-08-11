<?php
    
    $list = null;
    
    $infos = getPageByTitle($page);

    if($page === "login")
    {
        require "./src/Controllers/AuthentificationController.php";
    }
    else if($page === "landing")
    {
        require "./src/Controllers/AuthentificationController.php";
    }
    else if($page === "addcours")
    {
        require "./src/Controllers/CoursController.php";
    }
    else if($page === "singlecours")
    {
        require "./src/Controllers/CoursController.php";
    }
    else if($page === "allcours")
    {
        require "./src/Controllers/CoursController.php";
    }
    else if($page === "homescreen")
    {
        
        require "./templates/layout.phtml";
    }
    else
    {
        require "./templates/layout.phtml";
    }


?>
