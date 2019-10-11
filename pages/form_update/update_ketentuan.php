<?php
include '../../config/conn.php';
if($_POST['no_ketentuan']) {
		$no_ketentuan = $_POST['no_ketentuan'];
		 // mengambil data berdasarkan no_ketentuan
		$query = mysqli_query( $conn,$Ketentuan."WHERE no_ketentuan = $no_ketentuan");

			foreach ($query as $r) {
			?>
			 <!-- MEMBUAT FORM -->
		 	<form action="?user=update" name="modal_popup" enctype="multipart/form-data" method="POST">
			 	<input type="hidden" name="no_ketentuan" value="<?php echo $no_ketentuan; ?>">
			 	<div class="form-group">
				   <label for="">Nama ketentuan</label>
				   <input type="text" value="<?php echo $r['nama_ketentuan']?>" class="form-control" name="nama_ketentuan" placeholder="nama_ketentuan">
			 	</div>
			 	<div class="form-group">
				   <label for="">Jenis ketentuan</label>
					<?php echo $r['jenis_ketentuan']; ?>
				   <select class="form-control" name="jenis_ketentuan">
						<option <?php if($r['jenis_ketentuan'] == 'perentalan'){echo 'selected="selected"';} ?> value="perentalan" >Perentalan</option>
						<option <?php if($r['jenis_ketentuan'] == 'perpanjangan'){echo 'selected="selected"';} ?> value="perpanjangan" >Perpanjangan</option>
				   </select>
			 	</div>
			 	<div class="form-group">
				   <label for="">Rincian ketentuan</label>
				   <input type="text" class="form-control" value="<?php echo $r['rincian_ketentuan']?>" name="rincian_ketentuan" placeholder="rincian ketentuan">
			 	</div>
			  	<div class="modal-footer">
					<button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="ketentuan">
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
