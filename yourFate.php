<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
  </head>

  <body>

  <?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$db = "tinkle";
					$conn = new mysqli($servername, $username, $password, $db);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$user = $_SESSION['UserID'];
          $fateid;
          $username;
          $usericon;
          date_default_timezone_set('Asia/Hong_Kong');

          if (date ("h:i:sa") == "12:00:00am"){
            $sql = "UPDATE `dailyluck` SET FateFlag=0 WHERE USERID=$user";
            $result = $conn->query($sql);
          } 
					$check_fate = "SELECT FateFlag FROM `dailyluck` WHERE USERID = $user";
          $fate_result = mysqli_query($conn,$check_fate );
          while($row = $fate_result->fetch_array()){
            $fateid=$row[0];
          }
          // mysqli_num_rows($fate_result )==0
          if(mysqli_num_rows($fate_result )==0){
            $draw_fate_row ="SELECT m.UserID, m.Username, m.Icon
            FROM user m WHERE (UserID!= $user) AND (UserID!=1) ORDER BY RAND ( ) LIMIT 1";
            $fate_result = $conn->query($draw_fate_row);
            // print
            while($row = $fate_result->fetch_array()){
              $fateid=$row[0];
              $username = $row[1];
              $usericon = (string)$row[2];
            }
            $fate_update = "INSERT INTO `dailyluck` ( FateFlag,UserID)
            VALUES ($fateid ,$user);";
           }else{
              $get_fate = " SELECT m.UserID, m.Username, m.Icon FROM user m WHERE UserID= $fateid ";
              $fate_result = $conn->query($get_fate);
              while($row = $fate_result->fetch_array()){
                $username = $row[1];
                $usericon = (string)$row[2];
              }
            }
            echo"<div class ='box' ><div style='position: absolute' id='choose_box'>";
            echo "<div class='setting_title' id=fateid ><span> Here is your fate! </span></div>";
            echo "<div class='profile-picture-circle' onclick=\"directProfile()\"> ";
            
            if($usericon != null){
              echo "<img class='profile-picture-circle-pic' src='data:image;base64,".base64_encode($usericon). "' alt='Profile Picture' /></div>";
            }else{
              echo "<img  class='no-media' /></div>";
            }
            echo "<div class='fate-username' onclick=\"directProfile()\"> <span>@$username</span>";
            echo "</div></div></div></div>";
          
        
				?>

        <?php 

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "tinkle";
        $conn = new mysqli($servername, $username, $password, $db);
                
            if(isset($_POST["submit"])){
                
                $sth = "SELECT UserID FROM user WHERE Username='$fateid'";
                $result =$conn->query($sth);
              
                if($row = $result->fetch_array()){
                
                  $_SESSION["targetuser"] = $row[0];
                  
                  header('Location: my-profile-others.php');

                }else{

                  echo"Username do not exisit";

                }
            

            }

        ?>

  </body>
</html>

<style>
        * {
            padding: 0;
            margin: 0;
            user-select: none;
          }
          .box {
          width: 100vw;
          height: 100vh;

          }

          .setting_box_bak {
          width: 100vw;
          height: 100vh;
          position: absolute;
          padding: 5px;
          top: 50px;
          left: calc(50vw - 250px);

          background-color: white;
          z-index: 3;
          overflow-y: auto;
          overflow-x: hidden;

          }  

          .setting_title {

          background-color: white;
          background-size: 100% 100%;
          line-height: 50px;
          font-size: 30px;
          font-weight: 800;
          line-height: 50px;
          color: #288cc6;
          position: relative;
          text-align: center;
          left: 25vw;
          }


          .setting_title_bak {
          width: 400px;
          height: 100px;
          margin: 30px auto;
          color: #288cc6;
          font-size: 50px;
          font-weight: 800;
          line-height: 50px;
          text-align: center;
          position: fixed;
          top: 170px;
          left:30vw;
          }

          /*close chat box button*/
          .close_box {
          width: 50px;
          height: 50px;
          /* background: powderblue; */
          position: absolute;
          left: calc(50vw + 195px);
          top: 100px;
          background-image: url("close.png");
          background-size: 100% 100%;
          z-index: 4;
          }

          .profile-picture-circle {
          display: block;
          position: absolute;
          left: 23vw;
          top: 14vh;
          border-radius: 99999px;
          align-items: flex-start;
          align-self: stretch;
          height: 50vh;
          width: 55vw;
          overflow: hidden;

          z-index: 1;
          }

          .profile-picture-circle-pic {
          display: block;
          height: 50vh;
          width: 55vw;
          left: 0px;
          object-fit: fill;
          position: absolute;

          z-index: 1;
          }

          .fate-username {
          width: 400px;
          height: 100px;
          margin: 30px auto;
          color: #288cc6;
          font-size: 50px;
          font-weight: 800;
          line-height: 50px;
          text-align: center;
          position: fixed;
          bottom: 10px;
          left: 8vw;
          }
      </style>
  <script type="text/javascript">
  // document.getElementsByClassName("fate-username").onclick = function () {
  //                   location.href = "twitter.php";
  // }

  function directProfile() {
    var user =  document.getElementsByClassName("setting_title")[0].id;
    // top.location.href = 'my-profile-others.php';

    `$.ajax({
    type: "POST",
    url: "my-profile-others.php",
    data: {
      fateUserID: user

    },
    dataType: "json",
    success: function (data) {
      var userData = JSON.parse(data);
    },
    });`
  }

  </script>

