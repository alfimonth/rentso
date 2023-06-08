<?php
error_reporting(0);
include('templates/config.php');

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
  <?php include('templates/style.php'); ?>
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
  $useremail = $email;
  $sql = "SELECT * from users where email='$useremail'";
  $query = mysqli_query($koneksidb, $sql);
  while ($result = mysqli_fetch_array($query)) {
  ?>
    <section class="user_profile inner_pages">
      <div class="container">
        <div class="user_profile_info">

          <div class="col-md-12 col-sm-10">
            <?php
            if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= htmlentities($msg); ?> </div><?php } ?>
            <form method="post" name="theform" onSubmit="return checkLetter(this);">
              <div class="form-group">
                <label class="control-label">Tanggal Daftar -</label>
                <?= htmlentities($result['RegDate']); ?>
              </div>
              <?php if ($result['UpdationDate'] != "") { ?>
                <div class="form-group">
                  <label class="control-label">Terakhir diupdate pada -</label>
                  <?= htmlentities($result['UpdationDate']); ?>
                </div>
              <?php } ?>
              <div class="form-group">
                <label class="control-label">Nama</label>
                <input class="form-control white_bg" name="fullname" value="<?= htmlentities($result['nama_user']); ?>" id="fullname" type="text" required>
              </div>
              <div class="form-group">
                <label class="control-label">Alamat Email</label>
                <input class="form-control white_bg" value="<?= htmlentities($result['email']); ?>" name="email" id="email" type="email" required readonly>
              </div>
              <div class="form-group">
                <label class="control-label">Telepon</label>
                <input class="form-control white_bg" name="mobilenumber" value="<?= htmlentities($result['telp']); ?>" id="phone-number" type="number" min="0" required>
              </div>
              <div class="form-group">
                <label class="control-label">Alamat</label>
                <textarea class="form-control white_bg" name="address" rows="4"><?= htmlentities($result['alamat']); ?></textarea>
              </div>
              <div class="form-group">
                <label class="control-label">KTP</label><br />
                <img src="<?= base_url('assets/'); ?>images/user/id/<?= htmlentities($result['ktp']); ?>" width="300" height="200" style="border:solid 1px #000"><br />
                <a href="gantiktp.php?">Ganti Gambar KTP</a>
              </div>
              <div class="form-group">
                <label class="control-label">KK</label><br />
                <img src="<?= base_url('assets/'); ?>images/user/id/<?= htmlentities($result['kk']); ?>" width="300" height="200" style="border:solid 1px #000"><br />
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

      <?php include('templates/script.php'); ?>

</body>

</html>