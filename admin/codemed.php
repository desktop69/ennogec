<?php
ob_start();
session_start();
require_once('class/Register.php');
$rs= new Register();

if(isset($_POST['registerbtnm']))
{
    $rs->nom = $_POST['nom'];
    $rs->prenom = $_POST['prenom'];
    $rs->sex = $_POST['sex'];
    $rs->profession = $_POST['profession'];
    echo $rs->nom ;
  $query_run = $rs->insert($rs->nom, $rs->prenom, $rs->sex,$rs->profession);
        echo $query_run ;

        // if($query_run)
        // {
        //     echo "done";
        //   // echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
        // //   $_SESSION['status'] =  "medecin is Added";
        // //     header('Location: medRh.php');
        // }
        // else 
        // {
        //     echo "not done";
        //     // $_SESSION['status'] =  "medRh is Not Added";
        //     // header('Location: medRh.php');
        // }
    }
    







ob_get_flush();
?>