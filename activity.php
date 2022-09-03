<?php
	include('connect.php');
	//echo $_POST['fingerprint'].' (dddddd)';
	//if(!empty($_REQUEST['email'])){

		$hour = gmdate("h")+1;
		$time = gmdate(":i a");
		$date = gmdate("M-d-Y ").$hour.$time;

		$date2 = gmdate('Y-m-d');

		$uuid = $_REQUEST['uuid'];
		$finger = $_REQUEST['email'];
		$device = $_REQUEST['device'];
		//$country = $_POST['country'];

		if(empty($finger)){
			$finger = $uuid;
		}

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

		$insert = mysqli_query($con, "insert into app_visitors (id, fingerprint, uuid, ip, country,city, date, date2,device)
			values('0','$finger', '', '$ip', '$country','$city', '$date','$date2','$device')");



	//}

?>
