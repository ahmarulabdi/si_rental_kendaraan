<?php
include '../../config/conn.php';
if($_POST['id_suku_cadang']) {
		$id_suku_cadang = $_POST['id_suku_cadang'];
		 // mengambil data berdasarkan id_suku_cadang
		$query = mysqli_query( $conn,$Suku_cadang."WHERE id_suku_cadang = '$id_suku_cadang'");
			foreach ($query as $r) {
			?>
			 <!-- MEMBUAT FORM -->
		 	<form action="?user=update" name="modal_popup" enctype="multipart/form-data" method="POST">
			 	<input type="hidden" name="id_suku_cadang" value="<?php echo $id_suku_cadang; ?>">
				<div class="form-group">
				  <label for="">Jenis Suku Cadang :</label>
				  <input type="text" class="form-control" value="<?php echo $r['jenis_suku_cadang'];?>"
				  name="jenis_suku_cadang" placeholder="jenis suku cadang">
				</div>
				 <div class="form-group">
					<label for="">Nama Suku Cadang :</label>
					<input type="text" class="form-control" value="<?php echo $r['nama_suku_cadang'];?>"
					name="nama_suku_cadang" placeholder="nama suku cadang">
				 </div>
				 <div class="form-group">
					<label for="">Rincian Suku Cadang :</label>
					<input type="text" class="form-control" value="<?php echo $r['rincian_suku_cadang'];?>"
					name="rincian_suku_cadang" placeholder="rincian suku cadang">
				 </div>
				 <div class="form-group">
					<label for="">Harga Satuan :</label>
					<input type="number" class="form-control" value="<?php echo $r['harga_satuan'];?>"
					name="harga_satuan" placeholder="harga satuan">
				 </div>
				 <div class="form-group">
					<label for="">Stok :</label>
					<input type="text" class="form-control" value="<?php echo $r['stok'];?>"
					name="stok" placeholder="">
				 </div>
			  	<div class="modal-footer">
					<button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="suku_cadang">
						Tambahkan
					</button>
					<button type="reset" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true">
						Batalkan
					</button>
			  	</div>

		 	</form>
	<?php
			}
}
 ?>
