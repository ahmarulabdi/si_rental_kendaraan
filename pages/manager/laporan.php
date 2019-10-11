<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Laporan</h3>
	  </div>
	  <div class="panel-body">
		<?php ob_start() ?>
		<div class="row">
			<h3 class="page-header">Data Pengguna</h3>
			<table class="table table-bordered">
				<tr>
					<td>Id Pelanggan</td>
					<td>Username </td>
					<td>Nama Pelanggan</td>
					<td>E-Mail </td>
					<td>No.Hp A</td>
					<td>lamat </td>
					<td>Tujuan Rental </td>
					<td>Status Pelanggan</td>
				</tr>
				<?php
				$query = mysqli_query($conn,$Pelanggan);
				?>
				<?php foreach ($query as $r): ?>
					<tr>
						<td><?= $r['id_pelanggan']?></td>
						<td><?= $r['username']?></td>
						<td><?= $r['nama_pelanggan']?></td>
						<td><?= $r['email']?></td>
						<td><?= $r['no_telepon']?></td>
						<td><?= $r['alamat']?></td>
						<td><?= $r['tujuan_rental']?></td>
						<td><?= $r['status_pelanggan']?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="row">
			<h3 class="page-header">Data Perawatan</h3>
			<table class="table table-bordered">
				<tr>
					<td>Id Pelanggan</td>
					<td>Id Unit Kendaraan</td>
					<td>Jumlah Terpakai</td>
					<td>Tindakan </td>
					<td>Biaya Tindakan</td>
					<td>Total Harga</td>
				</tr>
				<?php
				$query = mysqli_query($conn,$Perawatan);
				?>
				<?php foreach ($query as $r): ?>
					<tr>
						<td><?= $r['id_pelanggan']?></td>
						<td><?= $r['id_unit_kendaraan']?></td>
						<td><?= $r['jumlah_terpakai']?></td>
						<td><?= $r['tindakan']?></td>
						<td><?= $r['biaya_tindakan']?></td>
						<td><?= $r['total_harga']?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="row">
			<h3 class="page-header">Data Suku Cadang</h3>
			<table class="table table-bordered">
				<tr>
					<td>Id Suku Cadang</td>
					<td>Jenis Suku Cadang</td>
					<td>Nama Suku Cadang</td>
					<td>Rincian Suku Cadang</td>
					<td>Harga Suku Cadang</td>
					<td>Stok</td>
				</tr>
				<?php
				$query = mysqli_query($conn,$Suku_cadang);
				?>
				<?php foreach ($query as $r): ?>
					<tr>
						<td><?= $r['id_suku_cadang']?></td>
						<td><?= $r['jenis_suku_cadang']?></td>
						<td><?= $r['nama_suku_cadang']?></td>
						<td><?= $r['rincian_suku_cadang']?></td>
						<td><?= $r['harga_satuan']?></td>
						<td><?= $r['stok']?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php ob_end_flush()  ?>
	  </div>
	  <div class="panel-footer">

	  </div>
	</div>
</div>
