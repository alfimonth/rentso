<?php
error_reporting(0);
include('includes/config.php')
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

	<title>Manajemen User | Rentso. </title>

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

						<h2 class="page-title">User</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Daftar User</div>
							<div class="panel-body">
								<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?= htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= htmlentities($msg); ?> </div><?php } ?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Telp</th>
											<th>Alamat</th>
											<th>KTP</th>
											<th>KK</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 0;
										$sql = "SELECT * from  users ";
										$query = mysqli_query($koneksidb, $sql);
										while ($result = mysqli_fetch_array($query)) {
											$no++;
										?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= htmlentities($result['nama_user']); ?></td>
												<td><?= htmlentities($result['email']); ?></td>
												<td><?= htmlentities($result['telp']); ?></td>
												<td><?= htmlentities($result['alamat']); ?></td>
												<td><a href="<?= base_url('assets/'); ?>images/user/id/<?= htmlentities($result['ktp']); ?>" target="blank"><img src="<?= base_url('assets/'); ?>images/user/id/<?= htmlentities($result['ktp']); ?>" width="40" height="30"></a></td>
												<td><a href="<?= base_url('assets/'); ?>images/user/id/<?= htmlentities($result['kk']); ?>" target="blank"><img src="<?= base_url('assets/'); ?>images/user/id/<?= htmlentities($result['kk']); ?>" width="40" height="30"></a></td>
												<td>
													<a href="#myModal" data-toggle="modal" data-load-code="<?= $result['id_user']; ?>" data-remote-target="#myModal .modal-body"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
													<a id="reset" data-load-id="<?= $result['id_user']; ?>" data-load-nama="<?= $result['nama_user']; ?>"><i class="fa fa-refresh"></i></a>
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
	<?php include('includes/script.php') ?>

	<script>
		var app = {
			code: '0'
		};
		$('[data-load-code]').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			var code = $this.data('load-code');
			if (code) {
				$($this.data('remote-target')).load('<?= base_url('sewa/userview/'); ?>' + code);
				app.code = code;
			}
		});

		$('[data-load-id]').on("click", function() {
			var $this = $(this);
			var id = $this.data('load-id');
			var nama = $this.data('load-nama');
			Swal.fire({
				icon: 'warning',
				title: 'Yakin mereset password ' + nama + '?',
				showCancelButton: true,
			}).then((result) => {
				if (result.value === true) {
					document.location = '<?= base_url('/admin/userreset/'); ?>' + id;
				}
			})
		})
	</script>
	<?= $this->session->flashdata('up-pass'); ?>

</body>

</html>