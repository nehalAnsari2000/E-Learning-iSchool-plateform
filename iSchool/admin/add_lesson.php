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

  if(isset($_REQUEST['lesson_add_btn'])){
    if($_REQUEST['lesson_name'] == "" ||
       $_REQUEST['lesson_desc'] == "" ||
       $_REQUEST['course_id'] == "" ||
       $_REQUEST['course_name'] == "" ||
       $_FILES['lesson_link']['name'] == ""){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill All Fields !</div>";
        echo "<script> console.log('Hello if'); </script>";
    }
    else{
          
          $lesson_name = $_REQUEST['lesson_name'];
          $lesson_desc = $_REQUEST['lesson_desc'];
          $course_id = $_REQUEST['course_id'];
          $course_name = $_REQUEST['course_name'];
          $lesson_link = $_FILES['lesson_link']['name'];
          $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
          $link_folder = '../lesson_videos/'.$lesson_link;
          move_uploaded_file($lesson_link_temp, $link_folder);      
          $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES ('$lesson_name', '$lesson_desc', '$link_folder', '$course_id', '$course_name')";

          if($conn -> query($sql) == TRUE){
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Lesson Added Successfully !</div>";
          }
          else{
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Lesson !</div>";
          }
        // echo "Nehal";
        // echo "<script> console.log('Hello esle'); </script>";
        // $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>In else !</div>";
    }     
  }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Add New Lesson</h3>
<form action="" method="POST" enctype="multipart/form-data" >

  <div class="form-group">
    <label for="course_id">Course ID</label>
    <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id']; }?>" readonly>
  </div>

  <div class="form-group">
    <label for="course_name">Course Name</label>
    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name']; }?>" readonly>
  </div>

  <div class="form-group">
    <label for="lesson_name">Lesson Name</label>
    <input type="text" class="form-control" id="lesson_name" name="lesson_name">
  </div>

  <div class="form-group">
    <label for="lesson_desc">Lesson Description</label>
    <textarea name="lesson_desc" id="lesson_desc" rows="2" class="form-control"></textarea>
  </div>
  
  <div class="form-group">
    <label for="lesson_link">Lesson Link</label>
    <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
  </div>
  
  <div class="text-center">
    <button type="submit" name="lesson_add_btn" class="btn btn-danger" id="lesson_add_btn">Add Lesson</button>
    <a href="lessons.php" class="btn btn-secondary">Close</a>
    <?php if(isset($msg)){ echo $msg; }?>
  </div>

</form>
</div>

</div>
</div>

<?php  include('dash_footer.php')?>