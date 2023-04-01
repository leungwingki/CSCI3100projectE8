<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet"
		href="my-profile.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){  
            $('#Notification-ID-modal').load("notfication.php");
        });
    </script>
       
</head>
<body>
    <div class="BIGcontainer">
        <div class="sidebar" >
               <div ><img src="LOGO.png" class="logo"></div>
               <div><input class="searchforuser" type="text" placeholder="Username">
                   <button type="submit" class="fa-fa-search">Search</button>
               </div>
               
               <button id="switchpageHome"><img src="home.png"></button>
               <script type="text/javascript">
                document.getElementById("switchpageHome").onclick = function () {
                    location.href = "twitter.php";
                };
            </script>
                <button id="LinkFate" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                <img class ="PopFortune" src="notifications.png">
                </button>
           
                <button id="switchpageTreehole" ><img src="treehole.png"></button>
               <script type="text/javascript">
                document.getElementById("switchpageTreehole").onclick = function () {
                    location.href = "treehole.php";   
                };
                </script>

                
               <button id="LinkFortune" type="button"  data-toggle="modal" data-target="#exampleModal"><img class ="PopFortune"
                src="dailyfortune.png"></button>


                <button id="switchpageDrawForFate" ><img src="drawforfate.png"></button>
               <script type="text/javascript">
                document.getElementById("switchpageDrawForFate").onclick = function () {
                    location.href = "yourFate.php";   
                };
                </script>


               <button id="switchpageProfile" ><img src="profile.png"></button>
               <script type="text/javascript">
                document.getElementById("switchpageProfile").onclick = function () {
                    location.href = "my-profile.php";   
                };
                </script>
               <button><img src="setting.png"></button>
               <button><img src="Tweet.png" class="Tweet"></button>
        </div>
    
       
     
        <div class="Home">

            
            <div class="HomeTop"><div class="name">@devonlane</div>
            <div class="NoFollower"> 91 Followers</div><div class="NoFollowing"> 41 Following</div>

            </div>
            <div class="profile-container"> 

                <!--content***************-->

                <div class="profile-container-cover-n-profile-pic"> 
                <img  class="profile-container-cover" src="Mad.jpeg" alt="Profile Picture" />
                <div class="profile-picture-circle" >
                    <img class="profile-picture-circle-pic" src="icon1.png" alt="Profile Picture" /> 
                </div>

            </div>
            <div class="profile-bio">
                <div class="username-id">
                    <ul>@aliinahere</ul>
                </div>
                <div class="username-id-bio">
                    <ul>
                        CSCI!#@@$$34121323213213213edqwdqqfCSCSCSCSSSCSCCSSCS
                    </ul>
                </div>
            
            </div>
            <div class="action-under-profile">
                <button class="action-under-profile-column1 ">
                    Tweets
                </button>
                <button class="action-under-profile-column2 ">
                    Tweets & replies
                </button>
                <button class="action-under-profile-column3 ">
                    Media
                </button>
                <button class="action-under-profile-column4 ">
                    Likes
                </button>



            </div> 


