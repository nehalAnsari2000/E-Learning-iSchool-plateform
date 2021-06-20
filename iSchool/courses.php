<!-- Start Header and navbar navigation bar -->
  <?php include('dbConnection.php')?>
  <?php include('header.php')?>

<!-- end navigation bar -->

<!-- Start course page banner -->
<div class="container-fluid">
  <div class="row">
    <img src="image/banner.jpg" alt="banner" style="height: 400px; width: 100%; object-fit: cover; box-shadow: 10px">
  </div>
</div>
<!-- End course page banner -->

<!-- Start All Courses -->
    <div class="container mt-5">
      <h1 class="text-center">All Courses</h1>
      <div class="row mt-4">
      <?php
        $sql = "select * from course";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            $course_id = $row['course_id'];
            echo '<div class="col-sm-4 mb-2">
            <a href="./coursedetail.php?course_id='.$course_id.'" style="text-align: left; padding:0px; class="btn" >
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src='.str_replace('..','.',$row['course_img']
              ).' alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">'.$row['course_name'].'</h5>
                <p class="card-text">'.$row['course_desc'].'</p>
              </div>
              <div class="card-footer">
                <p class="card-text d-inline-block">Price : 
                  <small>
                    <del>&#8377 '.$row['course_original_price'].'</del>
                  </small>
                  <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span> 
                  </p>
                  <a class="btn btn-primary text-white font-weight-bolder float-right" href="./coursedetail.php?course_id='.$course_id.'">Enroll
                  </a>
                  </div>
                  </div>
                  </a></div>
          ';    
          }
        }

      ?>
      </div>
    </div>
<!-- End All Courses -->

<!-- Start footer -->
  <?php include('footer.php')?>
<!-- End footer -->