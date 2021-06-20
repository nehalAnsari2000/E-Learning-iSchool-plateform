<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- fontawesome -->
    <link rel="stylesheet" href="./css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- mystyle -->
    <link rel="stylesheet" href="./css/style.css">

    <title>iSchool</title>
  </head>
  <body>
    <!-- start navigation bar -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 bg-dark">
      <a class="navbar-brand" href="index.php">iSchool</a>
      <span class="navbar-text">Learn and implement</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav custom-nav pl-5">
          <li class="nav-item custom-nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item custom-nav-item">
            <a class="nav-link" href="courses.php">Courses</a>
          </li>
          <li class="nav-item custom-nav-item">
            <a class="nav-link" href="paymentstatus.php">Payment status</a>
          </li>
          <?php
            session_start();
            if(isset($_SESSION['is_login'])){
              echo '          <li class="nav-item custom-nav-item">
              <a class="nav-link" href="student/student_profile.php">My Profile</a>
            </li>
            <li class="nav-item custom-nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>';
            }
            else{
              echo ' <li class="nav-item custom-nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginexampleModal">Login</a>
            </li>
            <li class="nav-item  custom-nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#RegisterexampleModal">Signup</a>
            </li>';
            }
          ?>
          <li class="nav-item  custom-nav-item">
            <a class="nav-link" href="#">Feedback</a>
          </li>
          <li class="nav-item custom-nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
