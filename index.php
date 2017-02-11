<?php session_start();?>
<!DOCTYPE HTML>
<!--Melvin Cherian-->
<html>
	<head>
		<title>Terra Battle Hub</title>
        <link rel="stylesheet" type="text/css" href="stylestuff.css">
        <style>
			body {background: url(first.jpg) no-repeat center center fixed; 
							-webkit-background-size: cover;
							-moz-background-size: cover;
							-o-background-size: cover;
							 background-size: cover;
							 margin-top:50px; width:100%; height:100vh;
							 overflow-x:hidden;
			}
			.container-pic > div {left:0px; position:absolute; top:50%; padding:15vh; font-size: 32pt; margin:auto; background:rgba(255,255,255,0.25);transition: background .3s ease-out;
				-moz-transition: background .3s ease-out;
				-webkit-transition: background .3s ease-out;
				-o-transition: background .3s ease-out;}
			.container-pic > div:hover {background:rgba(255,255,255,0.55);
				transition: background .3s ease-out;
				-moz-transition: background .3s ease-out;
				-webkit-transition: background .3s ease-out;
				-o-transition: background .3s ease-out;
			}
		</style>
        <script type = "text/javascript">
        </script>
		<script>
		</script>
        
	</head>
		
	<body>
		<audio id = "auding" loop="loop" preload="auto" src="http://www.terra-battle.com/assets/terra-battle/audio/funiki.mp3" type="audio/mp3"></audio>
		<div class = "nav-bar">
			<ul class = "pages">
				<a style = "font-size:20pt;" href = "index.php">Terra Battle Hub</a>
				<li><a href = "squadbuilder.php">Squad Builder</a></li>
				<li><a href = "info.php">Terra Battle Info</a></li>
				<li><a href = "contact.php">Contact Us</a></li>
				<li><a href = "games.php">Games!</a></li>
				<button onclick = "inout();"><?php if(isset($_SESSION["id"])){echo "Log Out";} else{echo "Log In";}?></button>
				<button id = "audBut" onclick = "playAud();">Play Music</button>
			</ul>
		</div>
		<div class = "container-pic">
			<div>Welcome to Terra Battle Hub, the place to satiate your TB desires, build your squad, and play this random game. Look around, or not. BB pls.</div>
		</div>
		<script type = "text/javascript">
			function inout()
			{
				if(<?php if(isset($_SESSION["id"])) {echo "1";} else{echo"false";}?>)
				{
					window.location.href = "logout.php";
				}
				else{window.location.href = "login.php";}
			}
			var aud = document.getElementById("auding");
			audioBut = document.getElementById("audBut");
			function playAud() {
				aud.play();
				audioBut.onclick = pauseAud;
				audioBut.innerHTML = "Pause Music";
			}

			function pauseAud() {
				aud.pause();
				audioBut.onclick = playAud;
				audioBut.innerHTML = "Play Music";
			} 
		</script>
	</body>
</html>