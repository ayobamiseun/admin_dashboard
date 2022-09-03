<?php 
	include('connect.php');


	if(empty($_REQUEST['uid'])){
		$array = array();
		$uuid = $_REQUEST['uuid'];
		$i = 1;
		$sql = mysqli_query($con, "select * from banner order by odr asc");
		while ( $row = mysqli_fetch_array($sql)) {
			$puid = $row['uid'];
			$uuid = $row['uuid'];

			$array_row['sn'] = $i;
			$array_row['uid'] = $row['uid'];
			$array_row['title'] = $row['title'];
			$array_row['date'] = $row['date'];
			$array_row['art'] = $row['image'];
			$array_row['link'] = $row['link'];
			$array_row['odr'] = $row['odr'];
			$array_row['status'] = $row['status'];

			array_push($array, $array_row);
			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';
	}
	else{
		$array = array();
		//$sql = mysqli_query($con, "select * from comments where parent_uid = '$uuid' order by id desc limit $cal");
		$sql = mysqli_query($con, "select * from banner where uid = '$_REQUEST[uid]' order by odr asc");
		$i = 1;
		while ( $row = mysqli_fetch_array($sql)) {
			//$st = substr(strip_tags($_row['post']),100);

			//$exp = explode('/',$row['time']);
			//$min = $exp['0'];
			$array_row['sn'] = $i;
			$array_row['uid'] = $row['uid'];
			$array_row['title'] = $row['title'];
			$array_row['date'] = $row['date'];
			$array_row['art'] = $row['image'];
			$array_row['link'] = $row['link'];
			$array_row['odr'] = $row['odr'];
			$array_row['status'] = $row['status'];

			array_push($array, $array_row);

			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';
	}


?>