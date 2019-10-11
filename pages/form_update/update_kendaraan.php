<?php
include '../../config/conn.php';
if($_POST['id_kendaraan']) {
		$id_kendaraan = $_POST['id_kendaraan'];
		 // mengambil data berdasarkan no_polisi
		$query = mysqli_query( $conn,"SELECT * FROM kendaraan WHERE id_kendaraan = '$id_kendaraan'");
			foreach ($query as $r) {
			?>
			 <!-- MEMBUAT FORM -->
			 <form action="?user=update" name="modal_popup" enctype="multipart/form-data" method="POST">
				 <input type="hidden" name="id_kendaraan" value="<?php echo $id_kendaraan ;?>">
				 <div class="form-group" >
					  <label for="no_polisi">No Polisi :</label>
					  <input type="text" name="no_polisi" class="form-control"
					  value="<?php echo $r['no_polisi']; ?>" placeholder="nomor polisi" required="requred" />
				 </div>
				 <div class="form-group" >
					  <label for="merk">Merk :</label>
					  <input type="text" name="merk" class="form-control"
					  value="<?php echo $r['merk']; ?>" placeholder="merk mobil" required="requred" />
				 </div>
				 <div class="form-group" >
					  <label for="type">Type :</label>
					  <input type="text" name="type" class="form-control"
					  value="<?php echo $r['type']; ?>" placeholder="merk mobil" required="requred" />
				 </div>
				 <div class="form-group" >
					  <label for="warna">Warna :</label>
					  <input type="text" name="warna" class="form-control"
					  value="<?php echo $r['warna']; ?>" placeholder="warna mobil" required="requred" />
				 </div>
				 <div class="form-group" >
					  <label for="tahun_produksi">Tahun Produksi :</label>
					  <input type="number" name="tahun_produksi" class="form-control"
					  value="<?php echo $r['tahun_produksi']; ?>" placeholder="tahun produksi mobil" required="requred" />
				 </div>
				 <div class="form-group" >
					  <label for="no_mesin">Nomor Mesin :</label>
					  <input type="number" name="no_mesin" class="form-control"
					  value="<?php echo $r['no_mesin']; ?>" placeholder="nomor mesin mobil" required="requred" />
				 </div>
				 <div class="form-group" >
					  <label for="kapasitas_mesin">Kapasitas Mesin :</label>
					  <input type="number" name="kapasitas_mesin" class="form-control"
					  value="<?php echo $r['kapasitas_mesin']; ?>" placeholder="kapasitas mesin mobil" required="requred" />
				 </div>
				 <div class="form-group" >
					  <label for="biaya_sewa_kendaraan">Biaya Sewa Kendaraan :</label>
					  <input type="number" name="biaya_sewa_kendaraan" class="form-control"
					  value="<?php echo $r['biaya_sewa_kendaraan']; ?>" placeholder="Biaya Sewa Kendaraan" required="requred" />
				 </div>
				  <div class="modal-footer">
					  <button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="kendaraan">
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
