<?php include 'config/conn.php'; ?>
<div id="ModalAddPengguna" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
            </div>
            <div class="modal-body">
                <form action="?user=create" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data" method="POST">

                    <div class="form-group" >
                        <label for="username">Username :</label>
                        <input type="text" name="username" class="form-control" placeholder="username" required="requred" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input class="form-control" name="password" placeholder="Password"
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
                           <?php
                           $hak_akses = array(
                              'administrator' => 'Administrator' ,
                              'manager' => 'Manager'
                           );
                              foreach ($hak_akses as $key => $value) {
                                 echo "<option value='".$key."'>".$value."</option>";
                              }
                           ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                       <button id="tambahkan" class="btn btn-success glyphicon glyphicon-ok" type="submit" name="pengguna">
                          Tambahkan
                       </button>
                       <button type="reset" class="btn btn-default glyphicon glyphicon-refresh">
                          Reset
                       </button>
                       <button type="reset" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true">
                          Batalkan
                       </button>
                    </div>
                </form>
                <script>
                $('#konfirmasi_password').on('keyup', function () {
                     if ($(this).val() != $('#password').val()) {
                        $('#pesan').html('password tidak sesuai').css('color', 'red')
                     } else
                        $('#pesan').html('password sesuai').css('color', 'green')
                });
                </script>
            </div>
        </div>
    </div>
