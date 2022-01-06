<?php
include_once("Modele.php");
class Register extends Modele
{
    public $id,$username,$email,$password;
    function __construct($ide = "" , $user = "", $em = "", $passw = "")
    {
        $this->id =$ide ;
        $this->username = $user;
        $this->email = $em;
        $this->password = $passw;
 
        parent::__construct();
    }
    function insert($username,$email,$password)
    {
        $query = "INSERT INTO `adminpanel`.`register` (
            `id` ,`username` , `email` ,`password`)VALUES (NULL , ?, ?, ?);";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($username, $email, $password));
    }

    function update($id, $username, $email, $password)
    {
        $query = "UPDATE `adminpanel`.`register` SET `username` = ?,
        `email` = ?,
        `password` = ? WHERE `register`.`id` = ? LIMIT 1 ;";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($username, $email, $password, $id));
    }

    function delete($id)
    {
        $query = "delete from register where id = ?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($id));
    }
    function liste()
    {
        $query = "select * from register";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }
    function order()
    {
        $query = "select COUNT(*) from register ";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }


    function listEdit($id)
    {
           $query = "select * from register where id='$id'";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }

    function login($email,$password)
    {
           $query = "select * from register where email = '$email' and password = '$password' ";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }
}
?>