<div class="col-sm-12">
	<div class="panel panel-success box-shadow">
		<div class="panel-heading">
			<h3 class="panel-title">Kelola Data Suku Cadang</h3>
		</div>
		<div class="panel-body">
			<div class="alert alert-block alert-info">
				<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
				<p>Manager pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk mengelola data Suku Cadang</p>
			</div>
			<p>

			<a href="#" class="btn btn-success" data-target="#ModalAddSukucadang" data-toggle="modal">
				<i class="fa fa-pencil"></i>Tambah Suku Cadang
			</a>

			</p>
			<table id="example" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Jenis Suku Cadang</th>
						<th>Nama Suku Cadang</th>
						<th>Rincian Suku Cadang</th>
						<th>Harga Satuan</th>
						<th>Stok</th>
						<th>Created at</th>
						<th>Updated_at</th>
						<th>Aksi</th>
					</tr>
					<?php $excute = mysqli_query($conn,$Suku_cadang."order by id_suku_cadang"); ?>
				</thead>
				<tbody>
					<?php while ($r = mysqli_fetch_array($excute)) { ?>
					<tr>
						<td><?php echo $r['id_suku_cadang']; ?></td>
						<td><?php echo $r['jenis_suku_cadang']; ?></td>
						<td><?php echo $r['nama_suku_cadang']; ?></td>
						<td><?php echo $r['rincian_suku_cadang']; ?></td>
						<td><?php echo $r['harga_satuan']; ?></td>
						<td><?php echo $r['stok']; ?></td>
						<td><?php echo $r['created_at']; ?></td>
						<td><?php echo $r['updated_at']; ?></td>
						</td>

						<td>
							<?php echo "<a href='#myModalSukucadang' class='btn btn-primary btn-xs' id='custId' data-toggle='modal'
								  data-id_suku_cadang=".$r['id_suku_cadang']."><i class='fa fa-pencil-square-o'></i> Update</a>"; ?>
							<a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&id_suku_cadang=<?php echo $r['id_suku_cadang']; ?>&navbar=1');">
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
				<h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data Suku Cadang ?</h4>
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
<div class="modal fade" id="myModalSukucadang" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Suku Cadang</h4>
			</div>
			<div class="modal-body">
				<div class="fetched-data"></div>
			</div>

		</div>
	</div>
	<!-- javascript Popup untuk update -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#myModalSukucadang').on('show.bs.modal', function(e) {
				var id_suku_cadang = $(e.relatedTarget).data('id_suku_cadang');
				$.ajax({
					type: 'post',
					url: 'pages/form_update/update_suku_cadang.php',
					data: 'id_suku_cadang=' + id_suku_cadang,
					success: function(data) {
						$('.fetched-data').html(data);
					}
				});
			});
		});
	</script>
