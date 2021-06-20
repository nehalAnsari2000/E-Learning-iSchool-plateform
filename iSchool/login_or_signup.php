
<?php include('dbConnection.php')?>
<?php include('header.php')?>


<!-- Start course page banner -->
<div class="container-fluid">
  <div class="row">
    <img src="image/banner.jpg" alt="banner" style="height: 400px; width: 100%; object-fit: cover; box-shadow: 10px">
  </div>
</div>
<!-- End course page banner -->


<div class="container jumbotron mb-5">
  <div class="row">
    <div class="col-md-4">
      <h5 class="mb-5">If Already Registered!! Login</h5>
      <form action="" role="form" id="stuLoginForm">

        <div class="form-group">
          <i class="fas fa-envelope"></i>
          <label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label>
          <small id="statusLogMsg1"></small>
          <input type="email" class="form-control" placeholder="email" name="stuLogEmail" id="stuLogEmail">
        </div>

        <div class="form-group">
          <i class="fas fa-key"></i>
          <label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
          <input type="password" class="form-control" placeholder="password" name="stuLogPass" id="stuLogPass">
        </div>

        <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
        </form><br>
        <small id="statusLogMsg"></small>
    </div>

    <div class="col-md-6 offset-md-1">
      <h5 class="mb-3">New User!! Sign Up</h5>
      <form action="" role="form" id="stuRegForm">

        <div class="form-group">
          <i class="fas fa-user"></i>
          <label for="stuname" class="pl-2 form-weight-bold">Name</label>
          <small id="statusMsg1"></small>
          <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
        </div>

        <div class="form-group">
          <i class="fas fa-envelope"></i>
          <label for="stuemail" class="pl-2 font-weight-bold">Email</label>
          <small id="statusMsg2"></small>
          <input type="email" class="form-control" placeholder="email" name="stuemail" id="stuemail">
          <small class="from-text">We will never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <i class="fas fa-key"></i>
          <label for="stupass" class="pl-2 font-weight-bold">Password</label>
          <small id="statusMsg2"></small>
          <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
        </div>

        <button type="button" class="btn btn-primary" id="signup" onclick="addStu()">Sign Up</button>
        </form><br>
        <small id="successMsg"></small>
    </div>
  </div>
</div>
<hr>



<!-- Contact Us Page -->
<?php include('contact.php')?>

<!-- Start footer -->
<?php include('footer.php')?>
<!-- End footer -->