<?php

class Sql {

    private string $dns;
    private string $user;
    private string $ps;
    private \PDO $pdo;

  function __construct(string $dns="mysql:host=localhost:3306;dbname=airbnb",string $user= "root", string $ps= "root")
  {
    $this -> dns = $dns;
    $this -> user = $user;
    $this ->ps = $ps;
    $this->pdo = new PDO($dns, $user, $ps);
  }

    function setDns(string $dns){
       $this-> dns = $dns  ; 
    }
    
    function setUser(string $username){
       $this -> user = $username; 
    }

    function setPs(string $password){
      $this -> ps = $password;
    }

    function getPdo(): PDO
    {
      return $this->pdo;
    }

}

  