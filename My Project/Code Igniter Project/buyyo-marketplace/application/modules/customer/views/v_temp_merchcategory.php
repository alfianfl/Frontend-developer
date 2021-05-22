<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asset/assets/css/owl.carousel.min.css">    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/merchhome_responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/style_HomeSlider.css">
	<!--- lightslider -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/lightslider.css">
	<script type="text/javascript" src="<?php echo base_url()?>asset/js/JQuery3.3.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>asset/js/lightslider.js"></script>
	<style type="text/css">
		.lSPager{
			display: none;
		}
		@media screen and (max-width:1920px){
            .hamburger{
                display:flex;
            }
        }
	</style>

	<div class="super_container_inner">
        <div class="super_overlay"></div>
            <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url()?>asset/images/hero_6.jpg);" data-aos="fade" id="home-section">
              <div class="container">
                <div class="row align-items-center justify-content-center"> 
                  <div class="col-md-10 mt-lg-5 text-center">
                    <div class="single-text owl-carousel">
                      <div class="slide">
                        <h1 class="text-uppercase" data-aos="fade-up">About Buy-Yo!</h1>
                        <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">E-Commerce yang menfasilitasi mahasiswa untuk dapat memenuhi kebutuhan dasar yang men-direct akses transaksi difitur jual beli.</p>
                        <div data-aos="fade-up" data-aos-delay="100">
                            <button class="add-button btn  btn-primary">Install Buy-Yo!</button> 
                        </div>
                      </div>
                      <div class="slide">
                        <h1 class="text-uppercase" data-aos="fade-up">Contact Buy-Yo!</h1>
							<p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">Contact Our Helpdesk! <br> Email  : buyyoid@gmail.com <br> WA      : 0895401011469</p>
                        <!-- <div data-aos="fade-up" data-aos-delay="100">
                          <a href="https://www.instagram.com/buyyo.id/?hl=id" target="_blank" class="btn  btn-primary mr-2 mb-2">Get In Touch</a>
                        </div> -->
                      </div>
                      <div class="slide">
                        <h1 class="text-uppercase" data-aos="fade-up"></h1>
                        <p class="mb-5 desc" data-aos="fade-up" data-aos-delay="100">
													Buy-Yo! is a one-stop solution for all students marketplace needs. <br>Unlock an exhaustive list of features ranging from a user-friendly 
													interface to commission management to customizing registration forms for students and much much more!
												</p>
                        <!-- <div data-aos="fade-up" data-aos-delay="100">
                          <a href="#" target="_blank" class="btn  btn-primary mr-2 mb-2">Get In Touch</a>
                        </div> -->
                      </div>
                    </div>
                  </div>            
                </div>
              </div>
            </div> 
     <div class="super_container_inner">
        <!-- Latest Products Start -->
        <section class="latest-product-area latest-padding-home content">
    <div class="products-home mt-5">	
	<div class="container">
		<h1 class="section-title">TryOut SBM 2020</h1>
		<h4 class="section-subtitle">Dari universitas-universitas</h4>
		<!--- slider -->
		
		<ul id="autoWidth" class="cs-hidden">
			<?php foreach($tryouts as $item): ?>
		  <li class="item-a">
		  	<!---Slider Box-->
				<div class="box border">
					<div class="thumbcard"> 
						<a class="stretched-link" href="<?php echo base_url()?>customer/tryout/details/<?= $item['id_tryout'] ?>"><img class="card-img-top"
						src="<?php echo base_url().$item['thumbnail']?>" alt="Card image cap"></a>
					</div>
						<div class="card-body">
						<a  href="<?php echo base_url()?>customer/tryout/details/<?= $item['id_tryout'] ?>"><h4 class="card-title mb-4 jdul" style="color: black;"><strong><?= $item['paket'] ?></strong></h4></a>
						<p class="card-text">
							<i class="fa fa-calendar mr-3 mb-3" aria-hidden="true"></i><small><?= date("l, d F Y", strtotime($item['waktu_mulai'])) ?></small><br> <!-- Selasa, 2 Juni 2020 -->
							<i class="fa fa-clock-o mr-3 mb-4" aria-hidden="true"></i><small><?= date("H.i ", strtotime($item['waktu_mulai']))." - ".date("H.i ", strtotime($item['waktu_selesai']))." WIB" ?></small>
							<del>Rp100.000</del><span class="ml-4" style="color: black;"><strong><?= "Rp" . number_format($item['harga'],0,',','.'); ?></strong></span>
						</p>
				</div>
				</div>
				<?php endforeach; ?>
			</li>
			<?php foreach($tryouts as $item): ?>
			<li class="item-a">
		  	<!---Slider Box-->
				<div class="box border">
					<div class="thumbcard"> 
						<a class="stretched-link" href="<?php echo base_url()?>customer/tryout/details/<?= $item['id_tryout'] ?>"><img class="card-img-top"
						src="<?php echo base_url().$item['thumbnail']?>" alt="Card image cap"></a>
					</div>
						<div class="card-body">
						<a  href="<?php echo base_url()?>customer/tryout/details/<?= $item['id_tryout'] ?>"><h4 class="card-title mb-4 jdul" style="color: black;"><strong><?= $item['paket'] ?></strong></h4></a>
						<p class="card-text">
							<i class="fa fa-calendar mr-3 mb-3" aria-hidden="true"></i><small><?= date("l, d F Y", strtotime($item['waktu_mulai'])) ?></small><br> <!-- Selasa, 2 Juni 2020 -->
							<i class="fa fa-clock-o mr-3 mb-4" aria-hidden="true"></i><small><?= date("H.i A", strtotime($item['waktu_mulai']))." - ".date("H.i A", strtotime($item['waktu_selesai']))." WIB" ?></small>
							<del>Rp10.000</del><span class="ml-4" style="color: black;"><strong><?= "Rp" . number_format($item['harga'],0,',','.'); ?></strong></span>
						</p>
				</div>
				</div>
				<?php endforeach; ?>
			</li>
		</ul>
		</div>
	</div>

	<div class="e-commerce">
		<p class="ecomerce">e-Commerce</p>
		<p class="kamingsun">COMING SOON</p>
	</div>

	<div class="products-home mt-5">	
	<div class="container">
		<div style="text-align: right;">
			<h1 class="section-title fnb">Food n' Beverage</h1>
			<h4 class="section-subtitle fnb">desc waiting...</h4>
		</div>
	<ul id="autoWidth2" class="cs-hidden">
		<?php foreach($products as $product): ?>
		  <li class="item-a">
		  	<!---Slider Box-->
				<div class="box border">					
						<div class="thumbcard">
							<a class="stretched-link" href="<?= base_url("customer/home/single/") . $product['id_produk']?>"><img class="card-img-top"
							src="<?= base_url() . 'upload/' . $product['merchant'] . "/" . $product['gambar1'] ?>" alt="Card image cap"></a>
						</div>
						<div class="card-body">
						<h4 class="card-title" style="color: black;"><strong><?= $product['nama_produk'] ?></strong></h4>
						<p class="card-text">
							<small><i><?= $product['nama_kategori'] ?><br></i></small>
							<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<small><?= $product["nama_merchant"]?></small><br>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<small>&nbsp;&nbsp;3,0/5,0</small>
							<br><br>
							<span class="harga">Rp. <?= $product['harga_produk'] ?></span>
						</p>
						</div>
				</div>
			</li>
		<?php endforeach; ?>			
		</ul>
</div>
</div>
</div>
</section>
</div>

  <script src="<?php echo base_url()?>asset/jsa/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>asset/jsa/aos.js"></script>
   <script src="<?php echo base_url()?>asset/jsa/main.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>asset/js/slider_script.js"></script>
</body>

</html>