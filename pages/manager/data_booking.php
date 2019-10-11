<div class="col-sm-12">
	<div class="panel panel-success box-shadow">
		<div class="panel-heading">
			<h3 class="panel-title">Kelola Data Booking Kendaraan</h3>
		</div>
		<div class="panel-body">
			<div class="alert alert-block alert-info">
				<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
				<p>Manager pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk mengelola data Booking Kendaraan</p>
			</div>
			<!-- <p>
				<a href="#" class="btn btn-success" data-target="#ModalAddKendaraan" data-toggle="modal">
					<i class="fa fa-pencil"></i>
					Tambah Kendaraan
				</a>
			</p> -->
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<td>#</td>
						<td>ID pelanggan</td>
						<td>ID Unit Kendaraan</td>
						<td>Tanggal Booking</td>
						<td>Waktu Booking</td>
						<td>Created at</td>
						<td>Updated at</td>
						<td>Aksi</td>
					</tr>
					<?php
  			$excute = mysqli_query($conn,$Booking."order by id_booking");
  			$i = 1;
  			?>
				</thead>
				<tbody>
					<?php while ($r = mysqli_fetch_array($excute)) { ?>
					<tr>
						<td><?php echo $r['id_booking']; ?></td>
						<td><?php echo $r['id_pelanggan']; ?></td>
						<td><?php echo $r['id_unit_kendaraan']; ?></td>
						<td><?php echo $r['tanggal_booking']; ?></td>
						<td><?php echo $r['waktu_booking']; ?></td>
						<td><?php echo $r['created_at']; ?></td>
						<td><?php echo $r['updated_at']; ?></td>
						<td>
							<?php
								// echo "<a href='#myModalKendaraan' class='btn btn-primary btn-xs' id='custId' data-toggle='modal'
  							// data-id_kendaraan=".$r['id_kendaraan']."><i class='fa fa-pencil-square-o'></i> Update</a>";
							?>
							<!-- <a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&id_kendaraan=<?php //echo $r['id_kendaraan']; ?>&navbar=1');">
								<i class="fa fa-trash-o"></i>
								Delete
							</a> -->
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
