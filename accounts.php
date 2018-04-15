<?php
$con = mysqli_connect("localhost", "skychatroot", "root12", "skychatlive");

$res1 = mysqli_query($con, "SELECT * FROM account");


		while($row1 = mysqli_fetch_array($res1)){
                    $user = $row1['user'];
                    $rank = $row1['rank'];
                    
			echo "(" . $rank . ") " . $user . "<br/>";
                
		}

?>