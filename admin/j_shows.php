<?php 
	include('connect.php');

	$array = array();
	$i = 1;
		
	$sql = mysqli_query($con, "select * from shows where uid = '$_REQUEST[uid]' order by odr desc");
	
	while ( $row = mysqli_fetch_array($sql)) {

			//$sql2 = mysqli_query($con, "select id from posts where username = '$_REQUEST[username]'");
			//$num = mysqli_num_rows($sql2);
			$array_row['sn'] = $i;
			$array_row['uid'] = $row['uid'];
			$array_row['title'] = $row['title'];
			$array_row['time'] = $row['time'];
			$array_row['oap'] = $row['oap'];
			$array_row['date'] = $row['date'];
			$array_row['odr'] = $row['odr'];
			$array_row['details'] = $row['details'];


			array_push($array, $array_row);

			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';


?>