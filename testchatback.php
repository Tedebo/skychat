<?php
error_reporting(0);
session_start();
$con = mysqli_connect("localhost", "root", "", "skychatlive");

	$res1 = mysqli_query($con, "(SELECT * FROM tabchat order by id DESC limit 32) order by id ASC");
	
	$res2 = mysqli_query($con, "SELECT * FROM admin order by id");
	
	$res3 = mysqli_query($con, "SELECT * FROM verify order by id");
	
	$res4 = mysqli_query($con, "SELECT * FROM account order by id");
	
	$res5 = mysqli_query($con, "SELECT * FROM tabchat order by id");
	
	
		
		while($row1 = mysqli_fetch_array($res1)){
			while($row2 = mysqli_fetch_array($res2)){
				$adminip = $row2['ip'];
			}
			while($row3 = mysqli_fetch_array($res3)){
				$verip = $row3['ip'];
			}
			while($row4 = mysqli_fetch_array($res4)){
				$accuser = $row4['user'];
				$userrank = $row4['rank'];
			}
			while($row5 = mysqli_fetch_array($res5)){
				$tabuser = $row5['user'];
				

			}
                    $ip = $row1['ip'];
                    $id = $row1['id'];
                    $tabrank = $row1['rank'];
		    if($tabrank == "admin"){
		    	$ip = "Anonymous";
                        $col = "200,100,100,0.8";
                        $icon = "protect";
                        
                    }elseif($tabrank == "dev"){
			$ip = "Anonymous";
                        $col = "100,100,200,0.8";
                        $icon = "cube";
                    	
                    
                    }elseif($tabrank == "member"){
                    	$ip = "Anonymous";
                        $col = "100,200,100,0.8";
                        $icon = "user";
                    }elseif($tabrank == "vip"){
                    	$ip = "Anonymous";
                        $col = "200,200,0,0.8";
                        $icon = "lightning";
                    }else{
                    	$tabrank = "user";
                        $ip = "Anonymous";
                        $col = "200,200,200,1";
                        $icon = "user";
                    }
                    /*if($ip == $verip){
                    	$rank = "Member";
		        $ip = "Anonymous";
                        $col = "100,200,100,0.8";
                        $icon = "user";
                    }elseif($ip == $adminip){
		        $rank = "Admin";
		        $ip = "Anonymous";
                        $col = "200,100,100,0.8";
                        $icon = "protect";
                    }else{
                        $rank = "user";
                        $ip = "Anonymous";
                        $col = "200,200,200,1";
                        $icon = "user";
                    }*/

		    $content = $row1['stringbox'];

				
		
?>
<br/>
<div class="column">
<div class="ui cards">
  <div class="card">
    <div class="content">
      
      <div class="ui header" style="color: rgba(<?php echo $col; ?>);"><i class="left floated <?php echo $icon; ?> icon"></i></i><?php echo $ip; ?> <i style="color: rgba(200,200,200,1);" class="right floated"><?php ?></i></div>
      <div class="meta" id="rank"><?php echo $tabrank;?></div>
      <div class="description" style="width: 100%;">
        <span style="color: rgba(200,200,200,1);">></span> <p style=""><?php echo $content;?></p>
      </div>
    </div>
  </div>
 </div>
 </div>
 <?php }?>