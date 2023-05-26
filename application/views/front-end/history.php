<?php
session_start();
error_reporting(0);
include('templates/config.php');
include('templates/format_rupiah.php');
include('templates/library.php');

if (strlen($_SESSION['ulogin']) == 0) {
	header('location:index.php');
} else {
?>
	<!DOCTYPE HTML>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<title> Rental Mobil</title>
		<!--Bootstrap -->
		<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css" type="text/css">
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

		<?php
		$email = $_SESSION['ulogin'];
		$sql1 	= "SELECT booking.*,mobil.*, merek.*, users.* FROM booking,mobil,merek,users WHERE booking.id_mobil=mobil.id_mobil 
			AND merek.id_merek=mobil.id_merek and booking.email=users.email and booking.email='$email'";
		$query1 = mysqli_query($koneksidb, $sql1);
		$result = mysqli_fetch_array($query1);
		$harga	= $result['harga'];
		$durasi = $result['durasi'];
		$totalmobil = $durasi * $harga;
		$drivercharges = $result['driver'];
		$totalsewa = $totalmobil + $drivercharges;
		$tglmulai = strtotime($result['tgl_mulai']);
		$jmlhari  = 86400 * 1;
		$tgl	  = $tglmulai - $jmlhari;
		$tglhasil = date("Y-m-d", $tgl);
		?>
		<section class="user_profile inner_pages">
			<center>
				<h3>Riwayat Sewa</h3>
			</center>
			<div class="container">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="23" align="center">No</th>
							<th width="100">Kode Sewa</th>
							<th width="132">Nama Mobil</th>
							<th width="80">Tgl. Mulai</th>
							<th width="100">Tgl. Selesai</th>
							<th width="50">Durasi</th>
							<th width="100">Biaya Mobil</th>
							<th width="110">Biaya Driver</th>
							<th width="100">Total Biaya</th>
							<th width="100">Status</th>
							<th width="50">Opsi</th>
						</tr>
					</thead>
					<?php
					$email = $_SESSION['ulogin'];
					$sql1 	= "SELECT booking.*,mobil.*, merek.*, users.* FROM booking,mobil,merek,users WHERE booking.id_mobil=mobil.id_mobil 
			AND merek.id_merek=mobil.id_merek and booking.email=users.email and booking.email='$email'";
					$query1 = mysqli_query($koneksidb, $sql1);
					if (mysqli_num_rows($query1) != 0) {

						while ($result = mysqli_fetch_array($query1)) {
							$harga	= $result['harga'];
							$durasi = $result['durasi'];
							$totalmobil = $durasi * $harga;
							$drivercharges = $result['driver'];
							$totalsewa = $totalmobil + $drivercharges;
							$tglmulai = strtotime($result['tgl_mulai']);
							$jmlhari  = 86400 * 1;
							$tgl	  = $tglmulai - $jmlhari;
							$tglhasil = date("Y-m-d", $tgl);
							$nomor++;
					?>
							<tr>
								<td align="center"><?php echo $nomor; ?></td>
								<td><?php echo $result['kode_booking']; ?></td>
								<td><?php echo $result['nama_mobil']; ?></td>
								<td><?php echo IndonesiaTgl($result['tgl_mulai']); ?></td>
								<td><?php echo IndonesiaTgl($result['tgl_selesai']); ?></td>
								<td><?php echo $result['durasi']; ?></td>
								<td><?php echo format_rupiah($totalmobil); ?></td>
								<td><?php echo format_rupiah($drivercharges); ?></td>
								<td><?php echo format_rupiah($totalsewa); ?></td>
								<td><?php echo $result['status']; ?></td>
								<td align="center">
									<?php
									if ($result['status'] == "Sudah Dibayar" || $result['status'] == "Selesai") {
									?>
										<a href="booking_detail.php?kode=<?php echo $result['kode_booking']; ?>" class="glyphicon glyphicon-eye-open"></a>
									<?php
									} else {
									?>
										<a href="booking_edit.php?kode=<?php echo $result['kode_booking']; ?>" class="fa fa-edit"></a>&nbsp;&nbsp;&nbsp;
										<a href="booking_detail.php?kode=<?php echo $result['kode_booking']; ?>" class="glyphicon glyphicon-eye-open"></a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>

					<?php
					} else {
					?>
						<tr>
							<td colspan="11" align="center"><b>Belum ada riwayat sewa.</b></td>
						</tr>
					<?php } ?>
				</table>
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