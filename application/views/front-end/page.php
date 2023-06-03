<?php
error_reporting(0);
include('templates/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Halaman | Rentso.</title>
  <?php include('templates/style.php'); ?>
</head>

<body>
  <!-- Start Switcher -->
  <?php include('templates/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include('templates/header.php'); ?>
  <?php
  // $pagetype=$_GET['type'];
  $pagetype = $type;
  $sql = "SELECT * from tblpages where type='$pagetype'";
  $query = mysqli_query($koneksidb, $sql);
  if (mysqli_num_rows($query) >= 1) {
    while ($results = mysqli_fetch_array($query)) { ?>
      <section class="page-header aboutus_page">
        <div class="container">
          <div class="page-header_wrap">
            <div class="page-heading">
              <h1><?php echo htmlentities($results['PageName']); ?></h1>
            </div>
            <ul class="coustom-breadcrumb">
              <li><a href="#">Home</a></li>
              <li><?php echo htmlentities($results['PageName']); ?></li>
            </ul>
          </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
      </section>
      <section class="about_us section-padding">
        <div class="container">
          <div class="section-header text-center">
            <h2><?php echo htmlentities($results['PageName']); ?></h2>
            <p><?php echo $results['detail']; ?> </p>
          </div>
      <?php }
  } ?>
        </div>
      </section>
      <!-- /About-us-->

      <!--Footer -->
      <?php include('templates/footer.php'); ?>
      <!-- /Footer-->

      <!--Back to top-->
      <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
      <!--/Back to top-->

      <!--Login-Form -->
      <?php include('templates/login.php'); ?>
      <!--/Login-Form -->

      <!--Register-Form -->
      <?php include('templates/registration.php'); ?>

      <!--/Register-Form -->

      <!--Forgot-password-Form -->
      <?php include('templates/forgotpassword.php'); ?>
      <!--/Forgot-password-Form -->

      <?php include('templates/script.php'); ?>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->

</html>