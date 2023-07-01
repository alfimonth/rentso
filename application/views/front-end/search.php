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
  <title>Hasil Pencarian | Rentso.</title>
  <?php include('templates/style.php'); ?>
  <!--Bootstrap -->
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
          <h1>Daftar Mobil</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Daftar Mobil</li>
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
              <?php
              //Query for Listing count
              $brand = $_POST['brand'];
              $brand = 12;
              // $fueltype = $_POST['fueltype'];
              $sql = "SELECT * from kendaraan WHERE id_merek='$brand' ";
              $query = mysqli_query($koneksidb, $sql);
              $cnt = mysqli_num_rows($query);
              ?>
              <p><span><?php echo htmlentities($cnt); ?> Mobil Ditemukan</span></p>
            </div>
          </div>

          <?php
          $sql1 = "SELECT kendaraan.*,merek.* FROM kendaraan,merek WHERE merek.id_merek=kendaraan.id_merek and kendaraan.id_merek='$brand'";
          $query1 = mysqli_query($koneksidb, $sql1);
          if (mysqli_num_rows($query1) > 0) {
            while ($result = mysqli_fetch_array($query1)) {
          ?>
              <div class="product-listing-m gray-bg">
                <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']); ?>" class="img-responsive" alt="Image" /> </a>
                </div>
                <div class="product-listing-content">
                  <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result['id_mobil']); ?>"><?php echo htmlentities($result['nama_merek']); ?> , <?php echo htmlentities($result['nama_mobil']); ?></a></h5>
                  <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga'])); ?> / Hari</p>
                  <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['seating']); ?> Seats</li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result['tahun']); ?> </li>
                    <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result['bb']); ?></li>
                  </ul>
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($result['id_mobil']); ?>" class="btn">Lihat Detail <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                </div>
              </div>
          <?php }
          } ?>
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
                        <option value="<?php echo htmlentities($result['id_merek']); ?>"><?php echo htmlentities($result['nama_merek']); ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group select">
                  <select class="form-control" name="fueltype" required>
                    <option value="" selected>Jenis Bahan Bakar</option>
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
              <h5><i class="fa fa-car" aria-hidden="true"></i>Mobil Terbaru</h5>
            </div>
            <div class="recent_addedcars">
              <ul>
                <?php
                $sql2 = "SELECT mobil.*,merek.* FROM mobil,merek 
						WHERE merek.id_merek=mobil.id_merek order by merek.id_merek desc limit 4";
                $query2 = mysqli_query($koneksidb, $sql2);
                if (mysqli_num_rows($query2) > 0) {
                  while ($result = mysqli_fetch_array($query2)) { ?>
                    <li class="gray-bg">
                      <div class="recent_post_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result['id_mobil']); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']); ?>" alt="image"></a> </div>
                      <div class="recent_post_title"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result['id_mobil']); ?>"><?php echo htmlentities($result['nama_merek']); ?> , <?php echo htmlentities($result['nama_mobil']); ?></a>
                        <p class="widget_price"><?php echo htmlentities(format_rupiah($result['harga'])); ?> / Hari</p>
                      </div>
                    </li>
                <?php }
                } ?>
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

  <!--Register-Form -->
  <?php include('templates/registration.php'); ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include('templates/forgotpassword.php'); ?>

  <!-- Scripts -->
  <?php include('templates/script.php'); ?>

  </body>

</html>