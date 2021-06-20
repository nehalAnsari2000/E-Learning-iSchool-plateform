<?php

include_once('../dbConnection.php');
if(!isset($_SESSION)){
  session_start();
}
if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
}
else{
  echo "<script> location.href = '../index.php' ; </script>";
}

if(isset($stuLogEmail)){
  $sql = "select stu_img from student where stu_email = '$stuLogEmail'";
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();
  $stu_img = $row['stu_img'];
}

?>

<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <!-- fontawesome -->
     <link rel="stylesheet" href="../css/all.min.css">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

      <!-- mystyle -->
      <link rel="stylesheet" href="../css/admin_style.css">


    <title>iSchool Dashboard</title>
  </head>
  <body>
    <!-- Top Navbar  -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470; ">
      <a href="student_profile.php.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-Learning</a>
    </nav>


    <!-- Side bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
      <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 d-print-none" >
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item mb-3">
                <img src="<?php echo $stu_img; ?>" alt="student image" class="img-thumbnail rounded-circle">
              </li>
              <li class="nav-item">
                <a href="student_profile.php" class="nav-link">
                  <i class="fas fa-user"></i>
                  Profile
                </a>
              </li>
              <li class="nav-item">
                <a href="my_course.php" class="nav-link">
                  <i class="fab fa-accessible-icon"></i>
                  My Courses
                </a>
              </li>
              <li class="nav-item">
                <a href="student_change_pass.php" class="nav-link">
                  <i class="fas fa-key"></i>
                  Change Password
                </a>
              
              <li class="nav-item">
                <a href="../logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </nav>