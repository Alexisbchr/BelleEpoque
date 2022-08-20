<?php

require './src/entities/User.php';

class UserManager
{
    private PDO $db;

    /**
     * @param PDO $db
     */
    public function __construct()
    {
        $this->db = new PDO(
        'mysql:host=db.3wa.io;port=3306;dbname=beucheralexis_belle_epoque',
        'beucheralexis',
        '6e8483129fd777c045a2009608fa54d9'
        );
    }

    /**
     * @return PDO
     */
    public function getDb(): string
    {
        return $this->db;
    }

    /**
     * @param string $db
     */
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }
    
    // Acceder aux user
    
    public function getUserById(int $id) : User 
    {
        $db=$this->db;
        $query = $db->prepare('SELECT * FROM user WHERE id=:id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        $newUser = new User($user[0]['id'], $user[0]['username'], 
        $user[0]['password']);
        return $newUser;
        
    }
    
    // Inserer un user
    
    public function insertUser(string $username, string $password)
    {
      $db=$this->db;
        $query = $db->prepare('INSERT INTO `USER`(`username`, `password`) 
        VALUES (:username, :password)');
        $parameters = [
        'username' => $username,
        'password' => $password
        ];
        $query->execute($parameters);
    }
    
    // User By Username
    
    public function getUserByUsername(string $username): ?User
    {
      $db=$this->db;
        $query = $db->prepare("SELECT * FROM user WHERE username=:username");
        $parameters = [
        'username' => $username
        ];
      $query->execute($parameters);
      $userArray = $query->fetchAll(PDO::FETCH_ASSOC);
      if(!empty($userArray))
      {
        $userArray = new User($userArray[0]['id'], $userArray[0]['username'], 
        $userArray[0]['password']);
        return $userArray;
      }
      else
      {
        return null;
      }
    }
  }

