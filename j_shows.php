<?php
	error_reporting(0);
	include("connect.php");

	  $i = 1;
	  $json_reponse = array();
	  $sql = mysqli_query($con,"select * from programs order by id asc");
	  while ($row = mysqli_fetch_array($sql)) {
	  	$puid = $row['uid'];
	  	$pname = $row['name'];

	  	  $sqlsh = mysqli_query($con,"select * from shows where puid = '$puid' order by odr asc");
	       while ($rowsh = mysqli_fetch_array($sqlsh)) {
	            $oapsh = $rowsh['oap'];
	                   
	            $sqlap = mysqli_query($con,"select name,nick,picture from oaps where nick = '$oapsh'");
	            $rowap = mysqli_fetch_array($sqlap);
	          
				$row_array['id'] = $i;
				$row_array['odr'] = $rowsh['odr'];
				$row_array['uid'] = $rowsh['uid'];
				$row_array['puid'] = $rowsh['puid'];
				$row_array['title'] = $rowsh['title'];
				$row_array['time'] = $rowsh['time'];
				$row_array['name'] = $rowap['name'];
				$row_array['nick'] = $rowap['nick'];
				$row_array['picture'] = $rowap['picture'];
				$row_array['day'] = $pname;

				$i++;

				array_push($json_reponse,$row_array);
			}
			
	  	
	  }

	  header('Content-Type: application/json');
	  echo '{"Feed":'.json_encode($json_reponse).'}';
	  
	
?>
