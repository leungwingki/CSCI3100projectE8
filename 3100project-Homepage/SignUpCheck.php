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
<?php
		if ( isset($_POST['uname']) && isset($_POST['psw']) && isset($_POST['email']) ) {
			function validate($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$uname= validate($_POST['uname']) ;
			$pass= validate($_POST['psw']);
			$email= validate($_POST['email']);

            if(strlen($_POST['uname'])>30){header("Location: SignUp.php?error= Username has to be within 30 characters");
			    exit();}
            if(strlen($_POST['email'])>60){header("Location: SignUp.php?error= Email is requiredUsername has to be within 60 characters");
			    exit();}
            if(strlen($_POST['psw'])>12){header("Location: SignUp.php?error= Password  has to be within 12 characters");
			    exit();}

			if(empty($uname)){
				header("Location: SignUp.php?error= Username is required");
			    exit();
			}else if(empty($email)){
				header("Location: SignUp.php?error= Email is required");
			    exit();
			}else if(empty($pass)){
				header("Location: SignUp.php?error= Password is required");
			    exit();
			}else{
             
                $sql ="SELECT * FROM user WHERE Username='$uname'";
                $result= mysqli_query($conn,$sql);
             
                if(mysqli_num_rows($result)>0){
                    header("Location: SignUp.php?error= This Username has been used");
			          exit();
                
                }else{ 
                    
                    $sql ="SELECT * FROM user WHERE Username='$email'";
                    $result2= mysqli_query($conn,$sql);
    
                    if(mysqli_num_rows($result2)>0){
                    header("Location: SignUp.php?error= This Email has been used");
			          exit();

                }else{
                    $sql3 ="INSERT INTO user(Username, Email, Password) VALUES('$uname','$email','$pass')";
                $result3= mysqli_query($conn,$sql3);
                if($result3){
                    header("Location: SignUp.php?success= Account has been created successfully ");
			          exit();

                }else{
                    header("Location: SignUp.php?Unknown errors ");
                    exit();

                }
            }
        }
            }	
			
	}
		
?>