<?php
include_once("Modele.php");
class Consultation extends Modele
{
    public $idc,$idmed,$idpas,$idmedica,$date,$tarif;
    function __construct($idc= "",$idmed = "",$idpas = "",$idmedica ="" ,$date = "", $tarif ="")
    {
        $this->idc =$idc ;
        $this->idmed = $idmed;
        $this->idpass = $idpas;
        $this->idmedica = $idmedica;
        $this->date = $date;
        $this->tarif = $tarif;
 
        parent::__construct();
    }

    function insert($idmed,$idpas,$idmedica,$date,$tarif)
    {
        $query = "INSERT INTO `adminpanel`.`consultation` (
            `idc` ,
            `idmed` ,
            `idpas` ,
            `idmedica` ,
            `date` ,
            `tarif` )
            VALUES (
            NULL , ?, ?, ?, ?, ? ); ";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idmed, $idpas, $idmedica, $date, $tarif));
    }

    function update($idc,$idmed,$idpas,$idmedica,$date)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idmed,$idpas,$idmedica,$date,$idc));
    }
    function delete($idc)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idc));
    }

    function liste()
    {
        $query = "  SELECT *
        FROM consultation, medecin, medicament, patient
        WHERE medicament.idmedica = consultation.idmedica
        AND medecin.idmed = consultation.idmed
        AND patient.idp = consultation.idpas
        LIMIT 0 , 30;
           ";
   

        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }

    function order()
    {
        $query = "SELECT SUM( tarif )
        FROM consultation
        WHERE tarif !=0; ";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }

}
?>