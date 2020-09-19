<nav class="navbar indigo">
	<div class="had-container">
		<div class="nav-wrapper">
			<div class="row">
				<div class="col l6 m12 s12">
					<a href="#" class="sidenav-trigger show-on-large" data-target="slide-out">
						<i class="material-icons">menu</i>
					</a>
					<a href="" class="brand-logo center">
						<img src="<?= basis_url('assets/img/logo_name_w.png'); ?>" style="max-height: 40pt;">	
					</a>	
				</div>
				<!-- <div class="col">
					<a href="#" class="sidenav-trigger" data-target="slide-out">
						<i class="material-icons">menu</i>
					</a>
					<a href="<?= basis_url(); ?>" class="center brand-logo gbr-logo hide-on-small-only">
						<img src="<?= basis_url('assets/img/logo_name_w.png'); ?>" style="max-height: 40pt;">		
					</a>
					<a href="<?= basis_url(); ?>" class="center brand-logo gbr-logo-down hide-on-med-and-up">
						<img src="<?= basis_url('assets/img/logo_name_w.png'); ?>" style="max-height: 40pt;">		
					</a>		
				</div> -->
			</div>
		</div>
	</div>
</nav>

<?php if (isset($_SESSION['usr_role'])) { ?>
	
	<?php switch ($_SESSION['usr_role']) {
		case 1: ?>
		<ul class="sidenav" id="slide-out">
			<li>
				<div class="user-view center">
					<div class="background">
						<img src="<?= basis_url('assets/img/account-def.jpg'); ?>">
					</div>
					<a href="<?= ($_SESSION['usr_photo'] == '') ? basis_url('assets/img/logo-smk.png') : basis_url($_SESSION['usr_photo']); ?>">
						<img src="<?= ($_SESSION['usr_photo'] == '') ? basis_url('assets/img/logo-smk.png') : basis_url($_SESSION['usr_photo']); ?>" style="max-width: 80px;">
					</a>
					<br>
					<a href="index">SMK Mitra Sehat Mandiri Sidoarjo</a>
				</div>
			</li>
			<li>
				<ul class="collapsible collapsible-accordion">
					<li>
						<a class="collapsible-header" style="padding-left: 24pt;">Data <i class="material-icons right">arrow_drop_down</i></a>
						<div class="collapsible-body">
							<ul class="collapsible collapsible-accordion">
								<li>
									<a class="collapsible-header" style="padding-left: 36pt;">Master <i class="material-icons right">arrow_drop_down</i></a>
									<div class="collapsible-body">
										<ul class="collapsible">
											<li><a href="<?= basis_url('data/master/sekolah'); ?>" style="padding-left: 48pt;"><i class="material-icons left">school</i>Sekolah</a></li>
											<li><a href="<?= basis_url('data/master/kurikulum'); ?>" style="padding-left: 48pt;"><i class="material-icons left">layers</i>Kurikulum</a></li>
											<li><a href="<?= basis_url('data/master/tapel'); ?>" style="padding-left: 48pt;"><i class="material-icons left">date_range</i>Tahun Pelajaran</a></li>
											<li><a href="<?= basis_url('data/master/gedung'); ?>" style="padding-left: 48pt;"><i class="material-icons left">location_city</i>Gedung</a></li>
											<li><a href="<?= basis_url('data/master/ruangan'); ?>" style="padding-left: 48pt;"><i class="material-icons left">meeting_room</i>Ruangan</a></li>
											<li><a href="<?= basis_url('data/master/golongan'); ?>" style="padding-left: 48pt;"><i class="material-icons left">group</i>Golongan</a></li>
											<li><a href="<?= basis_url('data/master/ptk'); ?>" style="padding-left: 48pt;"><i class="material-icons left">how_to_reg</i>PTK</a></li>
											<li><a href="<?= basis_url('data/master/jurusan'); ?>" style="padding-left: 48pt;"><i class="material-icons left">work</i>Jurusan</a></li>
											<li><a href="<?= basis_url('data/master/kelas'); ?>" style="padding-left: 48pt;"><i class="material-icons left">class</i>Kelas</a></li>
											<li><a href="<?= basis_url('data/master/status-pegawai'); ?>" style="padding-left: 48pt;"><i class="material-icons left">military_tech</i>Status Kepegawaian</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a class="collapsible-header" style="padding-left: 36pt;">Akademik <i class="material-icons right">arrow_drop_down</i></a>
									<div class="collapsible-body">
										<ul class="collapsible">
											<li><a href="<?= basis_url('data/akademik/kelompok-mapel'); ?>" style="padding-left: 48pt;"><i class="material-icons left">layers</i>Kelompok Mapel</a></li>
											<li><a href="<?= basis_url('data/akademik/mapel'); ?>" style="padding-left: 48pt;"><i class="material-icons left">book</i>Mapel</a></li>
											<li><a href="<?= basis_url('data/akademik/materi'); ?>" style="padding-left: 48pt;"><i class="material-icons left">assignment</i>Materi Pembelajaran</a></li>
											<li><a href="<?= basis_url('data/akademik/kompetensi-dasar'); ?>" style="padding-left: 48pt;"><i class="material-icons left">assistant</i>Kompetensi Dasar</a></li>
											<li><a href="<?= basis_url('data/akademik/rentang-nilai'); ?>" style="padding-left: 48pt;"><i class="material-icons left">grade</i>Rentang Nilai</a></li>
											<li><a href="<?= basis_url('data/akademik/jadwal'); ?>" style="padding-left: 48pt;"><i class="material-icons left">schedule</i>Jadwal Pelajaran</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a class="collapsible-header" style="padding-left: 36pt;">User <i class="material-icons right">arrow_drop_down</i></a>
									<div class="collapsible-body">
										<ul class="collapsible">
											<li><a href="<?= basis_url('data/user/kepala-sekolah'); ?>" style="padding-left: 48pt;"><i class="material-icons left">supervisor_account</i>Kepala Sekolah</a></li>
											<li><a href="<?= basis_url('data/user/guru'); ?>" style="padding-left: 48pt;"><i class="material-icons left">school</i>Guru</a></li>
											<!-- <li><a href="<?= basis_url('data/user/siswa'); ?>" style="padding-left: 48pt;"><i class="material-icons left">payments</i>Keuangan</a></li> -->
											<li><a href="<?= basis_url('data/user/siswa'); ?>" style="padding-left: 48pt;"><i class="material-icons left">local_library</i>Siswa</a></li>
											<li><a href="<?= basis_url('data/user/administrator'); ?>" style="padding-left: 48pt;"><i class="material-icons left">admin_panel_settings</i>Administrator</a></li>
											<li><a href="<?= basis_url('data/user/list'); ?>" style="padding-left: 48pt;"><i class="material-icons left">list</i>Data Lengkap</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a class="collapsible-header" style="padding-left: 24pt;">Presensi <i class="material-icons right">arrow_drop_down</i></a>
						<div class="collapsible-body">
							<ul class="collapsible">
								<li><a href="" style="padding-left: 36pt;">X</a></li>
							</ul>
						</div>
					</li>
					<div class="divider"></div>
					<li>
						<a class="collapsible-header" style="padding-left: 24pt;">Akun <i class="material-icons right">arrow_drop_down</i></a>
						<div class="collapsible-body">
							<ul class="collapsible">
								<li><a href="<?= basis_url('akun/pengaturan'); ?>" style="padding-left: 36pt;"><i class="material-icons left">settings</i>Pengaturan Akun</a></li>
								<li><a href="<?= basis_url('portal/aksi/keluar'); ?>" style="padding-left: 36pt;"><i class="material-icons left">exit_to_app</i>Keluar</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
			<li><a href="tentang">Tentang</a></li>
			<br>
			<br>
			<br>
			<br>
		</ul>
			<?php break;
		
		default: 
			# code...
			break;
	} ?>

		
<?php } else { ?>
	<ul class="sidenav" id="slide-out">
		<li>
			<div class="user-view center">
				<div class="background">
					<img src="<?= basis_url('assets/img/account-def.jpg'); ?>">
				</div>
				<a href="<?= basis_url('assets/img/logo-smk.png'); ?>">
					<img src="<?= basis_url('assets/img/logo-smk.png'); ?>" style="max-width: 80px;">
				</a>
				<br>
				<a href="index">SMK Mitra Sehat Mandiri Sidoarjo</a>
			</div>
		</li>
		<li><a href="<?= basis_url(); ?>">Home</a></li>
		<li><a href="tentang">Tentang</a></li>
		<br>
		<br>
		<br>
		<br>
	</ul>
<?php } ?>

<br>