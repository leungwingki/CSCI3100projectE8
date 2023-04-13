<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>


<div id="my-popup">

<div style="position: absolute;"  id="leave_box">
    <div class="setting_box">
        <div class="setting_title">
            <span>Report This tweet</span>
        </div>
        <ul class="quiz">
            <li>
                <div class="space">
                </div>
                <div class="input_box">
                   
                    <div class="btn" onclick="opensend()">
                    </div>
                </div>
<form method="POST">
                            <ul class="choices">
                                <li>
                                    <div class="notification_message">
                                        <label
                                            ><input type="radio" name="question0" value="hate" /><span
                                                >Hater Speech </span
                                            ></label
                                        >
                                      
                                      </div>

                                </li>
                                <li>
                                    <div class="notification_message">
                                        <label
                                            ><input type="radio" name="question0" value="harrass" /><span
                                                >Harrassment</span
                                            ></label
                                        >
                                      
                                      </div>

                                </li>
                                <li>
                                    <div class="notification_message">
                                        <label
                                            ><input type="radio" name="question0" value="mislead" /><span
                                                >Misleading</span
                                            ></label
                                        >
                                      </div>
                                </li>
                                <li>
                                    <div class="notification_message">
                                        
                                        <label
                                            ><input type="radio" name="question0" value="harm" /><span
                                                >Promotes harmful acts</span
                                            ></label
                                        >
                                      </div>

                                </li>
                                <li>
                                    <div class="notification_message">
                                        <label
                                            ><input type="radio" name="question0" value="others" /><span
                                                >Others</span
                                            ></label
                                        >
                                      </div>

                                </li>
                            </ul>
                        </li>
                        <li>
                            
                    <button type="submit" class="btn02" onclick="opensend()" id="submit-button">
                        <span> Confirm</span>
                    </div>
                </form>
                </div>
<div class="close_box" onclick="closeleave()"></div>
</div>


<div style="position: absolute;display:none"  id="send_box">
<div class="setting_box">
    <div class="send_title">
        <span>Reported!</span>
    </div>
</div>

<div class="close_box" onclick="closesend()"></div>
</div>

<div style="position: absolute;"  id="box">

</div>
</div>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "tinkle";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['tid'])){
    $tid=$_GET['tid'];
}else{
    echo"<p>no data found</p>";
}
if(isset($_POST['question0'])){
    $choice = $_POST['question0'];
    $choice = mysqli_real_escape_string($conn, $choice);

    $sql = "INSERT INTO report(TweetID,Reason) VALUES($tid,'$choice')";
    echo"<script>location.href = 'twitter.php';</script>";
    $result=$conn->query($sql);
    
}



?>

                

            

    </body>
</html>

<style>

    .quiz,
    .choices {
        list-style-type: none;
        padding: 0;
    }
    .choices li {
        margin-bottom: 5px;
    }
    .choices label {
        display: flex;
        align-items: center;
    }
    .choices label,
    input[type="radio"] {
        cursor: pointer;
    }
    input[type="radio"] {
        margin-right: 8px;
    }
    
    .input_box{
        width: 370px;
        height: 50px;
        background-image: url('./img/report_title.png');
        background-size: 100% 100%;
        position: fixed;
        top: 320px;
        left: calc(50vw - 180px);
        border-radius: 10px;
    }

    .btn01{
        color:white;
        background-image: url('img/button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:100px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;
    }
    
    .space{
        color:white;
        display:block;
        width:400px;
        margin:10px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;
    }


    .btn02{
        color:white;
        background-image: url('img/button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:20px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;}
    

    
    .setting_box{
        width: 500px;
        height: 500px;
        position: absolute;
        padding: 5px;
        top: 200px;
        left: calc(50vw - 250px);
        border: #288cc6 15px solid;
        border-radius: 30px;
        background-color: white;
        z-index: 3;
        overflow-y: auto;
        overflow-x: hidden;
        padding-top: 60px;
        padding-bottom: 30px;
        box-sizing: border-box;
    }
    
    
    .setting_title{
        width: 500px;
        height: 100px;
        margin: 30px auto;
        color: #288cc6;
        font-size: 50px;
        font-weight: 800;
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 220px;
        left: calc(50vw - 250px);
    }
    
    
    .send_title{
        width: 400px;
        height: 400px;
        margin: 30px auto;
        color: #288cc6;
        font-size: 50px;
        font-weight: 800;
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 350px;
        left: calc(50vw - 200px);
    }
    
    .openTxt{
        width: 200px;
        height: 100px;
        line-height: 100px;
        background: wheat;
        border-radius: 30px;
        position: absolute;
        top: 400px;
        left: calc(50vw - 100px);
        z-index: 1;
        font-size: 22px;
        font-weight: 1000;
        text-align: center;
        color: midnightblue;
        font-family: 'Courier New', Courier, monospace;
    }
    

    .comment_box{
        width: 350px;
        height: 300px;
        background-image: url('./img/comment_block.png');
        background-size: 100% 100%;
        position: fixed;
        top: 300px;
        left: calc(50vw - 180px);
        border-radius: 10px;
    }


    
    /close chat box button/
    .close_box{
        width: 50px;
        height: 50px;
        /* background: powderblue; */
        position: absolute;
        left: calc(50vw + 195px);
        top: 210px;
        background-image: url('img/close.png');
        background-size: 100% 100%;
        z-index: 4;
    }
    .notification_message {
      display: #288cc6;
      background-color: #f4f4f4;
      width: 80%;
      height: 40px;
      border-bottom:rgb(159, 156, 156);
      margin-top: 0px;
      margin-left: 40px;
      background-size: 100% 100%;
      font-size: 30px;
      font-weight: 20;
      line-height: 24px;
      color: rgb(31, 31, 31);
    }
    
    .my-popup{
        Width: 600px;
        Height: 400px;
        Background: gray;
        Box-sizing: border-box; /* for inside padding */
        Padding: 10px;

        /* for center */
        Position:absolute;
        top:50%;
        left:50%;
        Transform: translate(-50%,-50%);

        /* for hider */
        display:none;
    }
</style>

<script>

    function showPopUp(){
        my_popup.style.display="block";
    }
    setTimeout(showPopUp,60000);
        
    
    
    function closetreehole(){
        document.getElementById('box').style.display = 'none'
    }


    
    function openleavemsg(){
        console.log(333)
        document.getElementById('leave_box').style.display = 'block'
    }
    function closeleave(){
        location.href = "twitter.php";
        document.getElementById('leave_box').style.display = 'none'
    }
    function opensend(){

        console.log(333)
        document.getElementById('send_box').style.display = 'block'
    }
    function closesend(){
        location.href = "twitter.php";
        document.getElementById('send_box').style.display = 'none'
        
    }
    
</script>
