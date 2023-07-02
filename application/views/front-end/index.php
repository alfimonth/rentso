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
  <title>Home | Rentso.</title>
  <!--Bootstrap -->
  <?php include('templates/style.php'); ?>
  <style>
    .banner-section {
      background-size: cover;
      background-position: center;
      transition: background-image 1s;
    }

    .banner-section.slide-left {
      animation: slideLeft 1s forwards;
    }

    @keyframes slideLeft {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-100%);
      }
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

  <!-- Banners -->
  <section id="banner" class="banner-section">
    <div class="container">
      <div class="div_zindex">
        <div class="row">
          <div class="col-md-5 col-md-push-7">
            <div class="banner_content">
              <h1>Cari Mobil untuk kenyamanan anda.</h1>
              <p>Kami Punya beberapa pilihan untuk anda.</p>
              <a href="<?= base_url('kendaraan'); ?>" class="btn">Selengkapnya <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Banners -->

  <!-- Resent Cat-->
  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">

        <!-- Nav tabs -->
        <div class="recent-tab">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">Mobil Untuk Anda</a></li>
          </ul>
        </div>


        <!-- Recently Listed New Cars -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="resentnewcar">
            <?php foreach ($vehicles as $vehicle) : ?>
              <div class="col-list-3">
                <div class="recent-car-list">
                  <div class="car-info-box"> <a href="<?= base_url(); ?>kendaraan/detail/<?= $vehicle['id_mobil']; ?>"><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= $vehicle['image1']; ?>" class="img-responsive" alt="image"></a>
                    <ul>
                      <li><i class="fa fa-car" aria-hidden="true"></i><?= $this->ModelKendaraan->countUnit(['id_kendaraan' => $vehicle['id_mobil']]) ?> unit</li>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i><?= $vehicle['tahun']; ?> Model</li>
                      <li><i class="fa fa-user" aria-hidden="true"></i><?= $vehicle['seating']; ?> Seats</li>
                    </ul>
                  </div>
                  <div class="car-title-m">
                    <h5>
                      <a href="<?= base_url(); ?>kendaraan/detail/<?= $vehicle['id_mobil']; ?>"><?= $vehicle['nama_merek']; ?> <?= $vehicle['nama_mobil']; ?></a>
                    </h5>
                    <p class="list-price"><?= format_rupiah($vehicle['harga']); ?> /hari</p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
  </section>
  <!-- /Resent Cat -->


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
  <!--/Forgot-password-Form -->
  <?php include('templates/script.php'); ?>


  <?= $this->session->flashdata('up-pass'); ?>
  <?= $this->session->flashdata('bookingfail'); ?>

  <script>
    // Daftar gambar latar belakang yang akan diganti
    var backgroundImages = [
      "url('<?= base_url() ?>assets/images/banner-image-3.jpg')",
      "url('<?= base_url() ?>assets/images/bannerx.jpg')",
    ];

    var bannerSection = document.querySelector(".banner-section");
    var imageIndex = 0;

    function changeBackgroundImage() {
      // Mengubah gambar latar belakang dengan transisi slide ke kiri
      // bannerSection.classList.add("slide-left");

      // Menunggu transisi selesai sebelum mengganti gambar latar belakang
      setTimeout(function() {
        bannerSection.style.backgroundImage = backgroundImages[imageIndex];
        // bannerSection.classList.remove("slide-left");

        // Mengatur index berikutnya
        imageIndex = (imageIndex + 1) % backgroundImages.length;
      }, 1000);
    }

    // Mengganti latar belakang gambar setiap 3 detik
    setInterval(changeBackgroundImage, 5000);
  </script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->

</html>