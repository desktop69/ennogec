<?php
require_once('class/Register.php');
$rs = new Register();

if ( isset ($_POST['updatebtn']))
{
    $rs->id = $_POST['edit_id'];
    $rs->username = $_POST['edit_username'];
    $rs->email = $_POST['edit_email'];
    $rs->password = $_POST['edit_password'];
    

    $query_run = $rs->update($rs->id, $rs->username, $rs->email, $rs->password);

        if (isset($query_run))
        {
            $_SESSION['success'] = 'Your data is Updated' ;
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = 'Your data is Not Updated' ;
            header('Location: register.php');
        }




}

if ( isset ($_POST['delete_btn']))
{
    $rs->id = $_POST['delete_id'];
    $query_run = $rs->delete($rs->id);

    if (isset($query_run))
    {
        $_SESSION['success'] = 'Your data is Deleted' ;
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = 'Your data is Not Deleted' ;
        header('Location: register.php');
    }
}


ob_get_flush();
?>