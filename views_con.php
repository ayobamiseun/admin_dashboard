<?php
	error_reporting(0);
	include("connect.php");

	if(empty($_REQUEST['uid'])){

	}
	else{

		$uid = mysqli_real_escape_string($con, $_REQUEST['uid']);
		$sql = mysqli_query($con, "select views from video_list where uid = '$uid'");
		$row = mysqli_fetch_array($sql);
		$view = $row['views'];
		$vv = $view + 1;
	
		$upd = mysqli_query($con, "update video_list set views = '$vv' where uid = '$uid'");

		if($upd){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
?>