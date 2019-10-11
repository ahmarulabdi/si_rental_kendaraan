<?php if (isset($_SESSION['SES_rentalkendaraan'])): ?>
<?php if ($hak_akses == 'manager'): ?>
<div id="sidebar" class="sidebar responsive ace-save-state" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>
	<ul class="nav nav-list" style="top: 0px;">
		<li class="">
			<a href="?user=manager_dashboard">
				<i class="menu-icon fa fa-home"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Data Master</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow fa fa-angle-down"></b>
			<ul class="submenu">
				<li class="">
					<a href="?user=kendaraan">
						<i class="menu-icon fa fa-caret-right"></i> Kendaraan
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="?user=suku_cadang">
						<i class="menu-icon fa fa-caret-right"></i> Suku Cadang
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="?user=syarat">
						<i class="menu-icon fa fa-caret-right"></i> syarat
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="?user=ketentuan">
						<i class="menu-icon fa fa-caret-right"></i> ketentuan
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li>
			<a href="?user=pengguna">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Info Pengguna</span>
			</a>
		</li>
		<li>
			<a href="?user=pelanggan">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text"> Pelanggan</span>
			</a>
		</li>
		<li>
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-desktop"></i>
				<span class="menu-text"> Perentalan</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow fa fa-angle-down"></b>
			<ul class="submenu">
				<li class="">
					<a href="?user=data_unit&booking">
						<i class="menu-icon fa fa-caret-right"></i> Data Booking
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="?user=data_unit&unit">
						<i class="menu-icon fa fa-caret-right"></i> Data Unit
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li>
			<a href="?user=perawatan">
				<i class="menu-icon fa fa-cogs"></i>
				<span class="menu-text"> Data Perawatan</span>
			</a>
		</li>
		<li>
			<a href="?user=laporan">
				<i class="menu-icon fa fa-book"></i>
				<span class="menu-text"> Laporan</span>
			</a>
		</li>
	</ul>
	<!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>
<?php endif; ?>
<?php endif; ?>
