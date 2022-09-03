<?php
include("connect.php");

//echo $name = $_POST['name'];

	$sql = mysqli_query($con,"select email from users where email = '$_REQUEST[email]'");
	$row = mysqli_fetch_array($sql);
	$num = mysqli_num_rows($sql);

	if($num > 0){

		echo "success";
	
		
	}
	else{					
							$pin = substr(str_shuffle("0123456789"), 0,6);

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
								if(empty($city)){
									$city = $result["city"];
								}
								

							}
					$uid = uniqid().time();

					$insert = mysqli_query($con, "insert into users (id,uid,name,email,country,ip,ip_country,city,uuid,device) 
					values('','$uid','$_REQUEST[name]','$_REQUEST[email]','$_REQUEST[country]','$ip','$country','$city','$_REQUEST[uuid]','$_REQUEST[device]')");
					if($insert){
						
						    echo "success";
					}
					else{
							echo "error";
					}
	}

?>