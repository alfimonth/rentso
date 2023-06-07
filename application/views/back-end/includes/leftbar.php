	<nav class="ts-sidebar">
		<ul class="ts-sidebar-menu">
			<li class="ts-label">Main</li>
			<li><a href="<?= base_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#"><i class="fa fa-exchange"></i> Sewa</a>
				<ul class="ts-sidebar-menu">
					<li><a href="<?= base_url('sewa/bayar'); ?>">Menunggu Pembayaran</a></li>
					<li><a href="<?= base_url('sewa/konfirmasi'); ?>">Menunggu Konfirmasi</a></li>
					<li><a href="<?= base_url('sewa/pengembalian'); ?>">Pengembalian</a></li>
					<li><a href="<?= base_url('sewa'); ?>">Data Sewa</a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-car"></i> Mobil</a>
				<ul class="ts-sidebar-menu">
					<li><a href="<?= base_url('mobil/merek'); ?>">Data Merek</a></li>
					<li><a href="<?= base_url('mobil'); ?>">Data Mobil</a></li>
				</ul>
			</li>
			<li><a href="<?= base_url('mobil/drver'); ?>"><i class="fa fa-money"></i> Biaya Driver</a></li>
			<li><a href="reg-users.php"><i class="fa fa-users"></i> User</a></li>
			<li><a href="manage-conactusquery.php"><i class="fa fa-phone"></i> Menghubungi</a></li>
			<li><a href="manage-pages.php"><i class="fa fa-gear"></i> Kelola Halaman</a></li>
			<li><a href="update-contactinfo.php"><i class="fa fa-info"></i> Kontak Info</a></li>
			<li><a href="laporan.php"><i class="fa fa-files-o"></i> Laporan</a></li>
		</ul>
	</nav>