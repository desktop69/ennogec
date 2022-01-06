<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 



?>
<?php
require_once('class/Patient.php');
$rs= new Patient();

if (isset($_POST['edit_id']))
{
    
$rs->id=$_POST['edit_id'];
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
<form action="codep.php" method="post">
  <div class="form-group">
      <input type="hidden" name="edit_id" value="<?php echo $row['idp']?>" >
                <label> nom </label>
                <input type="text" name="edit_nom" value="<?php echo $row['nom']?>" class="form-control" placeholder="Enter nom">
            </div>
            <div class="form-group">
                <label>prenom</label>
                <input type="text" name="edit_prenom" value="<?php echo $row['prenom']?>" class="form-control" placeholder="Enter prenom">
            </div>
            <div class="form-group">
                <label>dateness</label>
                <input type="dateness" name="edit_dateness" value="<?php echo $row['dateness']?>" class="form-control" placeholder="Enter dateness">
            </div>
            <div class="form-group">
                <label>city</label>
                <input type="text" name="edit_city" value="<?php echo $row['city']?>" class="form-control" placeholder="Enter city">
            </div>

            <a href="pat.php" class="btn btn-danger" >CANCEL</a>
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