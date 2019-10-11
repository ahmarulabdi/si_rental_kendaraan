<?php if (isset($_SESSION['SES_rentalkendaraan'])): ?>
<div id="navbar" class="navbar navbar-fixed-top ace-save-state box-shadow">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
      <span class="sr-only">Toggle sidebar</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand">
                <small>
                  SISTEM RENTAL
               </small>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <?php include 'config/user.php'; ?>
          <ul class="nav ace-nav pull-right">
              <li class="light-blue dropdown-modal">
                  <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                      <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
                      <span class="user-info">
                         <small>Welcome,</small>
                         <?php echo $username ?>
                      </span>
                      <i class="ace-icon fa fa-caret-down"></i>
                  </a>
                  <!-- panel dropdown setting user -->
                  <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                      <li>
                          <a href="#">
                              <i class="ace-icon fa fa-cog"></i> Settings
                          </a>
                      </li>

                      <li>
                          <a href="?user=profile">
                              <i class="ace-icon fa fa-user"></i> Profile
                          </a>
                      </li>
                      <li>
                          <a href="?user=profile">
                              <i class="ace-icon fa fa-bullhorn"></i>Bantuan
                          </a>
                      </li>

                      <li class="divider"></li>

                      <li>
                          <a href="?user=logout">
                              <i class="ace-icon fa fa-power-off"></i> Logout
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
            <?php if ($hak_akses == 'administrator') : ?>
              <ul class="nav ace-nav">
                  <li class="active"><a href="?user=admin_dashboard">Home</a></li>
                  <li class="green">
                      <a href="?user=pengguna" aria-expanded="true">
                          <i class="ace-icon fa fa-user"></i> Pengguna
                      </a>
                  </li>
                  
              </ul>
            <?php elseif($hak_akses == 'manager') : ?>
              <ul class="nav ace-nav navbar-right">
                  <li class="purple dropdown-modal">
                      <!-- <a data-toggle="dropdown" class="dropdown-toggle" title="Notikasi" href="#">
                          <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                          <span class="badge badge-important">8</span>
                      </a> -->
                      <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                          <li class="dropdown-header">
                              <i class="ace-icon fa fa-exclamation-triangle"></i> 8 Notifications
                          </li>

                          <li class="dropdown-content ace-scroll" style="position: relative;">
                              <div class="scroll-track" style="display: none;">
                                  <div class="scroll-bar"></div>
                              </div>
                              <div class="scroll-content" style="max-height: 200px;">
                                  <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                      <li>
                                          <a href="#">
                                              <div class="clearfix">
                                                  <span class="pull-left">
                        														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                        														New Orders
                        													</span>
                                                  <span class="pull-right badge badge-success">+8</span>
                                              </div>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                          </li>

                          <li class="dropdown-footer">
                              <a href="#">
  										See all notifications
  										<i class="ace-icon fa fa-arrow-right"></i>
  									</a>
                          </li>
                      </ul>
                  </li>
              </ul>
            <?php elseif($hak_akses == 'pelanggan') : ?>
              <ul class="nav ace-nav">
                  <li class="active"><a href="?user=pelanggan_dashboard&all"><i class="ace-icon fa fa-desktop"></i> Katalog</a></li>
                  <li class="dark">
                      <a href="?user=rental_saya&booking" aria-expanded="true">
                          <i class="ace-icon fa fa-money"></i> Booking Saya
                      </a>
                  </li>
                  <li class="green">
                      <a href="?user=rental_saya&rental" aria-expanded="true">
                          <i class="ace-icon fa fa-key"></i> Rental Saya
                      </a>
                  </li>
                  <li class="red">
                      <a href="?user=perawatan_saya" aria-expanded="true">
                          <i class="ace-icon fa fa-cog"></i> Perawatan
                      </a>
                  </li>
              </ul>
            <?php endif; ?>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
        </div>
    </div>
    <!-- /.navbar-container -->
</div>
<h3>navbar fixtop</h3>
<?php endif; ?>
