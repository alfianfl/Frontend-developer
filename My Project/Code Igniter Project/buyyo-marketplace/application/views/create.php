<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.css">

  <title>SB Admin - Dashboard</title>

  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/create.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.css">
  <link href="<?php echo base_url()?>asset/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/category.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/category_responsive.css">
    

</head>
<div class="menu">

    <!-- Search -->
    <div class="menu_search">
        <form action="#" id="menu_search_form" class="menu_search_form">
            <input type="text" class="search_input" placeholder="add product" required="required">
            <button class="menu_search_button"><img src="<?php echo base_url()?>/asset/images/search.png" alt=""></button>
        </form>
    </div>
    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
            <li><a href="#">Makanan</a></li>
            <li><a href="#">Minuman</a></li>
            <li><a href="#">Danusan</a></li>
            <li><a href="#">Pakaian</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
            <div><div><img src="<?php echo base_url()?>/asset/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
            <div>+1 912-252-7350</div>
        </div>
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<header class="header">
        <div class="header_overlay"></div>
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo">
                <a href="#">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="<?php echo base_url()?>/asset/images/logo_1.png" alt=""></div>
                        <div>Buy-Yo!</div>
                    </div>
                </a>    
            </div>
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li><a href="#">Makanan</a></li>
                    <li><a href="#">Minuman</a></li>
                    <li><a href="#">Danusan</a></li>
                    <li><a href="#">Pakaian</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                <!-- Search -->
                <div class="header_search">
                    <form action="#" id="header_search_form">
                        <input type="text" class="search_input" placeholder="Search Item" required="required">
                        <button class="header_search_button"><img src="<?php echo base_url()?>/asset/images/search.png" alt=""></button>
                    </form>
                </div>
                <!-- User -->
                <div class="user"><a href="#"><div><img src="<?php echo base_url()?>/asset/images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>
                <!-- Cart -->
                <div class="cart"><a href="<?php echo base_url()?>/asset/cart.html"><div><img src="<?php echo base_url()?>/asset/images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
                <!-- Phone -->
                <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                    <div><div><img src="<?php echo base_url()?>/asset/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
                    <div>+1 912-252-7350</div>
                </div>
            </div>
        </div>
    </header>

<body id="page-top">

  
  <!-- Breadcrumbs-->
        <ol class="breadcrumb" >
          <li class="breadcrumb-item ">
            <a style="color:#6c757d;text-decoration:none;" href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>  
  <div class="container1">
    <h1 style="margin-bottom:50px">Masukan Data</h1>
    <form>
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="nama" >
      </div>
    </div>
   
    <div class="form-group row">
      <label for="alamat" class="col-sm-2 col-form-label">Deskripsi:</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="deskripsi" rows="3" ></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">  Kategori: </label>
      <select style="width:80.75%;margin-left: 15px;color:grey" name="" class="form-control" >
        <option value="">Contoh Form Dropdown</option>
        <option value="">Contoh 1</option>
        <option value="">Contoh 2</option>
        <option value="">Contoh 3</option>
      </select>
    </div>
   <div class="form-group row">
      <label for="harga" class="col-sm-2 col-form-label">Harga:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Harga" placeholder="Rp.">
      </div>
    </div>
    <div class="form-group row">
      <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="stock" placeholder="">
      </div>
    </div>
    <div class="form-group row">
      <label for="stock" class="col-sm-2 col-form-label">Upload File:</label>
      <div class=" col-sm-3">
      <div id="msg"></div>
        <input type="file" name="img[]" class="file" accept="image/*">
        <div class="input-group my-0">
          <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
          <div class="input-group-append">
            <button type="button" class="browse btn btn-primary btn-sm">Browse...</button>
          </div>
        </div>
     
    </div>

    </div>
    
  </form>

</div> 
<div class="button">
        <button style="background-color:white;border: 1px solid grey
; color:black"type="button" class="btn btn-danger btn-sm ">Delete</button>
        <button
;" type="button" class="btn btn-primary btn-sm  ">Simpan</button>
 </div>

<footer class="footer" style="margin-top:300px">
            <div class="footer_content">
                <div class="container">
                    <div class="row">
                        
                        <!-- About -->
                        <div class="col-lg-4 footer_col">
                            <div class="footer_about">
                                <div class="footer_logo">
                                    <a href="#">
                                        <div class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_logo_icon"><img src="<?php echo base_url()?>/asset/images/logo_2.png" alt=""></div>
                                            <div>Buy-Yo!</div>
                                        </div>
                                    </a>        
                                </div>
                                <div class="footer_about_text">
                                    <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Fusce venenatis vel velit vel euismod.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Links -->
                        <div class="col-lg-4 footer_col">
                            <div class="footer_menu">
                                <div class="footer_title">Support</div>
                                <ul class="footer_list">
                                    <li>
                                        <a href="#"><div>Customer Service<div class="footer_tag_1">online now</div></div></a>
                                    </li>
                                    <li>
                                        <a href="#"><div>Return Policy</div></a>
                                    </li>
                                    <li>
                                        <a href="#"><div>Size Guide<div class="footer_tag_2">recommended</div></div></a>
                                    </li>
                                    <li>
                                        <a href="#"><div>Terms and Conditions</div></a>
                                    </li>
                                    <li>
                                        <a href="#"><div>Contact</div></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Contact -->
                        <div class="col-lg-4 footer_col">
                            <div class="footer_contact">
                                <div class="footer_title">Stay in Touch</div>
                                <div class="newsletter">
                                    <form action="#" id="newsletter_form" class="newsletter_form">
                                        <input type="email" class="newsletter_input" placeholder="Subscribe to our Newsletter" required="required">
                                        <button class="newsletter_button">+</button>
                                    </form>
                                </div>
                                <div class="footer_social">
                                    <div class="footer_title">Social</div>
                                    <ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bar">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
                                <div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Buy-Yo!</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                                <nav class="footer_nav ml-md-auto order-md-2 order-1">
                                    <ul class="d-flex flex-row align-items-center justify-content-start">
                                        <li><a href="category.html">Women</a></li>
                                        <li><a href="category.html">Men</a></li>
                                        <li><a href="category.html">Kids</a></li>
                                        <li><a href="category.html">Home Deco</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>   
          
        
    

    


</body>
<script src="<?php echo base_url()?>asset/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/popper.js"></script>
<script src="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url()?>asset/plugins/easing/easing.js"></script>
<script src="<?php echo base_url()?>asset/plugins/progressbar/progressbar.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/Isotope/fitcolumns.js"></script>
<script src="<?php echo base_url()?>asset/js/category.js"></script>
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
</script>

</html>
