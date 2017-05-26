<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="author" content=""/>
		<title>Admin Panel</title>
		<!-- core CSS -->
		<link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('css/font-awesome.min.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('asset/css/sb-admin-2.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('asset/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet"/>
		<link href="<?= base_url('asset/css/bootstrap-dialog.min.css')?>" rel="stylesheet"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.0.0/metisMenu.min.css">
		<script src="<?= base_url('js/jquery.js') ?>"></script>
		<!--[if lt IE 9]>
		<script src="<?= base_url('js/html5shiv.js');?>"></script>
		<script src="<?= base_url('js/respond.min.js');?>"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?= base_url('images/ico/favicon.ico')?>"/>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('images/ico/apple-touch-icon-144-precomposed.png')?>"/>
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('images/ico/apple-touch-icon-114-precomposed.png')?>"/>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('images/ico/apple-touch-icon-72-precomposed.png')?>"/>
		<link rel="apple-touch-icon-precomposed" href="<?= base_url('images/ico/apple-touch-icon-57-precomposed.png')?>"/>
	</head>
	<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home"><i class="fa fa-dashboard fa-lg fa-fw"></i> OCS Panels Reborns</a>
        </div>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="row">
                            <div class="col-xs-5">
                                <span class="fa-stack fa-3x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true): ?>
                            <div class="col-xs-7">
                                <h4><b><?= $_SESSION['username'] ?></b></h4>
                                <h4 class="text-muted"><?php if ($_SESSION['is_admin']) { echo "Administrator"; } else {echo "Seller"; } ?></h4>
                            </div>
                        </div>
                    </li>

						<?php if ($_SESSION['is_admin']): ?>
                  
                            <li>
                                <a href="<?= base_url('panel/administrator/'.$_SESSION['username'].'/server') ?>"><i class="fa fa-th-list fa-fw"></i> Server</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/notify') ?>"><span class="glyphicon glyphicon-envelope"></span> Kotak masuk <?php if (isset($msg)): ?>
									<span class="badge"><?= count($msg) ?></span>
                                
                                <?php endif; ?>
                                </a>
                            </li>
						<li><a href="<?= base_url('panel/'.$_SESSION['username'].'/setting')?>"><i class="fa fa-key"></i> Sandi</a></li>
							<li><a href="<?= base_url('admin/asset')?>"><i class="fa fa-phone"></i> No.Telp</a></li>
							<li><a href="<?= base_url('admin/asset_req')?>"><i class="fa fa-credit-card"></i> No.Req</a></li>
                        <?php else: ?>
                         <li>
                              <a href="<?= base_url('panel/reseller/'.$_SESSION['username'].'/server') ?>"><i class="fa fa-shopping-cart fa-fw"></i> Buy SSH Account</a>
                        </li>
                        <li>
                              <a href="<?= base_url('panel/reseller/cek_account/'.$_SESSION['username']) ?>"><i class="fa fa-users"></i> Cek account</a>
                        </li>
                        <li>
							<a href="<?= base_url('panel/'.$_SESSION['username'].'/setting')?>"><i class="fa fa-gear fa-fw"></i> Setting</a>
                        </li>
                        
                        <?php endif; ?>
					  <li>
                        <a href="<?= base_url('panel/'.$_SESSION['username'].'/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
