<?php session_start();?>
<!DOCTYPE HTML>
<!--Melvin Cherian-->

<html>
    <head>
	
	    <title> </title>
		
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
				width:50vw;}
			.container-pic > div:hover {background:rgba(255,255,255,0.55);
				transition: background .3s ease-out;
				-moz-transition: background .3s ease-out;
				-webkit-transition: background .3s ease-out;
				-o-transition: background .3s ease-out;
			.quad1 {width:50vw; height:60vh;}
			}
			</style>
			<style type="text/css">
				.tg  {border-collapse:collapse;border-spacing:0; margin:auto;height:50vh;}
				.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;}
				.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;}
				.tg .tg-dong{font-family:"Arial Black", Gadget, sans-serif !important;;background-color:#000000;color:#ffffff}
				.tg .tg-bonk{background-color:#000000;color:#ffffff}
				img.thumb {height:50px; width:50px;}
			</style>
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(isset($_POST['username']) || isset($_SESSION['id'])){
				$uname = $_POST['username'];
				$pword = $_POST['password'];
				$conn = new PDO("mysql:host=mysql9.000webhost.com;dbname=a4865569_melvin", "a4865569_melvin", "notag00dpass");
				$cmd = "SELECT username, password FROM testing_stuff WHERE username = '$uname' AND password = '$pword'";
				$statement = $conn -> prepare($cmd);
				$statement -> execute();
				$result = $statement -> fetch();
				$rowCStat = $conn -> prepare("SELECT COUNT(*) FROM testing_stuff WHERE username = '$uname' AND password = '$pword'");
				$rowCStat -> execute();
				if($rowCStat->fetchColumn() > 0)
				{
					$statementId = $conn -> prepare("SELECT user_id FROM testing_stuff WHERE username = '$uname' AND password = '$pword'");
					$statementId -> execute();
					$ding = $statementId -> fetch();
					$_SESSION["id"] = (int)$ding[0];
				}	
				}
				if(isset($_POST['secret']))
				{
					$currId = $_SESSION["id"];
					$conn = new PDO("mysql:host=mysql9.000webhost.com;dbname=a4865569_melvin", "a4865569_melvin", "notag00dpass");
					$str = $_POST['secret'];
					$statementInsStr = $conn -> prepare("UPDATE testing_stuff SET teamStr = '$str' WHERE user_id = '$currId'");
					$statementInsStr -> execute();
					
				}
				$currId = $_SESSION["id"];
				$statementGetStr = $conn -> prepare("SELECT teamStr FROM testing_stuff WHERE user_id = '$currId'");
				$statementGetStr -> execute();
				$data = $statementGetStr -> fetch();
				$_SESSION["teamStr"] = $data;
			}
			//if(isset($_SESSION["id"])){echo ""}else{echo "---";}
		?>
		<script type = "text/javascript">
			function inout()
			{
				if(<?php if(isset($_SESSION["id"])) {echo "1";} else{echo"false";}?>)
				{
					window.location.href = "logout.php";
				}
				else{window.location.href = "login.php";}
			}
			function fillVals(index, obj, img)
			{
				var teamString = "<?php if(isset($_SESSION["id"])){$stringRec = $_SESSION["teamStr"][0]; echo $stringRec;} ?>";
				if(teamString)
				{
					var rows = teamString.split(";");
					var value = rows[index].split("=")[1];
					if(img)
					{
						var imgUrl = value + ".jpg";
						obj.src = imgUrl;
					}
					else{
					obj.value  = value;
					
					}
				}
				else
				{
					obj.value = "---";
				}
			}
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
			<div>
				<table class="tg">
				  <tr>
					<th class="tg-dong">Pic</th>
					<th class="tg-dong">Name</th>
					<th class="tg-dong">Level</th>
					<th class="tg-dong">Job</th>
				  </tr>
				  <tr>
					<td class="tg-bonk"><img class = "thumb" onmouseover = "fillVals(0, this, true)" src = "" /></td>
					<td class="tg-bonk">
						 <select onmouseover= "fillVals(0, this)" onchange = "addToString(this);" name = "name1">
						  <option value="---">---</option>
						  <option value="Amimari">Amimari</option>
						  <option value="Olber">Olber</option>
						  <option value="Bahamut">Bahamut</option>
						  <option value="Gegonago">Gegonago</option>
						  <option value="Zuzu">Zuzu</option>
						  <option value="Daiana">Daiana</option>
						  <option value="Korin">Korin</option>
						  <option value="Manmer">Manmer</option>
						  <option value="Kuscah">Kuscah</option>
						  <option value="Gigojago">Gigojago</option>
						  <option value="Grace">Grace</option>
						  <option value="Bahl">Bahl</option>
						</select> 
					</td>
					<td class="tg-bonk"><input onmouseover= "fillVals(1, this)"   onchange = "addToString(this);" name = "level1" type="number" min="1" max="90"></td>
					<td class="tg-bonk"><select onmouseover= "fillVals(2, this)" onchange = "addToString(this);" name = "job1"><option value="---">---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td>
				  </tr>
				  <tr>
					<td class="tg-bonk"><img  class = "thumb" onmouseover = "fillVals(3, this, true)" src = "" /></td>
					<td class="tg-bonk">
					<select onmouseover= "fillVals(3, this)" onchange = "addToString(this);" name = "name2">
						  <option value="---">---</option>
						  <option value="Amimari">Amimari</option>
						  <option value="Olber">Olber</option>
						  <option value="Bahamut">Bahamut</option>
						  <option value="Gegonago">Gegonago</option>
						  <option value="Zuzu">Zuzu</option>
						  <option value="Daiana">Daiana</option>
						  <option value="Korin">Korin</option>
						  <option value="Manmer">Manmer</option>
						  <option value="Kuscah">Kuscah</option>
						  <option value="Gigojago">Gigojago</option>
						  <option value="Grace">Grace</option>
						  <option value="Bahl">Bahl</option>
						</select> 
					</td>
					<td class="tg-bonk"><input onmouseover= "fillVals(4, this)" onchange = "addToString(this);" name = "level2" type="number" min="1" max="90"></td>
					<td class="tg-bonk"><select onmouseover= "fillVals(5, this)" onchange = "addToString(this);" name = "job2"><option value="---">---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td>
				  </tr>
				  <tr>
					<td class="tg-bonk"><img  class = "thumb" onmouseover = "fillVals(6, this, true)" src = "" /></td>
					<td class="tg-bonk">
					<select onmouseover= "fillVals(6, this)" onchange = "addToString(this);" name = "name3">
						  <option value="---">---</option>
						  <option value="Amimari">Amimari</option>
						  <option value="Olber">Olber</option>
						  <option value="Bahamut">Bahamut</option>
						  <option value="Gegonago">Gegonago</option>
						  <option value="Zuzu">Zuzu</option>
						  <option value="Daiana">Daiana</option>
						  <option value="Korin">Korin</option>
						  <option value="Manmer">Manmer</option>
						  <option value="Kuscah">Kuscah</option>
						  <option value="Gigojago">Gigojago</option>
						  <option value="Grace">Grace</option>
						  <option value="Bahl">Bahl</option>
						</select> 
					</td>
					<td class="tg-bonk"><input onmouseover= "fillVals(7, this)" onchange = "addToString(this);" name = "level3" type="number" min="1" max="90"></td>
					<td class="tg-bonk"><select onmouseover= "fillVals(8, this)" onchange = "addToString(this);" name = "job3"><option value="---">---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td>
				  </tr>
				  <tr>
					<td class="tg-bonk"><img  class = "thumb" onmouseover = "fillVals(9, this, true)" src = "" /></td>
					<td class="tg-bonk">
					<select onmouseover= "fillVals(9, this)" onchange = "addToString(this);" name = "name4">
						  <option value="---">---</option>
						  <option value="Amimari">Amimari</option>
						  <option value="Olber">Olber</option>
						  <option value="Bahamut">Bahamut</option>
						  <option value="Gegonago">Gegonago</option>
						  <option value="Zuzu">Zuzu</option>
						  <option value="Daiana">Daiana</option>
						  <option value="Korin">Korin</option>
						  <option value="Manmer">Manmer</option>
						  <option value="Kuscah">Kuscah</option>
						  <option value="Gigojago">Gigojago</option>
						  <option value="Grace">Grace</option>
						  <option value="Bahl">Bahl</option>
						</select> 
					</td>
					<td class="tg-bonk"><input onmouseover= "fillVals(10, this)" onchange = "addToString(this);" name = "level4" type="number" min="1" max="90"></td>
					<td class="tg-bonk"><select onmouseover= "fillVals(11, this)"  onchange = "addToString(this);" name = "job4"><option value="---">---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td>
				  </tr>
				  <tr>
					<td class="tg-bonk"><img class = "thumb"  onmouseover = "fillVals(12, this, true)" src = "" /></td>
					<td class="tg-bonk">
					<select onmouseover= "fillVals(12, this)" onchange = "addToString(this);" name = "name5">
						  <option value="---">---</option>
						  <option value="Amimari">Amimari</option>
						  <option value="Olber">Olber</option>
						  <option value="Bahamut">Bahamut</option>
						  <option value="Gegonago">Gegonago</option>
						  <option value="Zuzu">Zuzu</option>
						  <option value="Daiana">Daiana</option>
						  <option value="Korin">Korin</option>
						  <option value="Manmer">Manmer</option>
						  <option value="Kuscah">Kuscah</option>
						  <option value="Gigojago">Gigojago</option>
						  <option value="Grace">Grace</option>
						  <option value="Bahl">Bahl</option>
						</select> 
					</td>
					<td class="tg-bonk"><input onmouseover= "fillVals(13, this)" onchange = "addToString(this);" name = "level5" type="number" min="1" max="90"></td>
					<td class="tg-bonk"><select onmouseover= "fillVals(14, this)" onchange = "addToString(this);" name = "job5"><option value="---">---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td>
				  </tr>
				  <tr>
					<td class="tg-bonk"><img  class = "thumb" onmouseover = "fillVals(15, this, true)" src = "" /></td>
					<td class="tg-bonk">
					<select onmouseover= "fillVals(15, this)" onchange = "addToString(this);" name = "name6" >
						  <option value="---">---</option>
						  <option value="Amimari">Amimari</option>
						  <option value="Olber">Olber</option>
						  <option value="Bahamut">Bahamut</option>
						  <option value="Gegonago">Gegonago</option>
						  <option value="Zuzu">Zuzu</option>
						  <option value="Daiana">Daiana</option>
						  <option value="Korin">Korin</option>
						  <option value="Manmer">Manmer</option>
						  <option value="Kuscah">Kuscah</option>
						  <option value="Gigojago">Gigojago</option>
						  <option value="Grace">Grace</option>
						  <option value="Bahl">Bahl</option>
						</select> 
					</td>
					<td class="tg-bonk"><input onmouseover= "fillVals(16, this)" name = "level6" onchange = "addToString(this);" type="number" min="1" max="90"></td>
					<td class="tg-bonk"><select onmouseover= "fillVals(17, this)" onchange = "addToString(this);" name = "job6"><option value="---">---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td>
				  </tr>
				</table>
			</div>
			<form method = "POST" action = "squadbuilder.php">
				<input name  = "secret" id = "secret" type = "hidden" value = ""/>
				<input value = "Save" type = "submit" />
			</form>
		</div>
		<script type = "text/javascript">
			hiddenIn = document.getElementById("secret");
			function addToString(field)
			{
				var stringVar = "";
				var namer = "name";
				var level = "level";
				var job = "job";
				for(i = 1; i <= 6; i++)//row
				{
					for(v = 1; v <= 3; v++)//category
					{
						if(v == 1)//name
						{
							var curIn = namer + i;
							var valueToAdd = document.getElementsByName(curIn)[0].value;
							stringVar += curIn + "=" + valueToAdd + ";";
						}
						if(v == 2)//level
						{
							var curIn = level + i;
							var valueToAdd = document.getElementsByName(curIn)[0].value;
							stringVar += curIn + "=" + valueToAdd + ";";
						}
						if(v == 3)//job
						{
							var curIn = job + i;
							var valueToAdd = document.getElementsByName(curIn)[0].value;
							stringVar += curIn + "=" + valueToAdd + ";";
						}
					}
				}
				hiddenIn.value = stringVar;
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