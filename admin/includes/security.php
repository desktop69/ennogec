<?php
ob_start();
session_start();


if(!($_SESSION['username']))
{
  header('Location: login.php');
}


ob_get_flush();
?>
