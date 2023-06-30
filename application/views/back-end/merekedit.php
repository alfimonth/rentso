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

	<title>Edit - Merek | Rentso. </title>

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
	<script type="text/javascript">
		function valid(theform) {
			pola_nama = /^[a-zA-Z]*$/;
			if (!pola_nama.test(theform.brand.value)) {
				alert('Hanya huruf yang diperbolehkan untuk Merek!');
				theform.brand.focus();
				return false;
			}
			return (true);
		}
	</script>
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Edit Merek</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form Edit Merek</div>
									<div class="panel-body">
										<form method="post" name="theform" class="form-horizontal" action="" onSubmit="return valid(this);">
											<?php
											$sql = "SELECT * FROM merek WHERE id_merek='$id'";
											$query = mysqli_query($koneksidb, $sql);
											$result = mysqli_fetch_array($query);
											?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Nama Merek</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" value="<?= htmlentities($result['nama_merek']); ?>" name="brand" id="brand" required>
													<input type="hidden" class="form-control" value="<?= htmlentities($id); ?>" name="id" id="id" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" type="submit">Submit</button>
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
	<?= form_error('brand', "<script>Swal.fire({icon: 'error',title: '", "', showConfirmButton: false,timer: 1500})</script>"); ?>

</body>

</html>