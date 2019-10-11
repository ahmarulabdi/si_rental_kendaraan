<div class="col-sm-12">
	<div class="panel panel-success box-shadow">
		<div class="panel-heading">
			<h3 class="panel-title">Kelola Data kendaraan</h3>
		</div>
		<div class="panel-body">
			<div class="alert alert-block alert-info">
				<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
				<p>Manager pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk mengelola data kendaraan</p>
			</div>
			<p>
				<a href="#" class="btn btn-success" data-target="#ModalAddKendaraan" data-toggle="modal">
					<i class="fa fa-pencil"></i>
					Tambah Kendaraan
				</a>
			</p>
			<table id="example" class="table table-striped table-bordered table-hover" role="grid" aria-describedby="dynamic-table_info">
				<thead>
					<tr>
						<th>No Polisi</th>
						<th>Merk</th>
						<th>Type</th>
						<th>Warna</th>
						<th>tahun Produksi</th>
						<th>Nomor Mesin</th>
						<th>Kapasitas Mesin</th>
						<th>Biaya Sewa kendaraan</th>
						<th>Status Kendaraan</th>
						<th>Aksi</th>
					</tr>
					<?php
  			$excute = mysqli_query($conn,$Kendaraan."order by id_kendaraan");
  			$i = 1;
  			?>
				</thead>
				<tbody>
					<?php while ($r = mysqli_fetch_array($excute)) { ?>
					<tr>
						<td><?= $r['no_polisi']; ?></td>
						<td><?= $r['merk']; ?></td>
						<td><?= $r['type']; ?></td>
						<td><?= $r['warna']; ?></td>
						<td><?= $r['tahun_produksi']; ?></td>
						<td><?= $r['no_mesin']; ?></td>
						<td><?= $r['kapasitas_mesin']; ?></td>
						<td><?= $r['biaya_sewa_kendaraan']; ?></td>
						<td><?= $r['status_kendaraan']; ?></td>
						<td>
							<div class="btn-group btn-group-sm btn-group-vertical">
								<?php echo "<a href='#myModalKendaraan' class='btn btn-primary btn-xs' id='custId' data-toggle='modal'
								data-id_kendaraan=".$r['id_kendaraan']."><i class='fa fa-pencil-square-o'></i></a>"; ?>
								<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&id_kendaraan=<?php echo $r['id_kendaraan']; ?>&navbar=1');">
									<i class="fa fa-trash-o"></i>
								</a>
							</div>
						</td>
					</tr>
					<?php
  				} ?>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">

		</div>
	</div>
</div>
<!-- INPUT -->
<!-- Modal Popup untuk input-->
<?php include 'pages/form_create.php'; ?>
<!-- Modal Popup untuk input-->


<!-- DELETE -->
<!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data Pengguna ?</h4>
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
<div class="modal fade" id="myModalKendaraan" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Kendaraan</h4>
			</div>
			<div class="modal-body">
				<div class="fetched-data"></div>
			</div>

		</div>
	</div>
	<!-- javascript Popup untuk update -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#myModalKendaraan').on('show.bs.modal', function(e) {
				var id_kendaraan = $(e.relatedTarget).data('id_kendaraan');
				$.ajax({
					type: 'post',
					url: 'pages/form_update/update_kendaraan.php',
					data: 'id_kendaraan=' + id_kendaraan,
					success: function(data) {
						$('.fetched-data').html(data);
					}
				});
			});
		});
	</script>
