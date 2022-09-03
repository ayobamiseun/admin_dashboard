<?php
	include('connect.php');
	if(empty($_POST['uid']) || empty($_POST['status'])){
		echo 'null';
	}
	else{
		$status = $_POST['status'];
		$type = $_POST['type'];
		if($_POST['type'] == "post"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update posts set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
		else if($_POST['type'] == "banner"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update banner set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
		else if($_POST['type'] == "news"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update news set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
		else if($_POST['type'] == "inadvert"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update in_adverts set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
		else if($_POST['type'] == "blogger"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update bloggers set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
		else if($_POST['type'] == "quote"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update quotes set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}else if($_POST['type'] == "playlist"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update weekly_playlist set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
		else if($_POST['type'] == "recentpodcast"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update recent_podcast set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
		else if($_POST['type'] == "video"){
			$status = $_POST['status'];
			$upd = mysqli_query($con, "update videos set status = '$status' where uid = '$_POST[uid]'");
			if($upd){
				echo "success";
			}
			else{
				echo 'error';
			}
		}
	}

?>