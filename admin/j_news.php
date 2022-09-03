<?php 
	include('connect.php');

	$array = array();
	$i = 1;
	if(empty($_REQUEST['uid'])){

		$sql = mysqli_query($con, "select * from news order by odr asc, id desc limit 50");
		
	}
	else{
		if($_REQUEST['tt'] == "title"){
			$sql = mysqli_query($con, "select * from news where title = '$_REQUEST[uid]' limit 1");
		}
		if($_REQUEST['tt'] == "uid"){
			$sql = mysqli_query($con, "select * from news where uid = '$_REQUEST[uid]' limit 1");
		}
	}
	while ( $row = mysqli_fetch_array($sql)) {
			$puid = $row['uid'];
			//$sql2 = mysqli_query($con, "select id from posts where puid  = '$puid'");
			//$num = mysqli_num_rows($sql2);
			$array_row['sn'] = $i;
			$array_row['odr'] = $row['odr'];
			$array_row['uid'] = $row['uid'];
			$array_row['puid'] = $row['puid'];
			$array_row['title'] = $row['title'];
			//$array_row['tag'] = $row['tag'];
			$array_row['details'] = $row['details'];
			$array_row['thumb'] = $row['thumb'];
			$array_row['link'] = $row['link'];
			$array_row['type'] = $row['type'];
			//$array_row['category'] = $row['category'];
			//$array_row['golive'] = $row['goliveapp'];
			$array_row['views'] = $row['views'];
			$array_row['status'] = $row['status'];
			$array_row['title_uid'] = $row['title_uid'];
			$array_row['date'] = $row['date2'];


			array_push($array, $array_row);

			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';


?>