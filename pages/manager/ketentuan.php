<div class="col-sm-12 ">
   <div class="panel panel-success box-shadow">
     <div class="panel-heading">
       <h3 class="panel-title">Ketentuan Perentalan Kendaraan</h3>
     </div>
     <div class="panel-body">
        <div class="alert alert-block alert-info">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <p>Manager pada Sistem Informasi Rental Kendaraan memiliki kewenangan untuk Ketentuan Rental</p>
        </div>
        <p>
            <a href="#" class="btn btn-success" data-target="#ModalAddKetentuan" data-toggle="modal">
               <i class="fa fa-pencil">
                  Tambah Ketentuan
               </i>
            </a>
        </p>
        <table id="example" class="table table-hover" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Ketentuan</th>
                    <th>Jenis Ketentuan</th>
                </tr>
                <?php
               $query = $Ketentuan.'order by no_ketentuan';
               $excute = mysqli_query($conn,$query);
               ?>
            </thead>
            <tbody>
                <?php while ($r = mysqli_fetch_array($excute)) { ?>
                <tr>
                    <td>
                       <h3>
                          <span class="badge badge-success">
                          <?php echo $r['no_ketentuan']; ?>
                       </h3>
                       </span>
                    </td>
                    <td>
                          <h3>
                             <?php echo $r['nama_ketentuan']; ?>
                          </h3>
                          <blockquote>
                             <?php echo $r['rincian_ketentuan']; ?>
                             <br>
                             <?php echo "<a href='#myModalKetentuan' class='btn btn-primary btn-xs' id='custId' data-toggle='modal'
                             data-no_ketentuan=".$r['no_ketentuan']."><i class='fa fa-pencil-square-o'></i>Update</a>"; ?>
                             <a class='btn btn-danger btn-xs' href="#" onclick="confirm_modal('?user=delete&no_ketentuan=<?php echo $r['no_ketentuan']; ?>&navbar=1');">
                                <i class="fa fa-trash-o"></i>Delete
                             </a>
                          </blockquote>
                    </td>
                    <td>
                       <?php
                       $jenis_ketentuan = $r['jenis_ketentuan'];
                       if ($jenis_ketentuan == 'perentalan') {?>
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
                <h4 class="modal-title" style="text-align:center;">Apakan Anda Ingin Hapus Data ketentuan ?</h4>
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
<div class="modal fade" id="myModalKetentuan" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Ketentuan</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>

        </div>
    </div>
    <!-- javascript Popup untuk update -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModalKetentuan').on('show.bs.modal', function(e) {
                var no_ketentuan = $(e.relatedTarget).data('no_ketentuan');
                $.ajax({
                    type: 'post',
                    url: 'pages/form_update/update_ketentuan.php',
                    data: 'no_ketentuan=' + no_ketentuan,
                    success: function(data) {
                        $('.fetched-data').html(data);
                    }
                });
            });
        });
    </script>
