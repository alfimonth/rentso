<?php
session_start();
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
  <!--Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>/css/bootstrap.min.css" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>/css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>/css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="<?= base_url('assets/'); ?>/css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="<?= base_url('assets/'); ?>/css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="<?= base_url('assets/'); ?>/css/font-awesome.min.css" rel="stylesheet">

  <!-- SWITCHER -->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="<?= base_url('assets/'); ?>/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>/switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>/switcher/css/purple.css" title="purple" media="all" />

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/'); ?>/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/'); ?>/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/'); ?>/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/'); ?>/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?= base_url('assets/'); ?>/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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

      <!-- Scripts -->
      <script src="<?= base_url('assets/'); ?>/js/jquery.min.js"></script>
      <script src="<?= base_url('assets/'); ?>/js/bootstrap.min.js"></script>
      <script src="<?= base_url('assets/'); ?>/js/interface.js"></script>
      <!--Switcher-->
      <script src="<?= base_url('assets/'); ?>/switcher/js/switcher.js"></script>
      <!--bootstrap-slider-JS-->
      <script src="<?= base_url('assets/'); ?>/js/bootstrap-slider.min.js"></script>
      <!--Slider-JS-->
      <script src="<?= base_url('assets/'); ?>/js/slick.min.js"></script>
      <script src="<?= base_url('assets/'); ?>/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->

</html>