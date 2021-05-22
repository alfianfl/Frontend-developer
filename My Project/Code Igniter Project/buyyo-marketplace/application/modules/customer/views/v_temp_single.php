<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $title ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/plugins/flexslider/flexslider.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/product.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/vendor/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/vendor/MagnificPopup/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
<style type="text/css">
        .header_searchnav{
                display:flex
		}
		@media screen and (max-width:1920px){
			.hamburger{
                display:flex;
        	}
		}
</style>
</head>
<body>
<?php foreach ($product as $item): ?>
<?php endforeach; ?>
	<div class="super_container_inner">
		<div class="super_overlay"></div>
		<!-- Home -->
		<div class="home" style="background-color:#005689;">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Product Page</div>
					<div class="breadcrumbs  d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="<?php echo base_url('customer/home/index')?>">Home</a></li>
							<li><a href="#">list</a></li>
							<li>New Products</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?= base_url() . 'upload/' . $item['merchant'] . "/" . $item['gambar1'] ?>">
									<div class="wrap-pic-w pos-relative">
										<img  src="<?= base_url() . 'upload/' . $item['merchant'] . "/" . $item['gambar1'] ?>">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= base_url() . 'upload/' . $item['merchant'] . "/" . $item['gambar1'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>					
							</div>
						</div>
					</div>
				</div>				
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<?php foreach ($product as $item): ?>
						<input type="hidden" id="id" value="<?= $item['id_produk']; ?>">
						<input type="hidden" id="name" value="<?= $item['nama_produk']; ?>">
						<input type="hidden" id="price" value="<?= $item['harga_produk'];?>">
						<!-- <input type="hidden" id="status" value="<?= $status;?>"> -->
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?= $item['nama_produk']?>
						</h4>
						<span class="mtext-106 cl2">
							<?= $item['harga_produk']?>
						</span>
						<p class="stext-102 cl3 p-t-23">
							<?= $item['ket_produk']?>
						</p>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>
										<input id="quantity" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">
										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<br>
									<div>
										<p>Note to Merchant:</p>
										<form class="form-group">
											<textarea id="note" class="form-control  " style="color:grey;font-size:12px" class="mtext-104 cl3 txt-center num-product" type="text"></textarea>
										</form>
									</div>
							<?php endforeach; ?>
									<a href="<?= base_url("customer/home/check_chart") ?>"><button class="flex-c-m flexc stext-101 m-t-20 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"  onclick="addToChart()">
										Add to cart
									</button></a>
								</div>
							</div>	
						</div>
						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>
							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
<script type="text/javascript">
	function addToChart()
	{
		// var status = document.getElementById('status').value;
		// if(!status){
		var id = document.getElementById('id').value;
		var name = document.getElementById('name').value;
		var quantity = document.getElementById('quantity').value;
		var note = document.getElementById('note').value;
		var price = document.getElementById('price').value;

		var purchase = JSON.parse('{"name":"' + name + status + '", "quantity":"' + quantity + '", "note":"' + note + '", "id":"' + id + '", "price":"' + price + '"}');

		var d = new Date();
		d.setTime(d.getTime() + (1*24*60*60*1000));
		var expires = "expires=" + d.toUTCString();

		document.cookie = "purchase_" + id + "=" + JSON.stringify(purchase) + ";" + expires + ";path=/"; 

		Cookies.set("result", "true", { expires: 2 });

		var myCookies = Cookies.get("result");
		var quantity =  document.getElementById('quantity').value; 

		if(myCookies){
			document.getElementById("result").innerHTML = quantity ;
		}
		// }
	}	
</script>
<footer class="footer" style="margin-top:100px">
			<div class="footer_content">
				<div class="container">
					<div class="row">
					<!-- About -->
						<div class="col-lg-4 footer_col">
							<div class="footer_about">
								<div class="footer_logo">
									<a href="https://www.instagram.com/buyyo.id/?hl=id">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="footer_logo_icon"><img src="<?php echo base_url()?>3.png"alt="logo"></div>
											<div>Buy-Yo!</div>
										</div>
									</a>		
								</div>
								<div class="footer_about_text">
									<p>E-Commerce yang menfasilitasi mahasiswa untuk dapat memenuhi kebutuhan dasar yang men-direct akses transaksi difitur jual beli</p>
								</div>
							</div>
						</div>
					<!-- Footer Links -->
						<div class="col-lg-4 footer_col">
							<div class="footer_menu">
								<div class="footer_title">Support</div>
								<ul class="footer_list">
									<li>
										<a href="#"><div>Customer Service</div></a>
									</li>
									<li>
										<a href="#"><div>Return Policy</div></a>
									</li>
									<li>
										<a href="#"><div>Size Guide</div></a>
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
										<button class="newsletter_button" style="background-color:#005689;">+</button>
									</form>
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
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>		
<!--===============================================================================================-->	
	<script src="<?php echo base_url()?>/asset/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>/asset/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>/asset/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>/asset/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>/asset/vendor/slick/slick.min.js"></script>
	<script src="<?php echo base_url()?>/asset/js/slick-custom.js"></script>
	<script src="<?php echo base_url()?>/asset/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
	<script src="<?php echo base_url()?>/asset/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>/asset/vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>/asset/js/main.js"></script>
	<script src="<?php echo base_url()?>/asset/js/single_produk.js"></script>
</body>
</html>
</body>
</html>
