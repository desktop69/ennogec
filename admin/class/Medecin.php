<?php
include_once("Modele.php");
class Medecin extends Modele
{
    public $idmed,$nom,$prenom,$sex,$professien;
    function __construct($idmed = "" , $nom = "", $prenom = "", $sex = "",$professien = "")
    {
        $this->idmed =$idmed ;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sex = $sex;
        $this->professien = $professien;
 
        parent::__construct();
    }

    function insert($nom,$prenom,$sex,$professien)
    {
        $query = "INSERT INTO `adminpanel`.`medecin` (
            `idmed` ,
            `nom` ,
            `prenom` ,
            `sex` ,
            `profession`
            )
            VALUES (NULL , ?, ?, ?, ?);";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($nom, $prenom, $sex, $professien));
    }

    function update($idmed,$nom,$prenom,$sex,$professien)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($nom, $prenom, $sex, $professien, $idmed));
    }

    function delete($idmed)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idmed));
    }

    function liste()
    {
        $query = " SELECT *
        FROM `medecin`
        LIMIT 0 , 30 ";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }




}
?>