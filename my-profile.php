<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet"
		href="my-profile.css">
	<link rel="stylesheet"
		href="HomePageStyle.css">
<link rel="stylesheet" href="chatstyle.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script language="JavaScript" type="text/javascript" src = "my-profile_Function.js" > </script>
        <script src="homeandchat.js"></script>

</head>
<body>
    <div class="BIGcontainer">
        <div class="sidebar" >
               <div ><img src="LOGO.png" class="logo"></div>
               <div>
			   <form method="post">
			   <input class="searchforuser" type="text" placeholder="Username" name="search">
                 <button type="submit" name="submit" class="fa-fa-search" >Search</button>
				</form>
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



               <button id="switchpageDrawForFate" type="button"  data-toggle="modal" data-target="#myModal" ><img src="drawforfate.png"></button>


               <button id="switchpageProfile" ><img src="profile.png"></button>
               <script type="text/javascript">
                document.getElementById("switchpageProfile").onclick = function () {
                    location.href = "my-profile.php";
                };
                </script>


               <button id="switchpageSetting" ><img src="setting.png"></button>
               <script type="text/javascript">
                document.getElementById("switchpageSetting").onclick = function () {
                    location.href = "setting.php";
                };
                </script>


                <button id="switchpageCreateTweet" ><img src="Tweet.png" class="Tweet"></button>
                            <script type="text/javascript">
                            document.getElementById("switchpageCreateTweet").onclick = function () {
                                location.href = "CreateTweet.php";
                            };
                            </script>
                </div>



        <div class="Home">
            <div class='HomeTop'>
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
					// display Bio
					$user_profile = "SELECT  User.Username,User.Icon, User.Cover, User.Bio, User.followerCounter, User.followingCounter FROM  User WHERE UserID =$user ";
					$result_profile = $conn->query($user_profile);
					date_default_timezone_set('Asia/Hong_Kong');
					// print
					while($row = $result_profile->fetch_array()) {
						$username = $row[0];
						$usericon = $row[1];
						$usercover = $row[2];
						$userbio = $row[3];
						$userfollower = $row[4];
						$userfollowing = $row[5];

						echo "<div class='name' >@$username</div>";
						echo "<div class='NoFollower'> $userfollower Followers</div><div class='NoFollowing'> $userfollowing Following</div></div>";
            echo "<div class='profile-container'><div class='profile-container-cover-n-profile-pic'>";
            if($usercover != null){
							echo "<img class='profile-container-cover' src='data:image;base64,".base64_encode($usercover). "' alt='Cover Picture' />";
						} else{
              echo "<img class='profile-container-cover' src='default_Cover.webp' />";
            }

            echo "<div class='profile-picture-circle'>";
            if($usericon != null){
							echo "<img class='profile-picture-circle-pic' src='data:image;base64,".base64_encode($usericon). "' alt='Profile Picture' />";
						} else {
              echo "<img class='profile-picture-circle-pic' src='icon1.png' alt='Profile Picture' />";
            }

            echo "</div><div class='profile-bio'><div class='username-id'><ul>@$username</ul></div>";
						echo "<div class='username-id-bio'><ul>$userbio</ul></div></div>";
          }


                    echo "<form method = 'post'><div class='action-under-profile'><button class='profile-action-btn' id='followbtn' type='button' name='edit' > Edit </button>";
                    echo "<button class='profile-action-btn' type='submit' name='all-tweet' >Tweets </button>";
                    echo "<button class='profile-action-btn' type='submit' name='all-retweet' > Retweet</button>";
                    echo "</div></div></div>";

                    // $sql2 = "SELECT * FROM Follow WHERE TargetUserID = $targetuser AND FollowerUserID = $user";
                    // $result2 = $conn->query($sql2);
                    // //previously followed
                    // if($result2->num_rows >0){
                    //   echo "<script> initFollow();</script>";
                    // }

                    if(isset($_REQUEST['all-retweet'])){
                        //retweet
                        $sql = "SELECT User.Icon, User.Username, Tweet.DateTime, Tweet.Text, Tweet.image_video, Tweet.LikeCounter, Tweet.DislikeCounter, Tweet.CommentCounter, Tweet.RetweetCounter, Tweet.TweetID, Retweet.TweetID FROM Tweet, User, Retweet WHERE Retweet.userid=4 AND Tweet.userid = User.userID AND User.userID = Retweet.userid ORDER BY DateTime DESC;";
                        }else {
                            //post my it self
                          $sql = "SELECT User.Icon, User.Username, Tweet.DateTime, Tweet.Text, Tweet.image_video, Tweet.LikeCounter, Tweet.DislikeCounter, Tweet.CommentCounter, Tweet.RetweetCounter, Tweet.TweetID FROM Tweet, User WHERE Tweet.userid = $user AND User.userID = $user ORDER BY DateTime DESC";

                    }

                    $result = $conn->query($sql);
                    date_default_timezone_set('Asia/Hong_Kong');
                    // display tweets
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
                        $tid = $row[9];
                          $comc= $conn->query("SELECT COUNT(*) FROM tweetComment WHERE tweetID=$tid")->fetch_array()[0];
                            echo "<div class='container'><div class='side'><div class='avatar-medium-1'>";
                            if($pic1 != null){
                            echo "<img class='profile-picture-1' src='data:image;base64,".base64_encode($pic1). "' alt='Profile Picture' /> </div></div>";
                            } else{
                              echo "<img class='profile-picture-1' src='icon1.png' alt='Profile Picture' /> </div></div>";
                            }

                            echo "<div class='main'><ul class='user'><li class='UserName' > @$name </li>";
                            echo "<li class = 'TimeStamp'> $elapsed </li></ul>";
                            echo "<ul class = 'text-content'><li> $message </li></ul>";
                            if($pic2 != null){
                                echo "<ul class = 'media'><li><img src='data:image;base64,".base64_encode($pic2). "' alt='Post Picture' /></li></ul>";
                            } else{
                  echo "<ul class = 'no-media'><li></li></ul>";
                }

                            echo "<form> <ul class='action_-item'>  <li> <button name ='like' id='likeBtn-$tid' type='button' onClick='likeClick($tid, $user)'> <img src='Like.png'> </button> </li><li id='likeCnt-$tid'> $upc </li>";
                            echo "<li> <button id='dislikeBtn-$tid' type='button' onClick='dislikeClick($tid, $user)'> <img src='Dislike.png'> </button> </li><li id='dislikeCnt-$tid'> $downc </li>";
                            echo "<li> <button type='button' name='inter3' onclick=\"location.href='Comment.php?tid=$tid'\"> <img class='interactimg' src='Comment.png'> </button> </li><li id='CommentCount-$tid'> $comc </li>";
                            echo "<li> <button id='retweetBtn-$tid' type='button' onClick='retweetClick($tid, $user)'> <img src='Retweet.png'> </button> </li><li id='retweetCnt-$tid'> $rec </li>";
                echo "<li> <button id='reportBtn-$tid' type='button' onclick=\"location.href='report.php?tid=$tid'\"> <img src='Report.png'> </button> </li> </ul> </form>";
                            echo "</div></div>";


                            // get like/dislike status
                            $l_dl = 0;
                            $sql2 = "SELECT Like_Dislike FROM Likes_Dislikes WHERE TweetID = $tid AND UserID = $user ORDER BY DateTime DESC";
                            $result2 = $conn->query($sql2);
                            if($result2->num_rows >0){
                              $row2 = $result2->fetch_array();
                              if($row2[0] == 1){ //liked
                                $l_dl = 1;
                              } elseif($row2[0] == 0){ //disliked
                                $l_dl = -1;
                              }
                            }

                            if($l_dl == 1){
                            echo "<script>initColor('like', $tid);</script>";
                            } elseif($l_dl == -1){
                            echo "<script>initColor('dislike', $tid);</script>";
                            }

                            // get retweet status
                            $rt = 0;
                            $sql2 = "SELECT * FROM Retweet WHERE TweetID = $tid AND UserID = $user";
                            $result2 = $conn->query($sql2);
                            if($result2->num_rows >0){
                              echo "<script>initColor('retweet', $tid);</script>";
                            }

                        }

                        echo "</div>";
                    echo "<div class='Chat' ><div class='ChatList'>";
                    echo "<div class='ChatListTop'>Conversations<img src='ADDCHAT.png' class='addchat'></div>";
                    $sql = "SELECT Username, Icon, UserID FROM User WHERE UserID IN (SELECT TargetUserID FROM Follow WHERE FollowerUserID = $user)";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_array()) {
                        $name = $row[0];
                        $pic = $row[1];
                        $fid = $row[2];
                        echo "<form method='post'><div class='ListItem' id='chatitem-$fid' onClick='changeChat($user, $fid)' ><div class='Listside'><div class='avatar-medium-1'>";
                        if($pic != null){
                            echo "<img class='profile-picture-1' src='data:image;base64,".base64_encode($pic). "' alt='Profile Picture' /> </li></div>";
                        } else{
                            echo "<img class='profile-picture-1' src='icon1.png' alt='Profile Picture' /> </li></div>";
                        }

                        echo "<div class='ListUserName'> @$name<img src='sendmessage.png' class='sendbutton'></div></div></div></form>";
                    }

                    echo "</div>";

                    // already chatting
                    if($_SESSION["Partner"] != null){
                      $ofid = $_SESSION["Partner"];
                      echo "<script>changeChat($user, $ofid);</script>";
                    }



				?>
                <div class='Conversations' id='chatroom'></div>
                <div id='sendbox'></div>
                <br>
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




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalTitle">Your Fate!</h5>
              <button id="fateButton" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                    <div class="modal-body" id="1">
                        <iframe src="yourFate.php" ></iframe>
                    </div>
            <!-- <div class="modal-body" id="fate-ID-modal" ></div> -->
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
          <div id ="2" class="modal-body">
            <iframe src="Fortune.php">
          </div>

        </div>
      </div>
    </div>


    </body>

</html>

