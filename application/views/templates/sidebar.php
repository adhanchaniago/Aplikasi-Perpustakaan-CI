<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Home'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Pustaka <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
<?php if($this->session->userdata('level')=='1'): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Home');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Anggota');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Anggota</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Buku');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Buku</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('transaksi');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Pinjam Buku</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Laporan');?>">
          <i class="fas fa-fw fa-print"></i>
          <span>Laporan</span></a>
      </li>
<?php elseif($this->session->userdata('level')=='2'): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Home');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Anggota');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Anggota</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Buku');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Buku</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('transaksi');?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Pinjam Buku</span></a>
      </li>
<?php else: ?>
  <li><?php echo anchor('login','Login');?></li>
<?php endif; ?>      
      <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>