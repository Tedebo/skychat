<?php
	
	include('login.php'); 

	if(isset($_SESSION['verify'])){
		header("location: /");
	}
	
	$loginerror = "";
	
	if(isset($_GET['incorrectlogin'])){
		$loginerror = "*Incorrect Login";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=0"/>
	<title>Skychat: Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.7/semantic.min.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
	<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.7/semantic.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ns-autogrow/1.1.6/jquery.ns-autogrow.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			
			
		});
	</script>
	<style>
		html{
			overflow-y:hidden;
			overflow-x:hidden;
			-webkit-overflow-scrolling: touch;
			width: 100%;
			height: 100%;
		}
		body{
			background-color: rgba(200,200,200,0.6);
			
			
		}
		img{
			width: 100%;
			max-width: 400px;
			max-height: 400px;
		}
		textarea{
			resize: none;
			width: 100%;
			height: auto;
			background-color: rgba(10,10,10,0.9);
			color: rgba(100,100,100,1);
			padding: 0.5em;
			font-size: 1.5em !important;
		}
		#cont{
			background-color: rgba(0,0,0,0.8);
                        position: fixed; bottom: 0px; width: 100%;
                        border-radius: 0px;
                        padding: 0.5em;
		}
		.card{
			width: 100% !important;
                        
		}
	</style>
</head>
<body>
	<div class="ui menu">
	  <div class="header item">
	  	<a href="index.php"><i class="unhide icon"></i>Skychat Live</a>
	  </div>
	  <div class="item right aligned">
	    <a href="register.php"><div class="ui primary button">Sign up</div></a>
	  </div>
	  <div class="item">
	    <a href="signin.php"><div class="ui button">Log-in</div></a>
	  </div>
	</div>

	<div class="ui centered grid">

	    <div class="eight wide column" id="result" style="margin-bottom: 8em;">
	    	<h2 class="ui center aligned icon header">
					  <i class="circular users icon"></i>
					  Skychat Live
					  <h2 class="ui sub header red"><?php echo $loginerror; ?></h2>
					</h2>

	 	<form method="post">
			<div class="ui left icon input" style="width: 100%;">
				<input type="text" placeholder="Username" name="user" required>
				<i class="user icon"></i>
			</div>

			<div class="ui horizontal divider"></div>

			<div class="ui left icon input" style="width: 100%;">
				<input type="password" placeholder="Password" name="pass" required>
				<i class="lock icon"></i>
			</div>

			<div class="ui horizontal divider"></div>

			<div class="ui blue submit button" style="padding: 0px; width: 100%;">
				<input style="border: 0px; background-color: rgba(0,0,0,0); padding: 1em 4em;" type="submit" name="sub" value="Login" required>
					  
			</div>
		</form>



	    </div>

	    <div class="sixteen wide column" style="width: 100%;">

	   </div>

     </div>
</body>
</html>
