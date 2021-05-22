<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - Admin Tryout Universitas</title>
  <link href="<?php echo base_url()?>asset/admin/css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url('admin/tryout_univ'); ?>">Buy-Yo!</a><button class="btn btn-link btn-sm order-1 order-lg-0"
      id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= base_url("admin/auth_tryout_univ/logout") ?>">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="<?= base_url("admin/tryout_univ/dashboard") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Dashboard</a
                            >                    
                            <a class="nav-link" href="<?= base_url("admin/tryout_univ/transaksi") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaksi</a
                            >
                            <a class="nav-link" href="<?= base_url("admin/tryout_univ/peserta") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Peserta</a
                            >
                            <a class="nav-link" href="<?= base_url("admin/tryout_univ/setting") ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Setting</a
                            >
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?= $user ?>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Dashboard</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Tryout <?php foreach($univ as $uni){echo $uni['univ'];} ?></li>
          </ol>
          <!-- Storing data for Chart-->
          <!-- Daftar Univ-->
          <input type="hidden" id="univ" value="
          <?php 
              if(isset($univ)){
              foreach($univ as $uni){
                echo $uni['univ'];
          ?> 
          ,
          <?php }} ?>
          ">
          

          <!-- Jumlah Peserta Setiap Univ-->
          <input type="hidden" id="jml_peserta_univ" value="
          <?php 
              if(isset($univ)){
              foreach($univ as $uni){
                echo $uni['jml_peserta'];
          ?> 
          ,
          <?php }} ?>
          ">

          <!-- Daftar Status Transaksi-->
          <input type="hidden" id="status" value="
          <?php 
              if(isset($status)){
              foreach($status as $stat){
                echo $stat['status'];
          ?> 
          ,
          <?php }} ?>
          ">
          
          <!-- Jumlah Peserta Setiap Status Transaksi-->
          <input type="hidden" id="jml_peserta_status" value="
          <?php 
              if(isset($status)){
              foreach($status as $stat){
                echo $stat['jml_peserta'];
          ?> 
          ,
          <?php }} ?>
          ">


          <div class="row">
            <div class="col-lg-6">
              <div class="card mb-4">
                <div class="card-header"><i class="fas fa-receipt mr-1"></i>Total Pendaftar</div>
                <div class="card-body">
                  <canvas id="ChartPendaftarUniv" width="100%" height="50"></canvas>
                </div>
                <div class="card-footer text-muted"><p id="total"></p></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card mb-4">
                <div class="card-header"><i class="fas fa-money-check-alt mr-1"></i>Total Transaksi</div>
                <div class="card-body">
                  <canvas id="ChartTransaksiUniv" width="100%" height="50"></canvas>
                </div>
                <div class="card-footer text-muted">Total Uang Pendaftaran : Rp. <?php  foreach($jumlah_transaksi as $jml){echo $jml['SUM(harga)'];} ?></div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Buy-Yo! 2020. All rights reserved</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="<?php echo base_url()?>asset/admin/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url()?>asset/admin/assets/demo/chart-pie-univ.js"></script>
</body>

</html>