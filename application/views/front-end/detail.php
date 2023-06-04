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
  <?php include('templates/style.php'); ?>
  <style>
    #accessories i.fa-check {
      color: green;
    }

    #accessories i.fa-close {
      color: red;
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

  <!--Listing-Image-Slider-->
  <section id="listing_img_slider">
    <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image1']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image2']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image3']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image4']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
    <?php if ($vehicle['image5'] == "") {
    } else {
    ?>
      <div><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image5']); ?>" class="img-responsive" alt="image" width="900" height="560"></div>
    <?php } ?>
  </section>
  <!--/Listing-Image-Slider-->


  <!--Listing-detail-->
  <section class="listing-detail">
    <div class="container">
      <div class="listing_detail_head row">
        <div class="col-md-9">
          <h2><?= htmlentities($vehicle['nama_merek']); ?> <?= htmlentities($vehicle['nama_mobil']); ?></h2>
        </div>
        <div class="col-md-3">
          <div class="price_info">
            <p><?= htmlentities(format_rupiah($vehicle['harga'])); ?> </p>/ Hari

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="main_features">
            <ul>

              <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                <h5><?= htmlentities($vehicle['tahun']); ?></h5>
                <p>Tahun Registrasi</p>
              </li>
              <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                <h5><?= htmlentities($vehicle['bb']); ?></h5>
                <p>Tipe Bahan Bakar</p>
              </li>

              <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                <h5><?= htmlentities($vehicle['seating']); ?></h5>
                <p>Seats</p>
              </li>

              <li> <i class="fa fa-car" aria-hidden="true"></i>
                <h5><?= $this->ModelKendaraan->countUnit(['id_kendaraan' => $vehicle['id_mobil']]) ?></h5>
                <p>Unit</p>
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

                  <p><?= htmlentities($vehicle['deskripsi']); ?></p>
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
                        <?php if ($vehicle['AirConditioner'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>AntiLock Braking System</td>
                        <?php if ($vehicle['AntiLockBrakingSystem==1']) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>Power Steering</td>
                        <?php if ($vehicle['PowerSteering'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>


                      <tr>

                        <td>Power Windows</td>

                        <?php if ($vehicle['PowerWindows'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>CD Player</td>
                        <?php if ($vehicle['CDPlayer'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>Leather Seats</td>
                        <?php if ($vehicle['LeatherSeats'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>Central Locking</td>
                        <?php if ($vehicle['CentralLocking==1']) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>Power Door Locks</td>
                        <?php if ($vehicle['PowerDoorLocks'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>Brake Assist</td>
                        <?php if ($vehicle['BrakeAssist'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php  } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>Driver Airbag</td>
                        <?php if ($vehicle['DriverAirbag'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>Passenger Airbag</td>
                        <?php if ($vehicle['PassengerAirbag'] == 1) {
                        ?>
                          <td><i class="fa fa-check" aria-hidden="true"></i></td>
                        <?php } else { ?>
                          <td><i class="fa fa-close" aria-hidden="true"></i></td>
                        <?php } ?>
                      </tr>

                      <tr>
                        <td>Crash Sensor</td>
                        <?php if ($vehicle['CrashSensor'] == 1) {
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
            <?php if ($user != 'Guest') { ?>
              <div class="form-group" align="center">
                <a href="<?= base_url('kendaraan/booking/') . $vehicle['id_mobil'] ?>" class="btn" align="center">Sewa Sekarang</a>
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
        <h3>Kendaraan Sejenis</h3>
        <div class="row">
          <?php foreach ($sejenis as $vehicle) : ?>

            <div class="col-md-3 grid_listing">
              <div class="product-listing-m gray-bg">
                <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?= htmlentities($vehicle['id']); ?>"><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image1']); ?>" class="img-responsive" alt="image" /> </a>
                </div>
                <div class="product-listing-content">
                  <h5><a href="vehical-details.php?vhid=<?= htmlentities($vehicle['id']); ?>"><?= htmlentities($vehicle['nama_merek']); ?> <?= htmlentities($vehicle['nama_mobil']); ?></a></h5>
                  <p class="list-price"><?= htmlentities(format_rupiah($vehicle['harga'])); ?></p>

                  <ul class="features_list">

                    <li><i class="fa fa-user" aria-hidden="true"></i><?= htmlentities($vehicle['seating']); ?> seats</li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?= htmlentities($vehicle['tahun']); ?> model</li>
                    <li><i class="fa fa-car" aria-hidden="true"></i><?= htmlentities($vehicle['bb']); ?></li>
                  </ul>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
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

  <?php include('templates/script.php'); ?>

  <!-- Scripts -->

</body>

</html>