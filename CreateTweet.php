<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<style>
.Title{
    color:#288cc6;
   font-family: Arial, Helvetica, sans-serif;
   font-size: 5.3vw;
   padding-left: 30.5vw;
}

.tweet{
    padding-left: 22vw;
}
.input{
width: 40vw;
    padding-left: 11vw;
    padding-right: 5vw;
    height: 40vh;
    align-items: start;
 align-self: stretch;
 display: flex;
 font-size: 3.3vw;
}

.tweet img{
    width:33.5vw;
    padding-left:11.2vw;

}
.upload{

    display: none;

}

.post{

    display: none;
}

.switchpage{
    padding-left: 70vw;



}
</style>

</head>
<body>
 <div class="Title" ><b>Create a Tweet</b></div>
 <div class="tweet">
<form method="post" enctype="multipart/form-data">
<input class="input"type="text" name="title" placeholder="Put your thoughts here">
<p><label><img src="UPLOAD.png"><input class="upload" type="file" name="file"  ></label>

<label><img src="POST-TWEET.png"><input class="post" type="submit" name="submit" ></label>
</form>
<div class="switchpage">
<button id="switchpage" >Return to Homepage</button>
               <script type="text/javascript">
                document.getElementById("switchpage").onclick = function () {
                    location.href = "twitter.php";
                };
                </script></div>

</div>


<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$db = "tinkle";
$UserID=$_SESSION['UserID'];
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = null;
if(isset($_POST["submit"])){
    $title=$_POST["title"];
    if(!empty($_FILES["file"]["name"])){
        $uploads_dir = "uploads";
        $tname = $_FILES["file"]["tmp_name"];
        $blobdata = mysqli_real_escape_string(file_get_contents(($tname)));
        $sql="INSERT into tweet(UserID,Text,Image_Video) VALUES('$UserID','$title', '$blobdata')";
    } else{ //no image
        if(!empty($title)){ //text and image cannot both be null
           $sql="INSERT into tweet(UserID,Text) VALUES('$UserID','$title')";
        } else{
            echo "<script> alert('Your tweet is empty'); </script>";
        }
    }

    if($sql != null){
        if(mysqli_query($conn,$sql)){
            sleep(1.5);
            header("Location: twitter.php");
        }else{
            echo "ERROR";
        }
    }

}






?>


</body>
</html>