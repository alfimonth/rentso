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

	<title>Mutiara Motor Car Rental Portal | Admin Edit Sewa Mobil</title>

	<?php include('includes/style.php') ?>
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Edit Status Sewa</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Info Penyewa</div>
									<div class="panel-body">
										<?php
										$id = $kode;
										$sqlsewa = "SELECT booking.*,kendaraan.*,merek.*,users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil
													AND merek.id_merek=kendaraan.id_merek AND users.email=booking.email AND booking.kode_booking ='$id'";
										$querysewa = mysqli_query($koneksidb, $sqlsewa);
										$result = mysqli_fetch_array($querysewa);
										$biayamobil = $result['durasi'] * $result['harga'];
										$total = $result['driver'] + $biayamobil;
										?>

										<form method="post" class="form-horizontal" name="theform" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-sm-2 control-label">Kode Sewa</label>
												<div class="col-sm-4">
													<input type="text" name="id" class="form-control" value="<?= $id; ?>" required readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
												<div class="col-sm-4">
													<select class="form-control" name="status" required>
														<?php
														$stt = $result['status'];
														echo "<option value='$stt' selected>" . strtoupper($stt) . "</option>";
														echo "<option value='Menunggu Pembayaran'>" . strtoupper("Menunggu Pembayaran") . "</option>";
														echo "<option value='Sudah Dibayar'>" . strtoupper("Sudah Dibayar") . "</option>";
														echo "<option value='Cancel'>" . strtoupper("Cancel") . "</option>";
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Penyewa</label>
												<div class="col-sm-4">
													<input type="text" name="penyewa" class="form-control" value="<?= $result['nama_user']; ?>" required readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Telepon</label>
												<div class="col-sm-4">
													<input type="text" name="telp" class="form-control" value="<?= $result['telp']; ?>" required readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Alamat</label>
												<div class="col-sm-4">
													<textarea col="5" name="alamat" class="form-control" readonly><?= $result['alamat']; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Bukti Bayar</label>
												<div class="col-sm-4">
													<a href="<?= base_url('assets/images/user/bukti/') ?><?= htmlentities($result['bukti_bayar']); ?>" target="_blank"><img src="<?= base_url('assets/images/user/bukti/') ?><?= htmlentities($result['bukti_bayar']); ?>" width="150" height="150"></a>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<button class="btn btn-primary" type="submit" name="submit" style="margin-top:4%">Save changes</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Detail Sewa</div>
									<div class="panel-body">
										<form>
											<div class="form-group">
												<label class="col-sm-2 control-label">Mobil</label>
												<div class="col-sm-4">
													<input type="text" name="namamobil" class="form-control" value="<?= $result['nama_mobil']; ?>" required readonly>
												</div>
											</div>
											<br />
											<div class="form-group">
												<label class="col-sm-2 control-label">Biaya Driver</label>
												<div class="col-sm-4">
													<input type="text" name="driver" class="form-control" value="<?= format_rupiah($result['driver']); ?>" required readonly>
												</div>
											</div>
											<br />
											<div class="form-group">
												<label class="col-sm-2 control-label">Tanggal Mulai</label>
												<div class="col-sm-4">
													<input type="text" name="mulai" class="form-control" value="<?= IndonesiaTgl($result['tgl_mulai']); ?>" required readonly>
												</div>
											</div>
											<br />
											<div class="form-group">
												<label class="col-sm-2 control-label">Biaya Mobil</label>
												<div class="col-sm-4">
													<input type="text" name="biayamobil" class="form-control" value="<?= format_rupiah($biayamobil); ?>" required readonly>
												</div>
											</div>
											<br />
											<div class="form-group">
												<label class="col-sm-2 control-label">Tanggal Selesai</label>
												<div class="col-sm-4">
													<input type="text" name="selesai" class="form-control" value="<?= IndonesiaTgl($result['tgl_selesai']); ?>" required readonly>
												</div>
											</div>
											<br />
											<div class="form-group">
												<label class="col-sm-2 control-label">Total Biaya</label>
												<div class="col-sm-4">
													<input type="text" name="total" class="form-control" value="<?= format_rupiah($total); ?>" required readonly>
												</div>
											</div>
											<br />
											<div class="form-group">
												<label class="col-sm-2 control-label">Durasi</label>
												<div class="col-sm-4">
													<input type="text" name="durasi" class="form-control" value="<?= $result['durasi']; ?>" required readonly>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- COntainer Fluid-->
			</div>
		</div>
	</div>
	</div>

	<!-- Loading Scripts -->
	<?php include('includes/script.php') ?>
</body>

</html>