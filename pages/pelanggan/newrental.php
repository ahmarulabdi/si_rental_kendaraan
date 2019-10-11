<div class="container">
	<div class="row">
		<div class="col-sm-12 widget-container-col ui-sortable" id="widget-container-col-10">
			<div class="widget-box ui-sortable-handle" id="widget-box-10">
				<div class="widget-header widget-header-small">
					<div class="widget-toolbar no-border">
						<ul class="nav nav-tabs" id="myTab">
							<li class="">
								<a data-toggle="tab" href="#home" aria-expanded="false">Syarat</a>
							</li>

							<li class="active">
								<a data-toggle="tab" href="#profile" aria-expanded="true">Ketentuan</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="widget-body">
					<div class="widget-main padding-6">
						<div class="tab-content">
							<div id="home" class="tab-pane">
								<?php
									$sql = $Syarat." where jenis_syarat = 'perentalan' order by no_syarat";
									$execute = mysqli_query($conn,$sql);
									$i=1;
								?>
								<?php if ($execute): ?>
									<?php foreach ($execute as $r ): ?>
										<ul class="list-group">
											<li class="list-group-item">
												<h5>
													<?= $i++ ?>
													<?= $r['nama_syarat']?>
												</h5>
												<?= $r['rincian_syarat']?>
											</li>
										</ul>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>

							<div id="profile" class="tab-pane active">
								<?php
									$sql = $Ketentuan." where jenis_ketentuan = 'perentalan' order by no_ketentuan";
									$execute = mysqli_query($conn,$sql);
									$i=1;
								?>
								<?php if ($execute): ?>
									<?php foreach ($execute as $r ): ?>
										<ul class="list-group">
											<li class="list-group-item">
												<h5>
													<?= $i++ ?>
													<?= $r['nama_ketentuan']?>
												</h5>
												<?= $r['rincian_ketentuan']?>
											</li>
										</ul>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<form class="" action="?user=newrentaltrue" method="post">
								<button type="submit" name="all" class="btn btn-success">
									Menyetujui Syarat dan Ketentuan
								</button>
							</form>
							<span class="blue pull-right">
								Syarat dan Ketentuan  berlaku mutlak selama kegiatan perentalan
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
