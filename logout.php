<?php
session_start();
session_destroy();
$_SESSION = array();
$ding = $_SERVER['HTTP_REFERER'];
?>
<!DOCTYPE HTML>
<!--Melvin Cherian-->

<html>
	<head>
		<title>Terra Battle Hub</title>
       
        
		
        <script type = "text/javascript">
			window.location.href = '<?php echo $ding;?>';
        </script>
		<script>
		</script>
        
	</head>
		
	<body>
		
	</body>
</html>