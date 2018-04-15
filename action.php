<?php 
session_start();
$con = mysqli_connect("localhost", "root", "", "skychatlive");

$res1 = mysqli_query($con, "SELECT * FROM banned");
$res2 = mysqli_query($con, "SELECT * FROM mute");

if(isset($_SESSION['verify'])){
	$chatuser = $_SESSION['verify'];
	$resacc = mysqli_query($con, "SELECT * FROM account where user='$chatuser'");
	$resrow = mysqli_fetch_array($resacc);
	$resrank = $resrow['rank'];
	$chatrank = $resrank;
	
}else{
	$chatrank = "user";
}



while($row1 = mysqli_fetch_array($res1)){
	$banip = $row1['ip'];
}
while($row2 = mysqli_fetch_array($res2)){
	$mutedip = $row2['ip'];
}

if (isset($_REQUEST)) {
	
	$userip = $_SERVER['REMOTE_ADDR'];
	$data = $_POST['name'];
	
	$stafflist = array("admin", "dev");
	
        	
	
	
        
        list($a, $b) = explode('@', $_POST['name']);
        
        
        if( in_array($chatrank, $stafflist) & $a == "//admin" & isset($b) ){
        	
        	mysqli_query($con, "UPDATE account SET rank='admin' WHERE user='$b'");
        	
        }elseif( in_array($chatrank, $stafflist) & $a == "//dev" & isset($b) ){
        	
        	mysqli_query($con, "UPDATE account SET rank='dev' WHERE user='$b'");
        	
        }elseif( in_array($chatrank, $stafflist) & $a == "//vip" & isset($b) ){
        	
        	mysqli_query($con, "UPDATE account SET rank='vip' WHERE user='$b'");
        	
        }elseif( in_array($chatrank, $stafflist) & $a == "//member" & isset($b) ){
        
        	mysqli_query($con, "UPDATE account SET rank='member' WHERE user='$b'");
        
        }elseif( in_array($chatrank, $stafflist) & $a == "//mute" & isset($b) ){
        	
        	mysqli_query($con, "INSERT INTO mute(ip) VALUES('$b')");
        	
        }elseif( in_array($chatrank, $stafflist) & $a == "//unmute" & isset($b) ){
        
        	mysqli_query($con, "DELETE FROM mute WHERE ip='$b'");
        
        }elseif( in_array($chatrank, $stafflist) & $a == "//ban" & isset($b) ){
	
		mysqli_query($con, "INSERT INTO banned(ip) VALUES('$b')");
		mysqli_query($con, "DELETE FROM tabchat WHERE ip='$b'");
	
	}elseif( in_array($chatrank, $stafflist) & $a == "//unban" & isset($b) ){
	
		mysqli_query($con, "DELETE FROM banned WHERE ip='$b'");
	
	}elseif( in_array($chatrank, $stafflist) & $a == "//delip" & isset($b) ){
		
		mysqli_query($con, "DELETE FROM tabchat WHERE ip='$b'");
		
	}elseif( in_array($chatrank, $stafflist) & $a == "//del" & isset($b) || in_array($chatrank, $stafflist) & $a == "//del" & !isset($b) ){
		if($b > 5){
			$b = 5;
			mysqli_query($con, "DELETE FROM tabchat ORDER BY id DESC limit $b" );
		}elseif($b < 1 || $b == ""){
			$b = 1;
			mysqli_query($con, "DELETE FROM tabchat ORDER BY id DESC limit $b" );
		}else{
			mysqli_query($con, "DELETE FROM tabchat ORDER BY id DESC limit $b" );
		}
		

                
        }elseif( in_array($chatrank, $stafflist) & $a == "//add" & isset($b) ){
        	$date = date("m-d");
        
        	mysqli_query($con, "INSERT INTO verify(ip, date) VALUES('$b', '$date')");
        
        }elseif( in_array($chatrank, $stafflist) & $a == "//remove" & isset($b) ){
        
        	mysqli_query($con, "DELETE FROM verify WHERE ip='$b'");
        
        }else{
        	if(substr($_POST['name'], 0, 2) === "//"){
        	
	        }elseif(substr($_POST['name'], 0, 1) === " "){
			
		}elseif(empty($_POST['name'])){
		
		}elseif($userip == $mutedip){
		
		}elseif($userip == $banip){
			
		}elseif(strlen($_POST['name']) > 300){
		
			$datachange = substr($data, 0, 300);
			$ip = $_SERVER['REMOTE_ADDR'];
			mysqli_query($con, "INSERT INTO tabchat(ip, stringbox, user, rank) VALUES('$ip','$datachange', '$chatuser', '$chatrank')");
			
		}elseif(strstr($_POST['name'], '.jpg') || strstr($_POST['name'], '.png') || strstr($_POST['name'], '.gif')) {
			
			$changelink = '<img src="' .$data. '" />';
			
	                $ip = $_SERVER['REMOTE_ADDR'];
			mysqli_query($con, "INSERT INTO tabchat(ip, stringbox, user, rank) VALUES('$ip','$changelink', '$chatuser', '$chatrank')");
			
		}else{

	                $ip = $_SERVER['REMOTE_ADDR'];
			mysqli_query($con, "INSERT INTO tabchat(ip, stringbox, user, rank) VALUES('$ip','$data', '$chatuser', '$chatrank')");
			
		}
	}

	
}


?>