<?php
error_reporting(0);
include('templates/config.php');
include('templates/format_rupiah.php');


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
	<title>Booking | Rentso.</title>
	<?php include('templates/style.php'); ?>
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

	<?php include('templates/script.php'); ?>
</body>

</html>