<?php
session_start();
error_reporting(0);
include('templates/config.php');
include('templates/format_rupiah.php');

if (strlen($_SESSION['ulogin']) == 0) {
	redirect('');
} else {
	$tglnow   = date('Y-m-d');
	$tglmulai = strtotime($tglnow);
	$jmlhari  = 86400 * 1;
	$tglplus	  = $tglmulai + $jmlhari;
	$now = date("Y-m-d", $tglplus);

	if (isset($_POST['submit'])) {
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$driver = $_POST['driver'];
		$vid = $_POST['vid'];
		$pickup = $_POST['pickup'];
		//cek
		$sql 	= "SELECT kode_booking FROM cek_booking WHERE tgl_booking between '$fromdate' AND '$todate' AND id_mobil='$vid' AND status!='Cancel'";
		$query 	= mysqli_query($koneksidb, $sql);
		if (mysqli_num_rows($query) > 0) {
			echo " <script> alert ('Mobil tidak tersedia di tanggal yang anda pilih, silahkan pilih tanggal lain!'); 
		</script> ";
		} else {
			echo "<script type='text/javascript'> document.location = 'booking_ready.php?vid=$vid&mulai=$fromdate&selesai=$todate&driver=$driver&pickup=$pickup'; </script>";
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
		<title>Mutiara Motor Car Rental Portal</title>
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

		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-114-precomposed.html">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/'); ?>images/favicon-icon/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon-icon/favicon.png">
		<!-- Google-Font-->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	</head>

	<body>

		<!-- Start Switcher -->
		<?php include('templates/colorswitcher.php'); ?>
		<!-- /Switcher -->

		<!--Header-->
		<?php include('templates/header.php'); ?>
		<!--Page Header-->
		<!-- /Header -->

		<?php
		$vid = $id;
		$useremail = $_SESSION['login'];
		$sql1 = "SELECT mobil.*,merek.* FROM mobil,merek WHERE merek.id_merek=mobil.id_merek and mobil.id_mobil='$vid'";
		$query1 = mysqli_query($koneksidb, $sql1);
		$result = mysqli_fetch_array($query1);
		?>
		<script type="text/javascript">
			function valid() {
				if (document.sewa.todate.value < document.sewa.fromdate.value) {
					alert("Tanggal selesai harus lebih besar dari tanggal mulai sewa!");
					return false;
				}
				if (document.sewa.fromdate.value < document.sewa.now.value) {
					alert("Tanggal sewa minimal H-1!");
					return false;
				}

				return true;
			}
		</script>

		<section class="user_profile inner_pages">
			<div class="container">
				<div class="col-md-6 col-sm-8">
					<div class="product-listing-img"><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?php echo htmlentities($result['image1']); ?>" class="img-responsive" alt="Image" /> </a> </div>
					<div class="product-listing-content">
						<h5><?php echo htmlentities($result['nama_merek']); ?> , <?php echo htmlentities($result['nama_mobil']); ?></a></h5>
						<p class="list-price"><?php echo htmlentities(format_rupiah($result['harga'])); ?> / Hari</p>
						<ul>
							<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['seating']); ?> Seats</li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result['tahun']); ?> </li>
							<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result['bb']); ?></li>
						</ul>
					</div>
				</div>

				<div class="user_profile_info">
					<div class="col-md-12 col-sm-10">
						<form method="post" name="sewa" onSubmit="return valid();">
							<input type="hidden" class="form-control" name="vid" value="<?php echo $vid; ?>" required>
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
								<input type="hidden" name="now" class="form-control" value="<?php echo $now; ?>">
							</div>
							<div class="form-group">
								<label>Tanggal Selesai</label>
								<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
							</div>
							<div class="form-group">
								<label>Metode Pickup</label><br />
								<select class="form-control" name="pickup" required>
									<option value="">== Metode Pickup ==</option>
									<option value="Ambil Sendiri">Ambil Sendiri</option>
									<option value="Pickup Sesuai Alamat">Pickup Sesuai Alamat</option>
								</select>
							</div>
							<div class="form-group">
								<label>Driver</label><br />
								<input type="radio" name="driver" value="1" checked> Ya &nbsp;
								<input type="radio" name="driver" value="0"> Tidak
							</div>
							<br />
							<div class="form-group">
								<input type="submit" name="submit" value="Cek Ketersediaan" class="btn btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!--/my-vehicles-->
		<?php include('templates/footer.php'); ?>

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