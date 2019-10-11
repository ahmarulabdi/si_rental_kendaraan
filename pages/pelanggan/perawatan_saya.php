<div class="container">
	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title">Perawatan saya</h3>
	  </div>
	  <div class="panel-body">
			<?php if (isset($_POST["perawatan"])): ?>
				<?php
				$id_unit_kendaraan =$_POST["perawatan"];
				$query = $Perawatan." where id_unit_kendaraan = ".$id_unit_kendaraan;
				$execute = mysqli_query($conn,$query);
				?>
				<a href="?user=perawatan_saya" class="btn btn-danger">kembali</a>
				<table class="table table-striped" id="example">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Unit</th>
							<th>Jumlah Terpakai</th>
							<th>Biaya Tindakan</th>
							<th>Total Harga</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($execute as $r): ?>
							<tr>
								<td><?= $r['id_perawatan'] ?></td>
								<td><b><?= $r['id_unit_kendaraan'] ?></b></td>
								<td><?= $r['jumlah_terpakai'] ?></td>
								<td><?= $r['biaya_tindakan'] ?></td>
								<td><?= $r['total_harga'] ?></td>
								<td>
									<table class="table">
										<tr>
											<th>ID perawatan</th>
											<th>ID suku cadang</th>
											<th>suku cadang terpakai</th>
										</tr>
										<?php
										$query = $Detail_perawatan." where id_perawatan = ".$r['id_perawatan'];
										$get_detail_unit = mysqli_query($conn,$query);
										foreach ($get_detail_unit as $r_du) :?>
										<tr>
											<td><?= $r_du['id_perawatan']; ?></td>
											<td><?= $r_du['id_suku_cadang']; ?></td>
											<td><?= $r_du['suku_cadang_terpakai']; ?></td>
										</tr>
									<?php endforeach; ?>
								</table>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
		<?php else: ?>
			<?php
			$get_pelanggan = mysqli_query($conn,$Pelanggan." where username = '".$username."'");
			foreach ($get_pelanggan as $r) {
				$id_pelanggan = $r['id_pelanggan'];
			}
			 ?>
			 <table class="table" id="example">
			 	<thead>
					<tr>
						<td>#</td>
						<td>ID pelanggan</td>
						<td>Jumlah Kendaraan</td>
						<td>Tanggal Rental</td>
						<td>Tanggal Kembali</td>
						<td>Tanggal Booking</td>
						<td>Waktu Booking</td>
						<td>Aksi</td>
					</tr>
			 	</thead>
				<tbody>
					<?php
					foreach (mysqli_query($conn,$Unit_kendaraan." where id_pelanggan = ".$id_pelanggan) as $r) { ?>
						<tr>
							<td><?= $r['id_unit_kendaraan']; ?></td>
							<td><?= $r['id_pelanggan']; ?></td>
							<td><?= $r['jumlah_kendaraan']; ?></td>
							<td><?= $r['tanggal_rental']; ?></td>
							<td><?= $r['tanggal_kembali']; ?></td>
							<td><?= $r['tanggal_booking']; ?></td>
							<td><?= $r['waktu_booking']; ?></td>
							<td>
								  <form class="" action="" method="post">
										<input type="hidden" name="perawatan" value="<?= $r['id_unit_kendaraan']; ?>">
										<button type="submit" class="btn btn-primary btn-xs">
											Lihat Perawatan
										</button>
								  </form>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			 </table>
		 <?php endif; ?>
	  </div>
	  <div class="panel-footer">

	  </div>
	</div>
</div>
