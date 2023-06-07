<?php
include('templates/config.php');
include('templates/format_rupiah.php');
include('templates/library.php');
$sql1 	= "SELECT booking.*,kendaraan.*, merek.*, users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil 
			AND merek.id_merek=kendaraan.id_merek and booking.email=users.email and booking.kode_booking='$kode'";
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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="rental mobil">
	<meta name="author" content="universitas pamulang">

	<title>Cetak Detail Sewa</title>

	<link href="<?= base_url('assets/'); ?>images/cat-profile.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url('assets/'); ?>new/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?= base_url('assets/'); ?>new/offline-font.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>new/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?= base_url('assets/'); ?>new/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- jQuery -->
	<script src="<?= base_url('assets/'); ?>new/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="<?= base_url('assets/'); ?>images/cat-profile.png" alt="logo-dkm" width="80" />
						</td>
						<td class="text-center">
							<h3>Rental Mobil</h3>
						</td>
						<td rowspan="3" width="16%">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-center">
							<h1>Rentso.</h1>
						</td>
					</tr>
					<tr>
						<td class="text-center">Surakarta, Central Java, 57672</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">Detail Sewa</h4>
			<br />
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td width="23%">No. Sewa</td>
						<td width="2%">:</td>
						<td><?php echo $result['kode_booking']; ?></td>
					</tr>
					<tr>
						<td>Penyewa</td>
						<td>:</td>
						<td><?php echo $result['nama_user'] ?></td>
					</tr>
					<tr>
						<td>Mobil</td>
						<td>:</td>
						<td><?php echo $result['nama_merek'];
							echo  ", ";
							echo $result['nama_mobil']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Mulai</td>
						<td>:</td>
						<td><?php echo IndonesiaTgl($result['tgl_mulai']); ?></td>
					</tr>
					<tr>
						<td>Tanggal Selesai</td>
						<td>:</td>
						<td><?php echo IndonesiaTgl($result['tgl_selesai']); ?></td>
					</tr>
					<tr>
						<td>Durasi</td>
						<td>:</td>
						<td><?php echo $result['durasi']; ?> Hari</td>
					</tr>
					<tr>
						<td>Biaya Mobil (<?php echo $result['durasi']; ?>) Hari</td>
						<td>:</td>
						<td><?php echo format_rupiah($totalmobil); ?></td>
					</tr>
					<tr>
						<td>Biaya Driver (<?php echo $result['durasi']; ?>) Hari</td>
						<td>:</td>
						<td><?php echo format_rupiah($drivercharges); ?></td>
					</tr>
					<tr>
						<td>Total Biaya Sewa (<?php echo $result['durasi']; ?>) Hari</td>
						<td>:</td>
						<td><?php echo format_rupiah($totalsewa); ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><?php echo $result['status']; ?></td>
					</tr>
					<tr>
						<td>




						</td>

					</tr>
					<tr>
						<td></td>
					</tr>

					<?php
					if ($result['status'] == "Menunggu Pembayaran") {
						$sqlrek 	= "SELECT * FROM tblpages WHERE id='5'";
						$queryrek = mysqli_query($koneksidb, $sqlrek);
						$resultrek = mysqli_fetch_array($queryrek);

						echo "
						<tr>
							<td colspan='3'>
								<b>*Silahkan transfer total biaya sewa ke " . $resultrek['detail'] . " maksimal tanggal " ?> <?php echo IndonesiaTgl($tglhasil); ?> <?php echo ".
							</td>
						</tr>
							";
																																								} else {
																																								} ?>
				</tbody>
			</table>
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#jumlah').terbilang({
				'style': 3,
				'output_div': "jumlah2",
				'akhiran': "Rupiah",
			});

			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url('assets/'); ?>new/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="<?= base_url('assets/'); ?>new/jTerbilang.js"></script>

</body>

</html>