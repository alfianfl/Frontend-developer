<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/util_login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/main_login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/styles/logincolor.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<a href="<?= base_url(); ?>">
						<img src="<?php echo base_url()?>asset/images/img-01.png" alt="IMG">
					</a>
				</div>
				<form action="<?= base_url("/customer/auth/register_action")?>" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						Create your Account
					</span>
          <?= $this->session->flashdata('message'); ?>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    
					<div class="wrap-input100 validate-input" data-validate ="Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate ="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Sign Up
						</button>
                    </div>
                    
                    <div class="text-center p-t-12">
						<span class="txt1">
							Have an account?
						</span>
						<a class="txt2" href="<?= base_url("customer/auth/login") ?>">
							Sign In
						</a>
					</div>
					<hr>
					<div class="container">
						<a href="<?php echo $loginURL; ?>" class="login100-google-btn">
							<image id="google-icon" src="<?= base_url('asset/images/google-icon.svg'); ?>">Login with Google
						</a>
					</div>

                    <div class="text-center p-t-136">
						<a class="txt2" href="<?= base_url(); ?>">
							Buy-Yo!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="<?php echo base_url()?>asset/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/popper.js"></script>
	<script src="<?php echo base_url()?>asset/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>asset/select2/select2.min.js"></script>
	<script src="<?php echo base_url()?>asset/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="<?php echo base_url()?>asset/js/main_login.js"></script>

</body>