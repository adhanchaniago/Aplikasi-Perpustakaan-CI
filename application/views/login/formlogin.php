<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 --><!-- 
<?php echo form_open('Login/index'); ?>
 -->
<!-- <table align="center">
<form name="form1" method="POST">
	<?php $message = $this->session->flashdata('pesan');?>
	<?php echo !empty($message)? '<p style="color:red;">'.$message.'</p>':'' ; ?>
	<div class="login">
			<div>
				<label>Username:</label>
				<input type="text" name="txtUser" value="<?php echo set_value('txtUser'); ?>">
					<?php echo form_error('txtUser'); ?>
			</div>
			<div>
					<label>Password:</label>
					<input type="password" name="txtPass" value="<?php echo set_value('txtPass'); ?>">
						<?php echo form_error('txtPass'); ?>
			</div>			
			<div>
					<input type="submit" value="Login" class="tombol" name="tombol">
				</div>
			<div>
				<td colspan="2" align="center"><?php echo anchor('login/register', 'Register'); ?></td>
			</div>
		</div>

</table>
</form>
<?php echo form_close(); ?>

</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('templatelogin/images/icons/favicon.ico');?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/fonts/iconic/css/material-design-iconic-font.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/vendor/animate/animate.css');?>">
<!--=======');?>========================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/vendor/animsition/css/animsition.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/vendor/select2/select2.min.css');?>">
<!--===');?>============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/vendor/daterangepicker/daterangepicker.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('templatelogin/css/main.css');?>">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<?php $message = $this->session->flashdata('pesan');?>
			<?php echo !empty($message)? '<h5 style="color:red;" align="center">'.$message.'</h5>':'' ; ?>
			<br>
			<form class="login100-form validate-form" name="form1" method="POST">
				<span class="login100-form-title p-b-37">
					Aplikasi Pustaka
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="txtUser" value="<?php echo set_value('txtUser'); ?>" placeholder="username"><?php echo form_error('txtUser'); ?>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="txtPass" value="<?php echo set_value('txtPass'); ?>" placeholder="password"><?php echo form_error('txtPass'); ?>
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="tombol" value="login">
						Sign In
					</button>
				</div>

			</form>
	
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script src="<?php echo base_url('templatelogin/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('templatelogin/vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('templatelogin/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?php echo base_url('templatelogin/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('templatelogin/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('templatelogin/vendor/daterangepicker/moment.min.js');?>"></script>
	<script src="<?php echo base_url('templatelogin/vendor/daterangepicker/daterangepicker.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('templatelogin/vendor/countdowntime/countdowntime.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('templatelogin/js/main.js');?>"></script>

</body>
</html>	