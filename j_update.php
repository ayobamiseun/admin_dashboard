<?php
	error_reporting(0);
	include("connect.php");


	$sql = mysqli_query($con,"select * from app_update order by id desc");
		$i = 1;
		$json_reponse = array();
		while($row = mysqli_fetch_array($sql)){
		
			$row_array['id'] = $i;
			$row_array['sn'] = $row['id'];
			$row_array['uid'] = $row['uid'];
			
			$row_array['code'] = $row['code'];
			$row_array['action'] = $row['action'];
			
			$row_array['date'] = $row['date'];

			$i++;

			array_push($json_reponse,$row_array);
		}
		header('Content-Type: application/json');
		echo '{"Update":'.json_encode($json_reponse).'}';
	
?>