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

    
    if(isset($_REQUEST['lesson_close_btn'])){
      echo "<script> location.href = './lessons.php'; </script>";

    }

  if(isset($_REQUEST['lesson_edit_btn'])){
    if($_REQUEST['lesson_id'] == "" ||
        $_REQUEST['lesson_name'] == "" ||
        $_REQUEST['lesson_desc'] == "" ||
        $_REQUEST['course_id'] == "" ||
        $_REQUEST['course_name'] == "" ||
        $_FILES['lesson_link']['name'] == ""
      ){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields !</div>";
      }
      else{
        $lesson_id = $_REQUEST['lesson_id'];
        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
        $link_folder = '../lesson_videos/'.$lesson_link;
        move_uploaded_file($lesson_link_temp, $link_folder);    

      $sql = "UPDATE lesson SET lesson_name = '$lesson_name', lesson_desc = '$lesson_desc', lesson_link = '$link_folder' WHERE lesson_id = '$lesson_id'";

        if($conn -> query($sql) == TRUE){
          $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Lesson Updated Successfully !</div>";
          // echo "<script> location.href = './lessons.php'; </script>";
        }
        else{
          $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update Lesson !</div>";
        }


      }
  }




?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Course Details</h3>

<?php
 if(isset($_REQUEST['edit'])){
 $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
 $result = $conn -> query($sql);
 $row = $result -> fetch_assoc();
 }
?>

<form action="" method="POST" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="lesson_id">Lesson ID</label>
    <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){echo $row['lesson_id'];}?>" readonly>
  </div>
  <div class="form-group">
    <label for="lesson_name">Lesson Name</label>
    <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])){echo $row['lesson_name'];}?>">
  </div>
  <div class="form-group">
    <label for="lesson_desc">Lesson Description</label>
    <textarea name="lesson_desc" id="lesson_desc" rows="2" class="form-control"><?php if(isset($row['lesson_desc'])){echo $row['lesson_desc'];}?></textarea>
  </div>
  <div class="form-group">
    <label for="course_id">Course ID</label>
    <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){echo $row['course_id'];}?>" readonly>
  </div>
  <div class="form-group">
    <label for="course_name">Course Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){echo $row['course_name'];}?>" readonly>
  </div>

  <div class="form-group">
    <label for="lesson_link">Lesson Link</label>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe src="<?php if(isset($row['lesson_link'])){ echo $row['lesson_link']; } ?>" class="embed-responsive-item" allowfullscreen></iframe>  
      </div>
    <input type="file" class="form-control" id="lesson_link" name="lesson_link">
  </div>

  <div class="text-center">
    <button type="submit" name="lesson_edit_btn" class="btn btn-danger" id="lesson_edit_btn">Update</button>
    <button type="submit" name="lesson_close_btn" class="btn btn-secondary">Close</button>
    <?php if(isset($msg)){ echo $msg; }?>
  </div>
</form>
</div>

</div>
</div>

<?php  include('dash_footer.php')?>