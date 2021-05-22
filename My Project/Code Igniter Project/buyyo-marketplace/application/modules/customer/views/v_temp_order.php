<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/color.css">
<style type="text/css">
	.wait{
		padding-top: 200px;
		padding-bottom: 200px;
	}

	.big{
		font-size: 30pt;
		font-weight: 500;
		color: #005689;
	}

	.Little{
		color: black;
		font-weight: 300;
	}

	.kd_trs{
		margin-top: 10px;
		margin-bottom: 10px;
	}
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

		<!-- Waiting Order -->
		<div class="wait">
			<div class="container">
				<div class="col-lg-6">
					<span class="big">Mohon Menunggu</span><br>
					<span class="Little">Pesanan sedang dibuat, Silahkan menuju ke kasir untuk melanjutkan pembayaran</span><br>
					<div class="kd_trs form-group">
						<input class="form-control" type="text" placeholder="xxxxxx" value="<?= $keranjang ?>" readonly>
					</div>
					<span class="Little">*tunjukkan kode diatas pada kasir</span><br>
					<br>
					<button type="button" class="btn btn-info"><a href="https://docs.google.com/forms/d/e/1FAIpQLSf32-PanvZsWk8YuaDwwZVrWpsmlIAcTSHgKCZGotHEPWU2Mw/viewform" style="color:#ffff">Isi Survey</a></button>
					<span class="Little">Berkesempatan mendapat 5 kopi GRATIS!</span><br>
					
				</div>
			</div>
		</div>


</body>
</html>