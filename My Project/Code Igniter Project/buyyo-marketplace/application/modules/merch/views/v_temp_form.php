<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style type="text/css">
    .button{
      border: none;
    }
  </style>
</head>
<body>
  <!-- <body id="page-top"> -->   
  <div class="super_container_inner">
        <div class="super_overlay"></div>
            <div class="container1">
                <h1 style="margin:100px 0px 70px 0px;text-align:center">Masukan Data</h1>
                <form action="<?= base_url("merch/home/add_product_action") ?>"  method="post" enctype="multipart/form-data">   
                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Alamat Email</label>
                <div class="col-sm-10">
                    <input style="color: grey" type="email" class="form-control" id="email" name="nama_produk">
                </div>
                </div>  
                <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
                <div class="col-sm-10">
                    <input style="color: grey" type="text" class="form-control" id="nama" name="nama_produk" >
                </div>
                </div>
                <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">  Jenis Kelamin </label>
                <select style="width:80.75%;margin-left: 15px;color:grey" name="Jenis_kelamin" class="form-control" >
                    <option value="" selected disabled>Choose Here</option>
                    <option value="baru">Laki-Laki</option>
                    <option value="bekas">Perempuan</option>
                </select>
                </div>
                <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Asal Sekolah</label>
                <div class="col-sm-10">
                    <input style="color: grey" type="text" class="form-control" id="nama" name="nama_produk" >
                </div>
                </div>
                <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">  Jurusan </label>
                <select style="width:80.75%;margin-left: 15px;color:grey" name="Jurusan" class="form-control" >
                    <option value="" selected disabled>Choose Here</option>
                        <option>IPA</option>
                        <option>IPS</option>
                </select>
                </div>
                <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Tanggal Lahir:</label>
                <div class="col-sm-10">
                    <input style="color: grey" type="text" class="form-control" id="date" placeholder="DD/MM/YYYY" name="tanggal_lahir" >
                </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-sm-2 col-form-label" >Upload Gambar :</label>
                    <div class=" col-sm-3">
                    <div id="msg"></div>
                    <input type="file" name="gambar1" class="file" accept="image/*" onchange="encodeImageFileAsURL(this)">
                    <div class="input-group my-0">
                        <input type="text" class="form-control" name="gambar1" disabled placeholder="Gambar 1" id="file">
                        <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary btn-sm">Browse...</button>
                        </div>
                    </div>
                    <br>
                    <img id="img_modal" width="100%">
                </div>  
                </div>  
                <div class="row row-1" style="margin-left:180px;margin-top:30px">
                <div class="col-sm-10">
                    <button style="background-color:white;border: 1px solid grey; color:black;"type="button" class="btn btn-danger btn-sm btn1 ">Delete</button>
                </div>
                <div class="col-sm-10" >
                    <input type="submit" style="border:2px solid #007bff;position:relative;bottom:31px;left:65px" value="Simpan"  class="btn btn-primary btn-sm  btn1">
                </div>
                </div>
                </form>
            </div> 
<script>
  $( function() {
    $( "#date" ).datepicker();
  } );
</script>
<script>
$( function() {
  $( "#date" ).datepicker({
    dateFormat: "yy-mm-dd"
  });
} );
</script>
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
<footer class="footer" style="margin-top:820px">
</body>
</html>
