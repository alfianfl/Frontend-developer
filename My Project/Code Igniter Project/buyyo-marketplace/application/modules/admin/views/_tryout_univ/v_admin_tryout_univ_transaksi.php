<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Transaksi - Admin Tryout Universitas</title>
        <link href="<?php echo base_url()?>asset/admin/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
            .btn-success{
                width:65px;
                font-size:10px;
                margin-left:auto;
                border: 1px solid #28a745;
                margin-right:5px;
            }
            .upload{
                width:100px;
                font-size:10px;
                margin-left:auto;
                border: 1px solid ;
            }
            .btn-danger{
                width:65px;
                font-size:10px;
                border: 1px solid #dc3545;
            }
            .modal-body h1{
                font-style: normal;
                font-weight: 500;
                font-size: 14px;
                color: #000000;
            }

            /* styling status bayar */
            td.status-bayar.approved {
                color: green;
            }

            td.status-bayar.rejected {
                color: red;
            }

            td.status-bayar.waiting1 {
                color: orange;
            }

            td.status-bayar.waiting2 {
                color: lightgreen;
            }
            /* akhir styling status bayar */
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= base_url('admin/tryout_univ'); ?>">Buy-Yo!</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
                        <h1 class="mt-4">Tables</h1>
                        
                        <div class="row mt-4">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <a href="#">
                                        <div class="card-body" style="color:white;text-decoration:none">
                                            <p style="text-align:center;">Total Transkasi: <br><b>Rp. <?php  foreach($jumlah_transaksi as $jml){echo $jml['SUM(harga)'];} ?></b></p>    
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php 
                                if(isset($status)){
                                foreach($status as $stat){
                            ?>   
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <a href="#">
                                            <div class="card-body" style="color:white;text-decoration:none">
                                                <p style="text-align:center;">Transaksi <?= $stat['status'] ?><br><b><?= $stat['jml_peserta'] ?></b></p>    
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            <?php }} ?>
                        
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Transaksi</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>ID Transaksi</th>
                                                <th>Kode Unik</th>
                                                <th>Tanggal</th>
                                                <th>Paket Pembelian</th>
                                                <th>Status</th>
                                                <th>Bukti Transaksi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>       
                                            <?php 
                                                $no = 1;
                                                if(isset($transaksi)){
                                                foreach($transaksi as $trs){
                                            ?>    
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $trs['username'] ?></td>
                                                <td><?= $trs['email'] ?></td>
                                                <td><?= $trs['id_transaksi_tryout'] ?></td>
                                                <td><?= $trs['uniq_num'] ?></td>
                                                <td><?= $trs['insert_on'] ?></td>
                                                <td><?= $trs['paket'] ?></td>
                                                <td class="status-bayar"><?= $trs['status'] ?></td>                   
                                                <td>
                                                    <button type="button" class="btn btn-primary upload bukti-transaksi" data-iduser="<?= $trs['id_user']; ?>" data-bukti="<?= $trs['bukti'] ?>" data-url="<?= base_url(); ?>" data-toggle="modal" data-target="#uploadBuktiModal">
                                                        <b>Bukti Transaksi</b>
                                                    </button>     
                                                </td>
                                                <td style="display:flex;text-align:center;">
                                                    <a href="<?= base_url("admin/tryout_univ/approve_transaksi/") . $trs['id_transaksi_tryout'] ?>"><button type="button" class="approve btn btn-success btn-sm"><b>Approve</b></button></a>
                                                    <a href="<?= base_url("admin/tryout_univ/reject_transaksi/") . $trs['id_transaksi_tryout'] ?>"><button type="button" class="reject btn btn-danger btn-sm"><b>Reject</b></button></a>
                                                </td>  
                                            </tr>                   
                                            <?php $no++; }} ?>
                                        </tbody>


                                        <!-- Modal Bukti Pembayaran -->
                                        <div class="modal fade" id="uploadBuktiModal" tabindex="-1" role="dialog" aria-labelledby="uploadBuktiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content ">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="uploadBuktiModalLabel">Bukti Pembayaran</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <h6>Syarat-Syarat Bukti Pembayaran</h6>
                                                  <h1>1. Harus...(disesuaikan dengan permintaan BEM bersangkutan).<br>2. ...<br>3. ...<br>4. ...</h1>
                                                  <hr>
                                                    <div class="panel-body text-center img-bukti-transaksi">
                                                        <!-- src="base_url() . 'upload/' . $trs['id_user'] . "/" . $trs['bukti'];" -->
                                                    </div>
                                                </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal -->
                                    </table>
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
        <script src="<?php echo base_url()?>asset/js/uploadfile.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>asset/admin/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>asset/admin/assets/demo/datatables-demo.js"></script>
        <script src="<?php echo base_url()?>asset/admin/js/my-javascript.js"></script>
    </body>
</html>
