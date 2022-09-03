<?php
	error_reporting(0);
	include("connect.php");

	if(empty($_REQUEST['comment']) || empty($_REQUEST['name']) || empty($_REQUEST['email'])){

	}
	else{
		$uid = uniqid();
		$puid = mysqli_real_escape_string($con, $_REQUEST['puid']);
		$name = mysqli_real_escape_string($con, $_REQUEST['name']);
		//$country = mysqli_real_escape_string($con, $_REQUEST['country']);
		$email = mysqli_real_escape_string($con, $_REQUEST['email']);
		$comment = mysqli_real_escape_string($con, $_REQUEST['comment']);
		$device = $_REQUEST['device'];

		$ip = $_SERVER['REMOTE_ADDR'];

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

		$html = curl_exec($ch);
		curl_close($ch);

		$result = json_decode($html,true);
		
		$country = $result["geoplugin_countryName"];
		$city = $result["geoplugin_city"];

		if(empty($country)){
			
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, "http://api.ipstack.com/".$ip."?access_key=65be17edbe69aee03f680163e105b122");
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

			$html = curl_exec($ch);
			curl_close($ch);

			$result = json_decode($html,true);
			
			$country = $result["country_name"];
			$city = $result["city"];
		}
		
		$d = "";
		$date =  $_REQUEST['date'];
		if(empty($date)){
			$h = gmdate('H');
			$h = $h + 1;
			$ms = gmdate(':i:s');
			$dd =  gmdate('Y-m-d ').$h.$ms;
		}
		else{
			$dd =  $_REQUEST['date'];
		}

		if($_REQUEST['type'] == "comments"){

			$insert = mysqli_query($con, "insert into comments (id, uid, puid, name, email, country, comment,device,date)
			values('0', '$uid','$puid', '$name', '$email','$country', '$comment','$device','$_REQUEST[date]')");

			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}
		else if($_REQUEST['type'] == "news"){

			$insert = mysqli_query($con, "insert into news_comments (id, uid, puid, name, email, country, comment,device,date)
			values('0', '$uid','$puid', '$name', '$email','$country', '$comment','$device','$_REQUEST[date]')");

			if($insert){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}

		
	}
?>