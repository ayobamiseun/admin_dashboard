<?php
	
	include('connect.php');
	error_reporting(0);

	if($_POST['type'] == "addPlaylist"){
		if(empty($_POST['title']) || empty($_POST['code'])){
			echo 'null';
		}
		else{
			$uid = uniqid().time();
			$title = mysqli_real_escape_string($con,$_POST['title']);
			$code = mysqli_real_escape_string($con,$_POST['code']);
			$insert = mysqli_query($con,"insert into weekly_playlist (uid,title,code,status)
				values('$uid','$title','$code','on')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	else if($_POST['type'] == "addVideo"){
		if(empty($_POST['title']) || empty($_POST['title'])){
			echo 'null';
		}
		else{
			$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  			$dd = $date->format('Y-m-d G:i:s');
			$uid = uniqid().time();
			$title = mysqli_real_escape_string($con,$_POST['title']);
			$link = mysqli_real_escape_string($con,$_POST['link']);
			$insert = mysqli_query($con,"insert into videos (title,uid,link,status,date)
				values('$title','$uid','$link','on','$dd')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	else if($_POST['type'] == "addPodcastCat"){
		if(empty($_POST['name'])){
			echo 'null';
		}
		else{
			$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  			$dd = $date->format('Y-m-d G:i:s');
			$uid = uniqid().time();
			$name = mysqli_real_escape_string($con,$_POST['name']);
			$insert = mysqli_query($con,"insert into podcast_cat (uid,name)
				values('$uid','$name')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	else if($_POST['type'] == "addRPodcast"){
		if(empty($_POST['title']) || empty($_POST['details']) || empty($_POST['link'])){
			echo 'null';
		}
		else{
			$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  			$dd = $date->format('Y-m-d G:i:s');
  			$date2 = gmdate('l, d F Y');
			$uid = uniqid().time();
			$title = mysqli_real_escape_string($con,$_POST['title']);
			$link = mysqli_real_escape_string($con,$_POST['link']);
			$details = mysqli_real_escape_string($con,$_POST['details']);
			$insert = mysqli_query($con,"insert into recent_podcast (uid,title,details,link,status,date,date2)
				values('$uid','$title','$details','$link','on','$dd','$date2')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	else if($_POST['type'] == "addMusic"){
		$pin = substr(str_shuffle("0123456789"), 0,6);
		$uu = substr(str_shuffle("0123456789abcdefghijklmnpqrstuvwxyz"), 0,12);
		$uid = uniqid().$uu;

		if(empty($_POST['art']) || empty($_POST['artist']) || empty($_POST['title']) || empty($_POST['download']) || empty($_POST['genres'])){
			echo 'null';
		}
		else{
				$artist = mysqli_real_escape_string($con,$_POST['artist']);
				$title = mysqli_real_escape_string($con,$_POST['title']);
				$link = mysqli_real_escape_string($con,$_POST['link']);
				$download = mysqli_real_escape_string($con,$_POST['download']);
				$genres = mysqli_real_escape_string($con,$_POST['genres']);

				$details = str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $_POST['details']);
				$details = str_replace('style="width: 300px;"', 'style="width: 100%;"', $details);

				$title_uid = str_replace(' ', '_', $title);
				$title_uid = str_replace('&', '_', $title_uid);

				$title_uid = strtolower($title_uid);

				$title_uid = $title_uid.time();

				$img3 = $_POST['art'];
				$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "musics/art/".$title_uid.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/musics/art/".$title_uid.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				$uu2 = substr(str_shuffle("abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0,10);


           	$code = "";
           	if(empty($_POST['uuid'])){
           		$code = $uu2;
           	}
           	else{

           		$uuid = $_POST['uuid'];

           		$code = $uuid;
           	}


				if($success3){
					//&& $_FILES['file']['error'] == 0
					if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
						$allowed = array('mp3', 'm4a', 'ogg','wav','acc','raw','wma','m4p','3gp');

						$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

						//$uid = uniqid().time();

						if ($_FILES["file"]["size"] > 20097152) {
						    echo "size";
						    unlink($file3);
						    
						}
						else{

							if(!in_array(strtolower($extension), $allowed)){
							echo 'format';
							unlink($file3);
							
							}
							else{
								$name = mysqli_real_escape_string($con,$_POST['name']);

								if(move_uploaded_file($_FILES['file']['tmp_name'], 'musics/audio/'.$title_uid.'.'.$extension)){

									$audio = 'musics/audio/'.$title_uid.'.'.$extension;
									
									$insert = mysqli_query($con, "insert into new_release (uid, uuid, artist_name, track_name, track_link, track_desc, art, download,genres)
										values('$title_uid','$code','$artist','$title','$audio','$description','$file33','$download','$genres')");

									if($insert){
										echo 'success';
									}
									else{
										echo 'error';
										unlink($file3);
									}

								}
								else{
									echo 'upload';
									unlink($file3);
								}
							}
						}

						
					}
					else{
						echo 'audio';
						unlink($file3);
					}

				}
				else{
					echo 'image_error';
				}
		}

	}
	else if($_POST['type'] == "addPodcast"){
		$pin = substr(str_shuffle("0123456789"), 0,6);
		$uu = substr(str_shuffle("0123456789abcdefghijklmnpqrstuvwxyz"), 0,12);
		$uid = uniqid().$uu;

		if(empty($_POST['art']) || empty($_POST['guest']) || empty($_POST['title']) || empty($_POST['download']) || empty($_POST['cat'])){
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

				$title_uid = str_replace(' ', '_', $title);
				$title_uid = str_replace('&', '_', $title_uid);

				$title_uid = strtolower($title_uid);

				$title_uid = $title_uid.time();

				$img3 = $_POST['art'];
				$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "podcasts/art/".$title_uid.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/podcasts/art/".$title_uid.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				$uu2 = substr(str_shuffle("abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0,10);


           	$code = "";
           	if(empty($_POST['uuid'])){
           		$code = $uu2;
           	}
           	else{

           		$uuid = $_POST['uuid'];

           		$code = $uuid;
           	}


				if($success3){
					//&& $_FILES['file']['error'] == 0
					if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
						$allowed = array('mp3', 'm4a', 'ogg','wav','acc','raw','wma','m4p','3gp');

						$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

						//$uid = uniqid().time();

						if ($_FILES["file"]["size"] > 20097152) {
						    echo "size";
						    unlink($file3);
						    
						}
						else{

							if(!in_array(strtolower($extension), $allowed)){
							echo 'format';
							unlink($file3);
							
							}
							else{
								$name = mysqli_real_escape_string($con,$_POST['name']);

								if(move_uploaded_file($_FILES['file']['tmp_name'], 'podcasts/audio/'.$title_uid.'.'.$extension)){

									$audio = 'podcasts/audio/'.$title_uid.'.'.$extension;
									
									$insert = mysqli_query($con, "insert into podcasts ( uid, uuid, guest, title, audio, details, art, download,cat)
										values('$title_uid','$code','$guest','$title','$audio','$details','$file33','$download','$cat')");

									if($insert){
										echo 'success';
									}
									else{
										echo 'error';
										unlink($file3);
									}

								}
								else{
									echo 'upload';
									unlink($file3);
								}
							}
						}

						
					}
					else{
						echo 'audio';
						unlink($file3);
					}

				}
				else{
					echo 'image_error';
				}
		}

	}
	else if($_POST['type'] == "addCat"){
		if(empty($_POST['name'])){
			echo 'null';
		}
		else{
			$uid = uniqid().time();
			$insert = mysqli_query($con,"insert into category (id,uid,name,details)
				values('','$uid','$_POST[name]','$_POST[details]')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	else if($_POST['type'] == "addNewsUpdate"){
		if(empty($_POST['details'])){
			echo 'null';
		}
		else{
			$uid = uniqid().time();
			$details = mysqli_real_escape_string($con,$_POST['details']);
			$insert = mysqli_query($con,"insert into news_update (id,uid,odr,details)
				values('','$uid','#1','$details')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	else if($_POST['type'] == "addPost"){
		if(empty($_POST['title']) || empty($_POST['details'])){
			echo 'null';
		}
		else{
			if(empty($_POST['art'])){
				echo 'image';
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

				//$blogger = $_POST['blogger'];
				//$username = $_POST['username'];

				//$title_uid = str_replace(' ', '-', $title);
				//$title_uid = str_replace('&', '_', $title_uid);


				$uid = uniqid().time();

				$title_uid = $uid;

				$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  				$dd = $date->format('Y-m-d G:i:s');

  				$pass = substr(str_shuffle("0123456789"), 0,6);

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

						//$date = gmdate('l, d F Y');
						$date = gmdate('F d, Y');

						$insert = mysqli_query($con, "insert into posts (odr,uid,title,thumb,link,details,type,status,title_uid,date,date2)
							values('#1','$uid','$title','$file33','$link','$details','$type','on','$title_uid','$date','$dd')");

						if($insert){

							if(isset($_FILES["gallery"])){
								$countfiles = count($_FILES['gallery']['name']);
								for($i=0; $i<$countfiles; $i++){
										//$uid = uniqid().time();

										$fn = $_FILES['gallery']['name'][$i];
										$fn1 = str_replace(' ', '_', $fn);

										$filename = time().'_'.$fn1;

										$filen = "http://superfm963.com/apps/admin/gallery/".$filename;
										//$flo = $fn1; //$_FILES['file']['name'][$i];
										//$em_list = $em_list.'<li>'.$flo.'</li>';
																		 
																		  // Upload file
										if(!move_uploaded_file($_FILES['gallery']['tmp_name'][$i],'gallery/'.$filename)){
											//echo 'error';
											//array_push($array, 'error');
										}
										else{


											$uid2 = uniqid().time();

											$insert2  = mysqli_query($con, "insert into gallery (uid,puid,picture) values('$uid2','$uid','$filen')");

										}

								}
							}

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
	else if($_POST['type'] == "addNews"){
		if(empty($_POST['title']) || empty($_POST['details'])){
			echo 'null';
		}
		else{
			if(empty($_POST['art'])){
				echo 'image';
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

				//$blogger = $_POST['blogger'];
				//$username = $_POST['username'];

				//$title_uid = str_replace(' ', '-', $title);
				//$title_uid = str_replace('&', '_', $title_uid);

				$uid = uniqid().time();

				$title_uid = $uid;

				$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  				$dd = $date->format('Y-m-d G:i:s');

  				$pass = substr(str_shuffle("0123456789"), 0,6);

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

						//$date = gmdate('l, d F Y');
						$date = gmdate('F d, Y');

						$insert = mysqli_query($con, "insert into news (odr,uid,title,thumb,link,details,type,status,title_uid,date,date2)
							values('#1','$uid','$title','$file33','$link','$details','$type','on','$title_uid','$date','$dd')");

						if($insert){

							if(isset($_FILES["gallery"])){
								$countfiles = count($_FILES['gallery']['name']);
								for($i=0; $i<$countfiles; $i++){
										//$uid = uniqid().time();

										$fn = $_FILES['gallery']['name'][$i];
										$fn1 = str_replace(' ', '_', $fn);

										$filename = time().'_'.$fn1;

										$filen = "http://superfm963.com/apps/admin/gallery/".$filename;
										//$flo = $fn1; //$_FILES['file']['name'][$i];
										//$em_list = $em_list.'<li>'.$flo.'</li>';
																		 
																		  // Upload file
										if(!move_uploaded_file($_FILES['gallery']['tmp_name'][$i],'gallery/'.$filename)){
											//echo 'error';
											//array_push($array, 'error');
										}
										else{


											$uid2 = uniqid().time();

											$insert2  = mysqli_query($con, "insert into gallery (uid,puid,picture) values('$uid2','$uid','$filen')");

										}

								}
							}
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
	else if($_POST['type'] == "addProgram"){
		if(empty($_POST['name'])){
			echo 'null';
		}
		else{
			$name = mysqli_real_escape_string($con,$_POST['name']);
			$puid = uniqid().time();
			$show = $_POST['show'];
			$time = $_POST['time'];
			$oap = $_POST['oap'];
			$len_mon = count($show);

			$insert = mysqli_query($con,"insert into programs (id,uid,name)
				values('','$puid','$name')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}

			for ($i=0; $i < $len_mon; $i++) { 
				$s = $show[$i];
				$t = $time[$i];
				$o = $oap[$i];
				
				if(!empty($s) || !empty($t)){

					$uid = uniqid().time();
					$insert = mysqli_query($con,"insert into shows (odr,uid,puid,title,time,oap)
					values('#1',$uid','$puid','$s','$t','$o')");

				}
			}
		}
	}
	else if($_POST['type'] == "addMoreProgram"){
		if(empty($_POST['puid'])){
			echo 'null';
		}
		else{

			$puid = $_POST['puid'];
			$show = $_POST['show'];
			$time = $_POST['time'];
			$oap = $_POST['oap'];
			$details = $_POST['details'];
			$len_mon = count($show);

			$er = 0;

			for ($i=0; $i < $len_mon; $i++) { 
				$s = $show[$i];
				$t = $time[$i];
				$o = $oap[$i];
				$d = $details[$i];
				
				if(!empty($s) || !empty($t)){

					$uid = uniqid().time();
					$insert = mysqli_query($con,"insert into shows (odr,uid,puid,title,details,time,oap)
					values('#1','$uid','$puid','$s','$d','$t','$o')");

					if($insert){

					}
					else{
						$er++;
					}

				}
			}

			if($er == 0){
				echo 'success';
			}
			else{
				echo 'error';
			}
			
		}
	}
	else if($_POST['type'] == "addBanner"){
		if(empty($_POST['name'])){
			echo 'null';
		}
		else{
			if(empty($_POST['art'])){
				echo 'image';
			}
			else{

				$name = mysqli_real_escape_string($con,$_POST['name']);
				$link = $_POST['link'];


				$uid = uniqid().time();

				$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  				$dd = $date->format('Y-m-d G:i:s');

				$img3 = $_POST['art'];
				$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "banner/".$uid.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/banner/".$uid.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						//$date = gmdate('l, d F Y');
						$date = gmdate('F d, Y');

						$insert = mysqli_query($con, "insert into banner (odr,uid,title,image,link,status)
							values('#1','$uid','$name','$file33','$link','on')");

						if($insert){
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
	else if($_POST['type'] == "addSlider"){
		if(empty($_POST['name'])){
			echo 'null';
		}
		else{
			if(empty($_POST['art'])){
				echo 'image';
			}
			else{

				$name = mysqli_real_escape_string($con,$_POST['name']);
				$link = $_POST['link'];


				$uid = uniqid().time();

				$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  				$dd = $date->format('Y-m-d G:i:s');

				$img3 = $_POST['art'];
				$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "banner/".$uid.'.jpg';
				$file33 = "https://superfm963.com/apps/admin/banner/".$uid.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){

						//$date = gmdate('l, d F Y');
						$date = gmdate('F d, Y');

						$insert = mysqli_query($con, "insert into mobile_slider (odr,uid,title,image,link)
							values('#1','$uid','$name','$file33','$link')");

						if($insert){
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
	else if($_POST['type'] == "addOAP"){
		if(empty($_POST['name']) || empty($_POST['nick']) || empty($_POST['show']) || empty($_POST['details'])){
			echo 'null';
		}
		else{
			if(empty($_POST['art'])){
				echo 'image';
			}
			else{

				$details = str_replace('Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a>', '', $_POST['details']);
				$details = str_replace('style="width: 300px;"', 'style="width: 100%;"', $details);
				//$details = str_replace('#ad1', '<img src="https://golivemeetings.com/goliveblog/admin/uploads/ads1.jpg" style="width:100%;" />', $details);
				//$details = str_replace('#ad2', '<img src="https://golivemeetings.com/goliveblog/admin/uploads/ads2.jpg" style="width:100%;" />', $details);
				$details = mysqli_real_escape_string($con,$details);
				//$title = mysqli_real_escape_string($con,$_POST['title']);
				$name = mysqli_real_escape_string($con,$_POST['name']);
				$nick = mysqli_real_escape_string($con,$_POST['nick']);
				$shows = mysqli_real_escape_string($con,$_POST['show']);


				$uid = uniqid().time();

				$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  				$dd = $date->format('Y-m-d G:i:s');

				$img3 = $_POST['art'];
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

						//$date = gmdate('l, d F Y');
						$date = gmdate('F d, Y');

						$insert = mysqli_query($con, "insert into oaps (odr,uid,name,nick,shows,picture,details)
							values('#1','$uid','$name','$nick','$shows','$file33','$details')");

						if($insert){
							echo 'success';
						}
						else{
							echo 'error'.mysqli_error($con);
						}
					

				}
				else{
					echo 'image_error';
				}
			}
		}
	}
	else if($_POST['type'] == "addAdvert"){
		if(empty($_POST['title']) || empty($_POST['link'])){
			echo 'null';
		}
		else{
			if(empty($_POST['art'])){
				echo 'image';
			}
			else{

				$title = mysqli_real_escape_string($con,$_POST['title']);
				$link = $_POST['link'];
				$cat = $_POST['category'];


				$uid = uniqid().time();

				$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  				$dd = $date->format('Y-m-d G:i:s');

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

						//$date = gmdate('l, d F Y');
						$date = gmdate('F d, Y');

						$insert = mysqli_query($con, "insert into adverts (odr,uid,category,title,image,link,status)
							values('#1','$uid','$cat','$title','$file33','$link','on')");

						if($insert){
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
	else if($_POST['type'] == "addInAdvert"){
		if(empty($_POST['title']) || empty($_POST['link']) || empty($_POST['expire'])){
			echo 'null';
		}
		else{
			if(empty($_POST['art'])){
				echo 'image';
			}
			else{

				$title = mysqli_real_escape_string($con,$_POST['title']);
				$link = $_POST['link'];
				$cat = $_POST['category'];
				$expire = $_POST['expire'];

				$now = date('Y-m-d H:i');
				$exp =  date('Y-m-d H:i', strtotime("+".$expire." days"));
				$uid = uniqid().time();

				$date = new DateTime('now', new DateTimeZone('Africa/Lagos'));
  				$dd = $date->format('Y-m-d G:i:s');

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

						//$date = gmdate('l, d F Y');
						$date = gmdate('F d, Y');

						$insert = mysqli_query($con, "insert into in_adverts (odr,uid,category,title,image,link,days,expire,status)
							values('#1','$uid','$cat','$title','$file33','$link','$expire','$exp','on')");

						if($insert){
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
	else if($_POST['type'] == "addAdmin"){
		if(empty($_POST['name']) || empty($_POST['username'])){
			echo 'null';
		}
		else{
			$uid = uniqid().time();
			$pass = substr(str_shuffle("0123456789"), 0,6);
			$insert = mysqli_query($con,"insert into admins (uid,name,username,password,status)
				values('$uid','$_POST[name]','$_POST[username]','$pass','on')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	else if($_POST['type'] == "addQuote"){
		if(empty($_POST['title']) || empty($_POST['details'])){
			echo 'null';
		}
		else{
			$uid = uniqid().time();
			$details = mysqli_real_escape_string($con,$_POST['details']);
			$insert = mysqli_query($con,"insert into quotes (uid,title,details,status)
				values('$uid','$_POST[title]','$details','on')");
			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
	}
	


?>