<!DOCTYPE HTML>
<html>
	<head>
		<title>Cooming Soon!</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Little Closet template">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.css">
		<link href="<?php echo base_url()?>asset/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/plugins/OwlCarousel2-2.2.1/animate.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/category.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/category_responsive.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
	</head>
	<style>
	</style>
	<body>
	<div class="cooming_tag" style="margin-top:30px;text-align : center;">
		<h2 style="text-color:#005689"> WE ARE LAUNCHING SOON!</h2>
		<h4> Subscribe and get notified ! </h4>
	</div>
	<div class = container>
		<div class = row>
			<div class = "col-md-3 col-sm-auto mb-3">
			</div>
			<div class = "col-md-5 col-sm-4 mb-3">
				<div class="newsletter" class="subscribe">
					<form action="<?= base_url("customer/home/add_subscriber") ?>" method="post" id="newsletter_form" class="newsletter_form">
						<input name="email" type="email" class="newsletter_input" placeholder="Subscribe to our Newsletter" required="required" style="text-align: center;">
						<input type="submit" value="+" class="newsletter_button" style="background-color:#005689;">
						<button class="newsletter_button" style="background-color:#005689;">+</button>
					</form>
				</div>
			</div>
		</div>
		<div class= row >
			<div class = "col-12 col-sm-auto mb-3">
			<img src="<?php echo base_url()?>asset/images/launch.svg" class="responsive" style="width: 1100px ;height: 400px;margin-top: 150px;" >
			</div>
		</div>
	</div>
	
	</body>
</html>