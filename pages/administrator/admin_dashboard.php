<div class="col-sm-12 ">
	<div class="well box-shadow">
		<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>

			<i class="ace-icon fa fa-check green"></i> Selamat Datang di
			<strong class="red">
				Sistem Informasi Rental Kendaraan Bermotor PT.Mandiri Cipta Sejahtera
			</strong>,
			<small>(v1.0)</small>
		</div>

		<div class="infobox infobox-green">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
			</div>
			<?php $excute = mysqli_query($conn,$Pengguna);
			$total = mysqli_num_rows($excute);
			?>
			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $total ?></span>
				<div class="infobox-content">Pengguna</div>
			</div>
		</div>
		<div class="infobox infobox-blue">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-book"></i>
			</div>
			<?php $excute = mysqli_query($conn,$Pelanggan);
			$total = mysqli_num_rows($excute);
			?>
			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $total ?></span>
				<div class="infobox-content">Pelanggan</div>
			</div>
		</div>
	</div>
</div>
