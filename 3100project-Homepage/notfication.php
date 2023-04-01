<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
  </head>
  <body>
    <div class="box">


      <div style="position: relative;" id="box">
        <div class="treehole_box">
          <div class="treehole_title">
            <span>Notification!</span>
          </div>


          <div class="notification_message">
            <div class="notification_icon">
                <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> 
            </div>
            
                <ul class ="notification_word"> abecassdas and 1232133 people like your message your tweets</ul>
                <ul class ="notification_time"> 4m</ul>
            </div>
        



          <div class="notification_message">
            <div class="notification_icon">
                <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> 
            </div>
            
                <ul class ="notification_word"> abecassdas and 1232133 people like your message your tweets</ul>
                <ul class ="notification_time"> 4m</ul>
            </div>

        

            <div class="notification_message">
                <div class="notification_icon">
                    <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> 
                </div>
                
                    <ul class ="notification_word"> abecassdas and 1232133 people like your message your tweets</ul>
                    <ul class ="notification_time"> 4m</ul>
                </div>



                <div class="notification_message">
                    <div class="notification_icon">
                        <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> 
                    </div>
                    
                        <ul class ="notification_word"> abecassdas and 1232133 people like your message your tweets</ul>
                        <ul class ="notification_time"> 4m</ul>
                    </div>



                    <div class="notification_message">
                        <div class="notification_icon">
                            <img class="profile-picture-1" src="icon1.png" alt="Profile Picture" /> 
                        </div>
                        
                            <ul class ="notification_word"> abecassdas and 1232133 people like your message your tweets</ul>
                            <ul class ="notification_time"> 4m</ul>
                        </div>
        


          <div class="end_notification">
            <span>You have no more unread nofications</span>
          </div>


          </div>
        </div>
        <div class="close_box" onclick="closetreehole()"></div>
      </div>
    </div>
  </body>
</html>
<style>
  * {
    padding: 0;
    margin: 0;
    user-select: none;
  }
  /* .box {
    width: 100vw;
    height: 100vh;
    background-image: url("./img/bgImg.png");
  } */


  
  .setting_box {
    width: 500px;
    height: 500px;
    position: absolute;
    padding: 5px;
    top: 50px;
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



  .treehole_box {
    width: 30vw;
    height: 60vh;
    position: relative;
    padding: 5px;
    top: 5vh;
    left: 2vh;
    border: #288cc6 15px solid;
    border-radius: 30px;
    background-color: white;
    z-index: 3;
    overflow-y: auto;
    overflow-x:hidden;
    padding-top: 15px;
    padding-bottom: 5px;
    box-sizing: border-box;
  }
  .treehole_title_bak {

    /* width: 440px;
    height: 50px; */


    margin: 30px auto;
    /* background-color: white; */
    background-size: 100% 100%;
    color: #288cc6 ;
    font-size: 30px;
    font-weight: 800;
    line-height: 50px;
    text-align: center;
    position: fixed;
    top: 18vh;
    left: 22vh;
  }
  .treehole_title {
    background-color: white;
    background-size: 100% 100%;
    line-height: 50px;
    font-size: 30px;
    font-weight: 800;
    line-height: 50px;
    color: #288cc6 ;
    position: relative;
    text-align: center;
  }

  .notification_message {
    display: block;
    background-color: white;
    width: 95%;
    height: 60px;
    border-bottom: 2px solid rgb(159, 156, 156);
    margin-top: 5px;
    margin-left: 5px;
    background-size: 100% 100%;
    font-size: 18px;
    font-weight: 20;
    line-height: 24px;
    color: rgb(31, 31, 31);
  }

 
  /*close chat box button*/
  .close_box {
    width: 50px;
    height: 50px;
    position: absolute;
    left: calc(50vw + 195px);
    top: 210px;
    background-image: url("img/close.png");
    background-size: 100% 100%;
    z-index: 4;
  }

  .end_notification{  
    background-color: white;
    width: 100%;
    height: 60px;
    /* margin: 30px auto; */
    margin-top: 5px;
    margin-left: 5px;
    background-size: 100% 100%;
    font-size: 18px;
    font-weight: 25;
    line-height: 60px;
    text-align: center;
    color: rgb(159, 156, 156);
  }
.notification_icon {
    display: block;
  border-radius: 999999px;
  height: 49px;
  width: 49px;
  overflow: hidden;
  position: relative;
  width: 49px;
}

.profile-picture-1 {
  height: 49px;
  left: 0;
  object-fit: cover;
  position: absolute;
  top: 1px;
  width: 49px;
}
.notification_word {
    width: 88%;
    height: 60px;
    left: 55px;
    /* margin: 10px 20px; */
    text-align: left;
    bottom:50px;
    overflow: hidden;
    position: relative;
}
.notification_time{
    width: 10%;
    height: 40px;
    left: 380px;
    top:-70px;
    color: rgb(159, 156, 156);
    text-align: left;

    overflow:inherit;
    position: relative;
}


  
</style>

<script>
  function opentreehole_choice() {
    console.log(333);
    document.getElementById("choose_box").style.display = "block";
  }

  function closetreehole() {
    document.getElementById("box").style.display = "none";
  }
  function closechoose() {
    document.getElementById("choose_box").style.display = "none";
  }
  function opentreehole() {
    console.log(333);
    document.getElementById("box").style.display = "block";
  }

  function openleavemsg() {
    console.log(333);
    document.getElementById("leave_box").style.display = "block";
  }
  function closeleave() {
    document.getElementById("leave_box").style.display = "none";
  }
  function opensend() {
    closetreehole();
    closeleave();
    console.log(333);
    document.getElementById("send_box").style.display = "block";
  }
  function closesend() {
    document.getElementById("send_box").style.display = "none";
  }
</script>
