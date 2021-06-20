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
  
// Edit Admin Password 
  if(isset($_REQUEST['change_pass'])){
    if($_REQUEST['admin_email'] == "" ||
       $_REQUEST['admin_pass'] == ""
      ){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields !</div>";
      }
      else{
        $admin_email = $_REQUEST['admin_email'];
        $admin_pass = $_REQUEST['admin_pass'];
        
        $sql = "UPDATE admin SET admin_pass = '$admin_pass' WHERE admin_email = '$admin_email'";

        if($conn -> query($sql) == TRUE){
          $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Password Updated Successfully !</div>";
        }
        else{
          $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update Password !</div>";
        }


      }
  }

?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Student Details</h3>

<?php
 $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
 $result = $conn -> query($sql);
 $row = $result -> fetch_assoc();

?>

<form action="" method="POST" enctype="multipart/form-data" >

  <div class="form-group">
    <label for="admin_email">Email</label>
    <input type="email" class="form-control" id="admin_email" name="admin_email" value="<?php if(isset($row['admin_email'])){echo $row['admin_email'];}?>" readonly>
  </div>

  <div class="form-group">
    <label for="admin_pass">Password</label>
    <input type="text" class="form-control" id="admin_pass" name="admin_pass" value="<?php if(isset($row['admin_pass'])){echo $row['admin_pass'];}?>">
  </div>
  
  <div class="text-center">
    <button type="submit" name="change_pass" class="btn btn-danger" id="change_pass">Change Password</button>
    <a href="./admin_dashboard.php" class="btn btn-secondary">Close</a>
    <?php if(isset($msg)){ echo $msg; }?>
  </div>

</form>
</div>

</div>
</div>

<?php  include('dash_footer.php')?>