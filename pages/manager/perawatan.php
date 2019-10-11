<div class="col-sm-12">
	<div class="panel panel-success box-shadow">
		<div class="panel-heading">
			<h3 class="panel-title">Kelola Data Perawatan</h3>
		</div>
		<div class="panel-body">
			<?php if (isset($_POST['tambah_perawatan'])): ?>
				<form class="" action="" method="post">
					<h3>Tambah Data Perawatan</h3>
					<div class="row">
						<div class="filterable col-sm-6">
							<label for="">Pilih Unit Kendaraan :</label>
							<table class="table scrollable" id="scrollable">
								<thead>
									<tr class="filters">
										<th><input type="text" class="form-control" placeholder="ID Unit Kendaraan" ></th>
										<th><input type="text" class="form-control" placeholder="Nama Pelanggan" ></th>
									</tr>
									<?php $execute = mysqli_query($conn,$Unit_kendaraan); ?>
								</thead>
								<tbody>
									<?php foreach ($execute as $r): ?>
										<tr>
											<td>
												<div class="radio">
													<label>
														<input class="form-control" name="id_unit_kendaraan" class="ace" type="radio" required="" value="<?= $r['id_unit_kendaraan']?>">
														<span class="lbl"> <?= $r['id_unit_kendaraan']?></span>
													</label>
												</div>
											</td>
											<td>
												<?php
												$sql = $Pelanggan." where id_pelanggan = ".$r['id_pelanggan'] ;
												$pelanggan = mysqli_query($conn,$sql);
												foreach ($pelanggan as $pe) {
													echo $pe['nama_pelanggan'];
												}
												?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="filterable col-sm-12">
							<label for="">Suku Cadang terpakai :</label>
							<div class="alert alert-warning">
								*lewati jika tidak menggunakan suku cadang
							</div>
							<table class="table scrollable" id="">
								<thead>
									<tr class="filters">
										<th></th>
										<th><input type="text" class="form-control" placeholder="Jenis" ></th>
										<th><input type="text" class="form-control" placeholder="Nama" ></th>
										<th><input type="text" class="form-control" placeholder="Rincian" ></th>
										<th><input type="text" class="form-control" placeholder="Harga Satuan" ></th>
										<th>Stok</th>
									</tr>
									<?php $execute = mysqli_query($conn,$Suku_cadang); ?>
								</thead>
								<tbody>
									<?php foreach ($execute as $r): ?>
										<tr>
											<td>
												<?= $r['id_suku_cadang']?>
												<input class="form-control" type="checkbox" name="id_suku_cadang[]" value="<?= $r['id_suku_cadang']?>">
											</td>
											<td>
												<?= $r['jenis_suku_cadang']?>
												<input type="hidden" name="jenis_suku_cadang[]" value="<?= $r['jenis_suku_cadang']?>">
											</td>
											<td>
												<?= $r['nama_suku_cadang']?>
												<input type="hidden" name="nama_suku_cadang[]" value="<?= $r['nama_suku_cadang']?>">
											</td>
											<td>
												<?= $r['rincian_suku_cadang']?>
												<input type="hidden" name="rincian_suku_cadang[]" value="<?= $r['rincian_suku_cadang']?>">
											</td>
											<td>
												<?= $r['harga_satuan']?>
												<input type="hidden" name="harga_satuan[]" value="<?= $r['harga_satuan']?>">
											</td>
											<td>
												<?= $r['stok']?>
												<input type="hidden" name="stok[]" value="<?= $r['stok']?>">
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="tindakan">Tindakan :</label>
							<textarea class="form-control" rows="5" name="tindakan" placeholder="Rincian Tindakan" required=""></textarea>
						</div>
						<div class="form-group">
							<label for="biaya_tindakan">Biaya Tindakan :</label>
							<input type="number" name="biaya_tindakan" onkeypress="return hanyaAngka(event)" value="" required="">
						</div>
					</div>
					<button type="submit" class="btn btn-default" name="next">
					  Next
					</button>
				</form>
			<?php elseif(isset($_POST['next'])): ?>
			<form class="" action="?user=create" method="post">
				<div class="form-group">
					<label for="">ID Unit Kendaraan :</label>
					<input type="text" name="id_unit_kendaraan"  value="<?= $_POST['id_unit_kendaraan'] ?>">
				</div>
					<hr>
				<div class="form-group">
					<label for="">Suku Cadang Terpakai :</label>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Suku Cadang</th>
								<th>Jenis Suku Cadang</th>
								<th>Rincian Suku Cadang</th>
								<th>Harga Satuan</th>
								<th>Stok</th>
								<th>Jumlah Terpakai</th>
								<th>Harga Terpakai</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$num_id_suku_cadang = count($_POST['id_suku_cadang']);
							?>
							<?php for($i = 0; $i < $num_id_suku_cadang;$i++){ ?>
								<tr>
									<td>
										<?php
										$id_suku_cadang = $_POST['id_suku_cadang'];
										 ?>
										<?= $id_suku_cadang[$i] ?>
										<input type="hidden" name="id_suku_cadang[]" value="<?= $_POST['id_suku_cadang'][$i] ?>">
										<?php
										$query_suku_cadang = mysqli_query($conn,$Suku_cadang." where id_suku_cadang = ".$_POST['id_suku_cadang'][$i]);
										foreach ($query_suku_cadang as $r_sk) {
											$r_nama_suku_cadang = $r_sk['nama_suku_cadang'];
											$r_jenis_suku_cadang = $r_sk['jenis_suku_cadang'];
											$r_rincian_suku_cadang = $r_sk['rincian_suku_cadang'];
											$r_harga_satuan = $r_sk['harga_satuan'];
											$r_stok = $r_sk['stok'];
										}
										 ?>
									</td>
									<td><?= $r_nama_suku_cadang ?></td>
									<td><?= $r_jenis_suku_cadang ?></td>
									<td><?= $r_rincian_suku_cadang ?></td>
									<td><?= $r_harga_satuan ?></td>
									<td style="background-color:rgb(210, 131, 65)"><?= $r_stok ?></td>
									<td>
										<input type="text" name="jumlah_terpakai[]" onkeyup="kali<?= $i ?>();" required="" id="jumlah_terpakai<?= $i ?>" onkeypress="return hanyaAngka(event)">
										<input type="hidden" onkeyup="kali<?= $i ?>();" id='harga_satuan<?= $i ?>' value="<?= $r_harga_satuan ?>">
										<script>
										function kali<?= $i ?>() {
											var jumlah_terpakai<?= $i ?> = document.getElementById('jumlah_terpakai<?= $i ?>').value;
											var harga_satuan<?= $i ?> = document.getElementById('harga_satuan<?= $i ?>').value;
											var result<?= $i ?> = parseInt(jumlah_terpakai<?= $i ?>) * parseInt(harga_satuan<?= $i ?>);
											if (!isNaN(result<?= $i ?>)&&jumlah_terpakai<?= $i ?> <= <?= $r_stok ?> ) {
												document.getElementById('harga_terpakai<?= $i ?>').value = result<?= $i ?>;
											}
											else if(jumlah_terpakai<?= $i ?> >= <?= $r_stok ?> ) {
												document.getElementById('harga_terpakai<?= $i ?>').value = 'Stok Tidak Cukup';
											}
											else {
												document.getElementById('harga_terpakai<?= $i ?>').value = 'Stok tidak terpakai';
											}
										}
										</script>
									</td>
									<td>
										<input id="harga_terpakai<?= $i ?>" type="text" disabled="" value="Stok tidak terpakai">
									</td>

								</tr>
							<?php } ?>
						</tbody>
					</table>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#total').click(function(){
								<?php for($i = 0 ; $i < $num_id_suku_cadang ; $i++ ) {?>
									var harga_terpakai<?= $i?> = $("#harga_terpakai<?= $i?>").val();
								<?php } ?>
								var total_bayar_suku_cadang =
								<?php for($i = 0 ; $i < $num_id_suku_cadang ; $i++ ) {?>
									parseInt(harga_terpakai<?= $i?>)+
								<?php } ?>
								0 ;
								if (total_bayar_suku_cadang) {
									document.getElementById('total_bayar_suku_cadang').value = total_bayar_suku_cadang;
								}
							});
						});
					</script>
					<div class="pull-right">
						<button type="button" class="btn btn-info" id="total">
						  Total Bayar Suku Cadang
						</button>
						<input type="text" name="total_bayar_suku_cadang" disabled="" id="total_bayar_suku_cadang" >
					</div>
				</div>
				<br>
				<br>
				<div class="form-group">
					<?php
					$tindakan = $_POST['tindakan'];
					$biaya_tindakan = $_POST['biaya_tindakan'];
					?>
					<input type="hidden" id="tindakan" value="<?= $tindakan ?>" name="tindakan">
					<input type="hidden" id="biaya_tindakan" value="<?= $biaya_tindakan ?>" name="biaya_tindakan">
				</div>
				<div class="form-group">
					<script type="text/javascript">
					$(document).ready(function() {
						$('#totalkan_harga').click(function(){
							var total_bayar_suku_cadang = document.getElementById('total_bayar_suku_cadang').value;
							var total_bayar_tindakan = document.getElementById('biaya_tindakan').value;
							var total_harga = parseInt(total_bayar_suku_cadang)+parseInt(total_bayar_tindakan);
							if (total_harga) {
								document.getElementById('total_harga').value = total_harga;
							}
						});
					})
					</script>
					<br>
					<br>
					<hr>
					<button class="btn btn-info" type="button" id="totalkan_harga" for="total_harga">Total Harga Perawatan:</button>
					<input  type="text" name="total_harga" value="" id="total_harga" >
					<span class="cols-sm-1 alert alert-warning">
						total harga perawatan berdasarkan total bayar suku cadang di tambah total bayar tindakan
					</span>
				</div>
				<button type="submit" name="perawatan" class="btn btn-success">Tambahkan</button>
			</form>
			<?php elseif(isset($_POST['edit_perawatan'])): ?>
				<h3>Edit Data Perawatan</h3>
				<form class="" action="" method="post">
					<input type="text" name="id_perawatan" value="<?=$_POST['id_perawatan']?>">
					<div class="row">
						<div class="filterable col-sm-6">
							<label for="">Pilih Unit Kendaraan :</label>
							<table class="table scrollable" id="scrollable">
								<thead>
									<tr class="filters">
										<th><input type="text" class="form-control" placeholder="ID Unit Kendaraan" ></th>
										<th><input type="text" class="form-control" placeholder="Nama Pelanggan" ></th>
									</tr>
									<?php $execute = mysqli_query($conn,$Unit_kendaraan); ?>
								</thead>
								<tbody>
									<?php foreach ($execute as $r): ?>
										<tr>
											<td>
												<div class="radio">
													<label>
														<input <?php if($r['id_unit_kendaraan'] == $_POST['id_unit_kendaraan']){echo "checked='checked'";} ?>class="form-control" name="id_unit_kendaraan" class="ace" type="radio" required="" value="<?= $r['id_unit_kendaraan']?>">
														<span class="lbl"> <?= $r['id_unit_kendaraan']?></span>
													</label>
												</div>
											</td>
											<td>
												<?php
												$sql = $Pelanggan." where id_pelanggan = ".$r['id_pelanggan'] ;
												$pelanggan = mysqli_query($conn,$sql);
												foreach ($pelanggan as $pe) {
													echo $pe['nama_pelanggan'];
												}
												?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="filterable col-sm-12">
							<label for="">Suku Cadang terpakai :</label>
							<div class="alert alert-warning">
								*lewati jika tidak menggunakan suku cadang
							</div>
							<table class="table scrollable" id="">
								<thead>
									<tr class="filters">
										<th></th>
										<th><input type="text" class="form-control" placeholder="Jenis" ></th>
										<th><input type="text" class="form-control" placeholder="Nama" ></th>
										<th><input type="text" class="form-control" placeholder="Rincian" ></th>
										<th><input type="text" class="form-control" placeholder="Harga Satuan" ></th>
										<th>Stok</th>
									</tr>
									<?php $execute = mysqli_query($conn,$Suku_cadang); ?>
								</thead>
								<tbody>
									<?php foreach ($execute as $r): ?>
										<tr>
											<td>
											 	<input class="form-control"
											 	<?php
											 		$detail_perawatan = mysqli_query($conn,$Detail_perawatan." where id_perawatan = ".$_POST['id_perawatan']);
												 foreach ($detail_perawatan as $row_dp) {
												 	if ($r['id_suku_cadang'] == $row_dp['id_suku_cadang']) {
												 		echo "checked='checked'";
												 	}
												 }
											  ?>
												type="checkbox" name="id_suku_cadang[]" value="<?= $r['id_suku_cadang']?>">
											</td>
											<td>
												<?= $r['jenis_suku_cadang']?>
												<input type="hidden" name="jenis_suku_cadang[]" value="<?= $r['jenis_suku_cadang']?>">
											</td>
											<td>
												<?= $r['nama_suku_cadang']?>
												<input type="hidden" name="nama_suku_cadang[]" value="<?= $r['nama_suku_cadang']?>">
											</td>
											<td>
												<?= $r['rincian_suku_cadang']?>
												<input type="hidden" name="rincian_suku_cadang[]" value="<?= $r['rincian_suku_cadang']?>">
											</td>
											<td>
												<?= $r['harga_satuan']?>
												<input type="hidden" name="harga_satuan[]" value="<?= $r['harga_satuan']?>">
											</td>
											<td>
												<?= $r['stok']?>
												<input type="hidden" name="stok[]" value="<?= $r['stok']?>">
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="tindakan">Tindakan :</label>
							<textarea class="form-control" rows="5" name="tindakan" placeholder="Rincian Tindakan" required=""><?= $_POST['tindakan']?></textarea>
						</div>
						<div class="form-group">
							<label for="biaya_tindakan">Biaya Tindakan :</label>
							<input type="number" name="biaya_tindakan" onkeypress="return hanyaAngka(event)" value="<?= $_POST['biaya_tindakan']?>" required="">
						</div>
					</div>
					<button type="submit" class="btn btn-default" name="next_edit">
					  Next
					</button>
				</form>
			<?php elseif(isset($_POST['next_edit'])): ?>
				<h3>Edit Data Perawatan</h3>
				<form class="" action="?user=update" method="post">
					<input type="text" name="id_perawatan" value="<?= $_POST['id_perawatan'] ?>">
					<div class="form-group">
						<label for="">ID Unit Kendaraan :</label>
						<input type="text" name="id_unit_kendaraan"  value="<?= $_POST['id_unit_kendaraan'] ?>">
					</div>
						<hr>
					<div class="form-group">
						<label for="">Suku Cadang Terpakai :</label>
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Suku Cadang</th>
									<th>Jenis Suku Cadang</th>
									<th>Rincian Suku Cadang</th>
									<th>Harga Satuan</th>
									<th>Stok</th>
									<th>Jumlah Terpakai</th>
									<th>Harga Terpakai</th>
								</tr>
							</thead>
							<tbody>
								<?php $num_id_suku_cadang = count($_POST['id_suku_cadang']); ?>
								<?php for($i = 0; $i < $num_id_suku_cadang;$i++){?>
									<tr>
										<td>
											<?php
											$id_suku_cadang = $_POST['id_suku_cadang'];
											 ?>
											<?= $id_suku_cadang[$i] ?>
											<input type="hidden" name="id_suku_cadang[]" value="<?= $_POST['id_suku_cadang'][$i] ?>">
											<?php
											$query_suku_cadang = mysqli_query($conn,$Suku_cadang." where id_suku_cadang = ".$_POST['id_suku_cadang'][$i]);
											foreach ($query_suku_cadang as $r_sk) {
												$r_nama_suku_cadang = $r_sk['nama_suku_cadang'];
												$r_jenis_suku_cadang = $r_sk['jenis_suku_cadang'];
												$r_rincian_suku_cadang = $r_sk['rincian_suku_cadang'];
												$r_harga_satuan = $r_sk['harga_satuan'];
												$r_stok = $r_sk['stok'];
											}
											 ?>
										</td>
										<td><?= $r_nama_suku_cadang ?></td>
										<td><?= $r_jenis_suku_cadang ?></td>
										<td><?= $r_rincian_suku_cadang ?></td>
										<td><?= $r_harga_satuan ?></td>
										<td style="background-color:rgb(210, 131, 65)"><?= $r_stok ?></td>
										</td>
										<td>
											<?php $detail_perawatan = mysqli_query($conn,$Detail_perawatan);
											foreach ($detail_perawatan as $row_dp) {
												if ($row_dp['id_suku_cadang'] == $_POST['id_suku_cadang'][$i] ) {?>
													<span class="label label-info"><?= "Lama : ".$row_dp['suku_cadang_terpakai'] ?></span>
													<input type="hidden" name="old_id_suku_cadang[]" value="<?= $row_dp['id_suku_cadang'] ?>">
													<input type="hidden" name="old_jumlah_terpakai[]" value="<?= $row_dp['suku_cadang_terpakai'] ?>">
												<?php
												}
											}
											?>
											<input type="text" name="jumlah_terpakai[]" onkeyup="kali<?= $i ?>();" required=""
											placeholder="Baru"id="jumlah_terpakai<?= $i ?>" onkeypress="return hanyaAngka(event)">
											<input type="hidden" onkeyup="kali<?= $i ?>();" id='harga_satuan<?= $i ?>' value="<?= $r_harga_satuan ?>">
											<script>
											function kali<?= $i ?>() {
												var jumlah_terpakai<?= $i ?> = document.getElementById('jumlah_terpakai<?= $i ?>').value;
												var harga_satuan<?= $i ?> = document.getElementById('harga_satuan<?= $i ?>').value;
												var result<?= $i ?> = parseInt(jumlah_terpakai<?= $i ?>) * parseInt(harga_satuan<?= $i ?>);
												if (!isNaN(result<?= $i ?>)&&jumlah_terpakai<?= $i ?> <= <?= $_POST['stok'][$i] ?> ) {
													document.getElementById('harga_terpakai<?= $i ?>').value = result<?= $i ?>;
												}
												else if(jumlah_terpakai<?= $i ?> >= <?= $_POST['stok'][$i] ?> ) {
													document.getElementById('harga_terpakai<?= $i ?>').value = 'Stok Tidak Cukup';
												}
												else {
													document.getElementById('harga_terpakai<?= $i ?>').value = 'Stok tidak terpakai';
												}
											}
											</script>
										</td>
										<td>
											<input id="harga_terpakai<?= $i ?>" type="text" disabled="">
										</td>

									</tr>
								<?php } ?>
							</tbody>
						</table>
						<script type="text/javascript">
							$(document).ready(function(){
								$('#total').click(function(){
									<?php for($i = 0 ; $i < $num_id_suku_cadang ; $i++ ) {?>
										var harga_terpakai<?= $i?> = $("#harga_terpakai<?= $i?>").val();
									<?php } ?>
									var total_bayar_suku_cadang =
									<?php for($i = 0 ; $i < $num_id_suku_cadang ; $i++ ) {?>
										parseInt(harga_terpakai<?= $i?>)+
									<?php } ?>
									0 ;
									if (total_bayar_suku_cadang) {
										document.getElementById('total_bayar_suku_cadang').value = total_bayar_suku_cadang;
									}
								});
							});
						</script>
						<div class="pull-right">
							<button type="button" class="btn btn-info" id="total">
							  Total Bayar Suku Cadang
							</button>
							<input type="text" name="total_bayar_suku_cadang" disabled="" id="total_bayar_suku_cadang" >
						</div>
					</div>
					<br>
					<br>
					<div class="form-group">
						<?php
						$tindakan = $_POST['tindakan'];
						$biaya_tindakan = $_POST['biaya_tindakan'];
						?>
						<input type="hidden" id="tindakan" value="<?= $tindakan ?>" name="tindakan">
						<input type="hidden" id="biaya_tindakan" value="<?= $biaya_tindakan ?>" name="biaya_tindakan">
					</div>
					<div class="form-group">
						<script type="text/javascript">
						$(document).ready(function() {
							$('#totalkan_harga').click(function(){
								var total_bayar_suku_cadang = document.getElementById('total_bayar_suku_cadang').value;
								var total_bayar_tindakan = document.getElementById('biaya_tindakan').value;
								var total_harga = parseInt(total_bayar_suku_cadang)+parseInt(total_bayar_tindakan);
								if (total_harga) {
									document.getElementById('total_harga').value = total_harga;
								}
							});
						})
						</script>
						<br>
						<br>
						<hr>
						<button class="btn btn-info" type="button" id="totalkan_harga" for="total_harga">Total Harga Perawatan:</button>
						<input  type="text" name="total_harga" value="" id="total_harga" >
						<span class="cols-sm-1 alert alert-warning">
							total harga perawatan berdasarkan total bayar suku cadang di tambah total bayar tindakan
						</span>
					</div>
					<button type="submit" name="perawatan" class="btn btn-success">Perbarui</button>
				</form>
			<?php elseif(isset($_POST['detail_perawatan'])): ?>
				<a href="?user=perawatan" type="button" class="btn btn-danger">
				  Kembali
				</a>
				<table class="table ">
					<?php
					$detail_perawatan = mysqli_query($conn,$Detail_perawatan." where id_perawatan = ".$_POST['id_perawatan']);
					?>
					<thead>
						<tr>
							<th>ID Perawatan</th>
							<th>ID Suku Cadang</th>
							<th>Nama Suku Cadang</th>
							<th>Suku Cadang terpakai</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($detail_perawatan as $r): ?>
							<tr>
								<td><?= $r['id_perawatan']?></td>
								<td><?= $r['id_suku_cadang']?></td>
								<?php $suku_cadang = mysqli_query($conn,$Suku_cadang." where id_suku_cadang = ".$r['id_suku_cadang']) ?>
								<td>
									<?php foreach ($suku_cadang as $r_suku_cadang): ?>
										<?= $r_suku_cadang['nama_suku_cadang']?>
									<?php endforeach; ?>
								</td>
								<td><?= $r['suku_cadang_terpakai']?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else: ?>
			<div class="alert alert-block alert-info">
				<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
				<p>Manager pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk mengelola data Perawatan</p>
			</div>
			<?php if (isset($_GET['success'])): ?>
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<p>Anda Berhasil Menambahkan Data Perawatan</p>
				</div>
			<?php endif; ?>
			<?php if (isset($_GET['delsuccess'])): ?>
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<p>Anda Berhasil Menghapus data Perawatan</p>
				</div>
			<?php endif; ?>
			<p>
				<form class="" action="" method="post">
					<button type="submit" class="btn btn-block btn-success" name="tambah_perawatan">
					  Tambah Perawatan
					</button>
				</form>
			</p>
			<div class="filterable" >
				<!-- <button style="margin:20px"class="btn btn-info pull-right btn-block btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button> -->
				<table id="example" class="table table-striped table-bordered table-hover dynamic-table">
					<thead>
						<tr class="filters">
							<th>ID Perawatan</th>
							<th>ID Unit Kendaraan</th>
							<th>Tindakan</th>
							<th>Biaya tindakan</th>
							<th>Jumlah SK Terpakai</th>
							<th>Total harga</th>
							<th>Created at</th>
							<th>Update at</th>
							<th>Aksi</th>
						</tr>
						<?php $excute = mysqli_query($conn,$Perawatan);
						$i = 1; ?>
					</thead>
					<tbody>
						<?php while ($r = mysqli_fetch_array($excute)) { ?>
							<tr>
								<td><?= $r['id_perawatan']; ?></td>
								<td><?= $r['id_unit_kendaraan']; ?></td>
								<td><?= $r['tindakan']; ?></td>
								<td><?= $r['biaya_tindakan']; ?></td>
								<td><?= $r['jumlah_terpakai']; ?> buah</td>
								<td><?= $r['total_harga']; ?></td>
								<td><?= $r['created_at']; ?></td>
								<td><?= $r['updated_at']; ?></td>
								<td>
									<form class="" action="" method="post">
										<input type="hidden" name="id_perawatan" value="<?= $r['id_perawatan']; ?>">
										<input type="hidden" name="id_unit_kendaraan" value="<?= $r['id_unit_kendaraan']; ?>">
										<input type="hidden" name="tindakan" value="<?= $r['tindakan']; ?>">
										<input type="hidden" name="biaya_tindakan" value="<?= $r['biaya_tindakan']; ?>">
										<div class="btn-group btn-group-sm">
											<button type="submit" name="detail_perawatan" class="btn btn-info btn-sm">
												<i class="fa fa-folder-open-o"></i>
											</button>
											<button type="submit" class="btn btn-primary btn-sm" name="edit_perawatan">
												<i class='fa fa-pencil-square-o'></i></a>
											</button>
										</div>
									</form>
									<form class="" action="" method="post">
									</form>
									<a class='btn btn-danger btn-sm' href="#" onclick="confirm_modal('?user=delete&id_perawatan=<?php echo $r['id_perawatan']; ?>&navbar=1');">
										<i class="fa fa-trash-o"></i>
										Delete
									</a>
								</td>
							</tr>
							<?php
						} ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>
		</div>
		<div class="panel-footer">
		</div>
	</div>
</div>
<!-- DELETE -->
<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data Perawatan ?</h4>
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


<!-- UPDATE -->
<!-- modal Popup untuk update -->
<div class="modal fade" id="myModalPerawatan" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Pelanggan</h4>
			</div>
			<div class="modal-body">
				<div class="fetched-data"></div>
			</div>

		</div>
	</div>
<!-- javascript Popup untuk update -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myModalPerawatan').on('show.bs.modal', function(e) {
			var id_pelanggan = $(e.relatedTarget).data('id_pelanggan');
			$.ajax({
				type: 'post',
				url: 'pages/form_update/update_perawatan.php',
				data: 'id_pelanggan=' + id_pelanggan,
				success: function(data) {
					$('.fetched-data').html(data);
				}
			});
		});
	});
</script>
<!-- datatable -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.scrollable').DataTable( {
				"scrollY":        "200px",
				"scrollCollapse": true,
				"paging":         false,
				"searching":         false,
				"info":         false
		} );
	} );
</script>
