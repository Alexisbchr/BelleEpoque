<?php

  class Cours
  {
    
    private int $id;
    private string $title;
    private string $compte;
    private int $mur;
    private string $niveau;
    private string $choregraphe;
    private string $musique;

    
    public function __construct(int $id, string $title, int $compte, int $mur, string $niveau, string $choregraphe, string $musique)
    {
        $this-> id = $id;
        $this-> title = $title;
        $this-> compte = $compte;
        $this-> mur = $mur;
        $this-> niveau = $niveau;
        $this-> choregraphe = $choregraphe;
        $this-> musique= $musique;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getNiveau(): string
    {
        return $this->niveau;
    }
    
    public function getCompte(): int
    {
        return $this->compte;
    }
    
    public function getMur(): int
    {
        return $this->mur;
    }
    
    public function getChoregraphe(): string
    {
        return $this->choregraphe;
    }
    
    public function getMusique(): string
    {
        return $this->musique;
    }
    
    public function setId(): int
    {
        return $this->id;
    }
    
    public function setTitle(): string
    {
        return $this->title;
    }
    
    public function setCompte(): int
    {
        return $this->compte;
    }
    
    public function setMur(): int
    {
        return $this->mur;
    }
    
    public function setChoregraphe(): string
    {
        return $this->choregraphe;
    }
    
    public function setMusique(): string
    {
        return $this->musique;
    }
    public function setNiveau(): string
    {
        return $this->niveau;
    }
    
  }
