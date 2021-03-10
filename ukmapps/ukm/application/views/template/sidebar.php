<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('images/user.png');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user->username;?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li id="menu-home"><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li id="menu-profil"><a href="<?php echo base_url('admin/profile');?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      <li id="menu-user"><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i> <span>Kelola Data Mahasiswa</span></a></li>
      <li id="menu-prodi"><a href="<?php echo base_url('admin/prodi');?>"><i class="fa fa-users"></i> <span>Kelola Prodi</span> <span class="label label-warning" ></span></a></li>
      <li id="menu-ukm"><a href="<?php echo base_url('admin/ukm');?>"><i class="fa fa-users"></i> <span>Kelola Ukm</span> <span class="label label-warning" ></span></a></li>
      
      <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
