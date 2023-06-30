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

	<title>Admin Kelola - Merek | Rentso. </title>

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

		.mb-1 {
			margin-bottom: 16px;
			font-size: 16px;
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

						<h2 class="page-title">Kelola Merek</h2>

						<!-- Zero Configuration Table -->
						<a href="<?= base_url('mobil/addmerek') ?>" class="btn-primary btn mb-1"><span class="fa fa-plus-circle"></span>&nbsp;&nbsp;Tambah Merek</a>
						<!--  -->

						<div class="panel panel-default">
							<div class="panel-heading">Daftar Merek</div>
							<div class="panel-body">
								<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?= htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= htmlentities($msg); ?> </div><?php } ?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr align="center">
											<th>No</th>
											<th>Nama Merek</th>
											<th>Tgl. Dibuat</th>
											<th>Tgl. Update</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										<?php
										$nomor = 0;
										$sqlmerek = "SELECT * FROM merek";
										$querymerek = mysqli_query($koneksidb, $sqlmerek);
										while ($result = mysqli_fetch_array($querymerek)) {
											$nomor++;
										?>
											<tr align="center">
												<td><?= htmlentities($nomor); ?></td>
												<td><?= htmlentities($result['nama_merek']); ?></td>
												<td><?= htmlentities($result['CreationDate']); ?></td>
												<td><?= htmlentities($result['UpdationDate']); ?></td>
												<td><a href="<?= base_url('mobil/editmerek/') . $result['id_merek']; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
													<a data-load-id="<?= $result['id_merek']; ?>" data-load-nama="<?= $result['nama_merek']; ?>"><i class="fa fa-close"></i></a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<?php include('includes/script.php') ?>
	<script>
		$('[data-load-id]').on("click", function() {
			var $this = $(this);
			var id = $this.data('load-id');
			var nama = $this.data('load-nama');
			Swal.fire({
				icon: 'warning',
				title: 'Hapus merek ' + nama + '?',
				showCancelButton: true,
			}).then((result) => {
				if (result.value === true) {
					document.location = '<?= base_url('/mobil/merekdel/'); ?>' + id;
				}
			})
		})
	</script>
	<?= $this->session->flashdata('pesan'); ?>
	<?= $this->session->flashdata('hapus'); ?>
</body>

</html>