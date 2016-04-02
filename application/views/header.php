<!doctype html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<title><?= $title; ?></title>

		<link rel="home" href="">

		<link href="" type="application/atom+xml" rel="alternate" title="dika.web.id Atom Feed">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="mobile-web-app-capable" content="yes">

		<meta property="og:site_name" content="Schedule Board">
		<meta property="og:title" content="Schedule Board">
		<meta property="og:description" content="">
		<meta property="og:locale" content="en_US">

		<link rel="author" href="https://plus.google.com/+FerdhikaYudira">
		<meta name="description" content="">

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/prism.css">
		<link rel="stylesheet" href="assets/css/main.css">

		<script src="assets/js/datetime.js"></script>
	</head>
    <body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= site_url();?>">Six Airports</a>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse" style="float: right;">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">
							<span id="date_time" style="color:#fff;"></span>
						</a>
						<script type="text/javascript">window.onload = date_time('date_time');</script>
					</li>
				</ul>
			</div>
		</div>
	</nav>