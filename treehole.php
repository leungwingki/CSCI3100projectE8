<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>

<div id="my-popup">
            <div style="position: absolute; "  id="choose_box">
                <div class="setting_box">
                    <div class="setting_title">
                        <span>Welcome to treehole!</span>
                    </div>
                    <div class="btn01" onclick="openleavemsg()">
                        <span> Leave a message</span>
                    </div>
                    
                    <div class="btn02" onclick="opentreehole()">
                        <span> Read a message</span>
                    </div>
                </div>
                
                <div class="close_box" onclick="closechoose()"></div>
            </div>
            
            <div style="position: absolute;display:none"  id="leave_box">
                <div class="setting_box">
                    <div class="setting_title">
                        <span>Leave your message!</span>
                    </div>
                    <?php
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


                    if(isset($_POST["send1"])){
                        if($_POST["inputbox1"] != ""){
                            $new = $_POST["inputbox1"];
                            $sql = "INSERT INTO treehole(TreeholeID, Text)
                                    VALUES((SELECT COALESCE(MAX(TreeholeID), 0) + 1 FROM (SELECT * FROM treehole) AS tc1), '$new')";
                            if($conn->query($sql) == FALSE){
                                echo "error :(";
                            }else{

                                echo"<script>location.href = 'twitter.php';</script>";
                                
                                 
                                
                            }
                        }
                    }
                    ?>
                    <form method="POST">


                    <div class="comment_box">
                        <input type="text" name="inputbox1" size="22" placeholder="Type your thoughts here..."  style="width: 20pxheight:500px;line-height:40px;font-size: 20px;margin-top: 120px;margin-left: 40px;"/>
                    </div>
                    
                    <div class="space" >
                        <span> </span>
                    </div>
                    <button type="submit" name="send1" class="btn02" >Post Comment</button>

                </form>
</div>

                
                <div class="close_box" onclick="closeleave()"></div>
            </div>
            
            <div style="position: absolute;display:none"  id="send_box">
                <div class="setting_box">
                    <div class="send_title">
                        <span>You have leaved your message!</span>
                    </div>
                </div>
                
                <div class="close_box" onclick="closesend()"></div>
            </div>
            
            
            <div style="position: absolute;display:none"  id="box">
                <div class="treehole_box">
                        <?php
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

                        // id
                        $tid = 1;

                        $sql = "SELECT * FROM treehole WHERE TreeholeID=$tid";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $msg = $row["Text"];
                              echo"<div class='treehole_title'>";
                              echo"<span>$msg</span>";
                              echo"</div>";
                          }
                        }
                       
                        }

                        if(isset($_POST["send"])){
                            if($_POST["inputbox"] != ""){
                                $new = $_POST["inputbox"];
                                $sql = "INSERT INTO treeholecomment(TreeholeID, CommentID, Text)
                                        VALUES(1, (SELECT COALESCE(MAX(CommentID), 0) + 1 FROM (SELECT * FROM treeholecomment) AS tc), '$new')";
                                if($conn->query($sql) == FALSE){
                                    echo "error :(";
                                }else{
                                    echo "<script type='text/javascript'> if(window.history.replaceState) {window.history.replaceState(null, null, window.location.href);}</script>}";
                                    
                                    echo "<script>document.getElementById('send_box').style.display = 'block'</script>";
                                }
                                
                            }
                        }
                        ?>

                    <div class="input_box">
                        <form method="POST">
                        <input type="text" name="inputbox" size="18" placeholder="Type your thoughts here..."  style="width: 200pxheight:60px;line-height:40px;font-size: 20px;margin-top: 20px;margin-left: 40px;background-image: url('./img/text_colour.png');background-size: 100% 100%;"/>
                        <button type="submit" name="send" div class="btn" ></button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="close_box" onclick="closetreehole()"></div>
            </div>
</div>

            
    </body>
</html>
<style>
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
    .btn01{
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
        text-align:center;
    }
    
    .space{
        color:white;
        display:block;
        width:400px;
        margin:130px auto;
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
        top: 120px;
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
        top: 250px;
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
    
    .treehole_box{
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
        padding-top: 120px;
        padding-bottom: 80px;
        box-sizing: border-box;
    }
    .treehole_title{
        width: 400px;
        height: 100px;
        margin: 30px auto;
        background-image: url('th_theme.png');
        background-size: 100% 100%;
        color: white;
        font-size: 30px;
        font-weight: 800;
        line-height: 50px;
        text-align: center;
        position: fixed;
        top: 90px;
        left: calc(50vw - 200px);
    }
    .treehole_other{
        width: 80%;
        height: 80px;
        /* margin: 30px auto; */
        margin-top: 30px;
        margin-left: 10px;
        background-image: url('th_left.png');
        background-size: 100% 100%;
        font-size: 26px;
        font-weight: 800;
        line-height: 60px;
        text-align: center;
        color: rgb(165,122,103);
    }
    .treehole_my{
        width: 80%;
        height: 80px;
        /* margin: 30px auto; */
        margin-top: 30px;
        margin-left: 70px;
        background-image: url('chat_bg_right.png');
        background-size: 100% 100%;
        font-size: 26px;
        font-weight: 800;
        line-height: 60px;
        text-align: center;
        color: lightblue;
    }
    .comment_box{
        width: 350px;
        height: 300px;
        background-image: url('comment_block.png');
        background-size: 100% 100%;
        position: fixed;
        top: 200px;
        left: calc(50vw - 180px);
        border-radius: 10px;
    }

    .input_box{
        width: 350px;
        height: 80px;
        background-image: url('th_right.png');
        background-size: 100% 100%;
        position: fixed;
        top: 500px;
        left: calc(50vw - 131px);
        border-radius: 10px;
    }
    /*send button*/
    .btn{
        width: 45px;
        height: 40px;
        background-image: url('send_button.png');
        background-size: 100% 100%;
        float: right;
        margin-top: 20px;
        margin-right: 30px;
        border-radius: 10px;
        font-size: 20px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-weight: 800;
        line-height: 40px;
        color: dodgerblue;
        text-align: center;
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
    
    function opentreehole_choice(){
        console.log(333)
        document.getElementById('choose_box').style.display = 'block'
    }

    
    function closetreehole(){
        location.href = "twitter.php";
        document.getElementById('box').style.display = 'none'
    }
    function closechoose(){
        location.href = "twitter.php";
        document.getElementById('choose_box').style.display = 'none'
    }
    function opentreehole(){
        console.log(333)
        document.getElementById('box').style.display = 'block'
    }
    
    function openleavemsg(){
        console.log(333)
        document.getElementById('leave_box').style.display = 'block'
    }
    function closeleave(){
        document.getElementById('leave_box').style.display = 'none'
    }
    function opensend(){
        closeleave()
        document.getElementById('box').style.display = 'none'
        document.getElementById('send_box').style.display = 'block'
        console.log(333)
    }
    function closesend(){
        location.href = "twitter.php";
        document.getElementById('send_box').style.display = 'none'
    }

var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
btn.onclick = function() {
  modal.style.display = "block";
}


</script>
