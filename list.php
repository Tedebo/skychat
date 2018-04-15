<?php 
$con = mysqli_connect("localhost", "skychatroot", "root12", "skychatlive");

$res1 = mysqli_query($con, "SELECT * FROM tabchat order by id DESC limit 24");


		while($row1 = mysqli_fetch_array($res1)){
                    $ip = $row1['ip'];
                    $user = $row1['user'];

		    $content = $row1['stringbox'];
		    if($user != ""){
		    	echo "(" . $user . ") " . $content . "<br/>";
		    }else{
		    	echo "(" . $ip . ") " . $content . "<br/>";
		    }
                
}


?>