<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/all_responsive.css"> 
  <link href="<?php echo base_url()?>asset/font-awesome/css/fontawesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/payment_responsive.css"> 
	<link href="<?php echo base_url()?>asset/font-awesome/css/brands.css" rel="stylesheet">
  <link href="<?php echo base_url()?>asset/font-awesome/css/solid.css" rel="stylesheet">
 
  
  <title><?= $title; ?></title>
  <style>
    @media screen and (max-width:1920px){
        .hamburger{
                  display:flex;
            }
    }
  </style>
</head>

<body>
  <div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="payment-container">
      <h1 class="text-center">Pembayaran</h1>
      <div class="timer-wrapper card-custom">
        <div class="timer-subwrapper">
          <p>Harap lunasi pembayaran dalam :</p>

          <h3 id="timer" data-status="<?= strtolower($trans['status']); ?>" data-timer="<?= date("M d, Y H:i:s", strtotime($trans['insert_on'])); ?>">
            <span id="hours"></span><span id="waktu"> Jam</span> : <span id="mins"></span><span id="waktu"> Menit</span> : <span id="secs"></span><span id="waktu"> Detik</span>
          </h3>

        </div>
      </div>
      <div class="detail-wrapper card-custom">

        <div class="detail-content-container">
          <div class="detail-bayar">Detail Pembayaran : </div>
          <div class="nama-tryout"><?= $tryout['paket'] ?></div>
          <div class="no-rek">Nomor Rekening : </div>
          <div class="angka-rek"><input type="text" value="<?= $tryout['no_rekening'] ?>" id="rekening" readonly /></div>
          <div class="logo-bank"><img src="<?= base_url('asset/images/banks/logo-').strtolower($tryout['nama_bank']).'.png' ?>" alt="logo <?= strtoupper($tryout['nama_bank']); ?>" srcset="" title="<?= strtoupper($tryout['nama_bank']); ?>"></div>
          <div class="nama-rek"><span>A/N <?= $tryout['nama_rekening'] ?></span></div>
        </div>

        <div class="copy" onclick="copyto_clipboard('rekening', 'tooltipRekening')" onmouseout="onMouseOut('rekening', 'tooltipRekening')">
          <span class="tooltiptext" id="tooltipRekening">salin rekening</span>
          Salin Nomor Rekening
        </div>
      </div>
      <div class="nominal-wrapper-wrapper">
        <div class="nominal-wrapper card-custom">
          <p>
            <sup>Rp.</sup><?= number_format($tryout['harga']/1000,0,',','.'); ?>.<span class="unique-digit"><?= $trans['uniq_num']; ?></span><span class="sub">,00</span>
            <input type="text" class="input-style" value="<?= ($tryout['harga'] + $trans['uniq_num']); ?>" id="nominal" readonly/>
          </p>
          <div class="copy" onclick="copyto_clipboard('nominal', 'tooltipNominal')" onmouseout="onMouseOut('nominal', 'tooltipNominal')">
            <span class="tooltiptext" id="tooltipNominal">salin nominal</span>
            Salin Total Pembayaran
          </div>
        </div>
        <div class="reminder card-custom">
          <i class="fas fa-info-circle" title="unique number"></i>
          <p>Jangan lupa menambahkan 3 digit kode unik. Lupa memasukkan kode unik dapat membuat pembayaran kamu gagal diverifikasi. Jika ada suatu masalah bisa menghubungi di buyyoid@gmail.com atau 0895401011469 (wa )</p>
        </div>
      </div>

      <div class="row button-wrapper">
        <div class="col-sm-5 mb-3">
          <a href="<?= base_url('customer/tryout/paymentstatus') ?>"><button type="button" class="btn btn-block status">Status Pembayaran</button></a>
        </div>
        <div class="col-sm-5 offset-sm-2">
          <a href="#"><button type="button" class="btn btn-block upload" data-toggle="modal" data-target="#uploadBuktiModal">Upload Bukti</button></a>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="uploadBuktiModal" tabindex="-1" role="dialog" aria-labelledby="uploadBuktiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title" id="uploadBuktiModalLabel">Upload Bukti</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h6>Syarat-Syarat Bukti Pembayaran</h6>
              <h1>
                1. Nominal pembayaran harus terlihat jelas.<br>
                2. Gambar harus jelas dan tidak buram.<br>
                3. Tercantum nama pengirim dengan jelas.<br>
                4. Foto tidak boleh lebih dari 1 MB.
              </h1>
              <hr>
                <div class="panel-body text-center">
                <form action="<?= base_url("customer/tryout/uploadBuktiAction") ?>" method="post" enctype="multipart/form-data">
                    <input style="display: none;" type="file" name="bukti" class="file" accept="image/*" onchange="encodeImageFileAsURL(this)">
                    <input  type="hidden" name="id_transaksi_tryout" value="<?= $trans['id_transaksi_tryout']?>" >
                    <input type="hidden" name="id_user" value="<?= $trans['id_user'] ?>">
                    <input type="hidden" name="id_tryout" value="<?= $trans['id_tryout'] ?>">
                    <div class="input-group my-0">
                      <div class="input-group-append">
                        <button  type="button" class="browse btn btn-sm"><i for="file" class="fas fa-folder-open fa-3x"></i></button>
                      </div>
                    </div>
                    <p>Upload Bukti Pembayaran</p>
                    
                    <img id="img_modal" width="50%">
                </div>
                <div class="modal-footer">
                <input type="submit" value="Upload" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
                </form> 
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url()?>asset/js/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url('asset/js/payment-timer.js') ?>"></script>
  <script src="<?= base_url('asset/js/copyto-clipboard.js') ?>"></script>
  <script src="<?php echo base_url()?>asset/js/uploadfile.js"></script>

</body>

</html>