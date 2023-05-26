<?php
session_start();
error_reporting(0);
include('templates/config.php');
if (isset($_POST['send'])) {
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $message = $_POST['message'];
  $sql1 = "INSERT INTO contactus (nama_visit,email_visit,telp_visit,pesan) VALUES('$name','$email','$contactno','$message')";
  $lastInsertId = mysqli_query($koneksidb, $sql1);
  if ($lastInsertId) {
    $msg = "Pesan Terkirim. Kami akan menghubungi anda secepatnya.";
  } else {
    $error = "Terjadi Kesalahan! Silahkan coba lagi.";
  }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Rental Mobil</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.transitions.css" type="text/css">
  <!--slick-slider -->
  <link href="<?= base_url('assets/'); ?>css/slick.css" rel="stylesheet">
  <!--bootstrap-slider -->
  <link href="<?= base_url('assets/'); ?>css/bootstrap-slider.min.css" rel="stylesheet">
  <!--FontAwesome Font Style -->
  <link href="<?= base_url('assets/'); ?>css/font-awesome.min.css" rel="stylesheet">

  <!-- SWITCHER -->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="<?= base_url('assets/'); ?>switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/'); ?>switcher/css/purple.css" title="purple" media="all" />

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <style>
    .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
  </style>
</head>

<body>

  <!-- Start Switcher -->
  <?php include('templates/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include('templates/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class="page-header contactus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Hubungi Kami</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Hubungi Kami</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Contact-us-->
  <section class="contact_us section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Ada Pertanyaan?Silahkan Isi Form Berikut </h3>
          <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
          <div class="contact_form gray-bg">
            <form method="post">
              <div class="form-group">
                <label class="control-label">Full Name <span>*</span></label>
                <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email Address <span>*</span></label>
                <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
              </div>
              <div class="form-group">
                <label class="control-label">Phone Number <span>*</span></label>
                <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required>
              </div>
              <div class="form-group">
                <label class="control-label">Message <span>*</span></label>
                <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <button class="btn" type="submit" name="send" type="submit">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Info Kontak</h3>
          <div class="contact_detail">
            <?php
            $pagetype = $_GET['type'];
            $sql1 = "SELECT * from contactusinfo";
            $query1 = mysqli_query($koneksidb, $sql1);
            if (mysqli_num_rows($query1) > 0) {
              while ($result = mysqli_fetch_array($query1)) {
            ?>
                <ul>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="contact_info_m">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.24341515192!2d110.82757327400496!3d-7.548413692465172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a169541c2991d%3A0xb1763d1602f8329f!2sUniversitas%20Bina%20Sarana%20Informatika%20Kampus%20Solo%20(Universitas%20BSI%20Solo)!5e0!3m2!1sid!2sid!4v1685030171637!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      <?php echo htmlentities($result['alamat_kami']); ?>
                    </div>
                  </li>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><a href=""><?php echo htmlentities($result['email_kami']); ?></a></div>
                  </li>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><a href=""><?php echo htmlentities($result['telp_kami']); ?></a></div>
                  </li>
                </ul>
            <?php }
            } ?>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /Contact-us-->


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
  <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/interface.js"></script>
  <!--Switcher-->
  <script src="<?= base_url('assets/'); ?>switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS-->
  <script src="<?= base_url('assets/'); ?>js/bootstrap-slider.min.js"></script>
  <!--Slider-JS-->
  <script src="<?= base_url('assets/'); ?>js/slick.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->

</html>