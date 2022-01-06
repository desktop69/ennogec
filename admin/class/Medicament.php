<?php
include_once("Modele.php");
class Medicament extends Modele
{
    public $idmedica,$libell ;

    function __construct($idmedica= "",$libell = "")
    {
        $this->idmedica =$idmedica ;
        $this->libell = $libell;
       
 
        parent::__construct();
    }

    function insert($idmedica,$libell)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idmedica, $libell));
    }

    function update($idmedica,$libell)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($libell,,$idmedica));
    }
    function delete($idmedica)
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idmedica));
    }

    function liste()
    {
        $query = "";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }



}
?>