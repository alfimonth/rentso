<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php">
              <h2 class="margin-none">Rentso.</h2>
            </a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Support Mail us : </p>
              <a href="mailto:info@example.com">rental_mobil@gmail.com</a>
            </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Services Call Us: </p>
              <a href="tel:61-1234-5678-99">+62-812-3344-5551</a>
            </div>
            <!-- <div class="social-follow">
              <ul>
                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul> -->
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">

          <?php if (strlen($_SESSION['ulogin']) == 0) : ?>
            <li class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </li>
          <?php else : ?>
            <ul>
              <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                  <?php
                  $email = $_SESSION['ulogin'];
                  $sql = "SELECT nama_user FROM users WHERE email='$email'";
                  $query = mysqli_query($koneksidb, $sql);
                  if (mysqli_num_rows($query) > 0) {
                    while ($results = mysqli_fetch_array($query)) {
                      echo htmlentities($results['nama_user']);
                    }
                  } ?>
                  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="dropdown-menu">
                  <?php if ($_SESSION['ulogin']) { ?>
                    <li><a href="<?= base_url('/user/profile'); ?>">Profile Settings</a></li>
                    <li><a href="<?= base_url('/user/password'); ?>">Update Password</a></li>
                    <li><a href="riwayatsewa.php">Riwayat Sewa</a></li>
                    <li><a href="<?= base_url('/home/logout'); ?>">Sign Out</a></li>
                  <?php } else { ?>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Riwayat Sewa</a></li>
                    <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                  <?php } ?>
                </ul>
              </li>
            </ul>
          <?php endif ?>

        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="<?= base_url('/'); ?>">Home</a></li>
          <li><a href="<?= base_url('kendaraan'); ?>">Kendaraan</a>
          <li><a href="<?= base_url('page/faq'); ?>">FAQs</a></li>
          <li><a href="<?= base_url('contact'); ?>">Contact</a></li>
          <li><a href="<?= base_url('page/about'); ?>">About</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>