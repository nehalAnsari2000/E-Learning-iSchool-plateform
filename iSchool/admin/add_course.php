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

  if(isset($_REQUEST['courseSubmitBtn'])){
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

        $sql = "INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) VALUES ('$course_name', '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";

        if($conn -> query($sql) == TRUE){
          $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Course Added Successfully !</div>";
        }
        else{
          $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Course !</div>";
        }


      }
  }
  

  
  
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Add New Course</h3>
<form action="" method="POST" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="course_name">Course Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name">
  </div>
  <div class="form-group">
    <label for="course_desc">Course Description</label>
    <textarea name="course_desc" id="course_desc" rows="2" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="course_author">Author</label>
    <input type="text" class="form-control" id="course_author" name="course_author">
  </div>
  <div class="form-group">
    <label for="course_duration">Course Duration</label>
    <input type="text" class="form-control" id="course_duration" name="course_duration">
  </div>
  <div class="form-group">
    <label for="course_original_price">Course Original Price</label>
    <input type="text" class="form-control" id="course_original_price" name="course_original_price">
  </div>
  <div class="form-group">
    <label for="course_price">Course Selling Price</label>
    <input type="text" class="form-control" id="course_price" name="course_price">
  </div>
  <div class="form-group">
    <label for="course_img">Course Image</label>
    <input type="file" class="form-control-file" id="course_img" name="course_img">
  </div>
  <div class="text-center">
    <button type="submit" name="courseSubmitBtn" class="btn btn-danger" id="courseSubmitBtn">Submit</button>
    <a href="course.php" class="btn btn-secondary">Close</a>
    <?php if(isset($msg)){ echo $msg; }?>
  </div>
</form>
</div>

</div>
</div>

<?php  include('dash_footer.php')?>