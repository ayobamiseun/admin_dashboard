<?php 
	include('connect.php');

	$array = array();
	$i = 1;
	if(empty($_REQUEST['uid'])){
		
		$sql = mysqli_query($con, "select * from new_release order by id desc");
	}
	else{
		$sql = mysqli_query($con, "select * from new_release where uid = '$_REQUEST[uid]'");
	}
	while ( $row = mysqli_fetch_array($sql)) {

			//$sql2 = mysqli_query($con, "select id from posts where username = '$_REQUEST[username]'");
			//$num = mysqli_num_rows($sql2);

			$array_row['id'] = $row['id'];
			$array_row['sn'] = $i;
			$array_row['uid'] = $row['uid'];
			$array_row['uuid'] = $row['uuid'];
			$array_row['artist'] = $row['artist_name'];

			$array_row['title'] = $row['track_name'];
			$array_row['link'] = $row['track_link'];
			$array_row['thumb'] = $row['art'];
			$array_row['view'] = $row['view_count'];
			$array_row['description'] = $row['track_desc'];
			$array_row['downloads'] = $num;
      		$array_row['downloadable'] = $row['download'];
			$array_row['date'] = $row['date'];
			$array_row['genres'] = $row['genres'];

			array_push($array, $array_row);

			$i++;
		}
		header('Content-Type: application/json');
		echo '{"Feed":'.json_encode($array).'}';


?>