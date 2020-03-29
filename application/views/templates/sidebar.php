<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();  ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Monitoring</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url(); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider" />

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('home/temperatur'); ?>"><i class="fas fa-fw fa-thermometer-half"></i>
      <span>Temperatur</span></a>
    <a class="nav-link" href="#"><i class="fas fa-fw fa-thermometer-half"></i>
      <span>Kadar pH</span></a>
    <a class="nav-link" href="#"><i class="fas fa-fw fa-tint"></i>
      <span>Kadar Amoniak</span></a>
    <a class="nav-link" href="#"><i class="fas fa-fw fa-radiation"></i>
      <span>Oksigen Terlarut</span></a>
    <a class="nav-link" href="#"><i class="fas fa-fw fa-water"></i>
      <span>Volume Air</span></a>
  </li>

  <!-- Divider -->
  <hr class=" sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->