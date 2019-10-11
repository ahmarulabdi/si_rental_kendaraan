<?php
include '../../config/conn.php';
if($_POST['rusername']) {
		$username = $_POST['rusername'];
		 // mengambil data berdasarkan username
		$query = mysqli_query( $conn,"SELECT * FROM pengguna WHERE username = '$username'");
			foreach ($query as $r) {
			?>
			 <!-- MEMBUAT FORM -->
			 <form action="?user=update" name="modal_popup" enctype="multipart/form-data" method="POST">
				  <div class="form-group" style="padding-bottom: 20px;">
						<?php $old_username = $r['username']; ?>
						<input type="hidden" name="old_username" value='<?php echo $old_username; ?>'>
						<label>Username </label>:
						<input required="required" type="text" name="username" class="form-control" value="<?php echo $r['username']; ?>" />
				  </div>
				  <div class="form-group">
						<label for="password">Password :</label>
						<input class="form-control" name="password" placeholder="Password Baru"
						id="password" type="password" />
				  </div>
				  <div class="form-group">
					  <label for="password">Konfirmasi Password :</label>
					  <input class="form-control" placeholder="Konfirmasi Password" type="password"
					  name="konfirmasi_password" id="konfirmasi_password" />
					  <span id='pesan'></span>
				  </div>
				  <div class="form-group" >
					 <label for="foto">foto profil penggguna :</label><br>
					 <input type="file" name="foto" class="btn btn-info">
				  </div>

				  <div class="form-group" >
						<label for="hak_akses">Hak Akses :</label>
						<select class="form-control m-bot15" name="hak_akses">
							<?php $hak_akses = $r['hak_akses']; ?>
							<option <?php if($r['hak_akses'] == 'administrator'){echo 'selected="selected"';} ?> >Administrator</option>
							<option <?php if($r['hak_akses'] == 'manager'){echo 'selected="selected"';} ?> >Manager</option>
						</select>
				  </div>

				  	<div class="modal-footer">
						<button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="pengguna">
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
