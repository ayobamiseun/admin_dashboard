<?php
	error_reporting(0);
	include("connect.php");


	 $sqloaps = mysqli_query($con,"select odr,uid,name,nick,shows,picture from oaps order by odr asc");
		$i = 1;
		$json_reponse = array();
		while ($rowoaps = mysqli_fetch_array($sqloaps)) {
		
			$row_array['id'] = $i;
			$row_array['odr'] = $rowoaps['odr'];
			$row_array['uid'] = $rowoaps['uid'];
			
			$row_array['name'] = $rowoaps['name'];
			$row_array['nick'] = $rowoaps['nick'];
			$row_array['shows'] = $rowoaps['shows'];
			$row_array['picture'] = $rowoaps['picture'];
			
			//$row_array['date'] = $rowoaps['date'];

			$i++;

			array_push($json_reponse,$row_array);
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($json_reponse).'}';
	
?>
