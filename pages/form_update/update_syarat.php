<?php
include '../../config/conn.php';
if($_POST['no_syarat']) {
		$no_syarat = $_POST['no_syarat'];
		 // mengambil data berdasarkan no_syarat
		$query = mysqli_query( $conn,$Syarat."WHERE no_syarat = '$no_syarat'");
			foreach ($query as $r) {
			?>
			 <!-- MEMBUAT FORM -->
		 	<form action="?user=update" name="modal_popup" enctype="multipart/form-data" method="POST">
			 	<input type="hidden" name="no_syarat" value="<?php echo $no_syarat; ?>">
			 	<div class="form-group">
				   <label for="">Nama syarat</label>
				   <input type="text" value="<?php echo $r['nama_syarat']?>" class="form-control" name="nama_syarat" placeholder="nama_syarat">
			 	</div>
			 	<div class="form-group">
				   <label for="">Jenis Syarat</label>
					<?php echo $r['jenis_syarat']; ?>
				   <select class="form-control" name="jenis_syarat">
						<option <?php if($r['jenis_syarat'] == 'perentalan'){echo 'selected="selected"';} ?> value="perentalan" >Perentalan</option>
						<option <?php if($r['jenis_syarat'] == 'perpanjangan'){echo 'selected="selected"';} ?> value="perpanjangan" >Perpanjangan</option>
				   </select>
			 	</div>
			 	<div class="form-group">
				   <label for="">Rincian Syarat</label>
				   <input type="text" class="form-control" value="<?php echo $r['rincian_syarat']?>" name="rincian_syarat" placeholder="rincian syarat">
			 	</div>
			  	<div class="modal-footer">
					<button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="syarat">
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
