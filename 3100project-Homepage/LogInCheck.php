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
		if ( isset($_POST['uname'], $_POST['psw']) ) {
			function validate($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$uname= validate($_POST['uname']) ;
			$pass= validate($_POST['psw']);
			if($_POST['uname']=="admin1" && $_POST['psw']=="csci3100" ){
				header("Location: Admin.php");
			    exit();

			}else if(empty($uname)){
				header("Location: Login.php?error= Username is required");
			    exit();
			}else if(empty($pass)){
				header("Location: Login.php?error= Password is required");
			    exit();
			}else{
				$sql = "SELECT * FROM user WHERE Username= '$uname' AND Password ='$pass' " ;
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)===1){
					$row = mysqli_fetch_assoc($result);
					if($row ['Username']===$uname && $row['Password']===$pass){
					$SESSION['Username']=$row['Username'];
					$SESSION['UserID']=$row['UserId'];
					$SESSION['Email']=$row['Email'];
					$SESSION['Cover']=$row['Cover'];
					$SESSION['Icon']=$row['Icon'];
					$SESSION['Bio']=$row['Bio'];
					header("Location: Twitter.php");
					}else{
					header("Location: Login.php?error= Incorrect Username or Password");
			    	exit();
				}
			}else{
				header("Location: Login.php?error= Incorrect Username or Password");
			exit();
			}

			
		}
	}
		
		?>