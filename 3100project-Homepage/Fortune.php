<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="FortureStyle.css">
    <script type="text/javascript" src="fortune.js"></script>
    <script type="text/javascript" >
      ImageArray = new Array();
      ImageArray[0] = 'Fortune1.png';
      ImageArray[1] = 'Fortune2.png';
      ImageArray[2] = 'Fortune3.png';
      ImageArray[3] = 'Fortune4.png';
      ImageArray[4] = 'Fortune5.png';
      ImageArray[5] = 'Fortune6.png';
      ImageArray[6] = 'Fortune7.png';
      ImageArray[7] = 'Fortune8.png';
     
  
  
  function getRandomImage() {
      var num = Math.floor( Math.random() * 8);
      var img = ImageArray[num];
      document.getElementById("randImage").innerHTML = ('<img src="' + img + '" width=445px">')
  
  }
  </script>
  </head>
  <body onload="getRandomImage()">
    <div id="loader"></div>
       
    <div id="randImage"></div>
    </body>
</html>