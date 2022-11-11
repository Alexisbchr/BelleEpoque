<?php

class ContactController{

  public function contact(){
    $page = "contact";
    $pageName = "Contactez-nous";
    $traitement = $this->traitement();
    require './src/templates/layout.phtml';
  }

  // La fonction mail() ne fonctionne pas sur l'ide

  private function traitement(){
    
  try{
    
      if (isset($_POST['text']) && ($_POST['message']))
      
      {

        $retour = mail('contact@alexisbeucher.fr', 'Envoi depuis la page Contact', $_POST['message'], $_POST['text'],
        'From: contact@alexisbeucher.fr' . "\r\n" . 'Reply-to: ' . $_POST['email']);
          
        if($retour)
        
        {
          echo '<h2>Mail envoyé</h2>';
        }
        
      }
      
    }

    catch(Exception $e)
    {
      echo $e->getMessage() . "<br>";
    }
  }
}
