<!-- Start Header and navbar navigation bar -->
<?php include('dbConnection.php')?>
<?php include('header.php')?>
<!-- end navigation bar -->

<!-- Start course page banner -->
<div class="container-fluid">
  <div class="row">
    <img src="image/banner.jpg" alt="banner" style="height: 300px; width: 100%; object-fit: cover; box-shadow: 10px">
  </div>
</div>
<!-- End course page banner -->

<!-- Start main content -->
<div class="container mt-5">
<?php
  if(isset($_GET['course_id'])){
    $course_id = $_GET['course_id'];
    $_SESSION['course_id'] = $course_id;
    $sql = "select * from course where course_id = '$course_id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
  }

?>
  <div class="row">
    <div class="col-md-4">
      <img src="<?php echo str_replace('..','.',$row['course_img'])?>" alt="pic" class="card-image-top img-fluid">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="class-title">Course Name: <?php echo $row['course_name']?></h5>
        <p class="card-text">Description: <?php echo $row['course_desc']?></p>
        <p class="card-text">Duration: <?php echo $row['course_duration']?></p>
        <form action="checkout.php" method="POST">
          <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price']?> </del></small>  <span class="ml-1" style="font-weight:bold;">  &#8377 <?php echo $row['course_price']?></span></p>
          <input type="hidden" name="price" value="<?php echo $row['course_price']?>">
          <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy" >Buy Now</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Lesson no.</td>
          <th scope="col">Lesson Name</td>
        </tr>
      </thead>
      <tbody>
      <?php
        $sql = "select * from lesson where course_id = '$course_id'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
          $num = 0;
          while($row = $result -> fetch_assoc()){
            $num++;
            echo '<tr>
            <th scope="row">'.$num.'</th>
            <td>'.$row['lesson_name'].'</td>
          </tr>';
          }
        }
        
      ?>
        
      </tbody>
    </table>
  </div>
</div>
<!-- End main content -->

<!-- Start footer -->

  <?php include('footer.php')?>

<!-- End footer -->