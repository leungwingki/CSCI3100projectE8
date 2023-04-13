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

<div id="my-popup">
            <div style="position: absolute;"  id="box">
                <div class="setting_box">
                    <div class="setting_title">
                        <span>Setting</span>
                    </div>
                    <div class="btn01" onclick="confirm_signout()">
                        <span> Sign out</span>
                    </div>
                    
                    <div class="btn02" onclick="confirm_Deactivate()">
                        <span> Deactiviate</span>
                    </div>
                    
                    
                    <div class="btn03" onclick="confirm_Delete()">
                        <span> Delete Account</span>
                    </div>
                    <div class="btn04" onclick="openchangepw()">
                        <span> Change Password</span>
                    </div>
                </div>
                
                <div class="close_box" onclick="closesetting()"></div>
            </div>
            
            <div style="position: absolute;display:none;"  id="box_pw">
                <div class="changepw_box">
                    
                    <div class="changepw_title">
                        <span>Change Password</span>
                    </div>
<form method="POST">

                    <input type="text" name="oldpw" size="30" placeholder="Type old password..."  style="width: 200pxheight:80px;line-height:40px;font-size: 20px;margin-top: 30px;margin-left: 40px;"/>
                    
                    <input type="text" name="newpw" size="30" placeholder="Type new password..."  style="width: 200pxheight:80px;line-height:40px;font-size: 20px;margin-top: 20px;margin-left: 40px;"/>

                    <button type="submit" name="send" class="btn_confirm" onclick="pw_msg()" > Confirm</button>

</form>
                </div>
                
                <div class="close_box" onclick="closechangepw()"></div>
            </div>
            
            
            <div style="position: absolute;display:none;"  id="pw_msg_box">
                <div class="changepw_box">
                    <div class="pw_msg_title">
                        <span>Change Password Success!</span>
                    </div>
                </div>
                <div class="close_box" onclick="close_pw_msg()"></div>
            </div>

            <div style="position: absolute;display:none;"  id="wrong_pw_msg_box">
                <div class="changepw_box">
                    <div class="pw_msg_title">
                        <span>Incorrect Old Password!</span>
                    </div>
                </div>
                <div class="close_box" onclick="close_wrong_pw_msg()"></div>
            </div>
            
            
            <div style="position: absolute;display:none;"  id="signout_msg_box">
                <div class="changepw_box">
                    
                    <div class="signout_title">
                        <span>Do you want to sign out?</span>
                    </div>
                    

                    <div class="yes_confirm" onclick="close_signout_yes_msg()">
                        <span> Yes</span>
                    </div>

                    
                    <div class="no_confirm" onclick="close_signout_msg()">
                        <span> No</span>
                    </div>
                    
                </div>
                <div class="close_box" onclick="close_signout_msg()"></div>
            </div>
            
            <div style="position: absolute;display:none;"  id="deactivate_msg_box">
                <div class="changepw_box">
                    
                    <div class="signout_title">
                        <span>Do you want to deactivate?</span>
                    </div>

<form method="POST">
<button type="submit" name="send_deactivate" class="yes_confirm" onclick="pw_msg()" > Yes</button>
</form>
                    
                    <div class="no_confirm" onclick="close_deactivate_msg()">
                        <span> No</span>
                    </div>
                    
                </div>
                <div class="close_box" onclick="close_deactivate_msg()"></div>
            </div>
            
            
            <div style="position: absolute;display:none;"  id="delete_msg_box">
                <div class="changepw_box">
                    
                    <div class="signout_title">
                        <span>Do you want to delete?</span>
                    </div>
<form method="POST">
<button type="submit" name="send_delete" class="yes_confirm" onclick="pw_msg()" > Yes</button>
</form>
                    <div class="yes_confirm" onclick="close_delete_yes_msg()">
                        <span> Yes</span>
                    </div>
                    
                    <div class="no_confirm" onclick="close_delete_msg()">
                        <span> No</span>
                    </div>
                    
                </div>
                <div class="close_box" onclick="close_delete_msg()"></div>
            </div>
</div>

    </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "tinkle";

$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$uid=$_SESSION['UserID'];

if(isset($_POST["send_deactivate"])){
    echo"<script>location.href = 'LogIn.php';</script>";
    $sql = "UPDATE User SET Deactivation=1 WHERE UserID=$uid";
    $r =$conn->query($sql);
}

if(isset($_POST["send_delete"])){
    echo"<script>location.href = 'LogIn.php';</script>";
    $sql = "DELETE FROM User WHERE UserID=$uid";
    $r =$conn->query($sql);
}

if(isset($_POST["send"])){
    if($_POST["oldpw"] != "" && $_POST["newpw"] != ""){
        $old = $_POST["oldpw"];
        $new=$_POST["newpw"];
        

        $sql="SELECT Password FROM User WHERE UserID=$uid";
        $result=$conn->query($sql)->fetch_assoc()["Password"];
        
        if($result==$old){
            echo "<script>document.getElementById('pw_msg_box').style.display = 'block'</script>";
            $sql = "UPDATE User SET Password='$new' WHERE UserID=$uid";
            $r =$conn->query($sql);
        }else{
            echo "<script>document.getElementById('wrong_pw_msg_box').style.display = 'block'</script>";
            
        }
    }
}

?>

