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
          $result_one_zero;
          $username;
          $usericon;
          date_default_timezone_set('Asia/Hong_Kong');

          if (date ("h:i:sa") <= "12:00:00am"){
            $sql = "UPDATE `dailyluck` SET FateFlag=0 WHERE USERID=$user";
            $result = $conn->query($sql);
          } 
					$check_fate = "SELECT FateFlag FROM `dailyluck` WHERE USERID = $user";
          $fate_result = $conn->query($check_fate);
          while($row = $fate_result->fetch_array()){
            $result_one_zero = $row[0];
          }

          if($result_one_zero =="0"){
            //random draw
            $draw_fate_row ="SELECT m.UserID, m.Username, m.Icon
            FROM user m WHERE (UserID!= $user) AND (UserID!=1) ORDER BY RAND ( ) LIMIT 1";
            $fate_result = $conn->query($draw_fate_row);
            // print
            while($row = $fate_result->fetch_array()){
              $username = $row[1];
              $usericon = (string)$row[2];
            }

            //update the fate database
            $fate_update = "UPDATE `dailyluck` SET FateFlag=1 WHERE USERID=$user";
            $fate_updateD = $conn->query($fate_update);

//if clicking treehole or setting, reload the page, no stored data
          }
          
          

            echo"<div class ='box' ><div style='position: absolute' id='choose_box'>";
            echo "<div class='setting_title'><span> Here is your fate! </span></div>";
            echo "<div class='profile-picture-circle'  onclick='directProfile()'>";
            
            echo "<img class='profile-picture-circle-pic' src='data:image;base64,".base64_encode((string)$usericon). "' alt='Profile Picture' /> </div>";
              

            
            echo "<div class='fate-username'  > <span>@$username</span>";
            echo "</div></div></div></div>";
        
            
   
        

					


				?>
        <!-- </div>
    <div class="box">
      <div style="position: absolute" id="choose_box">
        <div class="setting_box">
          <div class="setting_title">
            <span>Here is your fate!</span>
          </div>
          <div class="profile-picture-circle" onclick="directProfile()">
            <img
              class="profile-picture-circle-pic"
              src="icon1.png"
              alt="Profile Picture"
            />
          </div>

          <div class="fate-username" onclick="directProfile()">
            <span>@randomboy</span>
          </div>
        </div>

        
      </div>
    </div> -->
    <div class="fate-username" onclick="directProfile()">
          </div>

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

          /* .setting_box {
          width: 50vw;
          height: 50vh;
          position: absolute;
          padding: 5px;
          top: 50px;
          left: 90vw ;

          background-color: white;
          z-index: 3;
          overflow-y: auto;
          overflow-x: hidden;
          padding-top: 60px;
          padding-bottom: 30px;

          } */

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
          /* left: calc(50vw - 200px); */
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


<script>
  document.getElementsByClassName("fate-username").onclick = function () {
                    location.href = "twitter.php";
  }

  function directProfile() {
    top.location.href = 'my-profile.php';
    
  }
  </script>