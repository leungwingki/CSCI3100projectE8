<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
		<div class="box">
			
			<div class="openTxt" onclick="opentreehole_choice()">
				<span> open tree hole </span>
			</div>
            
            <div style="position: absolute;"  id="choose_box">
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
            
            <div style="position: absolute;"  id="leave_box">
                <div class="setting_box">
                    <div class="setting_title">
                        <span>Leave your message!</span>
                    </div>
                    <div class="comment_box">
                        <input type="text" size="22" placeholder="Type your thoughts here..."  style="width: 20pxheight:500px;line-height:40px;font-size: 20px;margin-top: 120px;margin-left: 40px;"/>
                    </div>
                    
                    <div class="space" >
                        <span> </span>
                    </div>
                    
                    <div class="btn02" onclick="opensend()">
                        <span> Post Comment</span>
                    </div>
                </div>
                
                <div class="close_box" onclick="closeleave()"></div>
            </div>
            
            <div style="position: absolute;"  id="send_box">
                <div class="setting_box">
                    <div class="send_title">
                        <span>You have leaved your message!</span>
                    </div>
                </div>
                
                <div class="close_box" onclick="closesend()"></div>
            </div>
            
			
			<div style="position: absolute;"  id="box">
				<div class="treehole_box">
					<div class="treehole_title">
						<span>It is so hard to build a software!</span>
					</div>
					<div class="treehole_other">
						<span> agree </span>
					</div>
					
					<div class="treehole_other">
						<span> you are not alone. </span>
					</div>
					<div class="treehole_other">
						<span> Let's go to the movies. </span>
					</div>

					<div class="treehole_other">
						<span> afternoon. </span>
					</div>

					<div class="input_box">
						<input type="text" size="18" placeholder="Type your thoughts here..."  style="width: 200pxheight:60px;line-height:40px;font-size: 20px;margin-top: 20px;margin-left: 40px;background-image: url('./img/text_colour.png');background-size: 100% 100%;"/>
						<div class="btn" onclick="opensend()">
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
	
	.treehole_box{
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
		top: 190px;
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
        top: 300px;
        left: calc(50vw - 180px);
        border-radius: 10px;
    }

	.input_box{
		width: 350px;
		height: 80px;
        background-image: url('th_right.png');
        background-size: 100% 100%;
		position: fixed;
		top: 600px;
		left: calc(50vw - 120px);
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
		top: 210px;
		background-image: url('close.png');
		background-size: 100% 100%;
		z-index: 4;
	}
</style>

<script>
    
    function opentreehole_choice(){
        console.log(333)
        document.getElementById('choose_box').style.display = 'block'
    }

    
	function closetreehole(){
		document.getElementById('box').style.display = 'none'
	}
    function closechoose(){
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
        closetreehole()
        closeleave()
        console.log(333)
        document.getElementById('send_box').style.display = 'block'
    }
    function closesend(){
        document.getElementById('send_box').style.display = 'none'
        
    }
</script>
