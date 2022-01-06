<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<?php   
        require_once("class/Patient.php");
        $us = new Patient();
        $res1=$us->liste();

   /*      if ($res) {
          echo "succ";
      } else {
          echo "echec";
      }
 */

require_once("class/Medecin.php");
$uss = new Medecin();
$res2=$uss->liste();
/*
if ($res) {
  echo "succ";
} else {
  echo "echec";
}
*/



       ?>



<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add consultation Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="codeconsul.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        
                    <label for="patient">nom du Patient :</label>
        <select name="pat" >
          <option selected>Selectionner le Patient </option>
          <?php foreach ($res1 as $row1) { ?>
          <option value="<?php   echo $row1['idp']  ?>"><?php echo $row1['nomp'].' '.$row1['prenomp'];   ?>  </option>
          <?php }  ?>
          </select> <br><br>

                    </div>
                    <br>  
                    <div class="form-group">
                    
                    <label for="client">nom du medecin :</label>
        <select name="med" >
          <option selected>Selectionner le medecin </option>
          <?php foreach ($res2 as $row2) { ?>
          <option value="<?php echo $row2['idmed'];?>">  <?php echo $row2['nom'].' '.$row2['prenom'];?>  </option>
          <?php }  ?>

          </select> 
 <br><br>
                    </div>
                    <div class="form-group">
                        <label>date </label>
                        <input type="date" name="date" class="form-control" placeholder="Enter date">
                    </div>
                    <div class="form-group">
                        <label>tarif </label>
                        <input type="text" name="tarif" class="form-control" placeholder="Enter Tarif $ ">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insert_con" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">consultation Profile
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Add consultation Profile
                </button>
            </h6>
        </div>


        <div class="card-body">
            <?php
            if (isset($_SESSION['success']) && ($_SESSION['success'] != '')) {
                echo '<h2 class="bg-primary text-white" >' . $_SESSION['success'] . '<h2>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['status']) && ($_SESSION['status'] != '')) {
                echo '<h2 class="bg-danger text-white" >' . $_SESSION['status'] . '<h2>';
                unset($_SESSION['status']);
            }



            ?>


            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <?php
                    require_once("class/Consultation.php");
                    $us = new Consultation();
                    $res = $us->liste();
                    /*
        if ($res) {
          echo "succ";
      } else {
          echo "echec";
      }
*/
                    ?>
                    <thead>
                        <tr>
                            <th> idc </th>
                            <th> nom du medecin </th>
                            <th>prenom du patient </th>
                            <th>date</th>
                            <th>tarif</th>
                           
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res as $row) {  ?>
                            <tr>
                                <!-- date 	tarif 	idmed 	nom 	prenom 	sex 	profession 	idmedica 	libell 	idp 	nom 	prenom 	sex 	dateness 	City -->
                                <td><?php echo $row['idc']  ?></td>
                                <td><?php echo $row['nom'].'  '.$row['prenom'] ; ?></td>
                                <td><?php echo $row['nomp'].'  '.$row['prenomp'] ;?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['tarif'] ;?></td>
                               
                               
                                <td>
                                    <form action="register_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
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