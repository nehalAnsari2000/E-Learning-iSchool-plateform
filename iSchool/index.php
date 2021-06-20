    <!-- Start Header and navbar navigation bar -->
    <?php include('dbConnection.php')?>
    <?php include('header.php')?>
    <!-- end navigation bar -->

    <!-- start video background -->
    <div class="container-fluid">
      <div class="vid-parent remove-vid-marg">
        <video playsinline autoplay muted loop>
          <source src="video/vid.mp4">
        </video>
        <div class="vid-overlay"></div>
      </div>
      <div class="vid-content">
        <h1 class="my-content">Welcome to iSchool</h1>
        <small class="my-content">Learn and Implement</small><br>
        <!-- Button trigger modal -->
        <?php
        if(isset($_SESSION['is_login'])){
          echo '<a href="student/student_profile.php" class="btn btn-lg btn-primary mt-4" >My Profile</a>';
        }else{
          echo '<a href="#" class="btn btn-lg btn-danger mt-4" data-toggle="modal" data-target="#RegisterexampleModal">Get Started</a>';
        }
        ?>
      </div>
    </div>
    <!-- end video background -->

    <!-- Start text banner -->
    <div class="container-fluid bg-danger txt-banner">
      <div class="row bottom-banner">
        <div class="col-sm">
          <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
        </div>
        <div class="col-sm">
          <h5><i class="fas fa-rupee-sign mr-2"></i> Money Back Guarantee*</h5>
        </div>
        
      </div>
    </div>
    <!-- End text banner -->

    <!-- Start most popular courses -->
    <div class="container mt-5">
      <h1 class="text-center">Popular Courses</h1>
      <!-- Start most popular course 1st card deck -->
      <div class="card-deck mt-4">
        <?php
          $sql = "SELECT * FROM course LIMIT 3";
          $result = $conn -> query($sql);
          if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
              $course_id = $row['course_id'];
              echo '<a href="./coursedetail.php?course_id='.$course_id.'" style="text-align: left; padding:0px; margin:0px; text-decoration: none" >
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
                    </a>
            ';
            }
          }
        ?>
            
      </div>

      <div class="card-deck mt-4">
      <?php
          $sql = "SELECT * FROM course LIMIT 3, 3";  // LIMIT 3,3 for next 3 
          $result = $conn -> query($sql);
          if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
              $course_id = $row['course_id'];
              echo '<a href="./coursedetail.php?course_id='.$course_id.'" style="text-align: left; padding:0px; margin:0px; text-decoration: none" >
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
                    </a>
            ';
            }
          }
        ?>
      </div>
      

      <div class="text-center m-2">
        <a href="courses.php" class="btn btn-danger btn-sm">View All Courses</a>
      </div>
    </div>
    <!-- End most popular courses -->

    <!-- Start contact us -->
    <?php include('contact.php')?>
    <!-- End contact us -->

    <!-- Start social follow -->
    <div class="container-fluid bg-danger">
      <div class="row text-white text-center p-1">
        <div class="col-sm">
          <a href="#" class="text-white social-hour">
          <i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
        <div class="col-sm">
          <a href="#" class="text-white social-hour">
          <i class="fab fa-twitter"></i> Twitter</a>
        </div>
        <div class="col-sm">
          <a href="#" class="text-white social-hour">
          <i class="fab fa-whatsapp"></i> Whatsapp</a>
        </div>
        <div class="col-sm">
          <a href="#" class="text-white social-hour">
          <i class="fab fa-instagram"></i> Instagram</a>
        </div>
      </div>
    </div>
    <!-- End social follow -->
    
    <!-- Start about us  section -->
    <div class="container-fluid p-4" style="background-color: #E9ECEf">
      <div class="container" style="background-color: #E9ECEf">
        <div class="row text-center">
          <div class="col-sm">
            <h5>About US</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi ex cumque non sit nihil a perferendis dolorem et, facere illum!</p>
          </div>
          <div class="col-sm">
            <h5>Category</h5>
            <a href="#" class="text-dark">Web Development</a><br>
            <a href="#" class="text-dark">Web Designing</a><br>
            <a href="#" class="text-dark">Android App Development</a><br>
            <a href="#" class="text-dark">iOS Development</a><br>
            <a href="#" class="text-dark">Data Analysis</a><br>
          </div>
          <div class="col-sm">
            <h5>Contact US</h5>
            <p>iSchool Pvt Ltd <br>Near Police Camp II <br>Bokaro, Jharkhand <br>Ph - 78666564</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End about us  section -->

    <!-- Start footer -->
    <?php include('footer.php')?>
    <!-- End footer -->