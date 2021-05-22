<html>
<head>
  <title>Update Product</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
  <style type="text/css">

    .button{
      border: none;
    }
    .row-1{
      margin-left:180px;
      margin-top:30px;
    }
    .D-1{
      background-color:white;
      
      color:black;
    }
    .S-1{
     
      position:relative;
      bottom:31px;
      left:65px
    }
    .btn-1{
      border:2px solid #007bff;
    }

  </style>

</head>
<body id="page-top">

<?php foreach($product as $item): ?>  
  <!-- Breadcrumbs-->
        <ol class="breadcrumb" >
          <li class="breadcrumb-item ">
            <a style="color:#6c757d;text-decoration:none;" href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>  
  <div class="container1">
    <h1 style="margin-bottom:50px">Update Data</h1>
    <form action="<?= base_url("merch/home/update_product_action") ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?= $item['id_produk']; ?>">
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_produk" id="nama" value="<?= $item['nama_produk']; ?>">
      </div>
    </div>
   
    <div class="form-group row">
      <label for="alamat" class="col-sm-2 col-form-label">Deskripsi:</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="deskripsi" rows="3" name="ket_produk"><?= $item['ket_produk']; ?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">  Kategori: </label>
      <select style="width:80.75%;margin-left: 15px;color:grey" name="id_kategori" class="form-control" >
        <option value="" selected disabled>Choose Here</option>
        <?php foreach($category as $cat): ?>
            <option value=<?= $cat['id_kategori'];?> <?=($item['id_kategori'] == $cat['id_kategori'])? 'selected':'' ?>><?= $cat['nama_kategori']; ?></option>
        <?php endforeach ?>
      </select>
    </div>
   <div class="form-group row">
      <label for="harga" class="col-sm-2 col-form-label">Harga:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="harga_produk" id="Harga" placeholder="Rp." value="<?= $item['harga_produk']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="stok_produk" id="stock" placeholder="" value="<?= $item['stok_produk']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="stock" class="col-sm-2 col-form-label">Upload File:</label>
      <div class=" col-sm-3">
      <div id="msg"></div>
        <input type="file" name="gambar1" class="file" accept="image/*" onchange="encodeImageFileAsURL(this)">
        <input type="hidden" id="input_image" name="gambar" required="" />
        <hr>
        <div class="input-group my-0">
          <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
          <div class="input-group-append">
            <button type="button" class="browse btn btn-primary btn-sm">Browse...</button>
          </div>
        </div>
        <br>
        <img id="img_modal" width="100%" src="<?= base_url() . 'upload/' . $item['merchant'] . "/" . $item['gambar1'] ?>">
        <input type="hidden" name="old_gambar1" value="<?= $item['gambar1']; ?>">
        <input type="hidden" name="kondisi_produk" value="<?= $item['kondisi_produk']; ?>">

    </div>

    </div>
    <div class="row row-1" >
      <div class="col-sm-10 D-1">
          <button type="button" class="btn btn-danger btn-sm">Delete</button>
      </div>
       <div class="col-sm-10 S-1" >
          <input type="submit" value="Simpan"  class="btn btn-primary btn-sm btn-1">
      </div>
    </div>

</div> 


<?php endforeach; ?>

</form>

<script src="<?php echo base_url()?>asset/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/popper.js"></script>
<script src="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url()?>asset/plugins/progressbar/progressbar.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/Isotope/fitcolumns.js"></script>
<script type="text/javascript">
  $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});

function encodeImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    console.log('RESULT', reader.result)
  	$('#input_image').val(reader.result);
  	$('#img_modal').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
}
</script>

<footer class="footer" style="margin-top:500px">