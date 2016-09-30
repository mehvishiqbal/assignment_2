<?php
$server = 'localhost';
$username = 'users';
$password = 'users';
$database = 'users';

// if the connection fails then get an error message

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch(PDOException $e){
		die("Connection failed:" . $e->getMessage());
		
		}

?>