<style>
    
    
    .btn01{
        color:white;
        background-image: url('button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:20px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;
        
    }


    .btn02{
        color:white;
        background-image: url('button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:20px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;}


    .btn03{
        color:white;
        background-image: url('button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:20px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;}
    
    .btn04{
        color:white;
        background-image: url('button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:20px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;}

    .btn_confirm{
        color:white;
        background-image: url('button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:20px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;}
    
    .yes_confirm{
        color:white;
        background-image: url('button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:100px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;}
    
    .no_confirm{
        color:white;
        background-image: url('button.png');
        background-size: 100% 100%;
        display:block;
        width:400px;
        margin:20px auto;
        font-size:30px;
        font-weight:800;
        height:70px;
        line-height:70px;
        text-align:center;}

    *{
        padding: 0;
        margin: 0;
        user-select: none;
    }
    .box{
        width: 100vw;
        height: 100vh;
        background-image: url('bgImg.png');
      
    }
    
    .setting_title{
        width: 400px;
        height: 100px;
        margin: 30px auto;
        color: #288cc6;
        font-size: 50px;
        font-weight: 800;
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 100px;
        left: calc(50vw - 200px);
    }
    
    .changepw_title{
        width: 400px;
        height: 100px;
        margin: 30px auto;
        color: #288cc6;
        font-size: 40px;
        font-weight: 800;
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 100px;
        left: calc(50vw - 200px);
    }
    
    .signout_title{
        width: 400px;
        height: 100px;
        margin: 30px auto;
        color: #288cc6;
        font-size: 40px;
        font-weight: 800;
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 100px;
        left: calc(50vw - 200px);
    }
    
    
    .pw_msg_title{
        width: 400px;
        height: 400px;
        margin: 30px auto;
        color: #288cc6;
        font-size: 65px;
        font-weight: 800;
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 225px;
        left: calc(50vw - 200px);
    }

    .openTxt{
        width: 200px;
        height: 100px;
        line-height: 100px;
        background: wheat;
        border-radius: 30px;
        position: absolute;
        top: 300px;
        left: calc(50vw - 100px);
        z-index: 1;
        font-size: 22px;
        font-weight: 1000;
        text-align: center;
        color: midnightblue;
        font-family: 'Courier New', Courier, monospace;
    }
    
    .setting_box{
        width: 500px;
        height: 500px;
        position: absolute;
        padding: 5px;
        top: 100px;
        left: calc(50vw - 250px);
        border: #288cc6 15px solid;
        border-radius: 30px;
        background-color: white;
        z-index: 3;
        overflow-y: auto;
        overflow-x: hidden;
        padding-top: 60px;
        padding-bottom: 20px;
        box-sizing: border-box;
    }
    
    .changepw_box{
        width: 500px;
        height: 500px;
        position: absolute;
        padding: 5px;
        top: 100px;
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
    
    
    /*close chat box button*/
    .close_box{
        width: 50px;
        height: 50px;
        /* background: powderblue; */
        position: absolute;
        left: calc(50vw + 195px);
        top: 110px;
        background-image: url('close.png');
        background-size: 100% 100%;
        z-index: 4;
        top:100px;
    }
.my-popup{
    Width: 600px;
    Height: 400px;
    Background: gray;
    Box-sizing: border-box; /* for inside padding */
    Padding: 10px;
      padding-bottom: 25px;

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

    function closesetting(){
        document.getElementById('box').style.display = 'none'
        location.href = "twitter.php";
    }
    function opensetting(){
        console.log(333)
        document.getElementById('box').style.display = 'block'
    }
    
    function openchangepw(){
        console.log(333)
        document.getElementById('box_pw').style.display = 'block'
    }
    
    function closechangepw(){
        document.getElementById('box_pw').style.display = 'none'
        opensetting()
    }
    
    function pw_msg(){
        document.getElementById('box_pw').style.display = 'none'
        open_pw_msg()
    }
    
    function open_pw_msg(){
        console.log(333)
        document.getElementById('pw_msg_box').style.display = 'block'
    }
    
    function close_pw_msg(){
        document.getElementById('pw_msg_box').style.display = 'none'
        opensetting()
    }

function close_wrong_pw_msg(){
    document.getElementById('wrong_pw_msg_box').style.display = 'none'
    opensetting()
}
    
    function close_signout_yes_msg(){
        document.getElementById('signout_msg_box').style.display = 'none'
        location.href = "LogIn.php";
    }

    function close_signout_msg(){
        document.getElementById('signout_msg_box').style.display = 'none'
        opensetting()
    }
    
    function close_deactivate_msg(){
        document.getElementById('deactivate_msg_box').style.display = 'none'
        opensetting()
    }

    function close_deactivate_yes_msg(){
        document.getElementById('deactivate_msg_box').style.display = 'none'
        location.href = "LogIn.php";
    }
    
    function close_delete_msg(){
        document.getElementById('delete_msg_box').style.display = 'none'
        opensetting()
    }


    function close_delete_yes_msg(){
        document.getElementById('delete_msg_box').style.display = 'none'
        location.href = "LogIn.php";
    }
    
    function delete_pw_msg(){
        document.getElementById('delete_msg_box').style.display = 'none'
        opensetting()
    }

    
    function confirm_signout(){
        console.log(333)
        document.getElementById('signout_msg_box').style.display = 'block'
    }
    
    function confirm_Deactivate(){
        console.log(333)
        document.getElementById('deactivate_msg_box').style.display = 'block'
    }
    
    function confirm_Delete(){
        console.log(333)
        document.getElementById('delete_msg_box').style.display = 'block'
    }
   
</script>
