<!DOCTYPE html>
<html lang="en">
<head>
  <title>Buy-Yo!</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/responsive.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/responsive_listproduk.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
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
<div class="super_container_inner">
		<div class="super_overlay"></div>
		<!-- Home -->
  <br>
  <?php if(!isset($products['msg'])){ ?>
  <div id="WJSlider" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#WJSlider" data-slide-to="0" class="active"></li>
      <li data-target="#WJSlider" data-slide-to="1"></li>
      <li data-target="#WJSlider" data-slide-to="2"></li>
      <li data-target="#WJSlider" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner "aria-selected="true" role="tab">

      <div class="item active ">
        <img alt="Audits set-up in Chrome DevTools"  src="<?php echo base_url()?>asset/images/jb.jpg" alt="slide1" width="100%" height="345">
      </div>

      <div class="item ">
        <img alt="Audits set-up in Chrome DevTools" src="<?php echo base_url()?>asset/images/2.jpg" alt="slide1" width="100%" height="325">
      </div>
  
      <div class="item ">
        <img alt="Audits set-up in Chrome DevTools" src="<?php echo base_url()?>asset/images/jb.jpg"  alt="slide1" width="100%" height="345">
      </div>

      <div class="item ">
       <img alt="Audits set-up in Chrome DevTools" src="<?php echo base_url()?>asset/images/2.jpg" alt="slide1" width="100%" height="300">
      </div>
 
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#WJSlider" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Kembali</span>
    </a>
    <a class="right carousel-control" href="#WJSlider" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Lanjut</span>
    </a>
  </div>
  <?php } ?>
		<!-- Products -->
		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
					<?php if(isset($products['msg'])){ ?>
						<div class="section_title text-center"><?= $products['msg'] ?></div>
					<?php }else{ ?>
						<div class="section_title text-center">Temukan di Takkafe</div>
					<?php } ?>
					</div>
				</div>
				<div class="row page_nav_row">
					<div class="col-11">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								<!--<li><a href="...">Recomend</li>
								<li><a href="...">Paket</a></li> -->
							</ul>
						</div>
					</div>
				</div>
  					<!-- Product -->
	  					<div class="row text-center Product-m" id="product" >	
						  		<?php if(isset($products['msg'])){
									//   Nothing
								} else {
									foreach($products as $product): ?>
									<input type="hidden" id="id" value="<?= $product['id_produk']; ?>">
									<input type="hidden" id="name" value="<?= $product['nama_produk']; ?>">
									<input type="hidden" id="price" value="<?= $product['harga_produk'];?>">
								<div class="product"  >
									<a href="<?= base_url("customer/home/single/") . $product['id_produk']?>"><div class="product_image"><img alt="Audits set-up in Chrome DevTools" width="100%" src="<?= base_url() . 'upload/' . $product['merchant'] . "/" . $product['gambar1'] ?>"></div></a>
									<div class="product_content" >
										<div  class="product_info d-flex flex-row align-items-start justify-content-start" >
											<div >
												<div>
													<div class="product_name"><span><a href="<?= base_url("customer/home/single/") . $product['id_produk']?>"><?= $product['nama_produk'] ?></a></span></div>
													<div class="product_category">In <a href="#"><?= $product["nama_merchant"] . "/" . $product['nama_kategori'] ?></a></div>
												</div>
											</div>
											<div class="ml-auto text-right">
												<div class="product_price text-right"><span >Rp. <?= $product['harga_produk'] ?></span></div>
											</div>
										</div>
										<a href="javascript:history.back()"><div class="product_buttons" onclick="addListToChart(<?php echo $product['id_produk']?>,'<?php echo $product['nama_produk']?>',<?php echo $product['harga_produk']?>)">
											<div class="text-right d-flex flex-row align-items-start justify-content-start">							
												<div style="width:100%" class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
													<div>
														<div>
														<p id="test"></p>
														<button style="cursor:pointer;" class="buttonku" aria-label="Center Align">
															<img alt="Audits set-up in Chrome DevTools"  src="<?php echo base_url()?>asset/images/cart.svg" class="svg" alt="cart">
														</button>
														</div>
													</div>
												</div>
											</div>
										</div></a>
									</div>
							</div>
              <?php endforeach; }?>
            </div>
            <div class="row load_more_row">
                <div class="col">
                  <div class="button buttonload load_more ml-auto mr-auto"><a href="#">load more</a></div>
                </div>
              </div>
				</div>
			</div>
		</div>
		<!-- Features -->
		<div class="features">
			<div class="container">
				<div class="row">
						<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img alt="Audits set-up in Chrome DevTools" src="<?php echo base_url()?>asset/images/icon_1.svg" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Fast Secure Payments</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left featurep">
								<div class="feature_icon ml-auto mr-auto"><img alt="Audits set-up in Chrome DevTools" src="<?php echo base_url()?>asset/images/icon_2.svg" alt=""></div>
							</div>
							<div class="feature_right featurepr  d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Premium Products</div>
							</div>
						</div>
					</div>
<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img alt="Audits set-up in Chrome DevTools" src="<?php echo base_url()?>asset/images/icon_3.svg" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Free Delivery</div>
							</div>
						</div>
					</div>
      			</div>
			</div>
		</div>
<script type="text/javascript">
	var slideIndex = 0;
	showSlides();
	function showSlides() {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
    slides[i].style.display = "none";  
		slides[i].style.display = "none";  
    slides[i].style.display = "none";  
		slides[i].style.display = "none";  
    slides[i].style.display = "none";  
		slides[i].style.display = "none";  
    slides[i].style.display = "none";  
		slides[i].style.display = "none";  
    slides[i].style.display = "none";  
		slides[i].style.display = "none";  
    slides[i].style.display = "none";  
		slides[i].style.display = "none";  
	}
	slideIndex++;
	if (slideIndex > slides.length) {slideIndex = 1}    
  if (slideIndex > slides.length) {slideIndex = 1}    
	if (slideIndex > slides.length) {slideIndex = 1}    
  if (slideIndex > slides.length) {slideIndex = 1}    
	if (slideIndex > slides.length) {slideIndex = 1}    
  if (slideIndex > slides.length) {slideIndex = 1}    
	if (slideIndex > slides.length) {slideIndex = 1}    
  if (slideIndex > slides.length) {slideIndex = 1}    
	if (slideIndex > slides.length) {slideIndex = 1}    
  if (slideIndex > slides.length) {slideIndex = 1}    
	if (slideIndex > slides.length) {slideIndex = 1}    
  if (slideIndex > slides.length) {slideIndex = 1}    
	if (slideIndex > slides.length) {slideIndex = 1}    
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex-1].style.display = "block";  
  slides[slideIndex-1].style.display = "block";  
	slides[slideIndex-1].style.display = "block";  
  slides[slideIndex-1].style.display = "block";  
	slides[slideIndex-1].style.display = "block";  
  slides[slideIndex-1].style.display = "block";  
	slides[slideIndex-1].style.display = "block";  
  slides[slideIndex-1].style.display = "block";  
	slides[slideIndex-1].style.display = "block";  
  slides[slideIndex-1].style.display = "block";  
	slides[slideIndex-1].style.display = "block";  
  slides[slideIndex-1].style.display = "block";  
	slides[slideIndex-1].style.display = "block";  
	dots[slideIndex-1].className += " active";
	setTimeout(showSlides, 3000); // Change image every 3 seconds
	}
</script>
</body>
</html>


