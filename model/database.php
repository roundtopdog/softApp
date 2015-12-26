<?php 
	$dsn = 'mysql:host=localhost;dbname=softapp';
	$username = 'will';
	$password = '1234';

	try{
		$db = new PDO($dsn, $username, $password);
		// echo 'test = your connected';
	}catch(PDOException $e) {
		$error_message = $e->getMessage();
		include('database_error.php');
		exit();
	}