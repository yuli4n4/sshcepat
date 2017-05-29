<?php
//http://sshcepat.com/install/admin.php?dbhost=localhost&dbuser=k6162467_db1&dbpwd=ok123!&dbname=k6162467_demo
session_start();

if ( isset($_GET['dbhost']) && isset($_GET['dbuser']) && isset($_GET['dbpwd']) && isset($_GET['dbname']) ) {
                $_SESSION ['db']['hostname'] = $_GET['dbhost'];
                $_SESSION ['db']['username'] = $_GET['dbuser'];
                $_SESSION ['db']['password'] = $_GET['dbpwd'];
                $_SESSION ['db']['database'] = $_GET['dbname'];
    
}
 if ($_POST) {
	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post_admin($_POST) == true)
	{
	if($database->create_admin($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		}
		if(!isset($message)) {
			$success = $core->show_message('success',"Installatisn wass successfull please Remove folder INSTALL.");
			$_SESSION['success'] = 'Installation wass successfull.please remove folder install';
		}
	}
	else {
		$message = $core->show_message('error','Not all fields have been filled in correctly. Admin user, Admin password, and email');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Install | Your App</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		
	</head>
	<body>
	<center><h1>Installation</h1></center>
		<div class="container">
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
					<?php if(isset($message)) {echo '<p class="alert alert-danger">' . $message . '</p>';}?>
					<?php if(isset($success)) {echo '<p class="alert alert-success">' . $success . '</p>';}?>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="col-sm-6">
					<legend>Administrator Settings</legend>
					<div class="form-group">
						<label for="username">Admin username</label><input type="text" id="user" class="form-control" placeholder="Enter admin user" name="user" />
					</div>
					<div class="form-group">
						<label for="password">Admin password</label><input type="text" id="pwd" class="form-control" placeholder ="Enter Admin password" name="pwd" />
					</div>
					<div class="form-group">
						<label for="database">Email</label><input type="email" id="email" class="form-control" placeholder="Enter email" name="email" />
					</div>
					</div>
					<div class="col-sm-6">
					<legend>Site Description</legend>
					<div class="form-group">
						<label for="brand">Brand</label><input type="text" id="brand" class="form-control" value="ex: <?php echo $_SERVER['SERVER_NAME'];?>" name="brand" />
					</div>
					<div class="form-group">
						<label for="author">Author</label><input type="text" id="author" class="form-control" value ="ex: <?php echo $_SERVER['SERVER_NAME'];?>" name="author" />
					</div>
					<div class="form-group">
						<label for="title">Title</label><input type="text" id="title" class="form-control" placeholder ="Ex: Free Premium ssh account" name="title" />
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea id="description" class="form-control" rows="5" name="description">Fast Premium SSH Account Server Singapore, US, Japan, Netherlands, France, Indonesia, Vietnam, Germany,  Russia, Canada etc with Unlimited Data and High Speed Connection</textarea>
					</div>
					<div class="form-group">
						<label for="keyword">Keyword</label>
						<textarea id="keyword" class="form-control" rows="5" name="keyword">Secure Shell, Fast SSH Premium, Fast Proxy Premium, VPN Premium, Fast Connection, High Bandwidth, Dropbear, Tunneling, Shell Account, Dropbear, OpenSSH</textarea>
					</div>
					</div>
					<input type="submit" value="Install" id="submit" class="btn btn-danger pull-right"/>
					</form>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
	</body>
</html>
