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
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470; ">
      <a href="admin_dashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">iSchool <small class="text-white">Admin Area</small></a>
    </nav>


    <!-- Side bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
      <div class="row">
        <nav class="col-sm-4 col-md-3 bg-light sidebar py-5 d-print-none" >
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="admin_dashboard.php" class="nav-link">
                  <i class="fas fa-tachometer-alt"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a href="course.php" class="nav-link">
                  <i class="fab fa-accessible-icon"></i>
                  Courses
                </a>
              </li>
              <li class="nav-item">
                <a href="lessons.php" class="nav-link">
                  <i class="fab fa-accessible-icon"></i>
                  Lessons
                </a>
              </li>
              <li class="nav-item">
                <a href="./student.php" class="nav-link">
                  <i class="fas fa-users"></i>
                  Students
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-table"></i>
                  Sell Report
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-table"></i>
                  Payment Status
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_change_pass.php" class="nav-link">
                  <i class="fas fa-key"></i>
                  Change Password
                </a>
              </li>
              <li class="nav-item">
                <a href="../logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </nav>