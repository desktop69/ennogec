<?php
include_once("Modele.php");
class Patient extends Modele
{
    public $idp,$nom,$prenom,$sex,$dateness,$city;
    function __construct($idp= "",$nom = "",$prenom = "",$sex ="" ,$dateness = "",$city = "")
    {
        $this->idp =$idp ;
        $this->nom = $nom;
        $this->prenoms = $prenom;
        $this->sex = $sex;
        $this->dateness = $dateness;
        $this->city = $city;
 
        parent::__construct();
    }

    function insert($nom,$prenom,$sex,$dateness,$city)
    {
        $query = "INSERT INTO `adminpanel`.`patient` (
            `idp` ,
            `nomp` ,
            `prenomp` ,
            `sex` ,
            `dateness` ,
            `City`
            )
            VALUES (NULL , ?, ?, ?, ?, ?);";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($nom, $prenom, $sex, $dateness, $city));
    }

    function updateness($idp,$nom,$prenom,$sex,$dateness,$city)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($nom,$prenom,$sex,$dateness,$city,$idp));
    }
    function delete($idp)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idp));
    }

    function liste()
    {
        $query = " SELECT *
        FROM `patient`
        LIMIT 0 , 30 ";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }


    function listEdit($idp)
    {
           $query = "select * from patient where id='$idp'";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }




}
?>