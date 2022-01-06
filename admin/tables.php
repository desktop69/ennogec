<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php   
        require_once("class/Register.php");
        $us = new Register();
        $res=$us->liste();
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
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php    foreach ($res as $row) {  ?>
          <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['password']?></td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>

            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php }?> 
        </tbody>
      </table>
