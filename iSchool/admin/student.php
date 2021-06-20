<?php
  if(!isset($_SESSION)){
    session_start();
  }

  include('dash_header.php');
  include('../dbConnection.php');

  if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogemail'];
  }else{
    echo "<script> location.href = '../index.php'; </script>";
  }

?>

<div class="col-sm-9 mt-5">
  <!-- Table -->
  <p class="bg-dark text-white p-2">List of Students</p>
  <?php
    $sql = "SELECT * FROM student";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0)
    {
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Student ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      while($row = $result -> fetch_assoc()){
    ?>
      <tr>
        <th scope="row"><?php echo $row['stu_id']; ?></th>
        <td><?php echo $row['stu_name']; ?></td>
        <td><?php echo $row['stu_email']; ?></td>
        <td>
          <form action="edit_student.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value="<?php echo $row['stu_id'];?>">
            <button
              type="submit"
              class="btn btn-info mr-3"
              name="edit"
              value="View"
            >
              <i class="fas fa-pen"></i>
            </button>
          </form>
          
          <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value="<?php echo $row['stu_id'];
            ?>">
            <button
              type="submit"
              class="btn btn-secondary"
              name="delete"
              value="Delete"
            >
              <i class="far fa-trash-alt"></i>
            </button>
          </form>
          
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
    <?php
   } 
   else{
    echo " 0 Result";
   }

   // Deletion Code -------------------------------------------
   if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
    if($conn -> query($sql) == TRUE){
      echo "<meta http-equiv='refresh' content='0;URL=?deleted'/>";
    }
    else{
      echo "Unable to delete..!";
    }
   }


   ?>
</div>
</div>
<!-- div row close from header -->
<div>
  <a href="add_student.php" class="btn btn-danger box">
    <i class="fas fa-plus fa-2x"></i>
  </a>
</div>
</div>
<!-- div conainer-fluid close from header -->
<?php  include('dash_footer.php')?>