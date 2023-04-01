<!doctype html>
<html>
<head>
<title>LogIn Page</title>

<!-- css files -->
<link href="LogInStyle.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
</head>
<body>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "tinkle";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<h1><img src="LOGO.png" class="LOGO"></h1>

	<div class="content1">
	
		<form action="LogInCheck.php" method="post">
			<?PHP  if(isset($_GET['error'])){?> 
				<p class="error"><?PHP echo $_GET['error'] ; ?> </p>
				<?PHP } ?>
		
			<input type="text" name="uname" placeholder="Username" >
			<input type="password" name="psw" placeholder="Password" >
			<div class="button-row">
				<input type="submit" class="sign-in" value="Sign In">
				
			</div>
			<a href="ForgetPassword.php" class="Forget">Forget your password?</a>
			<p><a href="SignUp.php" class="Forget">Sign Up</a></p>
		</form>
		
	</div>
	



</body>
</html>