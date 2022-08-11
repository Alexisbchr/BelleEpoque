<?php


  
  class Pages
  {
    
    private int $id;
    private string $title;
    private string $route;
    private bool $isPrivate;
    
    public function __construct(int $id, string $title, string $route,
    bool $isPrivate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->route = $route;
        $this->isPrivate = $isPrivate;
    }
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getRoute(): string
    {
        return $this->route;
    }
    public function getIsPrivate(): bool
    {
        return $this->isPrivate;
    }
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    
    public function setRoute(string $route): void
    {
        $this->route = $route;
    }
    public function setIsPrivate(bool $isPrivate): void
    {
        $this->isPrivate = $isPrivate;
    }
  }

?>