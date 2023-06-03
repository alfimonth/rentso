<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Update Password | Rentso.</title>
  <?php include('templates/style.php'); ?>
</head>

<body>

  <!-- Start Switcher -->
  <?php include('templates/colorswitcher.php'); ?>
  <!-- /Switcher -->

  <!--Header-->
  <?php include('templates/header.php'); ?>
  <!-- /Header -->
  <!-- /Page Header-->
  <section class="user_profile inner_pages">
    <div class="container">
      <div class="user_profile_info">
        <div class="col-md-12 col-sm-10">
          <form method="post" action="">
            <div class="form-group">
              <label class="control-label">Current Password</label>
              <input class="form-control white_bg" name="mail" id="mail" type="hidden" value="<?= $email ?>" required>
              <input class="form-control white_bg" name="pass" id="pass" type="password" required>
            </div>
            <div class="form-group">
              <label class="control-label">New Password</label>
              <input class="form-control white_bg" name="new" id="new" type="password" required>
            </div>
            <div class="form-group">
              <label class="control-label">Confirm Password</label>
              <input class="form-control white_bg" name="confirm" id="confirm" type="password" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn">Update Password <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
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

    <?= $this->session->flashdata('pesan'); ?>

</body>

</html>