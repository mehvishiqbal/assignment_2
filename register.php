<?php

session_start();


if(isset($_SESSION['user_id'])){
	header("Location:index.php");
	}


require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

    //enter the new user in the database
	// creating query
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);
	
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	
	if($stmt->execute()):
	  	$message = 'Successfully created a new user';
	 else:
	   	$message = 'Sorry, there must have been issue while creating account';
	 endif;
	
endif;

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

<div class="container header">
	<a href="index.php">Home page</a>
</div>

<?php if(!empty($message)): ?>
  <p><?= $message ?></p>
<?php endif; ?>

<h1>Register</h1>
<span>or <a href="login.php">login here</a></span>

<form action="register.php" method="POST">

   <input type="text" placeholder="Enter email" name="email">
   <input type="password" placeholder="Enter password" name="password">
   <input type="password" placeholder="Confirm password" name="confirm_password">

    <input type="submit">


</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>