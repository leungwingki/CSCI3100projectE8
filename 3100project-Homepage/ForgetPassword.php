<!doctype html>
<html>
<head>
<title>Forgot Password</title>

<!-- css files -->
<link href="ForgetPasswordStyle.css" rel='stylesheet' type='text/css' media="all" />
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

<div class="log">
	<div class="content1">
	
		<form action="" method="post">
		<?PHP  if(isset($_GET['error'])){?> 
				<p class="error"><?PHP echo $_GET['error'] ; ?> </p>
				<?PHP } ?>
				
            <h7>A email containing your password will be sent to your registered address.</h7>
			<input type="text" name="email" placeholder="Email" >
		
			<div class="button-row">
				<input type="submit" class="sign-in" value="Confirm">
			
				
			</div>
			
			
			<?php
		if (isset($_POST['email']) ) {
			function validate($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			
			$email= validate($_POST['email']);

      if(empty($email)){
				header("Location: ForgetPassword.php?error= Email is required");
			    exit();
			}else{
             
                $sql ="SELECT * FROM user WHERE Email='$email'";
                $result= mysqli_query($conn,$sql);
             
                if(mysqli_num_rows($result)>0){
					$sql ="SELECT Password FROM user WHERE Email='$email'";
					$result= mysqli_query($conn,$sql);
					$row = mysqli_fetch_row($result);




				

 $to_email = '$email' ;
 $subject = "Your password:";
 $body = $row[0];
 $headers = "From: sender\'s email";
 ini_set('SMTP','myserver');
 ini_set('smtp_port',25);
 if (mail($to_email, $subject, $body, $headers)) {
   echo "Email successfully sent to $to_email...";
 } else {
   echo "Email sending failed...";
 }






















                }
            }	
			
	}
		
?>



			<a href="LogIn.php" class="Forget">Return to Sign In / Sign Up</a>
		</form>
	</div>
	

</div>




</body>
</html>

