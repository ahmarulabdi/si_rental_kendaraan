<?php if (isset($_POST['detail'])):
	$id_unit_kendaraan = $_POST['detail'];
	$sql = $Detail_unit_kendaraan." where id_unit_kendaraan = ".$id_unit_kendaraan;
	$execute = mysqli_query($conn,$sql); ?>
	<div class="col-sm-12">
		<div class="panel panel-info box-shadow">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Kendaraan</h3>
			</div>
			<div class="panel-body">
				<a href="?user=rental_saya&rental" type="button" class="btn btn-danger">
					Kembali
				</a>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>detail unit kendaraan</th>
							<th>id kendaraan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($execute as $r): ?>
							<tr>
								<td><?= $r['id_unit_kendaraan']?></td>
								<td><?= $r['id_kendaraan']?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">

			</div>
		</div>
	</div>
<?php
elseif (isset($_POST['perpanjangan'])) :?>
	<?php
	$id_unit_kendaraan = $_POST['id_unit_kendaraan'];
	$tanggal_kembali = $_POST['tanggal_kembali'];
	?>
	<div class="container">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Perpanjangan Rental</h3>
		  </div>
		  <div class="panel-body">
				<form class="" action="?user=update" method="post">
					<div class="form-group">
						<label for="tanggal_rental">Mulai Perpanjangan : <?= $tanggal_kembali ?></label>
						<input type="hidden" name="tanggal_rental" value="<?= $tanggal_kembali ?>">
						<input type="hidden" name="id_unit_kendaraan" value="<?= $id_unit_kendaraan ?>">
					</div>
					<div class="form-group col-sm-6">
						<label for="tanggal_kembali" >Tangga Kembali :</label>
						<input id='tanggal_kembali' class=" form-control date-picker" data-date-format="yyyy-mm-dd" type="date" name="tanggal_kembali" value="" required="required" placeholder="Tanggal Kembali">
					</div>
					<button type="submit" class="btn btn-success" name="perpanjangan">
					  Perpanjangan
					</button>
				</form>
			</div>
		  <div class="panel-footer">

		  </div>
		</div>
	</div>
