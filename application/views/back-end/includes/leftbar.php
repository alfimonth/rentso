	<nav class="ts-sidebar">
		<ul class="ts-sidebar-menu">
			<li class="ts-label"></li>
			<li><a href="<?= base_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#"><i class="fa fa-exchange"></i> Sewa</a>
				<ul class="ts-sidebar-menu">
					<li><a href="<?= base_url('sewa'); ?>">Data Sewa</a></li>
					<li><a href="<?= base_url('sewa/bayar'); ?>">Menunggu Pembayaran</a></li>
					<li><a href="<?= base_url('sewa/konfirmasi'); ?>">Menunggu Konfirmasi</a></li>
					<li><a href="<?= base_url('sewa/pengembalian'); ?>">Pengembalian</a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-car"></i> Mobil</a>
				<ul class="ts-sidebar-menu">
					<li><a href="<?= base_url('mobil/merek'); ?>">Data Merek</a></li>
					<li><a href="<?= base_url('mobil'); ?>">Data Mobil</a></li>
				</ul>
			</li>
			<li><a href="<?= base_url('mobil/driver'); ?>"><i class="fa fa-money"></i> Biaya Driver</a></li>
			<li><a href="<?= base_url('admin/user'); ?>"><i class="fa fa-users"></i> User</a></li>
			<li><a href="<?= base_url('admin/menghubungi'); ?>"><i class="fa fa-phone"></i> Feedback</a></li>
			<!-- <li><a href="<?= base_url('admin/page'); ?>"><i class="fa fa-gear"></i> Kelola Halaman</a></li> -->
			<li><a href="#"><i class="fa fa-gear"></i> Kelola Bagian</a>
				<ul class="ts-sidebar-menu">
					<li><a href="<?= base_url('admin/rekening'); ?>">Rekening</a></li>
					<li><a href="<?= base_url('admin/about'); ?>">About</a></li>
					<li><a href="<?= base_url('admin/faq'); ?>">FAQs</a></li>
				</ul>
			</li>
			<li><a href="<?= base_url('admin/kontak'); ?>"><i class="fa fa-info"></i> Kontak Info</a></li>
			<li><a href="<?= base_url('admin/laporan'); ?>"><i class="fa fa-files-o"></i> Laporan</a></li>
			<li><a href="<?= base_url(''); ?>" target="_blank"><i class="fa fa-globe"></i>Website</a></li>
		</ul>
	</nav>