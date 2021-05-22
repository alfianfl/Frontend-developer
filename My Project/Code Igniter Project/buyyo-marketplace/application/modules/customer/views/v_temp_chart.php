
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/cart.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/responsive_cart 2.1.css">
 <style type="text/css">
 	@media only screen and (max-width: 375px) {
    		.product_text label{
    			position:relative;
    			bottom:20px
    		}
		}
		@media screen and (max-width:1920px){
			.hamburger{
                display:flex;
        	}
		}
		.header_searchnav{
                display:none
		}
 </style>
</head>
<body>
	<div class="super_container_inner">
		<div class="super_overlay"></div>
		<!-- Home -->
		<div class="home" style="background-color:#005689;">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Shopping Cart</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center" >
							<li ><a style="color:white" href="<?php echo base_url()?>">Home</a></li>
							<li ><a style="color:white" href="<?= base_url("customer/home/category") ?>">Kategori Merchant</a></li>
							<li style="color:white">Your Cart</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Cart -->
		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex ">
									<li class="mr-auto">Product</li>
								    <li class="price">Price</li>
									<li class="quantity">Quantity</li>
									<li >Total</li>
								</ul>
							</div>
                            	
                            
                            <?php $i=1;
                                foreach($chart as $item): ?>    
                            <!-- Cart Items -->
                            <div class="cart_items">
                                <ul class="cart_items_list">
                                    <!-- Cart Item -->
                                    <li class="cart_item item_list d-flex flex-lg-row align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                        <div class="product d-flex flex-lg-row align-items-lg-center align-items-start justify-content-start mr-auto">
                                            <div><div class="product_number"><?php echo $i;?></div></div> <?php $i++; ?>
                                            <?php 
                                                $url = $this->API . '/product/' . $item['id'];
                                                $header = array('Content-Type: application/json');
                                                $product = $this->mycurl->get($url, $header);
                                                $merch = $product[0]['merchant'];
                                                $pict = $product[0]['gambar1'];
                                            ?>
                                            <div><div class="product_image"><img src="<?php echo base_url('upload/') . $merch . '/' . $pict ?>" alt=""></div></div>
                                            <div class="product_name_container">
                                                <div class="product_name"><a href="<?= base_url("customer/home/single/") . $item['id']?>"><?= $item['name'] ?></a></div>
                                                <div class="product_text"><?= $item['note'] ?></div>
                                            </div>
                                        </div>
                                        <div class="product_price product_text"><span></span><label><?= $item['price'] ?></label></div>
                                        <div class="product_price product_text text-center"><span></span><label><?= $item['quantity'] ?></label></div>
                                        <div class="product_total product_text"><span></span><label><?= $item['price'] * $item['quantity'] ?></label></div>
                                    </li>
                                </ul>
                            </div>   
                            <?php endforeach; ?>	

						</div>
					</div>
				</div>
				<div class="row cart_extra_row">	
					<div class="col-lg-6 cart_extra_col ">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total ">
								<div class="cart_extra_title">Cart Total</div>
								<div class="shipping">
									<div class="cart_extra_title"><h4>Shipping Method</h4></div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text">Next day delivery</span>
											</label>
											<div class="shipping_price ml-auto" style="color: #005689">Coming Soon</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text">Standard delivery</span>
											</label>
											<div class="shipping_price ml-auto" style="color: #005689">Coming Soon</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" checked>
												<span class="radio_mark"></span>
												<span class="radio_text">Personal Pickup</span>
											</label>
											<div class="shipping_price ml-auto">Free</div>
										</li>
									</ul>
								</div>
								<ul class="cart_extra_total_list" style="position:relative;bottom:30px">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto"><?= $total ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Shipping</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto"><?= $total ?></div>
									</li>
									
								</ul>
								<div class="coupon_form_container " style="position:relative;bottom:30px">
											<form action="#" id="coupon_form" class="coupon_form ">
												<label >
													<input placeholder="Coupon Code" type="text" class="coupon_input cart_extra_total_title" required="required" style="width: 100%" >
													<button class="coupon_button ">apply</button>
												</label>
											</form>
										</div>
								<div class="checkout_button trans_200"><a href="<?php echo site_url('customer/home/checkout');?>">checkout</a></div>
							</div>
						</div>
					</div>
				</div>
				<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                    <div class="button button_clear trans_200"><a href="<?= base_url("customer/home/check_chart") ?>" onclick=deleteCookie()>clear cart</a></div>
                                    <!-- <button onclick=deleteCookie()>clear cart</button> -->
									<div class="button button_continue trans_200"><a href="<?php echo base_url();?>">continue shopping</a></div>
								</div>
							</div>
			</div>
		</div>
		</div>
<script>
    function deleteCookie(){
        document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
    }
</script>
<script src="<?php echo base_url()?>asset/js/cart.js"></script>
<script src="<?php echo base_url()?>asset/js/jquery-3.2.1.min.js"></script>
</body>
</html>
