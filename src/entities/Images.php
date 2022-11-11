<?php

  class Images
  {

    private int $id;
    private string $title;
    private string $lien;
    private string $timestamp;

    public function __construct(int $id, string $title, string $lien, string $timestamp)
    {
        $this->id = $id;
        $this->title = $title;
        $this->lien = $lien;
        $this->timestamp = $timestamp;
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
    public function getTimestamp(): string
    {
        return $this->timestamp;
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
    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

  }

?>