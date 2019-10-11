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
								<?php if (isset($_GET['overdates'])): ?>
									<div class="alert alert-block alert-danger">
										<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
										<p>Tanggal Perentalan Anda Sudah terlewat , Silahkan Hati-hati dalam mengisi tanggal Rental dan Tanggal Kembali</p>
									</div>
								<?php endif; ?>
								<div class="row">
										<div class="filterable">
												<button class="btn btn-info btn-sm btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
												<div class="pull-right">
													<a href="?user=newrental" type="button" class="btn btn-success btn-xs">
														Rental Baru ?
													</a>
												</div>

													</button>
													<table class="table">
														<thead>
															<tr class="filters">
																<th>Foto</th>
																<th><input type="text" class="form-control" placeholder="Merk" disabled></th>
																<th><input type="text" class="form-control" placeholder="Type" disabled></th>
																<th><input type="text" class="form-control" placeholder="Warna" disabled></th>
																<th><input type="text" class="form-control" placeholder="Tahun Produksi" disabled></th>
																<th><input type="text" class="form-control" placeholder="Nomor Mesin" disabled></th>
																<th><input type="text" class="form-control" placeholder="Kapasitas Mesin" disabled></th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($execute as $r): ?>
																<tr>
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
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
										</div>
								</div>
							</div>
						</div>
				</div>
			</div>
</div>
