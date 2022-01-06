<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 

if(!($_SESSION['username']))
{
  header('Location: login.php');
}

?>
<?php
require_once('class/Register.php');
$rs = new Register();

if (isset($_POST['edit_id']))
{
$rs->id = $_POST['edit_id'];

$res=$rs->listEdit($rs->id);

foreach( $res as $row)
{

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Admin Profile </h6>
  </div>


  <div class="card-body">
<form action="code.php" method="post">
  <div class="form-group">
      <input type="hidden" name="edit_id" value="<?php echo $row['id']?>" >
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo $row['username']?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['password']?>" class="form-control" placeholder="Enter Password">
            </div>


            <a href="register.php" class="btn btn-danger" >CANCEL</a>
        <button type="submit" name="updatebtn" class="btn btn-primary" > UPDATE </button>
        </div>
        </form>
<?php }
} 
?>



  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->





<?php
include('includes/scripts.php');
include('includes/footer.php');
ob_get_flush();
?>