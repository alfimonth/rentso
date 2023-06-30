<!-- Printing -->
<link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>css/printing.css">

<?php

error_reporting(0);
include('includes/format_rupiah.php');
include('includes/library.php');
// var_dump($kendaraan);
?>
<html>

<head>
</head>

<body>
	<div id="section-to-print">
		<div id="only-on-print">
			<h2>Kurangi Unit</h2>
		</div>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Kurangi Unit</h4>
		</div>
		<div><br /></div>
		<form id="theform" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('/mobil/dropunit/') . $kendaraan['id_mobil'] ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Mobil</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nis" required="required" class="form-control col-md-7 col-xs-12" name="nama" data-parsley-error-message="Field ini harus diisi" value="<?= htmlentities($kendaraan['nama_merek'] . ' ' . $kendaraan['nama_mobil']); ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nomor Polisi</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nis" required class="form-control col-md-7 col-xs-12" name="nopol" data-parsley-error-message="Field ini harus diisi" value="<?= set_value('nopol') ?>">
				</div>
			</div>

			<div class="modal-footer">
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</form>

	</div>

</body>


</html>