<footer class="container-fluid bg-dark text-center p-2">
      <small class="text-white">Copyright &copy; 2020 || Designed By Nehal Ansari || <a href="" data-toggle="modal" data-target="#adminLoginexampleModal"> Admin Login</a></small>
    </footer>
    <!-- End footer -->


    <!-- Registration form model -->   
      <!-- Modal -->
      <div class="modal fade" id="RegisterexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Start Form code for sign up -->
              <?php include('student_registration_form.php');?>
              <!-- Start Form code for sign up -->
            </div>
            <div class="modal-footer">
              <span id="successMsg"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" onclick="addStudent()" class="btn btn-primary" id="signup">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    <!-- End Registration form model -->

    <!-- Start Login form model -->   
      <!-- Modal -->
      <div class="modal fade" id="LoginexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Student Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- Start Login Form code for sign up -->
            <form id="stuLogForm">
              <div class="form-group">
                <i class="fas fa-envelope"></i>
                <label for="email" class="pl-2 font-weight-bold">Email</label>
                <input type="email" name="stuLogemail" class="form-control" id="stuLogemail" aria-describedby="emailHelp" placeholder="Email" required>
              </div>
              <div class="form-group">
                <i class="fas fa-key"></i>
                <label for="password"  class="pl-2 font-weight-bold">Password</label>
                <input type="password" class="form-control" name="stuLogpass" id="stuLogpass" placeholder="Password" required>
              </div>
            </form>
            <!-- Start Login Form code for sign up -->
            </div>
            <div class="modal-footer">
              <small id="statusLogMsg"></small>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button id="stuLogBtn" onclick="stuLoginVerify()" type="button" class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
      </div>
    <!-- End Login form model -->

    <!-- Start Admin Login form model -->   
      <!-- Modal -->
      <div class="modal fade" id="adminLoginexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- Start Admin Login Form code for sign up -->
            <form id="adminLogForm">
              <div class="form-group">
                <i class="fas fa-envelope"></i>
                <label for="email" class="pl-2 font-weight-bold">Email</label>
                <input type="email" name="adminLogemail" class="form-control" id="adminLogemail" aria-describedby="emailHelp" placeholder="Email" required>
              </div>
              <div class="form-group">
                <i class="fas fa-key"></i>
                <label for="password"  class="pl-2 font-weight-bold">Password</label>
                <input type="password" class="form-control" name="adminLogpass" id="adminLogpass" placeholder="Password" required>
              </div>
            </form>
            <!--End Login Form code for sign up -->
            </div>
            <div class="modal-footer">
              <small id="statusAdminLogMsg"></small>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button id="adminLogBtn" type="button" class="btn btn-primary" onclick="adminLoginVerify()">Login</button>
            </div>
          </div>
        </div>
      </div>
    <!-- End Admin Login form model -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <script src="./js/all.min.js"></script>

    <!-- ajax -->
    <script src="./js/ajaxscript.js"></script>
    <script src="./js/admin_ajaxscript.js"></script>

  </body>
</html> 