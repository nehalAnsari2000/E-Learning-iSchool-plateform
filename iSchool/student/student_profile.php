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

$sql = "select * from student where stu_email = '$stuLogEmail'";
$result = $conn -> query($sql);
if($result -> num_rows == 1){
  $row = $result -> fetch_assoc();
  $stu_id = $row['stu_id'];
  $stu_name = $row['stu_name'];
  $stu_email = $row['stu_email'];
  $stu_occ = $row['stu_occ'];
  $stu_img = $row['stu_img'];
}

if(isset($_REQUEST['update_std_btn'])){
  if(
    $_REQUEST['stu_id'] == "" ||
    $_REQUEST['stu_name'] == "" ||
    $_REQUEST['stu_email'] == "" ||
    $_REQUEST['stu_occ'] == "" 
    ){
      $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>Fill All the Fields</div>";
    }
    else{
      $stu_id = $_REQUEST['stu_id'];
      $stu_name = $_REQUEST['stu_name'];
      $stu_email = $_REQUEST['stu_email'];
      $stu_occ = $_REQUEST['stu_occ'];
      $stu_img = $_FILES['stu_img']['name'];
      $stu_img_temp = $_FILES['stu_img']['tmp_name'];
      $img_folder = '../image/student/'.$stu_img;
      move_uploaded_file($stu_img_temp, $img_folder);
      $sql = "update student set stu_name = '$stu_name', stu_email = '$stu_email', stu_occ = '$stu_occ', stu_img = '$img_folder' where stu_id = '$stu_id' ";
      if($conn -> query($sql)){
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2' role='alert'>Updated Successfully...! </div>";
      }else{
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2' role='alert'>Unable to Update...!</div>";
      }
    }

}








?>

<div class="col-sm-6 mt-5">
  <form action="" method="POST" enctype="multipart/form-data" class="mx-5">

    <div class="form-group">
      <label for="stu_id">Student ID</label>
      <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($stu_id)){echo $stu_id ; }?>" readonly>
    </div>

    <div class="form-group">
      <label for="stu_email">Email</label>
      <input type="email" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($stu_email)){echo $stu_email ; }?>" readonly>
    </div>

    <div class="form-group">
      <label for="stu_name">Name</label>
      <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($stu_name)){echo $stu_name ; }?>" >
    </div>

    <div class="form-group">
      <label for="stu_occ">Occupation</label>
      <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($stu_occ)){echo $stu_occ ; }?>" >
    </div>

    <div class="form-group">
      <label for="stu_img">Upload Image</label>
      <input type="file" class="form-control-file" id="stu_img" name="stu_img" value="<?php if(isset($stu_img)){echo $stu_img ; }?>" >
    </div>

    <button type="submit" class="btn btn-primary" name="update_std_btn">Update</button>

    <?php if(isset($msg)){echo $msg;}?>

  </form>
</div>









<?php
include('student_include/footer.php');
?>