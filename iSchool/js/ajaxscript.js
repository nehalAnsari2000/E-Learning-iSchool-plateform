$(document).ready(function(){
  // Ajax call for already exist email verification
  $('#stuemail').on('keypress blur', function(){
    var stuemail = $('#stuemail').val();
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    $.ajax({
      url: 'student/addstudent.php' ,
      method: 'POST',
      //dataType: 'json',
      data: {
        checkemail:"checkemail",
        stuemail:stuemail
      },
      success: function(data){
        if(data != 0){
          $('#statusMsg2').html('<small style="color:red">Email Already used !</small>');          
          $("#signup").attr('disabled', true);
        }else if(data == 0 && reg.test(stuemail)){
          $('#statusMsg2').html('<small style="color:green">There You GO !</small>');          
          $("#signup").attr('disabled', false);
        }else if(!reg.test(stuemail)){
          $('#statusMsg2').html('<small style="color:red">Please Enter Valid Email e.g example@mail.com !</small>');      
        }
        if(stuemail = ""){
          $('#statusMsg2').html('<small style="color:red">Please Enter Email e.g example@mail.com !</small>');      
        }
        
      }

    });
  });
});



// Sign Up
function addStudent(){
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var stuname = $('#stuname').val();
  var stuemail = $('#stuemail').val();
  var stupass = $('#stupass').val();

  // checking form fields on form submission
  if(stuname.trim() == ""){
    $('#statusMsg1').html('<small style="color:red">Please Enter Name !</small>');
    $('#stuname').focus();
    return false;
  }
  else if(stuemail.trim() == ""){
    $('#statusMsg2').html('<small style="color:red">Please Enter Email !</small>');
    $('#stuemail').focus();
    return false;
  }
  else if(stuemail.trim() != "" && !reg.test(stuemail)){
    $('#statusMsg2').html('<small style="color:red">Please Enter Valid Email e.g example@mail.com !</small>');
    $('#stuemail').focus();
    return false;
  }
  else if(stupass.trim() == ""){
    $('#statusMsg3').html('<small style="color:red">Please Enter Password !</small>');
    $('#stupass').focus();
    return false;
  }
  else{
    $.ajax({
      url: 'student/addstudent.php',
      method: 'POST',
      dataType: 'json',
      data: {
        stusignup: "stusignup",
        stuname: stuname,
        stuemail: stuemail,
        stupass: stupass
      },
      success: function(data){
        if( data == "OK"){
          $('#successMsg').html('<span class="alert alert-success">Registration successfull !</span>');
          clearField();
        }else if( data == "Failed"){
          $('#successMsg').html('<span class="alert alert-danger">Unable to Register !</span>');
        }
       
      }

    });
  }
}

// clear form after submission
function clearField(){
  $('#signupForm').trigger('reset');
  $('#statusMsg1').html("");
  $('#statusMsg2').html("");
  $('#statusMsg3').html("");
}


// Ajax call to verify Student login details
function stuLoginVerify(){
  let stuLogEmail = $('#stuLogemail').val();
  let stuLogPass = $('#stuLogpass').val();
  $.ajax({
    url: 'student/addstudent.php' ,
    method: 'POST',
    data: {
      checklogin : "checklogin",
      stuLogEmail : stuLogEmail,
      stuLogPass : stuLogPass
    },
    success: function(data){
      if(data == 0){
        $('#statusLogMsg').html("<small class='alert alert-danger'>Invalid Email ID or Password !</small>");
      }
      else if(data == 1){
        $('#statusLogMsg').html("<div class='spinner-border text-success' role='status'><span class='sr-only'>Loading...</span></div>");
        window.location.href = "index.php";
      }
    }

  });
}