<?php else : ?>
<div class="col-sm-12">
	<div class="panel panel-success box-shadow">
		<div class="panel-heading">
			<h3 class="panel-title">Kelola Data Unit Kendaraan</h3>
		</div>
		<div class="panel-body">
			<?php if (isset($_GET['deletesuccess'])): ?>
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<p>Pengahapusan data berhasil</p>
				</div>
			<?php elseif (isset($_GET['useinperawatan'])): ?>
				<div class="alert alert-block alert-danger">
					<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<p>Pengahapusan data gagal dikarenakan unit ini berada di masa Perawatan</p>
				</div>
			<?php elseif (isset($_GET['booking'])): ?>
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
						<p>Proses Rental berhasil</p>
					</div>
			<?php elseif (isset($_GET['overdates'])): ?>
					<div class="alert alert-block alert-danger">
						<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
						<p>Proses Perpanjangan gagal , tanggal kembali lebih awal dari tanggal rental</p>
					</div>
			<?php endif; ?>
			<?php if (isset($_GET['rental'])): ?>
				<h3 class="page-header">Data Rental Saya</h3>
			<?php elseif (isset($_GET['booking'])):?>
				<h3 class="page-header">Data Booking Saya</h3>
			<?php endif; ?>
			<table id="example" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<td>#</td>
						<td>ID pelanggan</td>
						<td>Jumlah Kendaraan</td>
						<td>Tanggal Rental</td>
						<td>Tanggal Kembali</td>
						<?php if (isset($_GET['booking'])): ?>
							<td>Tanggal Booking</td>
							<td>Waktu Booking</td>
						<?php endif; ?>
						<td>Total Biaya</td>
						<td>Created at</td>
						<td>Updated at</td>
						<?php if (isset($_GET['booking'])): ?>
							<td>Aksi</td>
						<?php endif; ?>
					</tr>
				<?php
				$get_id_pelanggan = mysqli_query($conn,$Pelanggan." where username = '".$username."'");
				foreach ($get_id_pelanggan as $r) {
					$id_pelanggan = $r['id_pelanggan'];
				}
				$query = $Unit_kendaraan." where id_pelanggan = ".$id_pelanggan ;
				$excute = mysqli_query($conn,$query);
  			$i = 1;
  			?>
				</thead>
				<tbody>
					<?php while ($r = mysqli_fetch_array($excute)) {
						$limit = date_create($r['waktu_booking']);
						$sekarang = date_create();
						$tenggat = date_diff($sekarang,$limit);
						if ((isset($_GET['booking']))&&($tenggat->d < 7)){ ?>
							<tr>
								<td><?php echo $r['id_unit_kendaraan']; ?>
									<form class="" action="?user=rental_saya" method="post">
										<button class="btn btn-info btn-xs" name="detail" value="<?= $r['id_unit_kendaraan'] ?>">
											<i class="glyphicon glyphicon-zoom-in"></i>
										</button>
									</form>
								</td>
								<td><?php echo $r['id_pelanggan']; ?></td>
								<td><?php echo $r['jumlah_kendaraan']; ?></td>
								<td><?php echo $r['tanggal_rental']; ?></td>
								<td><?php echo $r['tanggal_kembali']; ?></td>
								<td><?php echo $r['tanggal_booking']; ?></td>
								<td>
									<?php
									echo $r['waktu_booking'];
									$limit = date_create($r['waktu_booking']);
									$sekarang = date_create();
									$tenggat = date_diff($sekarang,$limit);
									if ($tenggat->s == 0) {
										$id_unit_kendaraan=$r['id_unit_kendaraan'];

										$get_detail_unit = $Detail_unit_kendaraan;
										var_dump($get_detail_unit);
										$execute = mysqli_query($conn,$get_detail_unit);
										foreach ($execute as $r) {
											$update_kendaraan = "UPDATE kendaraan set
											status_kendaraan = 'tersedia'
											where id_kendaraan = ".$r['id_kendaraan'];
											echo "<br/>";
											var_dump($update_kendaraan);
											$ex_update =mysqli_query($conn,$update_kendaraan);
											var_dump($ex_update);
										}
										$del_detail ="Delete FROM detail_unit_kendaraan WHERE id_unit_kendaraan= ".$id_unit_kendaraan;
										echo "<br/>";
										var_dump($del_detail);
										mysqli_query($conn,$del_detail);
										$get_id_pelanggan = $Unit_kendaraan." where id_unit_kendaraan = ".$id_unit_kendaraan;
										echo "<br/>";
										echo $get_id_pelanggan;
										$ex_id_pelanggan = mysqli_query($conn,$get_id_pelanggan);
										foreach ($ex_id_pelanggan as $r) {
											$id_pelanggan = $r['id_pelanggan'];
											$sql = $Unit_kendaraan." where id_pelanggan = ".$id_pelanggan;
											echo "<br/>";
											var_dump($sql);;
											$execute = mysqli_query($conn,$sql);
											foreach ($execute as $sum_execute) {
												$num_row[] = $sum_execute['id_pelanggan'];
											}
											echo "<br/>";
											echo count($num_row);
											$sum_execute = count($num_row);
											if ($sum_execute <= 1) {
												$update_pelanggan = "UPDATE pelanggan SET
												status_pelanggan = 'tidak merental'
												where id_pelanggan = ".$id_pelanggan;
												echo "<br/>";
												var_dump($update_pelanggan);
												mysqli_query($conn,$update_pelanggan);
											}
										}

										$del_unit = "Delete FROM unit_kendaraan WHERE id_unit_kendaraan=$id_unit_kendaraan";
										echo "<br/>";
										var_dump($del_unit);
										$ext_unit = mysqli_query($conn,$del_unit);
										header(sprintf('location:?user=data_unit'));
									}
									?>
									<br/>
									<span class="text text-danger">
										<?= $tenggat->d ?> hari
										<?= $tenggat->h ?> jam
										<?php if (($tenggat->d ==0) && ($tenggat->h == 0)&&($tenggat->i == 0)&&($tenggat->h == 0)): ?>
											<?= $tenggat->i ?> menit lagi
										<?php endif; ?>
									</span>
								</td>
								<td><?php echo $r['total_biaya']; ?></td>
								<td><?php echo $r['created_at']; ?></td>
								<td><?php echo $r['updated_at']; ?></td>
								<td>
									<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&id_unit_kendaraan=<?php echo $r['id_unit_kendaraan']; ?>&navbar=1');">
										<i class="fa fa-trash-o"></i>
										Batalkan Booking
									</a>
								</td>
							</tr>
						<?php }else if ((isset($_GET['rental']))&&($tenggat->d >= 7)){ ?>
							<tr>
								<td><?php echo $r['id_unit_kendaraan']; ?>
									<form class="" action="?user=rental_saya" method="post">
										<button class="btn btn-info btn-xs" name="detail" value="<?= $r['id_unit_kendaraan'] ?>">
											<i class="glyphicon glyphicon-zoom-in"></i>
										</button>
									</form>
								</td>
								<td><?php echo $r['id_pelanggan']; ?></td>
								<td><?php echo $r['jumlah_kendaraan']; ?></td>
								<td><?php echo $r['tanggal_rental']; ?></td>
								<td>
									<?php echo $r['tanggal_kembali']; ?>
									<form class="" action="" method="post">
										<input type="hidden" name="id_unit_kendaraan" value="<?= $r['id_unit_kendaraan'] ?>">
										<input type="hidden" name="tanggal_kembali" value="<?= $r['tanggal_kembali']; ?>">
										<button type="submit" name="perpanjangan" class="btn btn-primary btn-xs">
											Perpanjangan
										</button>
									</form>
								</td>
								<td><?php echo $r['created_at']; ?></td>
								<td><?php echo $r['updated_at']; ?></td>
							</tr>
						<?php } ?>
					<?php
  				} ?>
				</tbody>
			</table>

		</div>
		<div class="panel-footer">

		</div>
	</div>
</div>
<?php endif; ?>

<!-- DELETE -->
<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">
					Dengan menghapus data unit kendaraan anda menyatakan untuk membatalkan proses booking
				</h4>
			</div>

			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
				<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
				<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>
<!-- Javascript untuk popup modal Delete -->
<script type="text/javascript">
	function confirm_modal(delete_url) {
		$('#modal_delete').modal('show', {
			backdrop: 'static'
		});
		document.getElementById('delete_link').setAttribute('href', delete_url);
	};
</script>
