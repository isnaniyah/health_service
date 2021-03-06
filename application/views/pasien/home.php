<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>E-Health</title>
<!-- BOOTSTRAP STYLES-->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
<!-- BOOTSTRAP STYLES-->
<!-- FONTAWESOME STYLES-->
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="<?php echo base_url(); ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="wrapper">
  <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo base_url()?>index.php/welcome_pasien">PASIEN</a> </div>
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: left;
font-size: 20px;"> E-Health Service System</div>
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
      <?php $tgl=date('l, d-m-Y'); echo $tgl; ?>
      &nbsp; <a href="<?php echo site_url('welcome_pasien/logout');?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
  </nav>
  <!-- /. NAV TOP  -->
  <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
        <li class="text-center"><img src="<?php echo base_url(); ?>assets/mos-css/img/rs.png" class="user-image img-responsive"/></li>
        <li> <a  href="<?php echo base_url()?>index.php/welcome_pasien"><img src="<?php echo base_url(); ?>assets/img/p_menu.png"> Menu Utama</a> </li>
        <li> <a  href="<?php echo base_url()?>index.php/antrian/daftar"><img src="<?php echo base_url(); ?>assets/img/p_antrian.png"> Pendaftaran </a> </li>
        <li> <a  href="<?php echo base_url()?>index.php/pasien/jadwal"><img src="<?php echo base_url(); ?>assets/img/p_jadwal.png"> Jadwal Dokter</a> </li>
        <li> <a  href="<?php echo base_url()?>index.php/pasien/ganti_password"><img src="<?php echo base_url(); ?>assets/img/p_ganti.png"> Ganti Password</a> </li>
      </ul>
    </div>
  </nav>
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>
</html>
