<!-- Footer -->
<footer class="footer">
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
										<a href="<?= base_url("customer/home/cooming_soon") ?>"><div>Customer Service</div></a>
									</li>
									<li>
										<a href="<?= base_url("customer/home/cooming_soon") ?>"><div>Return Policy</div></a>
									</li>
									<li>
										<a href="<?= base_url("customer/home/cooming_soon") ?>"><div>Size Guide</div></a>
									</li>
									<li>
										<a href="<?= base_url("customer/home/cooming_soon") ?>"><div>Terms and Conditions</div></a>
									</li>
									<li>
										<a href="<?= base_url("customer/home/cooming_soon") ?>"><div>Contact</div></a>
									</li>
								</ul>
							</div>
						</div>
						<!-- Footer Contact -->
						<div class="col-lg-4 footer_col">
							<div class="footer_contact">
								<div class="footer_title">Ikuti Kami di</div>
								<div class="newsletter">
									<form action="#" id="newsletter_form" class="newsletter_form">
										<label style="width: 100%">
											<input type="email" class="newsletter_input" placeholder="Subscribe to our Newsletter" required="required">
											<button class="newsletter_button" style="background-color:#005689;">+</button>
										</label>
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

<script src="<?php echo base_url()?>asset/js/custom.js"></script>

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

	}
	function addListToChart(idd, nama, harga)
	{
		var id = idd;
		var name = nama;
		var quantity = 0;
		var note = "";
		var price = harga;
		var cookie =  decodeURIComponent(document.cookie);
		var splitId = cookie.split("purchase_");
		var splitQty = cookie.split("quantity");
		var cookieId = [];
		var cookieQty = [];
		var i;
		for(i = 0; i < splitId.length; i++){
			if(splitId[i].substr(0,3) == parseInt(splitId[i].substr(0,3))){
				cookieId.push(splitId[i].substr(0,3));
			} else if(splitId[i].substr(0,2) == parseInt(splitId[i].substr(0,2))){
				cookieId.push(splitId[i].substr(0,2));
			} else if(splitId[i].substr(0,1) == parseInt(splitId[i].substr(0,1))){
				cookieId.push(splitId[i].substr(0,1));
			}

			if(splitQty[i].substr(3,3) == parseInt(splitQty[i].substr(3,3))){
				cookieQty.push(splitQty[i].substr(3,3));
			} else if(splitQty[i].substr(3,2) == parseInt(splitQty[i].substr(3,2))){
				cookieQty.push(splitId[i].substr(0,2));
			} else if(splitQty[i].substr(3,1) == parseInt(splitQty[i].substr(3,1))){
				cookieQty.push(splitQty[i].substr(3,1));
			}
		}

		for(i = 0; i < cookieId.length; i++){
			if(id == cookieId[i]){
				quantity = parseInt(cookieQty[i]) + 1;
			} 
		}

		if(quantity == 0)
			quantity = 1;
			
		var d = new Date();
		d.setTime(d.getTime() + (1*24*60*60*1000));
		var expires = "expires=" + d.toUTCString();

		var purchase = JSON.parse('{"name":"' + name + status + '", "quantity":"' + quantity + '", "note":"' + note + '", "id":"' + id + '", "price":"' + price + '"}');
		document.cookie = "purchase_" + id + "=" + JSON.stringify(purchase) + ";" + expires + ";path=/"; 

	}	
</script>
<script>
    function deleteCookie(){
        document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
    }
</script>
<script src="upup.min.js"></script>
<script>
UpUp.start({
  'cache-version':'v2',
  'content-url': 'offline.html',
  'content': 'Cannot reach site. Please check your internet connection',
  'service-worker-url': 'upup.sw.min.js'
});
</script>
<script src="install.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>
</html>