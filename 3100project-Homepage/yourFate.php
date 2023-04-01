<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
  </head>
  <body>
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

        <div class="close_box" onclick="closechoose()"></div>
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
  .box {
    width: 100vw;
    height: 100vh;
    background-image: url("./img/bgImg.png");
  }

  .setting_box {
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

  .setting_title {
    width: 400px;
    height: 100px;
    margin: 30px auto;
    color: #288cc6;
    font-size: 50px;
    font-weight: 800;
    line-height: 50px;
    text-align: center;
    position: fixed;
    top: 200px;
    left: calc(50vw - 200px);
  }

  /*close chat box button*/
  .close_box {
    width: 50px;
    height: 50px;
    /* background: powderblue; */
    position: absolute;
    left: calc(50vw + 195px);
    top: 210px;
    background-image: url("close.png");
    background-size: 100% 100%;
    z-index: 4;
  }

  .profile-picture-circle {
    display: block;
    position: absolute;
    left: 130px;
    top: 15vh;
    border-radius: 99999px;
    align-items: flex-start;
    align-self: stretch;
    height: 30vh;
    width: 15vw;
    overflow: hidden;

    z-index: 1;
  }

  .profile-picture-circle-pic {
    display: block;
    height: 30vh;
    width: 15vw;
    left: 0;
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
    left: calc(50vw - 200px);
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

  function opensend() {
    closetreehole();
    closeleave();
    console.log(333);
    document.getElementById("send_box").style.display = "block";
  }
  function closesend() {
    document.getElementById("send_box").style.display = "none";
  }
  function directProfile() {
    location.href = "/my-profile.html";
  }
</script>