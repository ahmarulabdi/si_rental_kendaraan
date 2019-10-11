<div class="col-sm-12 ">
   <div class="panel panel-success box-shadow">
     <div class="panel-heading">
       <h3 class="panel-title">Syarat Perentalan Kendaraan</h3>
     </div>
     <div class="panel-body">
        <div class="alert alert-block alert-info">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p>Manager pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk melihat syarat dan ketentuan rental</p>
        </div>
        <p>
            <a href="#" class="btn btn-success" data-target="#ModalAddSyarat" data-toggle="modal">
               <i class="fa fa-pencil">
                  Tambah Persyaratan
               </i>
            </a>
        </p>
        <table class="table table-hover" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Syarat</th>
                    <th>Jenis Syarat</th>
                </tr>
                <?php
               $query = $Syarat.'order by no_syarat';
               $excute = mysqli_query($conn,$query);
               ?>
            </thead>
            <tbody>
                <?php while ($r = mysqli_fetch_array($excute)) { ?>
                <tr>
                    <td>
                       <h3>
                          <span class="badge badge-success">
                          <?php echo $r['no_syarat']; ?>
                       </h3>
                       </span>
                    </td>
                    <td>
                          <h3>
                             <?php echo $r['nama_syarat']; ?>
                          </h3>
                          <blockquote>
                             <?php echo $r['rincian_syarat']; ?>
                             <br>
                             <?php echo "<a href='#myModalSyarat' class='btn btn-primary btn-xs' id='custId' data-toggle='modal'
                             data-no_syarat=".$r['no_syarat']."><i class='fa fa-pencil-square-o'></i>Update</a>"; ?>
                             <a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&no_syarat=<?php echo $r['no_syarat']; ?>&navbar=1');">
                                <i class="fa fa-trash-o"></i>Delete
                             </a>
                          </blockquote>
                    </td>
                    <td>
                       <?php
                       $jenis_syarat = $r['jenis_syarat'];
                       if ($jenis_syarat == 'perentalan') {?>
                          <span class="label label-success">Perentalan</span>
                          <?php
                       } else {?>
                          <span class="label label-primary">Perpanjangan</span>
                       <?php }?>
                    </td>


                </tr>
                <?php } ?>
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
                <h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data Syarat ?</h4>
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
<div class="modal fade" id="myModalSyarat" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Persyaratan</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>

        </div>
    </div>
    <!-- javascript Popup untuk update -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModalSyarat').on('show.bs.modal', function(e) {
                var no_syarat = $(e.relatedTarget).data('no_syarat');
                $.ajax({
                    type: 'post',
                    url: 'pages/form_update/update_syarat.php',
                    data: 'no_syarat=' + no_syarat,
                    success: function(data) {
                        $('.fetched-data').html(data);
                    }
                });
            });
        });
    </script>
