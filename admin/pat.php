<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Patient Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="codep.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> nom </label>
                <input type="text" name="nom" class="form-control" placeholder="Enter nom">
            </div>
            <div class="form-group">
                <label>prenom</label>
                <input type="prenom" name="prenom" class="form-control" placeholder="Enter prenom">
            </div>
            <div>
                <p style=" font: 1rem 'Fira Sans', sans-serif;" >
                    Sex :
                </p>
            </div>
            <div class="form-group">
                <label>Male</label>
                <input type="radio"  name="sex" value="Male" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>famme</label>
                <input type="radio"  name="sex" value="Famme" class="form-control" placeholder="Enter Password">
            </div>
           
            <div class="form-group">
                <label>date de naissance</label>
                <input type="date" name="dateness" class="form-control" placeholder="Enter date de naissance">
            </div>
         <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" placeholder="Enter your city name">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtnp" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Patient Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Patient Profile 
            </button>
    </h6>
  </div>


  <div class="card-body">
<?php 
if (isset($_SESSION['success']) && ($_SESSION['success']!='' ))
{
  echo '<h2 class="bg-primary text-white" >'.$_SESSION['success'].'<h2>' ;
  unset($_SESSION['success'] );
}
if (isset($_SESSION['status']) && ($_SESSION['status']!='' ))
{
  echo '<h2 class="bg-danger text-white" >'.$_SESSION['status'].'<h2>' ;
  unset($_SESSION['status'] );
}


?>


    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php   
        require_once("class/Patient.php");
        $us = new Patient();
        $res=$us->liste();

   /*      if ($res) {
          echo "succ";
      } else {
          echo "echec";
      }
 */
       ?>
        <thead>
          <tr>
            <th> ID </th>
            <th> nom </th>
            <th>prenom </th>
            <th>sex</th>
            <th>date de naissance</th>
            <th>City</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php    foreach ($res as $row) {  ?>
          <tr>
            <td><?php echo $row['idp']?></td>
            <td><?php echo $row['nomp']?></td>
            <td><?php echo $row['prenomp']?></td>
            <td><?php echo $row['sex']?></td>
            <td><?php echo $row['dateness']?></td>
            <td><?php echo $row['City']?></td>
            <td>
                <form action="pattient_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['idp']?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>

            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['idp']?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php }?> 
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>