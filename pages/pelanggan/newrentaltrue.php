<div class="main-content">
	<div class="row">
		<div class="col-sm-12">
			<style media="screen">
				select.select{
					width: 260px;
				}
				.filter{
					width: 300px;
				}
			</style>
<?php if (isset($_POST['all'])): ?>
	<div class="container">
		<div class="col-sm-12">
					  <div class="widget-box widget-color-blue2	">
							<div class="widget-header">
								<h4 class="widget-title lighter smaller">Daftar Kendaraan</h4>
							</div>
							<?php
							$sql = $Kendaraan." where status_kendaraan = 'tersedia'";
							$execute = mysqli_query($conn,$sql);
							 ?>
							<div class="widget-body">
								<div class="widget-main">
									<div class="row">
							        <div class="filterable">
													<button class="btn btn-info btn-sm btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
													<form class="" action="?user=review" method="post">
														<button type="submit" name=review class="btn btn-success btn-sm pull-right">
															review
														</button>
														<table class="table">
															<thead>
																<tr class="filters">
																	<th></th>
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
																<?php foreach ($execute as $r): ?>
																	<tr>
																		<td><input type="checkbox" name="Kendaraan[]" value="<?= $r['id_kendaraan']?>"></td>
																		<?php if ($r['foto']): ?>
																			<td><img style="height:100px ; width:100px"src="assets/images/kendaraan/<?= $r['foto']?>" alt="<?= $r['foto']?>"></td>
																		<?php else: ?>
																			<td><img style="height:100px ; width:100px"src="assets/images/kendaraan/default.png" alt="default.png"></td>
																		<?php endif; ?>
																		<td><?= $r['merk']?></td>
																		<td><?= $r['type']?></td>
																		<td><?= $r['warna']?></td>
																		<td><?= $r['tahun_produksi']?></td>
																		<td><?= $r['no_mesin']?></td>
																		<td><?= $r['kapasitas_mesin']?></td>
																		<td><?= $r['biaya_sewa_kendaraan']?></td>
																	</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</form>
							        </div>
							    </div>
								</div>
							</div>
					</div>
				</div>
	</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<?php header(sprintf('location:pages/404.php')) ?>
<?php endif; ?>
