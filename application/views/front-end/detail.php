<?php
include('templates/config.php');
include('templates/format_rupiah.php');
error_reporting(0);
?>


<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Detail Kendaraan | Rentso.</title>
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
</head>

<body>

  <!-- Start Switcher -->
  <?php include('templates/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include('templates/header.php'); ?>
  <!-- /Header -->

  <!--Listing-Image-Slider-->

  <?php
  // $vhid = intval($_GET['vhid']);
  $vhid = intval($id);
  $sql = "SELECT mobil.*, merek.* from mobil, merek WHERE merek.id_merek=mobil.id_merek AND mobil.id_mobil='$vhid'";
  $query = mysqli_query($koneksidb, $sql);
  if (mysqli_num_rows($query) > 0) {
    while ($result = mysqli_fetch_array($query)) {
      $_SESSION['brndid'] = $result['id_merek'];
  ?>

      <section id="listing_img_slider">
        <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?php echo htmlentities($result['image1']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?php echo htmlentities($result['image2']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?php echo htmlentities($result['image3']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?php echo htmlentities($result['image4']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <?php if ($result['image5'] == "") {
        } else {
        ?>
          <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?php echo htmlentities($result['image5']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
        <?php } ?>
      </section>
      <!--/Listing-Image-Slider-->


      <!--Listing-detail-->
      <section class="listing-detail">
        <div class="container">
          <div class="listing_detail_head row">
            <div class="col-md-9">
              <h2><?php echo htmlentities($result['nama_merek']); ?>, <?php echo htmlentities($result['nama_mobil']); ?></h2>
            </div>
            <div class="col-md-3">
              <div class="price_info">
                <p><?php echo htmlentities(format_rupiah($result['harga'])); ?> </p>/ Hari

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="main_features">
                <ul>

                  <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result['tahun']); ?></h5>
                    <p>Tahun Registrasi</p>
                  </li>
                  <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result['bb']); ?></h5>
                    <p>Tipe Bahan Bakar</p>
                  </li>

                  <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <h5><?php echo htmlentities($result['seating']); ?></h5>
                    <p>Seats</p>
                  </li>
                </ul>
              </div>
              <div class="listing_more_info">
                <div class="listing_detail_wrap">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs gray-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#vehicle-overview" aria-controls="vehicle-overview" role="tab" data-toggle="tab">Deskripisi Kendaraan</a></li>

                    <li role="presentation"> <a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- vehicle-overview -->
                    <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                      <p><?php echo htmlentities($result['deskripsi']); ?></p>
                    </div>


                    <!-- Accessories -->
                    <div role="tabpanel" class="tab-pane" id="accessories">
                      <!--Accessories-->
                      <table>
                        <thead>
                          <tr>
                            <th colspan="2">Accessories</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Air Conditioner</td>
                            <?php if ($result['AirConditioner'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>AntiLock Braking System</td>
                            <?php if ($result['AntiLockBrakingSystem==1']) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Power Steering</td>
                            <?php if ($result['PowerSteering'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>


                          <tr>

                            <td>Power Windows</td>

                            <?php if ($result['PowerWindows'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>CD Player</td>
                            <?php if ($result['CDPlayer'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Leather Seats</td>
                            <?php if ($result['LeatherSeats'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Central Locking</td>
                            <?php if ($result['CentralLocking==1']) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Power Door Locks</td>
                            <?php if ($result['PowerDoorLocks'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr>
                            <td>Brake Assist</td>
                            <?php if ($result['BrakeAssist'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php  } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Driver Airbag</td>
                            <?php if ($result['DriverAirbag'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Passenger Airbag</td>
                            <?php if ($result['PassengerAirbag'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <td>Crash Sensor</td>
                            <?php if ($result['CrashSensor'] == 1) {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
          <?php }
      } ?>

            </div>

            <!--Side-Bar-->
            <aside class="col-md-3">

              <div class="share_vehicle">
                <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
              </div>
              <div class="sidebar_widget">
                <div class="widget_heading">
                  <h5><i class="fa fa-envelope" aria-hidden="true"></i>Sewa Sekarang</h5>
                </div>
                <!-- <form method="get" action="booking.php"> -->
                <!-- <input type="hidden" class="form-control" name="vid" value=<?= $vhid; ?> required> -->
                <!--
            <div class="form-group">
              <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>-->
                <?php if ($_SESSION['ulogin']) { ?>
                  <div class="form-group" align="center">
                    <a href="<?= base_url('kendaraan/booking/') . $vhid ?>" class="btn" align="center">Sewa Sekarang</a>
                  </div>
                <?php } else { ?>
                  <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login Untuk Menyewa</a>

                <?php } ?>
                <!-- </form> -->
              </div>
            </aside>
            <!--/Side-Bar-->
          </div>

          <div class="space-20"></div>
          <div class="divider"></div>

          <!--Similar-Cars-->
          <div class="similar_cars">
            <h3>Mobil Sejenis</h3>
            <div class="row">
              <?php
              $bid = $_SESSION['brndid'];
              $sql1 = "SELECT mobil.*, merek.*from mobil, merek WHERE merek.id_merek=mobil.id_merek AND mobil.id_merek='$bid'";
              $query1 = mysqli_query($koneksidb, $sql1);
              if (mysqli_num_rows($query1) > 0) {
                while ($result = mysqli_fetch_array($query1)) {
              ?>

                  <div class="col-md-3 grid_listing">
                    <div class="product-listing-m gray-bg">
                      <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result['id']); ?>"><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?php echo htmlentities($result['image1']); ?>" class="img-responsive" alt="image" /> </a>
                      </div>
                      <div class="product-listing-content">
                        <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['nama_merek']); ?> , <?php echo htmlentities($result['nama_mobil']); ?></a></h5>
                        <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga'])); ?></p>

                        <ul class="features_list">

                          <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['seating']); ?> seats</li>
                          <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result['tahun']); ?> model</li>
                          <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result['bb']); ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
              <?php }
              } ?>

            </div>
          </div>
          <!--/Similar-Cars-->

        </div>
      </section>
      <!--/Listing-detail-->

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

      <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
      <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
      <script src="<?= base_url('assets/'); ?>js/interface.js"></script>
      <script src="<?= base_url('assets/'); ?>switcher/js/switcher.js"></script>
      <script src="<?= base_url('assets/'); ?>js/bootstrap-slider.min.js"></script>
      <script src="<?= base_url('assets/'); ?>js/slick.min.js"></script>
      <script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>

      <!-- Scripts -->

</body>

</html>