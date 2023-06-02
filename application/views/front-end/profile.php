<?php
error_reporting(0);
include('templates/config.php');
if (strlen($_SESSION['ulogin']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['updateprofile'])) {
    $name = $_POST['fullname'];
    $mobileno = $_POST['mobilenumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $sql = "UPDATE users SET nama_user='$name',telp='$mobileno',alamat='$address' WHERE email='$email'";
    $query = mysqli_query($koneksidb, $sql);
    if ($query) {
      $msg = "Profile berhasi diupdate.";
    } else {
      echo "No Error : " . mysqli_errno($koneksidb);
      echo "<br/>";
      echo "Pesan Error : " . mysqli_error($koneksidb);
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
    <title>Rental Mobil | My Profile</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.mini.css" type="text/css">
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
    <script type="text/javascript">
      function checkLetter(theform) {
        pola_nama = /^[a-zA-Z .]*$/;
        if (!pola_nama.test(theform.fullname.value)) {
          alert('Hanya huruf yang diperbolehkan untuk Nama!');
          theform.fullname.focus();
          return false;
        }
        return (true);
      }
    </script>

  </head>

  <body>

    <!-- Start Switcher -->
    <?php include('templates/colorswitcher.php'); ?>
    <!-- /Switcher -->

    <!--Header-->
    <?php include('templates/header.php'); ?>
    <!-- /Header -->
    <!--Page Header-->
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Profil Anda</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Profile</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->


    <?php
    $useremail = $_SESSION['ulogin'];
    $sql = "SELECT * from users where email='$useremail'";
    $query = mysqli_query($koneksidb, $sql);
    while ($result = mysqli_fetch_array($query)) {
    ?>
      <section class="user_profile inner_pages">
        <div class="container">
          <div class="user_profile_info">

            <div class="col-md-12 col-sm-10">
              <?php
              if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
              <form method="post" name="theform" onSubmit="return checkLetter(this);">
                <div class="form-group">
                  <label class="control-label">Tanggal Daftar -</label>
                  <?php echo htmlentities($result['RegDate']); ?>
                </div>
                <?php if ($result['UpdationDate'] != "") { ?>
                  <div class="form-group">
                    <label class="control-label">Terakhir diupdate pada -</label>
                    <?php echo htmlentities($result['UpdationDate']); ?>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result['nama_user']); ?>" id="fullname" type="text" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Alamat Email</label>
                  <input class="form-control white_bg" value="<?php echo htmlentities($result['email']); ?>" name="email" id="email" type="email" required readonly>
                </div>
                <div class="form-group">
                  <label class="control-label">Telepon</label>
                  <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result['telp']); ?>" id="phone-number" type="number" min="0" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Alamat</label>
                  <textarea class="form-control white_bg" name="address" rows="4"><?php echo htmlentities($result['alamat']); ?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">KTP</label><br />
                  <img src="<?= base_url('assets/'); ?>images/user/id/<?php echo htmlentities($result['ktp']); ?>" width="300" height="200" style="border:solid 1px #000"><br />
                  <a href="gantiktp.php?">Ganti Gambar KTP</a>
                </div>
                <div class="form-group">
                  <label class="control-label">KK</label><br />
                  <img src="<?= base_url('assets/'); ?>images/user/id/<?php echo htmlentities($result['kk']); ?>" width="300" height="200" style="border:solid 1px #000"><br />
                  <a href="gantikk.php?">Ganti Gambar KK</a>
                </div>
              <?php } ?>
              <div class="form-group">
                <button type="submit" name="updateprofile" class="btn">Simpan Perubahan <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!--/Profile-setting-->

      <<!--Footer -->
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

  </html>
<?php } ?>