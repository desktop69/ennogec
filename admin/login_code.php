<?php
ob_start();
session_start();
require_once('class/Register.php');
$rs= new Register();


if(isset($_POST['login_btn']))
{
    $rs->login_email = $_POST['emaill'];
    $rs->login_passwordd = $_POST['passwordd'];
    $query_run = $rs->login($rs->login_email,$rs->login_passwordd);
    $count = $query_run->rowCount();
    if ($count>0)
    {
            $_SESSION['username'] = $rs->login_email;
            header('Location: index.php');

    }
else
{
 $_SESSION['status'] = 'Your id is invalide' ;
        header('Location: login.php');
}


}


ob_get_flush();
?>