</div>
<div id="ModalAddPelanggan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Pelanggan</h4>
            </div>
            <div class="modal-body">
                <form action="?user=create" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data" method="POST">
                     <div class="form-group">
                        <label for="username">Username :</label>
                       <input type="text" disabled class="form-control" value="<?php echo $user_valid; ?>">
                       <input type="hidden" name="username" value="<?php echo $user_valid; ?>">
                       <p class="help-block red">Username tidak bisa dirubah oleh Manager</p>
                     </div>
                     <div class="form-group" >
                        <label for="nama_pelanggan">Nama Pelanggan :</label>
                        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required="requred" />
                     </div>
                     <div class="form-group" >
                        <label for="email">E-Mail :</label>
                        <input type="email" name="email" class="form-control" placeholder="E-Mail Pelanggan" required="requred" />
                     </div>
                     <div class="form-group" >
                        <label for="no_telepon">Nomor Telepon :</label>
                        <input type="number" name="no_telepon" class="form-control"
                        placeholder="Nomor Telepon Pelanggan" required="requred" />
                     </div>
                     <div class="form-group" >
                        <label for="alamat">Alamat :</label>
                        <input type="text" name="alamat" class="form-control" placeholder="alamat" required="requred" />
                     </div>

                     <div class="modal-footer">
                        <button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="pelanggan">
                           Tambahkan
                        </button>
                        <button type="reset" class="btn btn-default glyphicon glyphicon-refresh">
                           Reset
                        </button>
                        <button type="reset" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true">
                           Batalkan
                        </button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ModalAddKendaraan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Kendaraan</h4>
            </div>
            <div class="modal-body">
                <form action="?user=create" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data" method="POST">

                    <div class="form-group" >
                        <label for="no_polisi">No Polisi :</label>
                        <input type="text" name="no_polisi" class="form-control" placeholder="nomor polisi" required="requred" />
                    </div>
                    <div class="form-group" >
                        <label for="merk">Merk :</label>
                        <input type="text" name="merk" class="form-control" placeholder="merk mobil" required="requred" />
                    </div>
                    <div class="form-group" >
                        <label for="type">Type :</label>
                        <input type="text" name="type" class="form-control" placeholder="merk mobil" required="requred" />
                    </div>
                    <div class="form-group" >
                        <label for="warna">Warna :</label>
                        <input type="text" name="warna" class="form-control" placeholder="warna mobil" required="requred" />
                    </div>
                    <div class="form-group" >
                        <label for="tahun_produksi">Tahun Produksi :</label>
                        <input type="number" name="tahun_produksi" class="form-control" placeholder="tahun produksi mobil" required="requred" />
                    </div>
                    <div class="form-group" >
                        <label for="no_mesin">Nomor Mesin :</label>
                        <input type="number" name="no_mesin" class="form-control" placeholder="nomor mesin mobil" required="requred" />
                    </div>
                    <div class="form-group" >
                        <label for="kapasitas_mesin">Kapasitas Mesin :</label>
                        <input type="number" name="kapasitas_mesin" class="form-control" placeholder="kapasitas mesin mobil" required="requred" />
                    </div>
                    <div class="form-group" >
                        <label for="biaya_sewa_kendaraan">Biaya Sewa Kendaraan :</label>
                        <input type="number" name="biaya_sewa_kendaraan" class="form-control" placeholder="Biaya Sewa Kendaraan" required="requred" />
                    </div>
                    <div class="modal-footer">
                       <button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="kendaraan">
                          Tambahkan
                       </button>
                       <button type="reset" class="btn btn-default glyphicon glyphicon-refresh">
                          Reset
                       </button>
                       <button type="reset" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true">
                          Batalkan
                       </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ModalAddSyarat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Persyaratan</h4>
            </div>
            <div class="modal-body">
                <form action="?user=create" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data" method="POST">
                     <div class="form-group" >
                        <label for="nama_syarat">Nama Syarat</label>
                        <input type="text" name="nama_syarat" class="form-control" placeholder="nama syarat" required="requred" />
                     </div>
                     <div class="form-group" >
                        <label for="rincian_syarat">Jenis Syarat</label>
                        <select class="form-control" name="jenis_syarat">
                           <?php
                           $jenis_syarat = $arrayName = array('perentalan' => 'perentalan' ,'perpanjangan' => 'perpanjangan' );
                           foreach ($jenis_syarat as $key => $value) {
                              echo '<option value="'.$key.'">'.$value.'</option>';
                           }
                           ?>
                        </select>
                     </div>
                     <div class="form-group" >
                        <label for="rincian_syarat">Rincian Syarat</label>
                        <textarea name="rincian_syarat" class="form-control"
                        placeholder="rincian syarat" required="required" rows="8" cols="80"></textarea>
                     </div>

                     <div class="modal-footer">
                        <button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="syarat">
                           Tambahkan
                        </button>
                        <button type="reset" class="btn btn-default glyphicon glyphicon-refresh">
                           Reset
                        </button>
                        <button type="reset" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true">
                           Batalkan
                        </button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ModalAddKetentuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Ketentuan</h4>
            </div>
            <div class="modal-body">
                <form action="?user=create" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data" method="POST">
                     <div class="form-group" >
                        <label for="nama_syarat">Nama Ketentuan</label>
                        <input type="text" name="nama_ketentuan" class="form-control" placeholder="nama ketentuan" required="requred" />
                     </div>
                     <div class="form-group" >
                        <label for="jenis_ketentuan">Jenis Ketentuan</label>
                        <select class="form-control" name="jenis_ketentuan">
                           <?php
                           $jenis_ketentuan = $arrayName = array('perentalan' => 'perentalan' ,'perpanjangan' => 'perpanjangan' );
                           foreach ($jenis_ketentuan as $key => $value) {
                              echo '<option value="'.$key.'">'.$value.'</option>';
                           }
                           ?>
                        </select>
                     </div>
                     <div class="form-group" >
                        <label for="rincian_ketentuan">Rincian Ketentuan</label>
                        <textarea name="rincian_ketentuan" class="form-control"
                        placeholder="rincian syarat" required="required" rows="8" cols="80"></textarea>
                     </div>

                     <div class="modal-footer">
                        <button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="ketentuan">
                           Tambahkan
                        </button>
                        <button type="reset" class="btn btn-default glyphicon glyphicon-refresh">
                           Reset
                        </button>
                        <button type="reset" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true">
                           Batalkan
                        </button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ModalAddSukucadang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Suku Cadang</h4>
            </div>
            <div class="modal-body">
                <form action="?user=create" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data" method="POST">
                   <div class="form-group">
                     <label for="">Jenis Suku Cadang :</label>
                     <input type="text" class="form-control" name="jenis_suku_cadang" placeholder="jenis suku cadang">
                   </div>
                    <div class="form-group">
                      <label for="">Nama Suku Cadang :</label>
                      <input type="text" class="form-control" name="nama_suku_cadang" placeholder="nama suku cadang">
                    </div>
                    <div class="form-group">
                      <label for="">Rincian Suku Cadang :</label>
                      <input type="text" class="form-control" name="rincian_suku_cadang" placeholder="rincian suku cadang">
                    </div>
                    <div class="form-group">
                      <label for="">Harga Satuan :</label>
                      <input type="number" class="form-control" name="harga_satuan" placeholder="harga satuan">
                    </div>
                    <div class="form-group">
                      <label for="">Stok :</label>
                      <input type="text" class="form-control" name="stok" placeholder="">
                    </div>
                    <div class="modal-footer">
                       <button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="suku_cadang">
                          Tambahkan
                       </button>
                       <button type="reset" class="btn btn-default glyphicon glyphicon-refresh">
                          Reset
                       </button>
                       <button type="reset" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true">
                          Batalkan
                       </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ModalAddPerawatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Perawatan</h4>
            </div>
            <div class="modal-body">
                <form action="?user=create" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data" method="POST">
                  <div class="row">
                   <div class="filterable col-sm-10">
                     <label for="">Pilih Unit Kendaraan :</label>
                     <table class="table" id="scrollable">
                       <thead>
                         <tr class="filters">
                           <th><input type="text" class="form-control" placeholder="ID Unit Kendaraan" ></th>
                           <th><input type="text" class="form-control" placeholder="Nama Pelanggan" ></th>
                         </tr>
                         <?php $execute = mysqli_query($conn,$Unit_kendaraan); ?>
                       </thead>
                       <tbody>
                         <?php foreach ($execute as $r): ?>
                           <tr>
                             <td>
                               <div class="radio">
                                 <label>
                                   <input name="form-field-radio" class="ace" type="radio" required="">
                                   <span class="lbl"><?= $r['id_unit_kendaraan']?></span>
                                 </label>
                               </div>
                             </td>
                             <td>
                               <?php
                               $sql = $Pelanggan." where id_pelanggan = ".$r['id_pelanggan'] ;
                               $pelanggan = mysqli_query($conn,$sql);
                               foreach ($pelanggan as $pe) {
                                 echo $pe['nama_pelanggan'];
                               }
                               ?>
                             </td>
                           </tr>
                         <?php endforeach; ?>
                       </tbody>
                     </table>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for=""></label>
                   <input type="text" class="form-control" id="" placeholder="">
                   <p class="help-block">Help text here.</p>
                 </div>

                </form>
            </div>
        </div>
    </div>
</div>
