<?php 
	
	//include('connect.php');

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

	if(empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['message'])){
		echo 'null';
	}
	else{
											$name = $_REQUEST['name'];
											$email = $_REQUEST['email'];
											$message = $_REQUEST['message'];
                                            $phone = $_REQUEST['phone'];

											 $msg = '
											 <p><b>Message : </b> '.$message.'</p>
                                             <p><b>Name : </b> '.$name.' </p>

                                             <p><b>Email : </b> '.$email.'</p>
        
                                              <p><b>Phone : </b> '.$phone.'</p>

                                             <p><b>Country : </b> '.$country.'</p>

                                             

                                             <p></p>';


											$to = 'info@superfm963.com';
                                             $from_name = $name;
                                             //$from_email = "info@futureafricaleadersawards.org";
                                             //$subject = "Africa Day 2016 Registration completed";
                                             $from_email = $email;
                                             $subject = "Contact : SuperFm 96.3";
                                             $message = $msg;

                                              $headers = 'From: ' .$from_name.' <'.$from_email.'>'. PHP_EOL .
                                                    'Bcc: "Dev" <brain4us@gmail.com>' . PHP_EOL .
                                                    'Cc: "Deola Gbadebo" <dgbadebo.lmps@loveworld360.com>' . PHP_EOL .
                                                    'Cc: "Pastor Yemi" <pastoryemmie@gmail.com>' . PHP_EOL .
                                                    'X-Mailer: PHP-' . phpversion() . PHP_EOL.
                                                    'Content-type: text/html; charset=iso-8859-1';
                                                    if(mail($to, $subject, $message, $headers)){

                                                        echo 'success';
                                                    }
                                                    else{
                                                         echo 'error';
                                                    }

	}

?>
