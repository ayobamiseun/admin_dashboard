<?php
	
	include('connect.php');
	error_reporting(0);

	if($_POST['type'] == "editPost"){
		
		if(empty($_POST['title']) || empty($_POST['details']) || empty($_POST['uid'])){
			echo 'null';
		}
		else{
				$details = str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $_POST['details']);
				$details = str_replace('style="width: 300px;"', 'style="width: 100%;"', $details);
				//$details = str_replace('#ad1', '<img src="https://golivemeetings.com/goliveblog/admin/uploads/ads1.jpg" style="width:100%;" />', $details);
				//$details = str_replace('#ad2', '<img src="https://golivemeetings.com/goliveblog/admin/uploads/ads2.jpg" style="width:100%;" />', $details);
				$details = mysqli_real_escape_string($con,$details);
				$title = mysqli_real_escape_string($con,$_POST['title']);
				//$tag = mysqli_real_escape_string($con,$_POST['tags']);
				$type = $_POST['type2'];
				//$goliveapp = $_POST['golive'];
				$link = $_POST['link'];
				//$cat = $_POST['category'];

				$title_uid = str_replace(' ', '-', $title);

				

			if(empty($_POST['art'])){
				$upd = mysqli_query($con, "update posts set title = '$title',link = '$link',details ='$details' ,type = '$type',title_uid = '$title_uid', odr = '$_POST[odr]' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
			}
			else{
				$img3 = $_POST['art'];
				$time = uniqid().time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "thumb/".$uid.$time.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/thumb/".$time.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						$upd = mysqli_query($con, "update posts set title = '$title', link = '$link',details ='$details' , type = '$type',title_uid = '$title_uid', thumb = '$file33', odr = '$_POST[odr]' where uid = '$_POST[uid]'");
						if($upd){
							echo 'success';
						}
						else{
							echo 'error';
						}
					

				}
				else{
					echo 'image_error';
				}
			}
		}
	}
	else if($_POST['type'] == "editNews"){
		
		if(empty($_POST['title']) || empty($_POST['details']) || empty($_POST['uid'])){
			echo 'null';
		}
		else{
				$details = str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $_POST['details']);
				$details = str_replace('style="width: 300px;"', 'style="width: 100%;"', $details);
				//$details = str_replace('#ad1', '<img src="https://golivemeetings.com/goliveblog/admin/uploads/ads1.jpg" style="width:100%;" />', $details);
				//$details = str_replace('#ad2', '<img src="https://golivemeetings.com/goliveblog/admin/uploads/ads2.jpg" style="width:100%;" />', $details);
				$details = mysqli_real_escape_string($con,$details);
				$title = mysqli_real_escape_string($con,$_POST['title']);
				//$tag = mysqli_real_escape_string($con,$_POST['tags']);
				$type = $_POST['type2'];
				$goliveapp = $_POST['golive'];
				$link = $_POST['link'];
				//$cat = $_POST['category'];

				$title_uid = str_replace(' ', '-', $title);

				

			if(empty($_POST['art'])){
				$upd = mysqli_query($con, "update news set title = '$title',link = '$link',details ='$details' ,type = '$type',title_uid = '$title_uid', odr = '$_POST[odr]' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
			}
			else{
				$img3 = $_POST['art'];
				$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "thumb/".$uid.$time.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/thumb/".$uid.$time.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						$upd = mysqli_query($con, "update news set title = '$title', link = '$link',details ='$details' , type = '$type',title_uid = '$title_uid', thumb = '$file33', odr = '$_POST[odr]' where uid = '$_POST[uid]'");
						if($upd){
							echo 'success';
						}
						else{
							echo 'error';
						}
					

				}
				else{
					echo 'image_error';
				}
			}
		}
	}
	else if($_POST['type'] == "editMusic"){
		$pin = substr(str_shuffle("0123456789"), 0,6);
		$uu = substr(str_shuffle("0123456789abcdefghijklmnpqrstuvwxyz"), 0,12);
		$uid = uniqid().$uu;

		if(empty($_POST['artist']) || empty($_POST['title']) || empty($_POST['uid']) || empty($_POST['download'])){
			echo 'null';
		}
		else{
				$artist = mysqli_real_escape_string($con,$_POST['artist']);
				$track = mysqli_real_escape_string($con,$_POST['title']);
				$link = mysqli_real_escape_string($con,$_POST['link']);
				$download = mysqli_real_escape_string($con,$_POST['download']);
				$genres = mysqli_real_escape_string($con,$_POST['genres']);

				$details = str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $_POST['details']);
				$details = str_replace('style="width: 300px;"', 'style="width: 100%;"', $details);

				if(empty($_POST['art'])){
					$upd = mysqli_query($con, "update new_release set track_name = '$track', track_desc = '$details', artist_name = '$artist', track_link = '$link', download = '$download', genres = '$genres' where uid = '$_POST[uid]'");
					if($upd){
						echo 'success';
					}else{
						echo 'error';
					}
				}
				else{

							$uid = $_POST['uid'];
							$img3 = $_POST['art'];
							$time = time();
							$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
							$img3 = str_replace('data:image/jpg;base64,', '', $img3);
							$img3 = str_replace('data:image/png;base64,', '', $img3);
							$img3 = str_replace('data:image/gif;base64,', '', $img3);
							$img3 = str_replace(' ', '+', $img3);
							$data3 = base64_decode($img3);
							$file3 = "musics/art/".$uid.$time.'.jpg';
							$file33 = "https://superfm963.com/apps/admin/musics/art/".$uid.$time.'.jpg';
							//$file2 = $uid.$time.'.jpg';
							$success3 = file_put_contents($file3, $data3);



							$artist = mysqli_real_escape_string($con,$_POST['artist']);
							$track = mysqli_real_escape_string($con,$_POST['track_name']);
							$link = mysqli_real_escape_string($con,$_POST['link']);
							$description = mysqli_real_escape_string($con,$_POST['description']);
							$download = mysqli_real_escape_string($con,$_POST['download']);

							$upd = mysqli_query($con, "update new_release set track_name = '$track', track_desc = '$details', artist_name = '$artist', art = '$file33', download = '$download'  where uid = '$_POST[uid]'");

							if($upd){
								echo 'success';
							}else{
								echo 'error';
							}

				}
		}

	}
	else if($_POST['type'] == "editPodcast"){
		$pin = substr(str_shuffle("0123456789"), 0,6);
		$uu = substr(str_shuffle("0123456789abcdefghijklmnpqrstuvwxyz"), 0,12);
		$uid = uniqid().$uu;

		if(empty($_POST['guest']) || empty($_POST['title']) || empty($_POST['uid']) || empty($_POST['download']) || empty($_POST['cat'])){
			echo 'null';
		}
		else{
				$guest = mysqli_real_escape_string($con,$_POST['guest']);
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$link = mysqli_real_escape_string($con,$_POST['link']);
				$download = mysqli_real_escape_string($con,$_POST['download']);
				$cat = mysqli_real_escape_string($con,$_POST['cat']);

				$details = str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $_POST['details']);
				$details = str_replace('style="width: 300px;"', 'style="width: 100%;"', $details);

				if(empty($_POST['art'])){
					$upd = mysqli_query($con, "update podcasts set title = '$title', details = '$details', guest = '$guest', download = '$download', cat = '$cat' where uid = '$_POST[uid]'");
					if($upd){
						echo 'success';
					}else{
						echo 'error';
					}
				}
				else{

							$uid = $_POST['uid'];
							$img3 = $_POST['art'];
							$time = time();
							$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
							$img3 = str_replace('data:image/jpg;base64,', '', $img3);
							$img3 = str_replace('data:image/png;base64,', '', $img3);
							$img3 = str_replace('data:image/gif;base64,', '', $img3);
							$img3 = str_replace(' ', '+', $img3);
							$data3 = base64_decode($img3);
							$file3 = "podcasts/art/".$uid.$time.'.jpg';
							$file33 = "https://superfm963.com/apps/admin/podcasts/art/".$uid.$time.'.jpg';
							//$file2 = $uid.$time.'.jpg';
							$success3 = file_put_contents($file3, $data3);
							

							$upd = mysqli_query($con, "update podcasts set title = '$title', details = '$details', guest = '$guest', art = '$file33', download = '$download'  where uid = '$_POST[uid]'");

							if($upd){
								echo 'success';
							}else{
								echo 'error';
							}

				}
		}

	}
	else if($_POST['type'] == "editBanner"){
		
		if(empty($_POST['name']) || empty($_POST['uid'])){
			echo 'null';
		}
		else{
				
				$title = mysqli_real_escape_string($con,$_POST['name']);				
				$link = $_POST['link'];
				$odr = $_POST['odr'];


			if(empty($_POST['art'])){
				$upd = mysqli_query($con, "update banner set title = '$title', odr = '$odr',link = '$link' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
			}
			else{
				$uid2 = uniqid();
				$img3 = $_POST['art'];
				$time = uniqid().time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "banner/".$uid.$time.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/banner/".$time.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						$upd = mysqli_query($con, "update banner set title = '$title',link = '$link',image = '$file33', odr = '$_POST[odr]' where uid = '$_POST[uid]'");
						if($upd){
							echo 'success';
						}
						else{
							echo 'error';
						}
				}
				else{
					echo 'image_error';
				}
			}
		}
	}
	else if($_POST['type'] == "editVideo"){
		if(empty($_POST['title']) || empty($_POST['uid']) || empty($_POST['link'])){
			echo 'null';
		}
		else{
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$link = mysqli_real_escape_string($con,$_POST['link']);			
				$upd = mysqli_query($con, "update videos set link = '$title', link = '$link' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}
	else if($_POST['type'] == "editPlaylist"){
		if(empty($_POST['uid']) || empty($_POST['title']) || empty($_POST['link'])){
			echo 'null';
		}
		else{
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$link = mysqli_real_escape_string($con,$_POST['link']);
				$upd = mysqli_query($con, "update weekly_playlist set title = '$title', code = '$code' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}
	else if($_POST['type'] == "editRPodcast"){
		if(empty($_POST['uid']) || empty($_POST['title']) || empty($_POST['link']) || empty($_POST['details'])){
			echo 'null';
		}
		else{
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$link = mysqli_real_escape_string($con,$_POST['link']);
				$details = mysqli_real_escape_string($con,$_POST['details']);
				$upd = mysqli_query($con, "update recent_podcast set title = '$title', details = '$details', link = '$link' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}
	else if($_POST['type'] == "editPodcastCat"){
		if(empty($_POST['uid']) || empty($_POST['name'])){
			echo 'null';
		}
		else{
				$name = mysqli_real_escape_string($con,$_POST['name']);
				
				$upd = mysqli_query($con, "update podcast_cat set name = '$name' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}
	else if($_POST['type'] == "editSlider"){
		
		if(empty($_POST['name']) || empty($_POST['uid'])){
			echo 'null';
		}
		else{
				
				$title = mysqli_real_escape_string($con,$_POST['name']);				
				$link = $_POST['link'];
				$odr = $_POST['odr'];


			if(empty($_POST['art'])){
				$upd = mysqli_query($con, "update mobile_slider set title = '$title', odr = '$odr',link = '$link' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
			}
			else{
				$uid2 = uniqid();
				$img3 = $_POST['art'];
				$time = uniqid().time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "banner/".$uid.$time.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/banner/".$time.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						$upd = mysqli_query($con, "update mobile_slider set title = '$title',link = '$link',image = '$file33', odr = '$_POST[odr]' where uid = '$_POST[uid]'");
						if($upd){
							echo 'success';
						}
						else{
							echo 'error';
						}
				}
				else{
					echo 'image_error';
				}
			}
		}
	}
	else if($_POST['type'] == "editOAP"){
		
		if(empty($_POST['name']) || empty($_POST['uid']) || empty($_POST['details']) || empty($_POST['nick']) || empty($_POST['shows'])){
			echo 'null';
		}
		else{
				
				$details = str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $_POST['details']);
				$details = str_replace('style="width: 300px;"', 'style="width: 100%;"', $details);
				$details = mysqli_real_escape_string($con,$details);
				$name = mysqli_real_escape_string($con,$_POST['name']);
				$nick = mysqli_real_escape_string($con,$_POST['nick']);
				$show = mysqli_real_escape_string($con,$_POST['shows']);
				$odr = $_POST['odr'];	


			if(empty($_POST['art'])){
				$upd = mysqli_query($con, "update oaps set name = '$name', details = '$details',shows = '$show',nick = '$nick', odr = '$odr' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
			}
			else{
				$img3 = $_POST['art'];
				$uid = uniqid().time();
				$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "oap/".$uid.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/oap/".$uid.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						$upd = mysqli_query($con, "update oaps set name = '$name', details = '$details',shows = '$show',nick = '$nick', picture = '$file33', odr = '$odr' where uid = '$_POST[uid]'");
						if($upd){
							echo 'success';
						}
						else{
							echo 'error';
						}
				}
				else{
					echo 'image_error';
				}
			}
		}
	}
	else if($_POST['type'] == "editShow"){
		if(empty($_POST['name']) || empty($_POST['uid']) || empty($_POST['show']) || empty($_POST['time'])){
			echo 'null';
		}
		else{	
				$name = mysqli_real_escape_string($con,$_POST['name']);
				$show = mysqli_real_escape_string($con,$_POST['show']);	
				$time = mysqli_real_escape_string($con,$_POST['time']);
				$oap = mysqli_real_escape_string($con,$_POST['oap']);		
				$uid = $_POST['uid'];	
				$odr = $_POST['odr'];
				$details = $_POST['details'];	

				$sql = mysqli_query($con,"select puid from shows where uid = '$uid'");
				$row = mysqli_fetch_array($sql);
				$puid = $row['puid'];

				$upd2 = mysqli_query($con,"update programs set name = '$name' where uid = '$puid'");		

				$upd = mysqli_query($con, "update shows set title = '$show', time = '$time', details = '$details', oap = '$oap', odr = '$odr' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}
	else if($_POST['type'] == "editInAdvert"){
		
		if(empty($_POST['title']) || empty($_POST['uid']) || empty($_POST['link']) || empty($_POST['expire'])){
			echo 'null';
		}
		else{
				
				$title = mysqli_real_escape_string($con,$_POST['title']);				
				$link = $_POST['link'];
				$category = $_POST['category'];
				$odr = $_POST['odr'];
				$newday = $_POST['expire'];


				$sql = mysqli_query($con,"select days,expire from in_adverts where uid = '$_POST[uid]'");
				$row = mysqli_fetch_array($sql);
				$days = $row['days'];
				$ex = $row['expire'];

				if($newday > $days){
					$sub = $newday - $days;
					$ex = date('Y-m-d H:i', strtotime("+".$sub." days",strtotime($ex)));
				}

	

			if(empty($_POST['art'])){
				$upd = mysqli_query($con, "update in_adverts set title = '$title', odr = '$odr',link = '$link',category = '$category', expire = '$ex', days = '$newday'  where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
			}
			else{
				$uid = uniqid().time();
				$img3 = $_POST['art'];
				$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "ads/".$uid.$time.'.jpg';
				$file33 = "https://golivemeetings.com/goliveblog/admin/ads/".$uid.$time.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						$upd = mysqli_query($con, "update in_adverts set title = '$title',link = '$link',category = '$category', image = '$file33', odr = '$_POST[odr]', expire = '$ex', days = '$newday' where uid = '$_POST[uid]'");
						if($upd){
							echo 'success';
						}
						else{
							echo 'error';
						}
					

				}
				else{
					echo 'image_error';
				}
			}
		}
	}
	else if($_POST['type'] == "editNewsUpdate"){
		if(empty($_POST['details']) || empty($_POST['uid']) || empty($_POST['odr'])){
			echo 'null';
		}
		else{

				$upd = mysqli_query($con, "update news_update set details = '$_POST[details]', odr = '$_POST[odr]' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}
	else if($_POST['type'] == "editAdmin"){
		if(empty($_POST['name']) || empty($_POST['uid']) || empty($_POST['username']) || empty($_POST['password'])){
			echo 'null';
		}
		else{

				$upd = mysqli_query($con, "update admins set name = '$_POST[name]', username = '$_POST[username]',password = '$_POST[password]' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}
	else if($_POST['type'] == "editQuote"){
		if(empty($_POST['title']) || empty($_POST['uid']) || empty($_POST['details'])){
			echo 'null';
		}
		else{	
				$title = mysqli_real_escape_string($con,$_POST['title']);			
				$details = mysqli_real_escape_string($con,$_POST['details']);			

				$upd = mysqli_query($con, "update quotes set title = '$title', details = '$details' where uid = '$_POST[uid]'");
				if($upd){
					echo 'success';
				}
				else{
					echo 'error';
				}
		}
	}

?>