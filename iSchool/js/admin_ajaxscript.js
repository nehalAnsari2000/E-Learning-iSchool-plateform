
// Ajax call to verify Admin login details
function adminLoginVerify(){
  let adminLogemail = $('#adminLogemail').val();
  let adminLogpass = $('#adminLogpass').val();
  $.ajax({
    url: 'admin/admin.php' ,
    method: 'POST',
    data: {
      checklogin : "checklogin",
      adminLogemail : adminLogemail,
      adminLogpass : adminLogpass
    },
    success: function(data){
      if(data == 0){
        $('#statusAdminLogMsg').html("<small class='alert alert-danger'>Invalid Email ID or Password !</small>");
      }
      else if(data == 1){
        $('#statusAdminLogMsg').html("<small class='alert alert-success'>Success Loading... !</small>");
        window.location.href = "admin/admin_dashboard.php";
      }
      else{
        console.log("Gadbad");
      }
    }

  });
  // console.log("Admin");
}