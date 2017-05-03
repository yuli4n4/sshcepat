<!DOCTYPE html>
	<html lang = "en">
		<head>
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
		<title><?php echo $title; ?></title>
		<!-- Bootstrap -->
		<link href = "<?php echo base_url(); ?>css/bootstrap.min.css" rel = "stylesheet">
		<link href = "<?php echo base_url(); ?>css/sshcepat.css" rel = "stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		</head>
	<body>
	<div class="navbar navbar-inverse" style="height:100px;" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?php echo $brand; ?></a>
			</div>
			<div class="navbar-collapse collapse navbar-right">
				<ul class="nav nav-pills">
					<li role="presentation"><a href="#" class="glyphicon glyphicon-home"> Home</a></li>
					<li role="presentation"><a href="#">Ssh</a></li>
					<li role="presentation"><a href="#">Join</a></li>
					<li role="presentation"><a href="#">About</a></li>
				</ul>
			</div>
		</div>
	</div>
