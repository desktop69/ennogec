<?php

ob_start();
session_start();
require_once("class/Consultation.php");
 
$us = new Consultation();
if(isset($_POST['insert_con']))
{
    $us->idpas = $_POST['pat'];
    $us->idmed = $_POST['med'];
    $us->date = $_POST['date'];
    $us->tarif = $_POST['tarif'];
    $us->idmedica = $_POST['med'];


//    echo $us->idpas ;
//    echo $us->idmed ;
//   echo  $us->date ;
//   echo  $us->tarif ;
//    echo $us->idmedica ;



// function insert($idmed,$idpas,$idmedica,$date,$tarif)
        $query_run = $us->insert($us->idmed, $us->idpas,  $us->idmedica, $us->date, $us->tarif );
           echo $query_run ;
        if($query_run)
        {
            echo "done";
          echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
          $_SESSION['status'] =  "consultation is Added";
            header('Location: consult.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "consultation is Not Added";
            header('Location: consult.php');
        
     }
    }
    




ob_get_flush();
?>