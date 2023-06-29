<!-- Printing -->
<link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>css/printing.css">
<html>

<head>
</head>

<body>
	<div id="section-to-print">
		<div id="only-on-print">
			<h2>Feedback</h2>
		</div>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Feedback</h4>
		</div>
		<div><br /></div>
		<form id="theform" data-parsley-validate class="form-horizontal form-label-left" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nis" required="required" class="form-control col-md-7 col-xs-12" name="nama" data-parsley-error-message="Field ini harus diisi" value="<?= $feed['nama_visit']; ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Email</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nis" required="required" class="form-control col-md-7 col-xs-12" name="nama" data-parsley-error-message="Field ini harus diisi" value="<?= $feed['email_visit']; ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Telepon</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nis" required="required" class="form-control col-md-7 col-xs-12" name="nama" data-parsley-error-message="Field ini harus diisi" value="<?= $feed['telp_visit']; ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pesan</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea required="required" class="form-control col-md-7 col-xs-12" cols="5" name="alamat" data-parsley-error-message="Field ini harus diisi" readonly><?= $feed['pesan']; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tanggal Kirim</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="nis" required="required" class="form-control col-md-7 col-xs-12" name="nama" data-parsley-error-message="Field ini harus diisi" value="<?= $feed['tgl_posting']; ?>" readonly>
				</div>
			</div>
		</form>
		<div class="modal-footer">
			<?php if ($feed['status'] == 1) : ?>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<?php else : ?>
				<a href="feedclose/<?= $feed['id_cu'] ?>" type="button" class="btn btn-default">Close</a>
			<?php endif; ?>
		</div>
	</div>

</body>

</html>