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

	<title>Ubah Gambar - Mobil | Rentso. </title>

	<?php include('includes/style.php') ?>
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

						<h2 class="page-title">Gambar Mobil <?= $n ?></h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Gambar Mobil <?= $n ?> Details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data" action="">

											<div class="form-group">
												<label class="col-sm-4 control-label">Gambar Mobil <?= $n ?> Sekarang</label>
												<?php

												$sql = "SELECT image$n from kendaraan where id_mobil='$id'";
												$query	= mysqli_query($koneksidb, $sql);
												$cnt = 1;
												while ($result = mysqli_fetch_array($query)) {
												?>
													<div class="col-sm-8">
														<img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($result["image$n"]); ?>" width="300" height="200" style="border:solid 1px #000">
													</div>
												<?php } ?>
											</div>

											<div class="form-group">
												<input type="hidden" name="id" value="<?= $id; ?>" required>
												<label class="col-sm-4 control-label">Upload Gambar <?= $n ?> Baru<span style="color:red">*</span></label>
												<div class="col-sm-8">
													<input type="file" name="img1" accept="image/*" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">

													<button class="btn btn-primary" name="update" type="submit">Update</button>
													<a href="<?= base_url('mobil/ubah/') . $id; ?>" class="btn btn-danger">Cancel</a>
												</div>
											</div>

										</form>

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
	<?php include('includes/script.php') ?>

</body>

</html>