<?php

  class Cours
  {

    private int $id;
    private string $title;
    private int $compte;
    private int $mur;
    private int $niveau;
    private string $choregraphe;
    private string $musique;
    private string $lien;
    private string $pdf;
    private string $name;

    public function __construct(int $id, string $title, int $compte, int $mur,
    int $niveau, string $choregraphe, string $musique, string $lien, string $pdf, string $name)
    {
        $this-> id = $id;
        $this-> title = $title;
        $this-> compte = $compte;
        $this-> mur = $mur;
        $this-> niveau = $niveau;
        $this-> choregraphe = $choregraphe;
        $this-> musique= $musique;
        $this-> lien = $lien;
        $this-> pdf = $pdf;
        $this-> name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getNiveau(): int
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

    public function getLien(): string
    {
        return $this->lien;
    }

    public function getPdf(): string
    {
        return $this->pdf;
    }

    public function getName(): string
    {
        return $this->name;
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
    public function setNiveau(): int
    {
        return $this->niveau;
    }

    public function setLien(): string
    {
        return $this->lien;
    }

    public function setPdf(): string
    {
        return $this->pdf;
    }

    public function setName(): string
    {
        return $this->name;
    }
  }
