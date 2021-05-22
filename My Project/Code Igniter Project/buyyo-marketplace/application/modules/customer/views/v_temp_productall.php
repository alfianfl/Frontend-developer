<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Order Details Table with Search Filter</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/crud.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="<?php echo base_url()?>asset/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/cart.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/cart_responsive.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<style>
    @media screen and (max-width:1920px){
			.hamburger{
                display:flex;
        	}
		}
</style>
</head>
<body>

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
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Detail <b>Produk</b></h2>
                    </div>
                    <div class="col-sm-8">                      
                        <a href="<?= base_url("merch/create/createdata") ?>" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>add new</span></a>
                        
                    </div>
                </div>
            </div>
            <div class="table-filter">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                            <span>Show</span>
                            <select class="form-control" style="color:grey">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entries</span>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <div class="filter-group">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="filter-group">
                            <label>Kategori</label>
                            <select class="form-control" style="color:grey">
                                <option>All</option>
                                <option>Makanan</option>
                                <option>Minuman</option>
                                <option>Pakaian</option>
                                                          
                            </select>
                        </div>
                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>                     
                        <th>Stok</th>                     
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php foreach($products as $product): ?>
                <tbody>       
                          

                    <tr>
                        <td>1</td>
                        <td><a href="#"><img src="<?= base_url() . 'upload/' . $product['merchant'] . "/" . $product['gambar1'] ?>"><?= $product['nama_produk'] ?></a></td>
                        <td>Makanan</td>
                        <td><?= $product['ket_produk'] ?></td>                        
                        <td><span class="status text-success">&bull;</span> <?= $product['stok_produk'] ?></td>
                        <td><?= $product['harga_produk'] ?></td>
                        <td>
                            <a href="<?= base_url("merch/update/updatedata") ?>" class="edit" title="Edit" data-toggle="tooltip"><i style="font-size:20px" class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i style="font-size:20px"  class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>                   
                    
                </tbody>
                <?php endforeach; ?>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div> 
    <footer class="footer">
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
</html>                                                                 