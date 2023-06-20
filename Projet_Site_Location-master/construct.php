<?php

require_once('function.php');

class Delete_user{
    private $id;

    function getId($id){
        return $this -> id = $id;
    }

    function Delete() 
    {

        $sql = (new Sql())->getPdo();
        $prepare = $sql -> prepare("DELETE FROM `users` WHERE id = :id");
        
        $prepare -> execute();
    }
}