<?php 
	include('connect.php');

	$array = array();
	$i = 1;

	$sql = mysqli_query($con, "select * from news_update where details = '$_REQUEST[tt]' order by id desc limit 1");
	
	while ( $row = mysqli_fetch_array($sql)) {
			$puid = $row['uid'];
			//$sql2 = mysqli_query($con, "select id from posts where puid  = '$puid'");
			//$num = mysqli_num_rows($sql2);
			$array_row['sn'] = $i;
			$array_row['odr'] = $row['odr'];
			$array_row['uid'] = $row['uid'];
			//$array_row['tag'] = $row['tag'];
			$array_row['details'] = $row['details'];
			$array_row['date'] = $row['date'];


			array_push($array, $array_row);

			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';


?>