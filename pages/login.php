<div class="login-layout light-login">
   <div class="main-container">
      <div class="main-content">
         <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
               <div class="login-container">
                  <div class="center">
                     <h1>
                        <span class="red">Sistem Informasi</span>
                        <br>
                        <span class="black" id="id-text2">RENTAL KENDARAAN</span>
                     </h1>
                     <h4 class="blue" id="id-company-text">&copy; PT. Mandiri Cipta Sejahtera</h4>
                  </div>

                  <div class="space-6"></div>

                  <div class="position-relative">
                     <div id="login-box" class="login-box widget-box no-border visible">
                        <div class="widget-body box-shadow">
                           <div class="widget-main">
                              <h5 class="header blue lighter bigger">
                                 <?php
                                 if (isset($_GET['success'])) {
                                    include 'config/conn.php';
                                    $success = $_GET['success'];
                                    $decrypt = md5($success);
                                    $query = $Pengguna."where username = '$decrypt'";
                                    $execute = mysqli_query($conn,$query);
                                    if ($execute) { ?>
                                       <div class="alert alert-block alert-info">
                                          <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                                          <span class="center">
                                             <h3>
                                                Registrasi Sukses <i class="fa fa-check"></i>
                                             </h3>
                                          </span>

                                       </div>
                                    <?php
                                    }
                                 }
                                  ?>
                                 <i class="ace-icon fa fa-coffee green"></i>
                                 Masukkan Username Dan Password
                              </h5>

                              <div class="space-6"></div>
                                 <form role="form" method="post" action="?user=auth" >
                                 <fieldset>
                                    <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                          <input type="text" class="form-control" name="txtusername" placeholder="Username" required="">
                                          <i class="ace-icon fa fa-user"></i>
                                       </span>
                                    </label>

                                    <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                          <input type="password" class="form-control" name="txtpassword" placeholder="Password" required="">
                                          <i class="ace-icon fa fa-lock"></i>
                                       </span>
                                    </label>

                                    <div class="space"></div>

                                    <div class="clearfix">

                                       <button class="btn btn-primary btn-block" type="submit" name="btnlogin" >
                                          <i class="ace-icon fa fa-key"></i>
                                          Log In
                                       </button>

                                    </div>

                                    <div class="space-4"></div>
                                 </fieldset>
                              </form>
                           </div><!-- /.widget-main -->

                           <div class="toolbar clearfix">
                              <div>

                              </div>

                              <div>
                                 <a href="#" data-target="#signup-box" class="user-signup-link">
                                    Registrasi Pelanggan
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                 </a>
                              </div>
                           </div>
                        </div><!-- /.widget-body -->
                     </div><!-- /.login-box -->

                     <div id="forgot-box" class="forgot-box widget-box no-border ">
                        <div class="widget-body">
                           <div class="widget-main">
                              <h4 class="header red lighter bigger">
                                 <i class="ace-icon fa fa-key"></i>
                                 Retrieve Password
                              </h4>

                              <div class="space-6"></div>
                              <p>
                                 Enter your email and to receive instructions
                              </p>

                              <form>
                                 <fieldset>
                                    <label class="block clearfix">
                                       <span class="block input-icon input-icon-right">
                                          <input type="email" class="form-control" placeholder="Email" />
                                          <i class="ace-icon fa fa-envelope"></i>
                                       </span>
                                    </label>

                                    <div class="clearfix">
                                       <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                          <i class="ace-icon fa fa-lightbulb-o"></i>
                                          <span class="bigger-110">Send Me!</span>
                                       </button>
                                    </div>
                                 </fieldset>
                              </form>
                           </div><!-- /.widget-main -->

                           <div class="toolbar center">
                              <a href="#" data-target="#login-box" class="back-to-login-link">
                                 Back to login
                                 <i class="ace-icon fa fa-arrow-right"></i>
                              </a>
                           </div>
                        </div><!-- /.widget-body -->
                     </div><!-- /.forgot-box -->

                  </div><!-- /.position-relative -->

               </div>
               <div id="signup-box" class="signup-box widget-box no-border">
                        <div class="widget-body box-shadow">
                           <div class="widget-main">
                              <h4 class="header green lighter bigger">
                                 <i class="ace-icon fa fa-users blue"></i>
                                 Daftar Pelanggan Baru
                              </h4>

                              <div class="space-6"></div>

                              <form action="?user=create" method="post" enctype="multipart/form-data" name="modal_popup" enctype="multipart/form-data">
                                 <fieldset>
                                    <div class="col-lg-3">
                                       <input type="file" name="foto" >
                                       <img id="avatar" class="editable img-responsive editable-click editable-empty"
                                       alt="Alex's Avatar" src="assets/images/avatars/avadefault.png">
                                    </div>
                                    <div class="col-lg-9">
                                       <label class="block clearfix">
                                          <span class="block input-icon input-icon-right form form-inline">
                                             <div class="input-group col-lg-5">
                                                <span class="input-group-addon width-20">
                                                   <i class="ace-icon fa fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" name="username" required="required"
                                                placeholder="Username" />
                                             </div>
                                             <div class="input-group col-lg-5">
                                                <span class="input-group-addon width-20">
                                                   <i class="ace-icon fa fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" name="alamat" required="required"
                                                placeholder="Alamat" />
                                             </div>
                                          </span>
                                       </label>
                                       <label class="block clearfix">
                                          <span class="block input-icon input-icon-right form form-inline">
                                             <div class="input-group col-lg-5">
                                                <span class="input-group-addon width-20">
                                                   <i class="ace-icon fa fa-pencil"></i>
                                                </span>
                                                <input type="text" class="form-control"  name="nama_pelanggan" required="required"
                                                placeholder="Nama lengkap" />
                                             </div>
                                             <div class="input-group col-lg-5">
                                                <span class="input-group-addon width-20">
                                                   <i class="ace-icon fa fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" name="password" required="required"
                                                placeholder="Password" />
                                             </div>
                                          </span>
                                       </label>
                                       <label class="block clearfix">
                                          <span class="block input-icon input-icon-right form form-inline">
                                             <div class="input-group col-lg-5">
                                                <span class="input-group-addon width-20">
                                                   <i class="ace-icon fa fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control" name="email" required="required"
                                                placeholder="Email" />
                                             </div>
                                             <div class="input-group col-lg-5">
                                                <span class="input-group-addon width-20">
                                                   <i class="ace-icon fa fa-retweet"></i>
                                                </span>
                                                <input type="password" class="form-control" name="konfirmasi_password" required="required"
                                                placeholder="Konfirmasi password" />
                                             </div>


                                          </span>
                                       </label>
                                       <label class="block clearfix">
                                          <span class="block input-icon input-icon-right form form-inline">
                                             <div class="input-group col-lg-5">
                                                <span class="input-group-addon width-20">
                                                   <i class="ace-icon fa fa-phone"></i>
                                                </span>
                                                <input type="text" class="form-control" name="no_telepon" required="required"
                                                placeholder="No telepon" />
                                             </div>
                                             <?php if (isset($_GET['signup'])): ?>
                                                <?php if ($_GET['signup'] == 'false'): ?>
                                                   <?php echo '<span class="red">password tidak sesuai</span>'; ?>
                                                <?php endif; ?>
                                             <?php endif; ?>
                                          </span>
                                       </label>

                                       <div class="clearfix">
                                          <button type="submit" class="col-lg-5  btn btn-sm btn-success"
                                          name="registrasi">
                                             <span class="bigger-110">Registrasi</span>
                                             <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                          </button>
                                          <button type="reset" class="col-lg-5 btn btn-sm">
                                             <i class="ace-icon fa fa-refresh"></i>
                                             <span class="bigger-110">Reset</span>
                                          </button>
                                       </div>
                                    </div>

                                 </fieldset>
                              </form>
                           </div>

                           <div class="toolbar center">
                              <a href="#" data-target="#login-box" class="back-to-login-link">
                                 <i class="ace-icon fa fa-arrow-left"></i>
                                 Back to login
                              </a>
                           </div>
                        </div><!-- /.widget-body -->
                  </div><!-- /.signup-box -->
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.main-content -->
   </div><!-- /.main-container -->

   <script src="assets/js/jquery-2.1.4.min.js"></script>

   <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
   </script>

   <!-- inline scripts related to this page -->
   <script type="text/javascript">
      jQuery(function($) {
       $(document).on('click', '.toolbar a[data-target]', function(e) {
         e.preventDefault();
         var target = $(this).data('target');
         $('.widget-box.visible').removeClass('visible');//hide others
         $(target).addClass('visible');//show target
       });
      });

   </script>
</div>
