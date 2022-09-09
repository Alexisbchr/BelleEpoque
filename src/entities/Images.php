<?php

  class Images
  {
    
    private int $id;
    private string $title;
    private string $lien;
    
    public function __construct(int $id, string $title, string $lien)
    {
        $this->id = $id;
        $this->title = $title;
        $this->lien = $lien;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getLien(): string
    {
        return $this->lien;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    
    public function setLien(string $lien): void
    {
        $this->lien = $lien;
    }
  }

?>