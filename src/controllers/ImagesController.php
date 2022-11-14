<?php
/**
* This file contain all fonctions who display images
*/
class ImagesController
{
    public function addimage()
    {
      if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
        $page = "addimage";
        $pageName = "Ajouter une photo";
        require_once './src/managers/ImagesManager.php';

        $imagesManager = new ImagesManager;
        $image = $imagesManager->addimage();
        require_once "./src/templates/admin/admlayout.phtml";
      }
      else{
       header('Location: /BelleEpoque/login');
       exit;
      }
    }
     public function galerie()
    {
        $page = "galerie";
        $pageName = "Galerie de photo";
        require_once './src/managers/ImagesManager.php';
        $imagesManager = new ImagesManager;
        $images = $imagesManager->getDataImages();
        require_once "./src/templates/layout.phtml";

    }
    public function singleimage(int $id)
    {
        $page = "singleimage";
        $pageName = "Consulter un cours";
        require_once './src/managers/ImagesManager.php';
        $imagesManager = new ImagesManager;
        $image = $imagesManager->getImageById($id);
        require_once './src/templates/layout.phtml';
    }


}