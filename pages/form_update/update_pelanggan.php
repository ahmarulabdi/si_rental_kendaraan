<?php
include '../../config/conn.php';
if($_POST['id_pelanggan']) {
		$id_pelanggan = $_POST['id_pelanggan'];
		 // mengambil data berdasarkan username
		$query = mysqli_query( $conn,"SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
		foreach ($query as $r) {
			?>
			 <!-- MEMBUAT FORM -->
			<form action="?user=update" name="modal_popup" enctype="multipart/form-data" method="POST">
				<input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
				<div class="form-group">
					<label for="username">Username :</label>
				  	<input type="text" disabled class="form-control" value="<?php echo $r['username']; ?>">
				  	<p class="help-block red">Username tidak bisa dirubah oleh Manager</p>
				</div>
				<div class="form-group" >
					<label for="nama_pelanggan">Nama Pelanggan :</label>
					<input type="text" name="nama_pelanggan" value="<?php echo $r['nama_pelanggan']; ?>"
					class="form-control" placeholder="Nama Pelanggan" required="requred" />
				</div>
				<div class="form-group" >
					<label for="email">E-Mail :</label>
					<input type="email" name="email" class="form-control" value="<?php echo $r['email']; ?>"
					placeholder="E-Mail Pelanggan" required="requred" />
				</div>
				<div class="form-group" >
					<label for="no_telepon">Nomor Telepon :</label>
					<input type="number" name="no_telepon" class="form-control" value="<?php echo $r['no_telepon']; ?>"
					placeholder="Nomor Telepon Pelanggan" required="requred" />
				</div>
				<div class="form-group" >
					<label for="alamat">Alamat :</label>
					<input type="text" name="alamat" class="form-control" value="<?php echo $r['alamat']; ?>"
					placeholder="alamat" required="requred" />
				</div>
				<div class="form-group">
					<label for="tujuan_rental">Tujuan Rental :</label>
					<input type="text" disabled="disabled" class="form-control"
					value="<?php echo $r['tujuan_rental']; ?>">
					<p class="help-block red">Tujuan Rental Hanya bisa dirubah oleh Akun Pelanggan</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="pelanggan">
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
