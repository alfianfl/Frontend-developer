
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/all_responsive.css">	
	<link href="<?php echo base_url()?>asset/font-awesome/css/fontawesome.css" rel="stylesheet">
	<link href="<?php echo base_url()?>asset/font-awesome/css/brands.css" rel="stylesheet">
    <link href="<?php echo base_url()?>asset/font-awesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/lightslider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/style_HomeSlider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/merchhome_responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/details_responsive.css">
    <style>
    .card-body{
    	height: 200px
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
    <div class="container container1">	
      <h1 class="mt-5">Try Out SBMPTN 2020</h1>
	  <div class="row mt-5">
	    <div class="col-sm-5 col-md-6 ">
	    	<div class="featured-article">
	    		<div class="thumbcard-main">
					<a href="#">
						<img src="<?= base_url().$tryout[0]['thumbnail']?>" class="img-fluid" alt="Responsive image">
					</a>
				</div>
			</div>
		</div>
	    <div class="col-sm-6 col-md-5 col-lg-6 main-list ">
	    	<ul class="media-list ">
				  <li class="media">
				    <div class="media-body">
				      <h5 class="media-heading"> <?= $tryout[0]['penyelenggara'] ?></h5>
				      <div class="by-author mt-4">
					      <p><i class="fas fa-calendar-alt mr-2"></i><?= date("l, d F Y", strtotime($tryout[0]['waktu_mulai'])) ?></p>
					      <p><i class="fas fa-clock mr-2"></i><?= date("H.i ", strtotime($tryout[0]['waktu_mulai']))." - ".date("H.i ", strtotime($tryout[0]['waktu_selesai']))." WIB" ?></p>
				  	  </div>
				    </div>
				  </li>
				  <li class="media">
				    <div class="media-body">
				      <h1 class="line"></h1>
				      <div class="by-author mt-4">
					      <p>Harga</p>
					      <p><del>Rp100.000</del>&nbsp;&nbsp;&nbsp;<span style="color: black;"><strong><?= "Rp" . number_format($tryout[0]['harga'],0,',','.'); ?></strong></span></p>
				  	  </div>
				  	  <div class="mt-5">
				  	  		<a class="buynow" href="<?php echo base_url()?>customer/tryout/do_payment/<?= $tryout[0]['id_tryout']; ?>">
				  	  			<button type="button" class="btn button">Beli Sekarang</button>
				  	  		</a>
				  	  </div>
				    </div>
				  </li>
				</ul>
			</div>
	  </div>
	  <div class="mt-5 text">
	  	<h1>Rekomendasi</h1>
	  	<p class="media-heading">Ada banyak Tryout lainnya juga, yuk capai mimpimu ... </p>
	  </div>
	  <div class="row mt-3">	
		<div class="container">
		  <div class="carousel-item active">
		  	<ul id="autoWidth" class="cs-hidden">
			<?php foreach($list_to as $item): ?>
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
			<?php foreach($list_to as $item): ?>
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
		</ul>
		</div>
	</div>
</div>
</div>
</div>
  <script src="<?php echo base_url()?>asset/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url()?>asset/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url()?>asset/js/confirm-buy.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>asset/js/slider_script.js"></script>
  	<script type="text/javascript" src="<?php echo base_url()?>asset/js/JQuery3.3.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>asset/js/lightslider.js"></script>

  </body>
</html>