<!--end***************-->


           

            </div> 

            <script>
					function changeColour(){

					}
				</script>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$db = "tinkle";
					$conn = new mysqli($servername, $username, $password, $db);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$user = 4;
					// get following tweets and get recent popular tweets (join)
					$sql = "SELECT User.Icon, User.Username, Tweet.DateTime, Tweet.Text, Tweet.image_video, Tweet.LikeCounter, Tweet.DislikeCounter, Tweet.CommentCounter, Tweet.RetweetCounter, Tweet.TweetID FROM Tweet, User WHERE Tweet.userid = User.userid AND ( (Tweet.userID IN (SELECT TargetUserID FROM Follow WHERE FollowerUserID = $user)) OR Tweet.LikeCounter > 50 ) ORDER BY DateTime DESC";
					$result = $conn->query($sql);
					date_default_timezone_set('Asia/Hong_Kong');
					// print
					while($row = $result->fetch_array()) {
						$pic1 = $row[0];
						$name = $row[1];
						$elapsed = time() - strtotime($row[2]);
						if($elapsed < 60){
							$elapsed = $elapsed . 's';
						} elseif($elapsed < 60*60){
							$elapsed = ((int) ($elapsed / 60)) . 'm';
						} elseif($elapsed < 60*60*24){
							$elapsed = ((int) ($elapsed / 60 / 60)) . 'h';
						} elseif($elapsed < 60*60*24*7){
							$elapsed = ((int) ($elapsed / 60 / 60 / 24)) . 'd';
						} else{
							$elapsed = ((int) ($elapsed / 60 / 60 / 24 / 7)) . 'w';
						}
						$message = $row[3];
						$pic2 = $row[4];
						$upc = $row[5];
						$downc = $row[6];
						$comc = $row[7];
						$rec = $row[8];
						$id = $row[9];
						echo "<div class='container'><div class='side'><div class='avatar-medium-1'>";
						echo "<img class='profile-picture-1' src='data:image;base64,".base64_encode($pic1). "' alt='Profile Picture' /> </div></div>";
						echo "<div class='main'><ul class='user'><li class='UserName' > @$name </li>";
						echo "<li class = 'TimeStamp'> $elapsed </li></ul>";
						echo "<ul class = 'text-content'><li> $message </li></ul>";
						if($pic2 != null){
							echo "<ul class = 'media'><li><img src='data:image;base64,".base64_encode($pic2). "' alt='Post Picture' /></li></ul>";
						}

                        if($pic2 == null){
                            echo "<ul class = 'no-media'><li></li></ul>";
                        }
                        

						// get like/dislike status
						
						echo "<form method = 'post'> <ul class='action_-item'>  <li> <button type='button' name='inter1'> <img class='interactimg' src='Like.png'> </button> </li><li class='LikeCount' > $upc </li>";
						echo "<li> <button type='button' name='inter2'> <img class='interactimg' src='Dislike.png'> </button> </li><li class = 'DislikeCount'> $downc </li>";
						echo "<li> <button type='button' name='inter3'> <img class='interactimg' src='Comment.png'> </button> </li><li class='CommentCount'> $comc </li>";
						echo "<li> <button type='button' name='inter4'> <img class='interactimg' src='Retweet.png'> </button> </li><li class='RetweetCount'> $comc </li>  </ul> </form>";
						echo "</div></div>";
					}
					if(isset($_POST['inter1'])){
						echo "success";
					}

				?>
                
                
      
        </div>
        <div class="Chat" >
           
                <div class="ChatList">
                    
                    <div class="ChatListTop">Conversations
                        <img src="ADDCHAT.png" class="addchat">
                    </div>
                     

                    <div class="ListItem">
                        
                        <div class="Listside">
                        <div class="avatar-medium-1">
                        <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> </li>
                        </div>
                            <div class="ListUserName" > James No.1 
                                <img src="sendmessage.png" class="sendbutton"></div>
                        </div>
                        </div>

                        <div class="ListItem">
                        
                            <div class="Listside">
                            <div class="avatar-medium-1">
                            <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> </li>
                            </div>
                                <div class="ListUserName" > James No.2<img src="sendmessage.png" class="sendbutton"></div>
                            </div>
                            </div>
                   <div class="ListItem">
                        
                        <div class="Listside">
                        <div class="avatar-medium-1">
                        <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> </li>
                        </div>
                            <div class="ListUserName" > James No.243<img src="sendmessage.png" class="sendbutton"></div>
                        </div>
                        </div>
                    <div class="ListItem">
                        
                        <div class="Listside">
                        <div class="avatar-medium-1">
                        <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> </li>
                        </div>
                            <div class="ListUserName" > James No.342<img src="sendmessage.png" class="sendbutton"></div>
                        </div>
                        </div>
                    <div class="ListItem">
                        
                        <div class="Listside">
                        <div class="avatar-medium-1">
                        <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> </li>
                        </div>
                            <div class="ListUserName" > James No.441<img src="sendmessage.png" class="sendbutton"></div>
                        </div>
                        </div>
                  
                 
            </div>
                <div class="Conversations">
                    <div>hi</div>
                     <div>hi</div>
                    <div>hi</div>
                    <div>hi</div>
                </div>
        </div>
    </div>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Your Notification!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="Notification-ID-modal" >
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Your Fortune!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <iframe src="Fortune.php">
          </div>
          
        </div>
      </div>
    </div>
    </body>
</html>
    