<?php
	include('connect.php');



	if($_POST['type'] == "delPost"){

		$del = mysqli_query($con,"delete from posts where uid = '$_POST[uid]'");
		//echo 'success';
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}

		

	}
	else if($_POST['type'] == "delBanner"){

		$del = mysqli_query($con,"delete from banner where uid = '$_POST[uid]'");
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}

		

	}
	else if($_POST['type'] == "delPlaylist"){

		$del = mysqli_query($con,"delete from weekly_playlist where uid = '$_POST[uid]'");
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delVideo"){

		$del = mysqli_query($con,"delete from videos where uid = '$_POST[uid]'");
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delPodcastCat"){

		$del = mysqli_query($con,"delete from podcast_cat where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}

	}
	else if($_POST['type'] == "delRecentpodcast"){

		$del = mysqli_query($con,"delete from recent_podcast where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delMusic"){

		$del = mysqli_query($con,"delete from new_release where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delPodcast"){

		$del = mysqli_query($con,"delete from podcasts where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delSlider"){

		$del = mysqli_query($con,"delete from mobile_slider where uid = '$_POST[uid]'");
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delnewsupdate"){

		$del = mysqli_query($con,"delete from news_update where uid = '$_POST[uid]'");
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delNews"){

		$del = mysqli_query($con,"delete from news where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}

		

	}
	else if($_POST['type'] == "delOAP"){

		$del = mysqli_query($con,"delete from oaps where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delAdmin"){

		$del = mysqli_query($con,"delete from admins where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delProgram"){
		$del = mysqli_query($con,"delete from programs where uid = '$_POST[uid]'");
		$del2 = mysqli_query($con,"delete from shows where puid = '$_POST[uid]'");

		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
	else if($_POST['type'] == "delShow"){
		$del = mysqli_query($con,"delete from shows where uid = '$_POST[uid]'");
		
		if ($del){
			echo 'success';
		}
		else{
			echo 'error';
		}
	}
?>