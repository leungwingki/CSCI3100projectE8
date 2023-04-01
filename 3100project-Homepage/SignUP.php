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

<div class="content2">
		
		<form action="SignUpCheck.php" method="post">
		<?PHP  if(isset($_GET['error'])){?> 
				<p class="error"><?PHP echo $_GET['error'] ; ?> </p>
				<?PHP } ?>
         <?PHP  if(isset($_GET['success'])){?> 
		    <p class="success"><?PHP echo $_GET['success'] ; ?> </p>		
        		<?PHP } ?>

        
			<input type="text" name="uname" placeholder="Username">
			<input type="email" name="email" placeholder="Email" >
			<input type="password" name="psw" placeholder="Password">
			<input type="submit" class="register" value="Sign Up">
            <p><a href="LogIn.php" class="Forget">Log In</a></p>
		</form>
        

		
	</div>
		
	
	



</body>
</html>
