<?php session_start();?>
<!DOCTYPE HTML>
<!--Melvin Cherian-->
<html>
	<head>
		<title>Terra Battle Hub</title>
        <link rel="stylesheet" type="text/css" href="stylestuff.css">
        <style>
			body {background: url(bg.jpg) repeat center center fixed; 
							-webkit-background-size: cover;
							-moz-background-size: cover;
							-o-background-size: cover;
							 background-size: cover;
							 top:50px; width:100%; height:220vh;
							 overflow-x:hidden;
			}
			.container-pic > div {margin:auto; display:inline-block; font-size: 18pt; color:white; background:rgba(0,0,0,0.25);
			transition: background .3s ease-out;
				-moz-transition: background .3s ease-out;
				-webkit-transition: background .3s ease-out;
				-o-transition: background .3s ease-out;}
			.quad1 {width:50vw; height:50vh;}
			.container-pic > div:hover {background:rgba(0,0,0,0.85);
				transition: background .3s ease-out;
				-moz-transition: background .3s ease-out;
				-webkit-transition: background .3s ease-out;
				-o-transition: background .3s ease-out;
			}
			a {color:white;}
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
				<li><button onclick = "inout();"><?php if(isset($_SESSION["id"])){echo "Log Out";} else{echo "Log In";}?></button></li>
				<button id = "audBut" onclick = "playAud();">Play Music</button>
			</ul>
		</div>
		<div class = "container-pic">
			<br />
			<br />
			<br />
			<div class = "quad1"><h3>General</h3>Terra Battle is a free-to-play mobile game by Mistwalker. It features game design by Hironobu Sakaguchi and music by Nobuo Uematsu, both of Final Fantasy fame, and artwork by Kimihiko Fujisaka, of The Last Story and Drakengard fame. Other well-known artists are scheduled to contribute content according to the Download Starter. </div>
			<div class = "quad1"><h3>Story</h3>The story takes place in a land headed for destruction. Humans mainly occupy the land accompanied by lizardfolk and beastfolk. In this world, each group speaks in its own language about the Maker, in which nobody can confirm its existence, or know its truth. All that is known is that the Maker resides deep underground.

People gather at the capitol to embark on a journey to discover more about the Maker. During their travels, they uncover myths unspoken and delve deeper and further to discover the truth. They have a long and deep road ahead. Are they headed for light or nothingness (Zero)...? </div>
			<div class = "quad1"><h3>Gameplay</h3>Terra Battle is a tile-based strategy game where the player's customized party fights against groups of various enemies. Players attack enemies by sandwiching them between two attacking allies while other party members increase damage by being aligned correctly with the attackers.

Units are broken into four types: sword, bow, spear, and staff. Sword-types deal additional damage to bow-types, bow-types deal additional damage to spear-types, and spear-types deal additional damage to sword-types. Mage-types are generally weaker, but may have powerful AOE attacks and/or other unique effects. </div>
			<div class = "quad1"><h3>Links</h3>Official Site: <a href = "http://www.terra-battle.com/en/">http://www.terra-battle.com/en/</a></div>
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