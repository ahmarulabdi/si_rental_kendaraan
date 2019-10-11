<?php
if (isset($_POST['review'])) { ?>
	<?php if (!empty($_POST['Kendaraan'])) {
		$kendaraan = $_POST['Kendaraan'];?>
		<div class="container">
			<div class="col-sm-12">
				<div class="widget-box widget-color-blue2	">
					<div class="widget-header">
						<h4 class="widget-title lighter smaller">Review Kendaraan
							<form class="" action="?user=newrentaltrue" method="post">
								<button type="submit" name="all" class="btn btn-danger ">
									Kembali
								</button>
							</form>
						</h4>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div class="row">
								<div class="filterable">
									<div class="btn-group btn-group-sm">
										<button class="btn btn-info btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
									</div>
									<form class="" action="?user=update" method="post">
										<div class="pull-right">
											<div class="form-group">
												<label for="tanggal_rental">Tanggal Rental</label>
												<input id='tanggal_rental' class=" date-picker pull-right" data-date-format="yyyy-mm-dd" type="date" name="tanggal_rental" value="" required="required" placeholder="Tanggal Rental">:
											</div>
											<div class="form-group">
												<label for="tanggal_kembali" >Tangga Kembali</label>
												<input id='tanggal_kembali' class=" date-picker pull-right" data-date-format="yyyy-mm-dd" type="date" name="tanggal_kembali" value="" required="required" placeholder="Tanggal Kembali">:
											</div>
											<button  id='booking' type="submit" class="btn btn-success pull-right" name="booking">Booking</button>
										</div>
									<table class="table">
										<thead>
											<tr class="filters">
												<th><input type="text" class="form-control" placeholder="Foto" disabled></th>
												<th><input type="text" class="form-control" placeholder="Merk" disabled></th>
												<th><input type="text" class="form-control" placeholder="Type" disabled></th>
												<th><input type="text" class="form-control" placeholder="Warna" disabled></th>
												<th><input type="text" class="form-control" placeholder="Tahun Produksi" disabled></th>
												<th><input type="text" class="form-control" placeholder="Nomor Mesin" disabled></th>
												<th><input type="text" class="form-control" placeholder="Kapasitas Mesin" disabled></th>
												<th><input type="text" class="form-control" placeholder="Biaya Sewa Kendaraan" disabled></th>
											</tr>
										</thead>
										<tbody>
												<?php foreach ($kendaraan as $id): ?>
													<?php
													$sql = $Kendaraan." where id_kendaraan = ".$id ;
													$query = mysqli_query($conn,$sql);
													?>
													<tr>
														<?php foreach ($query as $r): ?>
															<input type="hidden" name="id_kendaraan[]" value="<?= $r['id_kendaraan']?>">
															<td>
																<?php if ($r['foto']): ?>
																	<img style="height:100px ; width:100px"src="assets/images/kendaraan/<?= $r['foto']?>" alt="<?= $r['foto']?>">
																<?php else: ?>
																	<img style="height:100px ; width:100px"src="assets/images/kendaraan/default.png" alt="default.png">
																<?php endif; ?>
															</td>
															<td><?= $r['merk']?></td>
															<td><?= $r['type']?></td>
															<td><?= $r['warna']?></td>
															<td><?= $r['tahun_produksi']?></td>
															<td><?= $r['no_mesin']?></td>
															<td><?= $r['kapasitas_mesin']?></td>
															<td><?= $r['biaya_sewa_kendaraan']?></td>
															<?php
															$total_biaya[] = $r['biaya_sewa_kendaraan'];
															 ?>
														<?php endforeach; ?>
													</tr>
												<?php endforeach; ?>

										</tbody>
									</table>
									<div class="pull-right alert alert-info">
										<label for="">Total Biaya : <?= array_sum($total_biaya);?></label>
										<input type="hidden" name="total_biaya" value="<?= array_sum($total_biaya);?>" required="">
									</div>

								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	else{
?>
<div class="container">
	<div class="col-sm-12">
		<div class="widget-box widget-color-blue2	">
			<div class="widget-header">
				<h4 class="widget-title lighter smaller">Review Kendaraan
					<form class="" action="?user=newrentaltrue" method="post">
						<button type="submit" name="all" class="btn btn-danger ">
							Kembali
						</button>
					</form>
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="row">
						<div class="filterable">
							<div class="btn-group btn-group-sm">
								<button class="btn btn-info btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
							</div>
							<table class="table">
								<thead>
								</thead>
								<tbody>
									<tr>
										<h3 class="text text-center text-danger">anda tidak ada memilih kendaraan</h3>

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	}
}
 ?>
