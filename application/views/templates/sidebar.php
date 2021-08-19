<body class="skin-green">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-green navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
          </a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block"><a href="
					<?=base_url('dashboard')?>" class="nav-link">Home</a></li><li class="nav-item d-none d-sm-inline-block"><a href="#" class="nav-link">Contact</a></li> -->
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- <li class="dropdown user user-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="https://suradi.malangkota.go.id/assets/admin-lte/dist/img/user-avatar.png" class="user-image" alt="User Image"/><span class="hidden-xs">aptika</span></a></li> -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-green elevation-4">
      <!-- Brand Logo -->
      <a href="
					<?=base_url('dashboard')?>" class="bg-green text-center brand-link">
        <!-- <img src="https://suradi.malangkota.go.id/assets/admin-lte/dist/img/user-avatar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight">
          <b>Surat</b>DIGITAL </span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://suradi.malangkota.go.id/assets/admin-lte/dist/img/user-avatar.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <!-- <?= base_url('assets/template') ?>/dist/img/user2-160x160.jpg -->
          <div class="info">
            <a href="#" class="d-block"><?= ucfirst($this->fungsi->user_login()->username) ?></a>
          </div>
          <div class="info">
          <a href="<?=site_url('login/logout')?>" class="btn btn-danger btn-xs">Logout</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-legacy nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Dashboard</li>
            <li class="nav-item">
              <a href="
										<?= base_url('dashboard')?>" class="nav-link 
										<?php if($this->uri->segment(1)=='dashboard')echo'active'?> ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link <?php if($this->uri->segment(1)=='suratkeluar')echo'active'?> <?php if($this->uri->segment(1)=='suratmasuk')echo'active'?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Kelola Surat</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url('suratmasuk')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Surat Masuk</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url('suratkeluar')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Surat Keluar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('riwayatsurat')?>" class="nav-link <?php if($this->uri->segment(1)=='riwayatsurat')echo'active'?>">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Riwayat Surat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="
										<?=base_url('templatesurat/templatesurat')?>" class="nav-link <?php if($this->uri->segment(1)=='templatesurat')echo'active'?>">
                <i class="nav-icon fas fa-arrow-circle-down"></i>
                <p>Template Surat</p>
              </a>
            </li>
          <?php if($this->fungsi->user_login()->level==3){ ?>
            <li class="nav-header">Daftar Permintaan</li>
            <li class="nav-item">
              <a href="<?=base_url('permintaankasi')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaankasi')echo'active'?>">
                <i class="nav-icon fas fa-th-list"></i>
                <p>Verifikasi Surat Kasi</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==4){ ?>
            <li class="nav-header">Daftar Permintaan</li>
            <li class="nav-item">
              <a href="<?=base_url('permintaankabid')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaankasi')echo'active'?>">
                <i class="nav-icon fas fa-th-list"></i>
                <p>Verifikasi Surat Kabid</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==5){ ?>
            <li class="nav-header">Daftar Permintaan</li>
            <li class="nav-item">
              <a href="<?=base_url('permintaansekdin')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaankasi')echo'active'?>">
                <i class="nav-icon fas fa-th-list"></i>
                <p>Verifikasi Surat Sekdin</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==6){ ?>
            <li class="nav-header">Daftar Permintaan</li>
            <li class="nav-item">
              <a href="<?=base_url('permintaankadin')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaankasi')echo'active'?>">
                <i class="nav-icon fas fa-th-list"></i>
                <p>Verifikasi Surat Kadin</p>
              </a>
            </li>
          <?php } ?>
          <!-- kelola verifikasi tiap user -->
          <?php if($this->fungsi->user_login()->level==1){ ?>
            <li class="nav-header">Daftar Permintaan</li>
            <li class="nav-item">
              <a href="#" class="nav-link <?php if($this->uri->segment(1)=='permintaankasi')echo'active'?> <?php if($this->uri->segment(1)=='permintaankabid')echo'active'?> <?php if($this->uri->segment(1)=='permintaansekdin')echo'active'?> <?php if($this->uri->segment(1)=='permintaankadin')echo'active'?>">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>Kelola Verifikasi</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url('permintaankasi')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaankasi')echo'active'?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Check Verifikasi Kasi</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url('permintaankabid')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaankabid')echo'active'?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Check Verifikasi Kabid</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url('permintaansekdin')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaansekdin')echo'active'?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Check Verifikasi Sekdin</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url('permintaankadin')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaankadin')echo'active'?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Check Verifikasi Kadin</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('permintaannomoradmin')?>" class="nav-link <?php if($this->uri->segment(1)=='permintaannomoradmin')echo'active'?>">
                <i class="nav-icon fas fa-th-list"></i>
                <p>Isi Nomor Surat</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==1){ ?>
          <li class="nav-header">Managemen</li>
            <li class="nav-item">
              <a href="<?=base_url('managemensurat')?>" class="nav-link <?php if($this->uri->segment(1)=='managemensurat')echo'active'?>">
                <i class="nav-icon fas fa-envelope-open"></i>
                <p>Managemen Surat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('managemenuser')?>" class="nav-link <?php if($this->uri->segment(1)=='managemenuser')echo'active'?>">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>Managemen User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('managemenarsip')?>" class="nav-link <?php if($this->uri->segment(1)=='managemenarsip')echo'active'?>">
                <i class="nav-icon fas fa-database"></i>
                <p>Managemen Arsip</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==1){ ?>
            <li class="nav-header">Tanda Tangan Elektronik</li>
            <li class="nav-item">
              <a href="<?=base_url('tte')?>" class="nav-link <?php if($this->uri->segment(1)=='tte')echo'active'?>">
                <i class="nav-icon fas fa-signature"></i>
                <p>Menu TTE</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==1){ ?>
            <li class="nav-header">Pendistribusian</li>
            <li class="nav-item">
              <a href="<?=base_url('pendistribusian')?>" class="nav-link <?php if($this->uri->segment(1)=='pendistribusian')echo'active'?>">
                <i class="nav-icon fas fa-share-square"></i>
                <p>Kirim Surat</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==5){ ?>
            <li class="nav-header">Tanda Tangan Elektronik</li>
            <li class="nav-item">
              <a href="<?=base_url('tte')?>" class="nav-link <?php if($this->uri->segment(1)=='tte')echo'active'?>">
                <i class="nav-icon fas fa-signature"></i>
                <p>Menu TTE</p>
              </a>
            </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level==6){ ?>
            <li class="nav-header">Tanda Tangan Elektronik</li>
            <li class="nav-item">
              <a href="<?=base_url('tte')?>" class="nav-link <?php if($this->uri->segment(1)=='tte')echo'active'?>">
                <i class="nav-icon fas fa-signature"></i>
                <p>Menu TTE</p>
              </a>
            </li>
          <?php } ?>
            <br>
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
              <h1 class="m-0"> <?= $title ?> </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item active"> <?= $title ?> </li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">