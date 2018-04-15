<?php
session_start();

	if(isset($_SESSION['verify'])){
		$hide = "display:none;";
		$logout = "display:block;";
		$name = $_SESSION['verify'];
	}else{
		
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=0"/>
	<title>Skychat</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.7/semantic.min.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
	<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.7/semantic.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ns-autogrow/1.1.6/jquery.ns-autogrow.js"></script>
	<script src="script.js"></script>
	<style>
		html{
			overflow: hidden;
			-webkit-overflow-scrolling: touch;
			width: 100%;
			height: 100%;
		}
		body{
			#background-image: url('http://www.hdwallpapers.in/walls/deep_space_nebula_4k_8k-wide.jpg');
			background-color: rgba(200,200,200,0.6);
			overflow: hidden;
		}
		img{
			width: 100%;
			max-width: 400px;
			max-height: 400px;
		}
		#name{
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
			min-width: 100% !important;
                        max-width: 100% !important;
		}
		#logout{
			display: none;
		}
		#send{
			background-color: rgba(100,100,240,0.4);
			color: rgba(200,200,240,1);
			text-align: center;
			padding: 1em;
		}
		#result{
			height: 70%;
		}
		#result div{
			width: 100%;
			max-width: 100%;
			word-wrap: break-word;
		}
	</style>
</head>
<body>
	<div class="ui menu" style="max-height: 75px;">
	
	  <div class="header item">
	  	<a href="/dev/"><i class="unhide icon"></i>Skychat Live</a>
	  </div>
	  
	  <div class="item right aligned" style="<?php echo $hide; ?>">
	    <a href="register.php"><div class="ui primary button">Sign up</div></a>
	  </div>
	  <div class="item" style="<?php echo $hide; ?>">
	    <a href="signin.php"><div class="ui button">Log-in</div></a>
	  </div>
	  
	  <div class="item right aligned" id="logout" style="<?php echo $logout; ?>">
	    <h3 style="text-align: center; margin: 0px;"><?php echo $name; ?></h3>
	    <a href="logout.php"><div class="ui red small button" style="margin: 0em;">Log-out</div></a>
	  </div>
	  
	</div>

	<div class="ui centered grid" style="">

	    <div class="sixteen wide column" id="result" style="margin-bottom: 8em; overflow:auto; position:absolute; top: 16%; left:0%; right:0px; bottom:0px; ">
	 	


	    </div>

	    <div class="sixteen wide column" style="width: 100%;">

		    <div class="ui inverted segment" id="cont">
	  		<div class="ui inverted fluid input" style=""">
	    		    <input type="text" id="name" placeholder=">" />
	    		    <div class="ui button" id="send" name="send">Send</div>
			</div>
		    </div>
	   </div>

     </div>
</body>
</html>
