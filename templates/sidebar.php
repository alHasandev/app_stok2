<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link">
    <img src="<?= base_url('assets/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">APP STOK</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url($auth['image']) ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $auth['username'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= page() ?>" class="nav-link <?= activeLink('home') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <i class="right fas fa-angle-left"></i> -->
            </p>
          </a>
        </li>

        <li class="nav-header">MASTER DATA</li>
        <!-- Master Data List Menu -->
        <li class="nav-item has-treeview <?= activeLink(['barang_masuk', 'mutasi_barang', 'penjualan']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= activeLink(['barang_masuk', 'mutasi_barang', 'penjualan']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-dolly-flatbed"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= page('barang_masuk') ?>" class="nav-link <?= activeLink('barang_masuk') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Barang Masuk
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= page('mutasi_barang') ?>" class="nav-link <?= activeLink('mutasi_barang') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Mutasi Barang
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= page('penjualan') ?>" class="nav-link <?= activeLink('penjualan') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Penjualan
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview <?= activeLink(['barang', 'jenis_barang']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= activeLink(['barang', 'jenis_barang']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
              Barang
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= page('barang') ?>" class="nav-link <?= activeLink('barang') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  List Barang
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= page('jenis_barang') ?>" class="nav-link <?= activeLink('jenis_barang') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Jenis Barang
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview <?= activeLink(['sales', 'stok_sales']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= activeLink(['sales', 'stok_sales']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Sales
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= page('sales') ?>" class="nav-link <?= activeLink('sales') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  List Sales
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= page('stok_sales') ?>" class="nav-link <?= activeLink('stok_sales') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Stok Sales
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">APPLICATION</li>
        <li class="nav-item has-treeview <?= activeLink(['menu_headers', 'menu_items', 'menu_childs']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= activeLink(['menu_headers', 'menu_items', 'menu_childs']) ? 'active' : '' ?>">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Menu Setting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= page('menu_headers') ?>" class="nav-link <?= activeLink('menu_headers') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu Headers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= page('menu_items') ?>" class="nav-link <?= activeLink('menu_items') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= page('menu_childs') ?>" class="nav-link <?= activeLink('menu_childs') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu Child-Item</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview <?= activeLink(['users']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= activeLink(['users']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-server"></i>
            <p>
              System
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= page('users') ?>" class="nav-link <?= activeLink('users') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item border-top border-info">
          <a href="<?= page('auth', 'logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Logout
              <span class="right badge badge-danger">
                <i class="fas fa-sign-out-alt"></i>
              </span>
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= ucwords($page) ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active"><strong><?= strtoupper($auth['privilege']) ?></strong></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">