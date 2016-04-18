<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.1.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8"/>
		<title><?php echo $this->config->item('title');?> | <?php echo $title;?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="Ferdhika" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('assets/admin/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css');?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/global/plugins/select2/select2.css');?>"/>
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
		<!-- END PAGE STYLES -->
		<!-- BEGIN THEME STYLES -->
		<link href="<?php echo base_url('assets/admin/css/components.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('assets/admin/css/plugins.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('assets/admin/admin/layout/css/layout.css');?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url('assets/admin/admin/layout/css/themes/default.css');?>" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="<?php echo base_url('assets/admin/admin/layout/css/custom.css');?>" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/logo.png');?>"/>


		<script src="<?php echo base_url('assets/js/datetime.js');?>"></script>
	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="page-header-fixed page-quick-sidebar-over-content">
		<!-- BEGIN HEADER -->
		<div class="page-header navbar navbar-fixed-top">
			<!-- BEGIN HEADER INNER -->
			<div class="page-header-inner">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<a href="<?php echo site_url('admin');?>">
					<img src="<?php echo base_url('assets/admin/img/logo.png');?>" alt="logo" class="logo-default"/>
					</a>
				</div>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown dropdown-quick-sidebar-toggler">
							<a href="#" style="background-color:#1F1F1F; padding-bottom: 0px;">
								<span id="date_time" style="color:#fff;"></span>
							</a>
							<script type="text/javascript">window.onload = date_time('date_time');</script>
						</li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown dropdown-user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img alt="" class="img-circle hide1" src="<?php echo base_url('assets/img/logo.png');?>"/>
								<span class="username username-hide-on-mobile">
									<?php echo $dataUser['nama']; ?>
								</span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo site_url('admin/keluar');?>">
									<i class="fa fa-sign-out"></i> Log Out </a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END HEADER INNER -->
		</div>
		<!-- END HEADER -->
		<div class="clearfix">
		</div>