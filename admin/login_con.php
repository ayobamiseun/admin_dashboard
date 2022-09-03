<?php
	include('connect.php');
	session_start();

  if($_POST['type'] == 'login'){
        if(empty($_POST['username']) || empty($_POST['password'])){
            echo 'null';
         }
         else{
              $username = $_POST['username'];
              /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "email";
              }
              else{*/
                $ip = getIPAddress();

                $ch = curl_init();
                curl_setopt ($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

                $html = curl_exec($ch);
                curl_close($ch);

                $result = json_decode($html,true);
                
                $country = $result["geoplugin_countryName"];
                $city = $result["geoplugin_city"];

                //$ip = $_SERVER['REMOTE_ADDR'];

                /*$ch1 = curl_init();
                curl_setopt ($ch1, CURLOPT_URL, "http://geolocation-db.com/json/0f761a30-fe14-11e9-b59f-e53803842572/".$ip);
                curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);

                $html1 = curl_exec($ch1);
                curl_close($ch1);

                $result1 = json_decode($html1,true);
                
                $country = $result1["country_name"];

                $city = $result1["state"];*/


                  $sl = mysqli_query($con, "select id from admins where username = '$_POST[username]' AND password = '$_POST[password]'");
               
                  $num = mysqli_num_rows($sl);

                  if($num > 0){

                        if($country == "Nigeria"){
                            $hour = gmdate("h");
                            $time = gmdate(":i a");
                            $date = gmdate("M-d-Y ").$hour.$time;

                            $date2 = gmdate('Y-m-D h:i:s');

                            $_SESSION['SuperFM963'] = $username;
                            //$emm = $_SESSION['CH1USER'];
                            //setcookie('SuperFM963', $username, time()+60*60*10);

                            echo "success";

                            $insert = mysqli_query($con,"insert into loggers (id,uid,username,ip,country,city) values ('','$uid','$username','$ip','$country','$city')");
                        }
                        else{
                          echo 'access';
                          $insert = mysqli_query($con,"insert into blockers (id,uid,username,ip,country,city) values ('','$uid','$username','$ip','$country','$city')");
                        }
                        
                  }
                  else{
                     echo 'invalid';
                     $insert = mysqli_query($con,"insert into blockers (id,uid,username,ip,country,city) values ('','$uid','$username','$ip','$country','$city')");
                  }
              //}
         }
  }


  function getIPAddress() {  
    
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
         }  
        
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  

        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
        }  
         return $ip;  
    }
  

?>