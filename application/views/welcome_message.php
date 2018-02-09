<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Health Service System</title>
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/mos-css/mos-style.css"/>
 </head>
 <style>
img {
    border-radius: 10%;
	height: 100px;
	width:100px;
	margin-top:50px;
}
</style>
 <body>
 <div id="header">
	<div class="inHeaderLogin"><marquee>SILAHKAN LOGIN UNTUK MASUK HALAMAN ADMIN</marquee></div>
</div>

<div id="loginForm">

	<div class="headLoginForm">
	<center>Login Administrator</center>
    <img src="<?php echo base_url();?>assets/mos-css/img/lock.png" class="user-image img-responsive" alt="Paris" width="400" height="300">
	</div>
	<div class="fieldLogin">
    
    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin'); ?>
	<label>Username</label><br>
	<input type="text" class="login" id="username" name="username"><br>
	<label>Password</label><br>
	<input type="password" class="login" id="password" name="password"><br>
	<input type="submit" class="button" value="Login">
	</form>
	</div>
</div>
   </form>
   <br />
 </body>
</html>

