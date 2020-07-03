<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>login | inventory management</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css ">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>

<body style=" background-repeat: no-repeat;background: url(<?php echo base_url('assets/images/bg.jpg'); ?>);">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="p-5">
				<div class="text-center">
					<h6 class="text-gray-900 mb-4">Welcome Back to Lex-ffect Digital Display</h6>
				</div>
				<form class="user" action="<?php echo site_url('login-submit'); ?>" method="post">
					<div>
						<?php
						if ($this->session->flashdata('message')) {
						?>
							<div style="text-align: center" class="alert alert-danger" role="alert">
								<?php echo $this->session->flashdata('message'); ?>
							</div>
						<?php
						}
						?>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder=" username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>

					<div class="form-group">
						<input type="submit" class="  btn custom-button btn-user btn-block" value="Login">
					</div>
				</form>
				<!-- <div class="text-center">
					<a href="">Forgot Password?</a>
				</div> -->
			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js '); ?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>