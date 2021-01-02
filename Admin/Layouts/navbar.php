<?php 
  $user_ad = new UsersAdmin();
?>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $user_ad->h->get_url('homestay'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3"><img src="../Public/Images/logo_w.png" width="140px" height="40px" alt=""></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Bảng điều khiển</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        homestay
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Quản lý phòng</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?m=rooms&a=list">Phòng</a>
            <a class="collapse-item" href="?m=booking&a=list">Đặt phòng</a>
          </div>
        </div>
      </li>
      <?php 
        if($user_ad->r->get_current_usertype() == 0){
      ?>
      <li class="nav-item d-none">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="collapsePages">
          <i class="far fa-address-book"></i>
          <span>Quản lý tài khoản</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?m=usersadmin&a=list">Tài khoản quản trị</a>
            <a class="collapse-item" href="?m=users&a=list">Tài khoản người dùng</a>
          </div>
        </div>
      </li>
      <?php }
      else{?>
        <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="collapsePages">
          <i class="far fa-address-book"></i>
          <span>Quản lý tài khoản</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?m=usersadmin&a=list">Tài khoản quản trị</a>
            <a class="collapse-item" href="?m=users&a=list">Tài khoản người dùng</a>
          </div>
        </div>
      </li>
      <?php }?>
      <hr class="sidebar-divider d-none d-md-block">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

      <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

      <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="" method="post">
            <a href="<?php echo $user_ad->h->get_url('homestay/admin/?m=common&a=logout');?>" name="btnlogout" class="btn btn-primary">Đăng xuất</a>
            <!-- <input type="submit" name="btnlogout" class="btn btn-primary" value="Đăng xuất"> -->
          </form>
        </div>
      </div>
    </div>
  </div>