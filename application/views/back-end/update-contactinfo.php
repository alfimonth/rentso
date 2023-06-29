<?php
error_reporting(0);
include('includes/config.php');

if (isset($_POST['submit'])) {
	$address = $_POST['address'];
	$email = $_POST['email'];
	$contactno = $_POST['contactno'];
	$sql = "update contactusinfo set alamat_kami='$address',email_kami='$email',telp_kami='$contactno'";
	$query = mysqli_query($koneksidb, $sql);
	$msg = "Info Berhasil diupdate";
}
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

	<title>RentalMobil | Admin Update Info</title>

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
						<h2 class="page-title">Update Contact Info</h2>
						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form Kelola Info Kontak</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">

											<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?= htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= htmlentities($msg); ?> </div><?php } ?>
											<?php
											$sql = "SELECT * from contactusinfo ";
											$query = mysqli_query($koneksidb, $sql);
											while ($result = mysqli_fetch_array($query)) { ?>
												<div class="form-group">
													<label class="col-sm-4 control-label">Alamat</label>
													<div class="col-sm-8">
														<textarea class="form-control" name="address" id="address" required><?= htmlentities($result['alamat_kami']); ?></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label"> Email</label>
													<div class="col-sm-8">
														<input type="email" class="form-control" name="email" id="email" value="<?= htmlentities($result['email_kami']); ?>" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-4 control-label"> Telepon </label>
													<div class="col-sm-8">
														<input type="number" class="form-control" value="<?= htmlentities($result['telp_kami']); ?>" name="contactno" id="contactno" required>
													</div>
												</div>
											<?php } ?>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" name="submit" type="submit">Update</button>
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