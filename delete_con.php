<?php 

	include('connect.php');

	error_reporting(0);

	if($_POST['type'] == "daily"){
		$del = mysqli_query($con, "delete from daily_report where uid = '$_POST[uid]'");
		$del2 = mysqli_query($con, "delete from daily_reports where puid = '$_POST[uid]'");

		if($del2){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	elseif($_POST['type'] == "weekly"){
		$del = mysqli_query($con, "delete from weekly_report where uid = '$_POST[uid]'");
		$del2 = mysqli_query($con, "delete from weekly_reports where puid = '$_POST[uid]'");

		if($del2){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	elseif($_POST['type'] == "monthly"){
		$del = mysqli_query($con, "delete from monthly_report where uid = '$_POST[uid]'");
		$del2 = mysqli_query($con, "delete from monthly_reports where puid = '$_POST[uid]'");

		if($del2){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}

?>