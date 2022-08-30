<?php

class PageController
{
  public function association(){
    $page = "association";
    $pageName = "L'Association";
    require './src/templates/layout.phtml';
  }
  public function legals(){
    $page = "legals";
    $pageName = "A propos";
    require './src/templates/layout.phtml';
  }
}

?>