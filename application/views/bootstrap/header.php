<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content="<?php echo $description; ?>"/>
		<meta name="keywords" content="<?php echo $keyword; ?>"/>
		<meta name="author" content="<?php echo $author; ?>"/>
		<title><?php echo $title;?></title>
		<!-- core CSS -->
		<link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('css/font-awesome.min.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('css/animate.min.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('css/prettyPhoto.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('css/main.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('css/responsive.css')?>" rel="stylesheet"/>
		<script src="<?= base_url('js/jquery.js')?>"></script>
		<!--[if lt IE 9]>
		<script src="<?= base_url('js/html5shiv.js');?>"></script>
		<script src="<?= base_url('js/respond.min.js');?>"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?= base_url('images/ico/favicon.ico')?>"/>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('images/ico/apple-touch-icon-144-precomposed.png')?>"/>
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('images/ico/apple-touch-icon-114-precomposed.png')?>"/>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('images/ico/apple-touch-icon-72-precomposed.png')?>"/>
		<link rel="apple-touch-icon-precomposed" href="<?= base_url('images/ico/apple-touch-icon-57-precomposed.png')?>"/>
	</head><!--/head-->
	<body>
	<header id="header">
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-4">
						<div class="top-number"><p>Server Time: <?php echo date("Y-m-d H:i:s",time());?></p></div>
					</div>
					<div class="col-sm-6 col-xs-8">
						<div class="social">
							<ul class="social-share">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-skype"></i></a></li>
							</ul>
							<div class="search">
								<form role="form">
									<input type="text" class="search-form" autocomplete="off" placeholder="Search">
									<i class="fa fa-search"></i>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->
		</div><!--/.top-bar-->
		<nav class="navbar navbar-inverse" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><h4><?php echo $brand;?></h4></a>
				</div>
				<div class="collapse navbar-collapse navbar-right">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
						<li><a href="about-us.html">About Us</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="portfolio.html">Portfolio</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="blog-item.html">Blog Single</a></li>
								<li><a href="pricing.html">Pricing</a></li>
								<li><a href="404.html">404</a></li>
								<li><a href="shortcodes.html">Shortcodes</a></li>
							</ul>
						</li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contact-us.html">Contact</a></li>
						
							
						
					</ul>
				</div>
			</div><!--/.container-->
		</nav><!--/nav-->
	</header><!--/header-->
