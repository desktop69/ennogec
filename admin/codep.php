<?php
ob_start();
session_start();
require_once('class/Patient.php');
$rs= new Patient();

if ( isset ($_POST['registerbtnp']))
{
    $rs->nom = $_POST['nom'];
    $rs->prenom = $_POST['prenom'];
    $rs->sex = $_POST['sex'];
    $rs->dateness = $_POST['dateness'];
    $rs->city = $_POST['city'];
    

    $query_run = $rs->insert($rs->nom ,$rs->prenom , $rs->sex, $rs->dateness ,$rs->city) ;

         if (isset($query_run))
        {
            $_SESSION['success'] = 'Your Patient is aded succ' ;
            header('Location: pat.php');
        }
        else
        {
            $_SESSION['status'] = 'Your Patient is not aded' ;
            header('Location: pat.php');
        } 




}

ob_get_flush();
?>