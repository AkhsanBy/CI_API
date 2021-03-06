    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text">
          CI Public API
        </div>
      </a>

      <!-- Heading -->
      <div class="sidebar-heading">
        Home
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home/index'); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <div class="sidebar-heading">
        Tools
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tools/findAnime'); ?>">
          <i class="fas fa-fw fa-search"></i>
          <span>Find Anime</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tools/virusCorona'); ?>">
          <i class="fas fa-fw fa-search"></i>
          <span>Data Covid19 - Indonesia</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tools/cariMusik'); ?>">
          <i class="fas fa-fw fa-search"></i>
          <span>Cari Musik</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider"> 

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <!-- Nav Item - Profile Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
        <div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('user/profile'); ?>">Profile Saya</a>
            <a class="collapse-item" href="<?= base_url('user/editProfile'); ?>">Edit Profile</a>
            <a class="collapse-item" href="<?= base_url('user/editPassword'); ?>">Ganti Password</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->