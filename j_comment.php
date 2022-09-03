<?php
	error_reporting(0);
	include("connect.php");
	$puid = $_REQUEST['puid'];

		$sql = mysqli_query($con,"select * from comments where parent_uid = '$puid' order by id desc");
		$json_reponse = array();
		while($row = mysqli_fetch_array($sql)){
			$row_array['id'] = $row['id'];
			$row_array['uid'] = $row['uid'];
			$row_array['name'] = $row['name'];
			$row_array['email'] = $row['email'];
			$row_array['comment'] = $row['comment'];
			$row_array['puid'] = $row['parent_uid'];
			$row_array['date'] = $row['date'];
			$row_array['country'] = $row['country'];
			array_push($json_reponse,$row_array);
		}
		header('Content-Type: application/json');
		echo '{"Comment":'.json_encode($json_reponse).'}';


		
			$uid = mysqli_real_escape_string($con, $_REQUEST['puid']);
			$sql22 = mysqli_query($con, "select views from networks where uid = '$uid'");
			$row22 = mysqli_fetch_array($sql22);
			$numvv = mysqli_num_rows($sql22);
			if($numvv > 0){
				$view = $row22['views'];
				$vv = $view + 1;
			
				$upd = mysqli_query($con, "update networks set views = '$vv' where uid = '$uid'");

				$hour = gmdate("h")+1;
				$time = gmdate(":i a");
				$date = gmdate("M-d-Y ").$hour.$time;
				$date2 = gmdate('Y-m-d');

				$ip = $_SERVER['REMOTE_ADDR'];

				$ch = curl_init();
				curl_setopt ($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

				$html = curl_exec($ch);
				curl_close($ch);

				$result = json_decode($html,true);
				
				$country = $result["geoplugin_countryName"];

				if(empty($country)){
					
					$ch = curl_init();
					curl_setopt ($ch, CURLOPT_URL, "http://api.ipstack.com/".$ip."?access_key=65be17edbe69aee03f680163e105b122");
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

					$html = curl_exec($ch);
					curl_close($ch);

					$result = json_decode($html,true);
					
					$country = $result["country_name"];
				}

				$sqlu = mysqli_query($con,"select fingerprint from app_visitors where ip = '$ip' limit 1");
				$rowu = mysqli_fetch_array($sqlu);
				$email = $rowu['fingerprint'];

				$uid2 = uniqid().time();

				$insert = mysqli_query($con, "insert into all_viewers (id,uid,uuid,email,ip,country,date,date2) values('','$uid2','$uid','$email','$ip','$country','$date2','$date')");
			}
	
?>