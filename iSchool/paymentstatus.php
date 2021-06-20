<!-- Start Header and navbar navigation bar -->
<?php include('header.php')?>
<!-- end navigation bar -->

<!-- Start course page banner -->
<div class="container-fluid">
  <div class="row">
    <img src="image/banner.jpg" alt="banner" style="height: 400px; width: 100%; object-fit: cover; box-shadow: 10px">
  </div>
</div>
<!-- End course page banner -->

<!-- Start payment status form -->
<div class="container">
  <h2 class="text-center my-4">Payment Status</h2>
  <form action="" method="POSt">
  <div class="form-group row">
    <label class="offset-sm-3 col-form-label">Order ID: </label>
    <div>
      <input type="text" class="form-control mx-3">
    </div>
    <div>
      <input type="submit" class="btn btn-primary mx-4" value="View">
    </div>
  </div>
  </form>
</div>
<!-- End payment status form -->


 <!-- Start contact us -->
 <?php include('contact.php')?>
  <!-- End contact us -->


<!-- Start footer -->
<?php include('footer.php')?>
<!-- End footer -->