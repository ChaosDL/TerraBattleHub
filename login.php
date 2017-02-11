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
			.container-pic > div {margin:auto; display:inline-block; font-size: 18pt; color:black; background:rgba(255,255,255,0.25);
			transition: background .3s ease-out;
				-moz-transition: background .3s ease-out;
				-webkit-transition: background .3s ease-out;
				-o-transition: background .3s ease-out;
				width:50vw; height:45vh;}
			.container-pic > div:hover {background:rgba(255,255,255,0.55);
				transition: background .3s ease-out;
				-moz-transition: background .3s ease-out;
				-webkit-transition: background .3s ease-out;
				-o-transition: background .3s ease-out;
			.quad1 {width:50vw; height:50vh;}
			}
		</style>
		
        <script type = "text/javascript">
        </script>
		<script>
		</script>
        
	</head>
		
	<body>
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$uname = $_POST['username'];
			$pword = $_POST['password'];
			$pwordCheck = $_POST['passwordcheck'];
				if($pword == $pwordCheck)
				{
					$conn = new PDO("mysql:host=mysql9.000webhost.com;dbname=a4865569_melvin", "a4865569_melvin", "notag00dpass");
					$statementId = $conn -> prepare("SELECT MAX(user_id) FROM testing_stuff");
					$statementId -> execute();
					$data = $statementId -> fetch();
					$newId = (int)$data[0] + 1;
					$cmd = "INSERT INTO testing_stuff (user_id, username, password) VALUES ('$newId', '$uname', '$pword')";
					$statement = $conn -> prepare($cmd);
					$statement -> execute();
				}
			}
			
		?>
		<audio id = "auding" loop="loop" preload="auto" src="http://www.terra-battle.com/assets/terra-battle/audio/funiki.mp3" type="audio/mp3"></audio>
		<div class = "nav-bar">
			<ul class = "pages">
				<a style = "font-size:20pt;" href = "index.php">Terra Battle Hub</a>
				<li><a href = "squadbuilder.php">Squad Builder</a></li>
				<li><a href = "info.php">Terra Battle Info</a></li>
				<li><a href = "index.php">Contact Us</a></li>
				<li><a href = "games.php">Games!</a></li>
				<li><button onclick = "inout();"><?php if(isset($_SESSION["id"])){echo "Log Out";} else{echo "Log In";}?></button></li>
				<button id = "audBut" onclick = "playAud();">Play Music</button>
			</ul>
		</div>
		<div class = "container-pic">
			<div class = "quad1"><h3>Login</h3>
			<form method = "POST" action = "squadbuilder.php">
				<label>Username <input type = "text" name = "username" /></label><br />
				<label>Password <input type = "password" name = "password" /></label>
				<br /><input type = "submit" value = "Login"/>
			</form></div>
			<div class = "quad1"><h3>Register ya dingus</h3>
			<form method = "POST" action = "login.php">
				<label>Username <input type = "text" name = "username" /></label><br />
				<label>Password <input type = "password" name = "password" /></label>
				<label>Re-enter Password <input type = "password" name = "passwordcheck" /></label>
				<div><?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){if($pword != $pwordCheck){echo "Passwords do not match, try again.";} else {echo "Successfully registered, try logging in.";}}?></div>
				<br /><input type = "submit" value = "Register"/>
			</form></div>
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