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
			<div id="sidebar" class="sidebar responsive filter">
						<div class="widget-box widget-color-blue2">
							<div class="widget-header">
								<h4 class="widget-title lighter smaller">Filter</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main">
									<form class="" action="" method="post">
										<?php
										$sql = $Kendaraan;
										$execute = mysqli_query($conn,$sql);
										?>
										<?php if ($execute): ?>
											<div class="form-group">
												<label for="">Merk</label><br>
												<select class="select" name="merk" >
													<?php foreach($execute as $r): ?>
														<option value="<?= $r['merk']?>"><?= $r['merk']?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group">
												<label for="">Type</label><br>
												<select class="select" name="type">
													<?php foreach($execute as $r): ?>
														<option value="<?= $r['type']?>"><?= $r['type']?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group">
												<label for="">Tahun Produksi</label><br>
												<select class="select" name="tahun_produksi">
													<?php foreach($execute as $r): ?>
														<option value="<?= $r['tahun_produksi']?>"><?= $r['tahun_produksi']?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group">
												<label for="">Kapasitas Mesin</label><br>
												<select class="select" name="kapasitas_mesin">
													<?php foreach($execute as $r): ?>
														<option value="<?= $r['kapasitas_mesin']?>"><?= $r['kapasitas_mesin']?></option>
													<?php endforeach; ?>
												</select>
											</div>
										<?php endif; ?>
										<div class="btn-group btn-group-xs">
												<button class="btn btn-success" type="submit" name="filter">
													<i class="glyphicon glyphicon-search" ></i>
													Filter
												</button>
												<button class="btn btn-danger" type="submit" name="all">
													<i class="fa fa-refresh"></i>
													Lihat Semua
												</button>
										</div>
									</form>
								</div>
							</div>
						</div>
			</div>
<?php if (isset($_POST['all'])): ?>
				<div class="col-sm-9">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title"></h3>
					  </div>
					  <div class="panel-body">
							<form class="" action="?user=review" method="post">
							<div class="well well-sm">
									<strong>Daftar Kendaraan </strong>
									<div class="btn-group">
										<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
											</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
											class="glyphicon glyphicon-th"></span>Grid
										</a>
									</div>
									<button type="submit" class="btn btn-success btn-sm pull-right" name="review">
										review
									</button>
							</div>
								<?php
								$sql = $Kendaraan;
								$execute = mysqli_query($conn,$sql);
								 ?>
									<div id="products" class="row list-group">
											<?php foreach ($execute as $r): ?>
											<div class="item  col-xs-4 col-lg-4">
												<div class="thumbnail">
													<?php if ($r['foto']): ?>
														<img class="group list-group-image" src="assets/images/kendaraan/<?= $r['foto']?>" alt="<?= $r['foto']?>" />
													<?php else: ?>
														<img class="group list-group-image" src="assets/images/kendaraan/default.png" alt="default.png" />
													<?php endif; ?>
													<div class="caption">
														<h4 class="group inner list-group-item-heading"><?= $r['merk']?>
														<input type="checkbox" name="checklist[]" value="<?= $r['id_kendaraan']?>" class="pull-right">
														</h4>
													</div>
													<div class="row">
														<style media="screen">
															ul li {
																list-style:none;
															}
														</style>
														<ul>
															<li><b>Type : </b><?= $r['type']?></li>
															<li><b>Warna : </b><?= $r['warna']?></li>
															<li><b>No Polisi : </b><?= $r['no_polisi']?></li>
															<li><b>Tahun Produksi : </b><?= $r['tahun_produksi']?></li>
															<li><b>Nomor Mesin : </b><?= $r['no_mesin']?></li>
															<li><b>Kapasitas Mesin : </b><?= $r['kapasitas_mesin']?></li>

														</ul>
													</div>
												</div>
											</div>
											<?php endforeach; ?>
									</div>
								</form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php elseif (isset($_POST['filter'])): ?>

				<div class="col-sm-9">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title"></h3>
					  </div>
					  <div class="panel-body">
							<div class="well well-sm">
									<strong>Daftar Kendaraan </strong>
									<div class="btn-group">
										<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
											</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
											class="glyphicon glyphicon-th"></span>Grid
										</a>
									</div>
							</div>
								<?php
									$sql = $Kendaraan."where merk ='".$_POST['merk']."' AND
									type ='".$_POST['type']."' AND
									tahun_produksi ='".$_POST['tahun_produksi']."' AND
									kapasitas_mesin ='".$_POST['kapasitas_mesin']."'";
									$query = mysqli_query($conn,$sql);
								?>
								<div id="products" class="row list-group">
									<?php foreach ($query as $r): ?>
										<div class="item  col-xs-4 col-lg-4">
											<div class="thumbnail">
												<?php if ($r['foto']): ?>
													<img class="group list-group-image" src="assets/images/kendaraan/<?= $r['foto']?>" alt="<?= $r['foto']?>" />
												<?php else: ?>
													<img class="group list-group-image" src="assets/images/kendaraan/default.png" alt="default.png" />
												<?php endif; ?>
												<div class="caption">
													<h4 class="group inner list-group-item-heading"><?= $r['merk']?>
														<input type="checkbox" name="checklist[]" value="<?= $r['id_kendaraan']?>" class="pull-right">
													</h4>
												</div>
												<div class="row">
													<style media="screen">
														ul li {
															list-style:none;
														}
													</style>
													<ul>
														<li><b>Type : </b><?= $r['type']?></li>
														<li><b>Warna : </b><?= $r['warna']?></li>
														<li><b>No Polisi : </b><?= $r['no_polisi']?></li>
														<li><b>Tahun Produksi : </b><?= $r['tahun_produksi']?></li>
														<li><b>Nomor Mesin : </b><?= $r['no_mesin']?></li>
														<li><b>Kapasitas Mesin : </b><?= $r['kapasitas_mesin']?></li>

													</ul>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
								<?php
							?>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php else: ?>
	<?php header(sprintf('location:pages/404.php')) ?>
<?php endif; ?>
