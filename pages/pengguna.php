<div class="col-sm-12 ">
    <div class="panel panel-success box-shadow">
        <div class="panel-heading">
            <h3 class="panel-title">Akun Pengguna</h3>
        </div>
        <div class="panel-body">
            <div class="alert alert-block alert-info">
                <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                <?php if ($hak_akses == 'administrator'): ?>
                <p>administrator pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk mengelola data akun pengguna</p>
                <?php elseif($hak_akses == 'manager'): ?>
                <p>Manager pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk melihat data akun pengguna</p>
                <?php endif; ?>
            </div>
          <?php if (isset($_GET['false'])): ?>
    				<div class="alert alert-block alert-danger">
    					<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
    					<p>Pengguna tidak bisa dihapus oleh Administrator ketika masih mempunyai status Sebagai Pelanggan </p>
    				</div>
    			<?php endif; ?>
            <?php if ($hak_akses == 'administrator'):?>
            <p>
                <a href="#" class="btn btn-success btn-block" data-target="#ModalAddPengguna" data-toggle="modal">
                    <i class="fa fa-pencil"></i> Tambah Pengguna
                </a>
            </p>
            <?php endif; ?>
            <div class="filterable">
              <!-- <button style="margin:20px"class="btn btn-info pull-right btn-block btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button> -->
              <table id="example" class="table table-striped table-bordered table-hover dataTable no-footer " role="grid" aria-describedby="dynamic-table_info">
                <thead>
                    <tr class="filters">
                        <th>No.</th>
                        <th>foto</th>
                        <th>username</th>
                        <th>hak akses</th>
                        <th>create at <i class="ace-icon fa fa-clock-o bigger-110 red"></i></th>
                        <th>update at <i class="ace-icon fa fa-clock-o bigger-110 red"></i></th>
                        <?php if ($hak_akses == 'administrator'): ?>
                        <th>aksi</th>
                        <?php endif; ?>
                    </tr>
                    <?php
                  $query = $Pengguna.'WHERE username != "'.$username.'"';
                  $excute = mysqli_query($conn,$query);
                  $i = 1;
               ?>
                </thead>
                <tbody>
                    <?php while ($r = mysqli_fetch_array($excute)) { ?>
                    <tr>
                        <td>
                            <?php echo $i++."."; ?>
                        </td>
                        <td><img src='assets/images/avatars/<?php echo $r['foto']?>'; width='36' height='36'></td>
                        <td><?php echo $r['username']; ?></td>
                        <td><?php echo $r['hak_akses']; ?></td>
                        <td><?php echo $r['created_at']; ?></td>
                        <td><?php echo $r['updated_at']; ?></td>
                        <?php if ($hak_akses == 'administrator'): ?>
                        <td>
                            <?php echo
                        "<a href='#myModalpengguna' class='btn btn-primary btn-xs' id='custId' data-toggle='modal'
                    		data-username=".$r['username']."><i class='fa fa-pencil-square-o'></i> Update</a>";
                        ?>
                            <a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&username=<?php echo $r['username']; ?>&navbar=1');">
                                <i class="fa fa-trash-o"></i> Delete
                            </a>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
          </div>
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
<!-- Modal Popup untuk delete-->
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
<div class="modal fade" id="myModalpengguna" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Pengguna</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>

        </div>
    </div>
</div>
<!-- javascript Popup untuk update -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myModalpengguna').on('show.bs.modal', function(e) {
            var rusername = $(e.relatedTarget).data('username');
            $.ajax({
                type: 'post',
                url: 'pages/form_update/update_pengguna.php',
                data: 'rusername=' + rusername,
                success: function(data) {
                    $('.fetched-data').html(data);
                }
            });
        });
    });
</script>
