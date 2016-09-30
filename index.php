<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to your Web App</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
</head>
<body>

	<div class="container header">
		<a href="index.php">Home page</a>
   </div>

	<?php if( !empty($user) ): ?>

		<h1>Php Login System</h1>
        <br /><h4>Welcome <?= $user['email']; ?> </h4>
		<br /><br /><h4>You are successfully logged in!</h4>
		<br /><br />
        <p>Now you have an option to either</p>
		<a href="logout.php">Logout?</a> Or
        <a href="page1.php">See Page 1</a>

	<?php else: ?>

		<h1>Php Login System</h1>
		<a href="login.php">Login</a> <h5>Or</h5> 
        <a href="register.php">Register</a>

	<?php endif; ?>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>