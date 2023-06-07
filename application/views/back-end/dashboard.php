<?php
error_reporting(0);
include('includes/config.php');

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Rental Mobil | Admin Dashboard</title>
	<?php include('includes/style.php'); ?>
</head>

<body>
	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Dashboard</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="row">

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<?php
													$sqlbayar = "SELECT kode_booking FROM booking WHERE status='Menunggu Pembayaran'";
													$querybayar = mysqli_query($koneksidb, $sqlbayar);
													$bayar = mysqli_num_rows($querybayar);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bayar); ?></div>
													<div class="stat-panel-title text-uppercase">Menunggu Pembayaran</div>
												</div>
											</div>
											<a href="<?= base_url('sewa/bayar'); ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<?php
													$sqlkonfir = "SELECT kode_booking FROM booking WHERE status='Menunggu Konfirmasi'";
													$querykonfir = mysqli_query($koneksidb, $sqlkonfir);
													$konfir = mysqli_num_rows($querykonfir);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($konfir); ?></div>
													<div class="stat-panel-title text-uppercase">Menunggu Konfirmasi</div>
												</div>
											</div>
											<a href="<?= base_url('sewa/konfirmasi'); ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<?php
													$sqlbelum = "SELECT kode_booking FROM booking WHERE status='Sudah Dibayar'";
													$querybelum = mysqli_query($koneksidb, $sqlbelum);
													$belum = mysqli_num_rows($querybelum);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($belum); ?></div>
													<div class="stat-panel-title text-uppercase">Belum Dikembalikan</div>
												</div>
											</div>
											<a href="sewa_kembali.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="row">

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<?php
													$sql3 = "SELECT id_merek FROM merek";
													$query3 = mysqli_query($koneksidb, $sql3);
													$brands = mysqli_num_rows($query3);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($brands); ?></div>
													<div class="stat-panel-title text-uppercase">Total Merek</div>
												</div>
											</div>
											<a href="merek.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<?php
													$sql1 = "SELECT id_mobil FROM kendaraan";
													$query1 = mysqli_query($koneksidb, $sql1);
													$totalvehicle = mysqli_num_rows($query1);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($totalvehicle); ?></div>
													<div class="stat-panel-title text-uppercase">Jumlah Mobil</div>
												</div>
											</div>
											<a href="mobil.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<?php
													$sql2 = "SELECT kode_booking FROM booking";
													$query2 = mysqli_query($koneksidb, $sql2);
													$bookings = mysqli_num_rows($query2);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings); ?></div>
													<div class="stat-panel-title text-uppercase">Total Sewa</div>
												</div>
											</div>
											<a href="sewa.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-12">
								<div class="row">

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<?php
													$sql = "SELECT id_user FROM users";
													$query = mysqli_query($koneksidb, $sql);
													$regusers = mysqli_num_rows($query);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regusers); ?></div>
													<div class="stat-panel-title text-uppercase">User</div>
												</div>
											</div>
											<a href="reg-users.php" class="block-anchor panel-footer text-center">Rincian <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<?php
													$sql5 = "SELECT id_cu FROM contactus";
													$query5 = mysqli_query($koneksidb, $sql5);
													$query = mysqli_num_rows($query5);
													?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query); ?></div>
													<div class="stat-panel-title text-uppercase">Menghubungi</div>
												</div>
											</div>
											<a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>









			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<?php include('includes/script.php'); ?>


	<script>
		window.onload = function() {

			// Line chart from swirlData for dashReport
			var ctx = document.getElementById("dashReport").getContext("2d");
			window.myLine = new Chart(ctx).Line(swirlData, {
				responsive: true,
				scaleShowVerticalLines: false,
				scaleBeginAtZero: true,
				multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
			});

			// Pie Chart from doughutData
			var doctx = document.getElementById("chart-area3").getContext("2d");
			window.myDoughnut = new Chart(doctx).Pie(doughnutData, {
				responsive: true
			});

			// Dougnut Chart from doughnutData
			var doctx = document.getElementById("chart-area4").getContext("2d");
			window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {
				responsive: true
			});

		}
	</script>
</body>

</html>