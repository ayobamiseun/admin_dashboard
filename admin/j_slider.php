<?php 
	include('connect.php');

	$array = array();
	$i = 1;
	if(empty($_REQUEST['uid'])){

		$sql = mysqli_query($con, "select * from mobile_slider order by odr asc, id desc");
		
	}
	else{
		$sql = mysqli_query($con, "select * from mobile_slider where uid = '$_REQUEST[uid]' limit 1");
	}
	while ( $row = mysqli_fetch_array($sql)) {
			$puid = $row['uid'];
			//$sql2 = mysqli_query($con, "select id from posts where puid  = '$puid'");
			//$num = mysqli_num_rows($sql2);
			$array_row['sn'] = $i;
			$array_row['odr'] = $row['odr'];
			$array_row['uid'] = $row['uid'];
			$array_row['link'] = $row['link'];
			$array_row['title'] = $row['title'];
			$array_row['image'] = $row['image'];
			$array_row['date'] = $row['date'];


			array_push($array, $array_row);

			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';


?>