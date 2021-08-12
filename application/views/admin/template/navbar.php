<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard">
      Admin <?= explode(' ', $this->session->userdata('nama'))[0] ?>
    </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-auto">
      <li class="nav-item dropdown no-arrow mx-1">
        <a href="<?= site_url('c_admin/logout'); ?>" class="btn btn-outline-light">Logout</a>
      </li>
    </ul>

  </nav>