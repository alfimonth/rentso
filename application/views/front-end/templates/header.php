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
              <a href="mailto:rentso@gmail.com">rentso@gmail.com</a>
            </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Services Call Us: </p>
              <a href="tel:62-812-1482-1516">+62-812-1482-1516</a>
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


        <?php if (!empty($this->session->userdata('email'))) : ?>
          <div class="user_login">
            <ul>
              <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                  <?= $user; ?>
                  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('/user/profile'); ?>">Profil</a></li>
                  <li><a href="<?= base_url('/user/password'); ?>">Ubah Password</a></li>
                  <li><a href="<?= base_url('/user/history'); ?>">Riwayat Sewa</a></li>
                  <li><a id="logout">Logout</a></li>
                  <!-- <li><a href="<?= base_url('/home/logout'); ?>">Logout</a></li> -->
                </ul>
              </li>
            </ul>
          </div>
        <?php else : ?>
          <div class="user_login">
            <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a>
          </div>
        <?php endif ?>


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