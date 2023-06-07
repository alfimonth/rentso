<!-- Printing -->
<link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>css/printing.css">

<?php

error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

if ($kode != null) {
	$Kode = $kode;
	$sqlsewa = "SELECT booking.*,kendaraan.*,merek.*,users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil
				AND merek.id_merek=kendaraan.id_merek AND users.email=booking.email AND booking.kode_booking='$Kode'";
	$querysewa = mysqli_query($koneksidb, $sqlsewa);
	$result = mysqli_fetch_array($querysewa);
	$biayamobil = $result['durasi'] * $result['harga'];
	$total = $result['driver'] + $biayamobil;
	$bukti = $result['bukti_bayar'];
} else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html>

<head>
</head>

<body>
	<div id="section-to-print">
		<div id="only-on-print">
			<h2>Detail Sewa</h2>
		</div>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Detail Sewa</h4>
		</div>
		<div><br /></div>
		<table width="100%">
			<tr>
				<td width="20%"><b>Kode Sewa</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $result['kode_booking']; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Mobil</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $result['nama_merek']; ?>, <?php echo $result['nama_mobil']; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Tanggal Mulai</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo IndonesiaTgl($result['tgl_mulai']); ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Tanggal Selesai</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo IndonesiaTgl($result['tgl_selesai']); ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Durasi</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $result['durasi']; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Jumlah Unit</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $result['unit']; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Penyewa</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $result['nama_user']; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Biaya Driver</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $result['driver']; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Biaya Mobil</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $biayamobil; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Total Biaya</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $total; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Status</b></td>
				<td width="2%"><b>:</b></td>
				<td width="78%"><?php echo $result['status']; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"><b>Bukti Pembayaran</b></td>
				<td width="2%"><b>:</b></td>
				<?php
				if ($bukti == "") {
				?>
					<td width="78%">Belum ada bukti pembayaran.</td>
				<?php
				} else {
				?>
					<td width="78%"><img src="../image/bukti/<?php echo htmlentities($result['bukti_bayar']); ?>" width="120" height="150"></td>
				<?php
				}
				?>
			</tr>
		</table>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>

	</div>

</body>

</html>