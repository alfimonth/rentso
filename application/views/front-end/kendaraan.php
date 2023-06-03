<?php
include('templates/config.php');
include('templates/format_rupiah.php');
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Daftar Kendaraan | Rentso.</title>
  <?php include('templates/style.php'); ?>
</head>

<body>

  <!-- Start Switcher -->
  <?php include('templates/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include('templates/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Daftar Kendaraan</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Daftar Kendaraan</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">
              <p><span><?= htmlentities($count); ?> Kendaraan</span></p>
            </div>
          </div>

          <?php foreach ($vehicles as $vehicle) : ?>
            <div class="product-listing-m gray-bg">
              <div class="product-listing-img"><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image1']); ?>" class="img-responsive" alt="Image" /> </a>
              </div>
              <div class="product-listing-content">
                <h5><a href="<?= base_url('kendaraan/detail'); ?>/<?= htmlentities($vehicle['id_mobil']); ?>"><?= htmlentities($vehicle['nama_merek']); ?> <?= htmlentities($vehicle['nama_mobil']); ?></a></h5>
                <p class="list-price"><?= htmlentities(format_rupiah($vehicle['harga'])); ?> / Hari</p>
                <ul>
                  <li><i class="fa fa-user" aria-hidden="true"></i><?= htmlentities($vehicle['seating']); ?> Seats</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i><?= htmlentities($vehicle['tahun']); ?> </li>
                  <li><i class="fa fa-car" aria-hidden="true"></i><?= htmlentities($vehicle['bb']); ?></li>
                </ul>
                <a href="<?= base_url('kendaraan/detail'); ?>/<?= htmlentities($vehicle['id_mobil']); ?>" class="btn">Lihat Detail <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i>Cari Mobil</h5>
            </div>
            <div class="sidebar_filter">
              <form action="search-carresult.php" method="post">
                <div class="form-group select">
                  <select class="form-control" name="brand" required>
                    <option value="" selected>Pilih Merek</option>
                    <?php
                    $sql3 = "SELECT * from  merek";
                    $query3 = mysqli_query($koneksidb, $sql3);
                    if (mysqli_num_rows($query3) > 0) {
                      while ($result = mysqli_fetch_array($query3)) { ?>
                        <option value="<?= htmlentities($result['id_merek']); ?>"><?= htmlentities($result['nama_merek']); ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group select">
                  <select class="form-control" name="fueltype" required>
                    <option value="">Jenis Bahan Bakar</option>
                    <option value="Bensin">Bensin</option>
                    <option value="Diesel">Diesel</option>
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>Cari</button>
                </div>
              </form>
            </div>
          </div>

          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-car" aria-hidden="true"></i>Kendaraan Terbaru</h5>
            </div>
            <div class="recent_addedcars">
              <ul>
                <?php foreach ($new as $vehicle) : ?>
                  <li class="gray-bg">
                    <div class="recent_post_img"> <a href="<?= base_url(); ?>kendaraan/detail/<?= htmlentities($vehicle['id_mobil']); ?>"><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image1']); ?>" alt="image"></a> </div>
                    <div class="recent_post_title"> <a href="<?= base_url(); ?>kendaraan/detail/<?= htmlentities($vehicle['id_mobil']); ?>"><?= htmlentities($vehicle['nama_merek']); ?> <?= htmlentities($vehicle['nama_mobil']); ?></a>
                      <p class="widget_price"><?= htmlentities(format_rupiah($vehicle['harga'])); ?> / Hari</p>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </aside>
        <!--/Side-Bar-->
      </div>
    </div>
  </section>
  <!-- /Listing-->

  <!--Footer -->
  <?php include('templates/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  <!--/Back to top-->

  <!--Login-Form -->
  <?php include('templates/login.php'); ?>
  <!--/Login-Form -->

  <!--Forgot-password-Form -->
  <?php include('templates/forgotpassword.php'); ?>

  <?php include('templates/script.php'); ?>

</body>

</html>