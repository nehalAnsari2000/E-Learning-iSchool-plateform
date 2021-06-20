<?php
if(!isset($_SESSION)){
  session_start();
}

include('student_include/header.php');

if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
}
else{
  echo "<script> location.href = '../index.php' ; </script>";
}

// Edit Student Password 
  if(isset($_REQUEST['stu_change_pass'])){
    if(
       $_REQUEST['stu_pass'] == ""
      ){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields !</div>";
      }
      else{
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_id = $_REQUEST['stu_id'];
        
        $sql = "UPDATE student SET stu_pass = '$stu_pass' WHERE stu_id = '$stu_id'";

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
<h3 class="text-center">Update Student Password</h3>

<?php
 $sql = "SELECT * FROM student WHERE stu_email = '$stuLogEmail'";
 $result = $conn -> query($sql);
 $row = $result -> fetch_assoc();
?>

<form action="" method="POST" enctype="multipart/form-data" >

  <div class="form-group">
    <label for="stu_id">Student ID</label>
    <input type="email" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($row['stu_id'])){echo $row['stu_id'];}?>" readonly>
  </div>

  <div class="form-group">
    <label for="stu_email">Email</label>
    <input type="email" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];}?>" readonly>
  </div>

  <div class="form-group">
    <label for="stu_pass">Password</label>
    <input type="text" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($row['stu_pass'])){echo $row['stu_pass'];}?>">
  </div>
  
  <div class="text-center">
    <button type="submit" name="stu_change_pass" class="btn btn-danger" id="change_pass">Change Password</button>
    <a href="./student_profile.php" class="btn btn-secondary">Close</a>
    <?php if(isset($msg)){ echo $msg; }?>
  </div>

</form>
</div>

</div>
</div>

<?php
include('student_include/footer.php');
?>