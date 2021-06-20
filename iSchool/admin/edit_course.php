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
  
// Update Course
  if(isset($_REQUEST['courseEditBtn'])){
    if($_REQUEST['course_name'] == "" ||
       $_REQUEST['course_desc'] == "" ||
       $_REQUEST['course_author'] == ""||
       $_REQUEST['course_duration'] == "" ||
       $_REQUEST['course_original_price'] == "" ||
       $_REQUEST['course_price'] == "" ||
       $_FILES['course_img']['name'] == ""
      ){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields !</div>";
      }
      else{
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_price = $_REQUEST['course_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder ="../image/course_image/".$course_image;
        move_uploaded_file($course_image_temp, $img_folder); 

      $sql = "UPDATE course SET course_name = '$course_name', course_desc = '$course_desc', course_author = '$course_author', course_img = '$img_folder', course_duration = '$course_duration', course_price = '$course_price', course_original_price = '$course_original_price' WHERE course_id = '$course_id'";

        if($conn -> query($sql) == TRUE){
          $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Course Updated Successfully !</div>";
        }
        else{
          $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update Course !</div>";
        }


      }
  }




?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Course Details</h3>

<?php
 if(isset($_REQUEST['edit'])){
 $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
 $result = $conn -> query($sql);
 $row = $result -> fetch_assoc();

 }
?>

<form action="" method="POST" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="course_id">Course ID</label>
    <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){echo $row['course_id'];}?>" readonly>
  </div>
  <div class="form-group">
    <label for="course_name">Course Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){echo $row['course_name'];}?>">
  </div>
  <div class="form-group">
    <label for="course_desc">Course Description</label>
    <textarea name="course_desc" id="course_desc" rows="2" class="form-control"><?php if(isset($row['course_desc'])){echo $row['course_desc'];}?></textarea>
  </div>
  <div class="form-group">
    <label for="course_author">Author</label>
    <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])){echo $row['course_author'];}?>">
  </div>
  <div class="form-group">
    <label for="course_duration">Course Duration</label>
    <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])){echo $row['course_duration'];}?>">
  </div>
  <div class="form-group">
    <label for="course_original_price">Course Original Price</label>
    <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if(isset($row['course_original_price'])){echo $row['course_original_price'];}?>">
  </div>
  <div class="form-group">
    <label for="course_price">Course Selling Price</label>
    <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if(isset($row['course_price'])){echo $row['course_price'];}?>">
  </div>
  <div class="form-group">
    <label for="course_img">Course Image</label>
    <img src="<?php if(isset($row['course_img'])){echo $row['course_img'];}?>" alt="" class="img-thumbnail">
    <input type="file" class="form-control-file" id="course_img" name="course_img">
  </div>
  <div class="text-center">
    <button type="submit" name="courseEditBtn" class="btn btn-danger" id="courseEditBtn">Update</button>
    <a href="course.php" class="btn btn-secondary">Close</a>
    <?php if(isset($msg)){ echo $msg; }?>
  </div>
</form>
</div>

</div>
</div>

<?php  include('dash_footer.php')?>