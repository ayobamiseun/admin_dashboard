<?php 
	include('connect.php');

	$array = array();
	$i = 1;
	if(empty($_REQUEST['uid'])){
		
		$sql = mysqli_query($con, "select * from videos order by id desc");
	}
	else{
		$sql = mysqli_query($con, "select * from videos where uid = '$_REQUEST[uid]'");
	}
	while ( $row = mysqli_fetch_array($sql)) {

			//$sql2 = mysqli_query($con, "select id from posts where username = '$_REQUEST[username]'");
			//$num = mysqli_num_rows($sql2);

			$array_row['sn'] = $i;
			$array_row['uid'] = $row['uid'];
			$array_row['title'] = $row['title'];
			$array_row['link'] = $row['link'];
			$array_row['status'] = $row['status'];
			$array_row['date'] = $row['date'];


			array_push($array, $array_row);

			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';


?>