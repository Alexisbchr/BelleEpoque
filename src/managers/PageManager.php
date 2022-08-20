<?php
  require './src/controllers/PageController.php';
  require './src/entities/Pages.php';
  
  class PageManager
  {
    private PDO $db;
  
    public function __construct()
    {
        $this->db = new PDO(
        'mysql:host=db.3wa.io;port=3306;dbname=beucheralexis_belle_epoque',
          'beucheralexis',
          '6e8483129fd777c045a2009608fa54d9'
        );
    }
    
    public function getDb(): string
    {
        return $this->db;
    }
  
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }
    
    function getAllPagesRoutes() : array
    {
      $db=$this->db;
      $query = $db->prepare('SELECT `route` FROM `pages` ');
      $query->execute();
      $allPages = $query->fetchAll(PDO::FETCH_ASSOC);
      return $allPages;
    }
    function getAllPagesTitle() :?array
    {
      $db=$this->db;
      $query = $db->prepare('SELECT title FROM pages');
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    }
    function getPageByTitle(string $title = "homepage") :?array 
    {
      $db=$this->db;        
      $query = $db->prepare('SELECT * FROM pages WHERE pages.title = :title');
      $parameters = [
        'title' => $title
      ];
      $query->execute($parameters);
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    function getPageByRoute(string $route = "homepage") :?array
    {
      $db=$this->db;        
      $query = $db->prepare('SELECT * FROM pages WHERE pages.route = :route');
      $parameters = [
        'route' => $route
      ];
      $query->execute($parameters);
      $result = $query->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
  }