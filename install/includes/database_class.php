<?php
session_start();

class Database {

	// Function to the database and tables and fill them with the default data
	function create_database($data)
	{
		// Connect to the database
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');
		
		// Check for errors
		if(mysqli_connect_errno())
			return false;

		// Create the prepared statement
		$mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);

		// Close the connection
		$mysqli->close();
		return true;
	}

	// Function to create the tables and fill them with the default data
	function create_tables($data)
	{
		// Connect to the database
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);
		
		$_SESSION['hostname'] = $data['hostname'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['database'] = $data['database'];
		// Check for errors
		if(mysqli_connect_errno())
			return false;

		// Open the default SQL file
		$query = file_get_contents('assets/install.sql');

		// Execute a multi query
		$mysqli->multi_query($query);

		// Close the connection
		$mysqli->close();

		return true;
	}
	function _hashpwd($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}

	function create_admin($data, $sess) {
	
		$mysqli = new mysqli($sess['hostname'],$sess['username'],$sess['password'],$sess['database']);
		if(mysqli_connect_errno()) {return false;}
		
		
		$u=$data['user']; $e=$data['email']; $p=$this->_hashpwd($data['pwd']);
		$brand=$data['brand'];$author=$data['author']; $title=$data['title'];
		$desc=$data['description']; $key =$data['keyword'];
		
		$sql = "INSERT INTO users (username,email,password, is_admin) VALUES ('$u','$e', '$p', TRUE)";
		if ($mysqli->query($sql)) {
			 $web = "INSERT INTO website VALUES ('$brand','$author', '$title','$desc','$key')";
			 if (!$mysqli->query($web)) { return false; }
		}
		$mysqli->close();
		return true;
	}
}
