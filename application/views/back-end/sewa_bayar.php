<?php
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

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

	<title>Rental Mobil | Admin Kelola Sewa </title>

	<?php include('includes/style.php'); ?>
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

</head>

<body>
	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Sewa Menunggu Pembayaran</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Daftar Sewa Menunggu Pembayaran</div>
							<div class="panel-body">
								<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?= htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= htmlentities($msg); ?> </div><?php } ?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr align="center">
											<th>No</th>
											<th>Kode Sewa</th>
											<th>Mobil</th>
											<th>Tgl. Mulai</th>
											<th>Tgl. Selesai</th>
											<th>Total</th>
											<th>Penyewa</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 0;
										$sqlsewa = "SELECT booking.*,kendaraan.*,merek.*,users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil
													AND merek.id_merek=kendaraan.id_merek AND users.email=booking.email AND status='Menunggu Pembayaran'
													ORDER BY booking.kode_booking DESC";
										$querysewa = mysqli_query($koneksidb, $sqlsewa);
										while ($result = mysqli_fetch_array($querysewa)) {
											$biayamobil = $result['durasi'] * $result['harga'];
											$total = $result['driver'] + $biayamobil;
											$i++;
										?>
											<tr align="center">
												<td><?= $i; ?></td>
												<td><?= htmlentities($result['kode_booking']); ?></td>
												<td><?= htmlentities($result['nama_merek'] . ' ' . $result['nama_mobil']); ?></td>
												<td><?= IndonesiaTgl(htmlentities($result['tgl_mulai'])); ?></td>
												<td><?= IndonesiaTgl(htmlentities($result['tgl_selesai'])); ?></td>
												<td><?= format_rupiah(htmlentities($total)); ?></td>
												<td><a href="#myModal" data-toggle="modal" data-load-id="<?= $result['email']; ?>" data-remote-target="#myModal .modal-body"><?= $result['nama_user']; ?></a></td>
												<td><?= htmlentities($result['status']); ?></td>
												<td>
													<a href="#myModal" data-toggle="modal" data-load-code="<?= $result['kode_booking']; ?>" data-remote-target="#myModal .modal-body"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
													<a href="<?= base_url('sewa/edit/') . $result['kode_booking']; ?>"><i class="fa fa-edit"></i></a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
								<!-- Large modal -->
								<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<p>One fine body…</p>
											</div>
										</div>
									</div>
								</div>
								<!-- Large modal -->

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
		var app = {
			code: '0'
		};
		$('[data-load-code]').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			var code = $this.data('load-code');
			if (code) {
				$($this.data('remote-target')).load('<?= base_url('sewa/view/'); ?>' + code);
				app.code = code;

			}
		});
		$('[data-load-id]').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			var code = $this.data('load-id');
			if (code) {
				$($this.data('remote-target')).load('userview.php?code=' + code);
				app.code = code;

			}
		});
	</script>
</body>

</html>