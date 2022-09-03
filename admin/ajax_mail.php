<?php
 include('connect.php');
 
 $hour = gmdate("H")+1;
 $time = gmdate(":i:s");
 $date = gmdate("Y-m-d ").$hour.$time;
 if(empty($_POST['post'])){
 	echo 'null';
 }
 else{
//$today = gmdate('Y-m-d');
 	//$date = gmdate('d M Y');
 	//$country = $_POST['country'];
 	$name = mysqli_real_escape_string($con, $_POST['name']);
 	$email = mysqli_real_escape_string($con, $_POST['email']);
 	//$date = mysqli_real_escape_string($con, $_POST['date']);
 	$post = mysqli_real_escape_string($con, $_POST['post']);
 	//$date = mysqli_real_escape_string($con, $_POST['date']);
 	$uuid = mysqli_real_escape_string($con, $_POST['uuid']);
 	$sname = mysqli_real_escape_string($con, $_POST['sname']);
 	$code = mysqli_real_escape_string($con, $_POST['code']);
 	$sender = mysqli_real_escape_string($con, $_POST['sender']);
 	$subject = mysqli_real_escape_string($con, $_POST['subject']);
 
 	$cc = count($names);

 	if(!empty($_POST['uuid'])){

 		$puid = $_POST['uuid'];
 	}
 	else{
 		$puid = uniqid().time();
 	}


        $uid = uniqid().time();

        if(empty($_POST['uuid'])){
            $puid = $uid;
        }


        $insert = mysqli_query($con, "insert into mails (id,uid,puid,name,email,code,sname,sender,subject,comment,date) 
        values('','$uid','$puid','$name','$email','$code','$sname','$sender','$subject','$post','$date')");
        if($insert){

            

                                            $msg = '
                                             
                                             <p>New email from '.$sname.'. Click on this link to view http://srpp.cloveworld.org/mails?uid='.$uid.'</p>

                                             <p> SRPP ADMIN.</p>';

                                             $to = $email;
                                             $from_name = $sname;
                                             //$from_email = "info@futureafricaleadersawards.org";
                                             //$subject = "Africa Day 2016 Registration completed";
                                             $from_email = 'info@cloveworld.org';
                                             $subject = $subject;
                                             $message = $msg;

                                              $headers = 'From: ' .$from_name.' <'.$from_email.'>'. PHP_EOL .
                                                    'Cc: "Williams Brain" <brain4us@gmail.com>' . PHP_EOL .
                                                    //'Cc: "Deola Gbadebo" <dgbadebo.lmps@loveworld360.com>' . PHP_EOL .
                                                    //'Cc: "Pst Yemi Akinwunmi" <pstyemi.lmps@loveworld360.com>' . PHP_EOL .
                                                    //'Cc: "LoveWorld Television Ministry" <info@loveworldtelevisionministry.org>' . PHP_EOL .
                                                    'X-Mailer: PHP-' . phpversion() . PHP_EOL.
                                                    'Content-type: text/html; charset=iso-8859-1';
                                                    if(mail($to, $subject, $message, $headers)){
                                                        echo 'success';
                                                    }
            

        }
        else{
            echo 'error';
        }
 	

 	
 	/*$insert = mysqli_query($con, "insert into comments (id,uid,puid,name,email,code,sname,sender,comment,type,date) 
 		values('','$uid','$uuid', '$name','$email','$code','$sname','$sender','$post','$type','$date')");
 	if($insert){
 		echo 'success';
 	}
 	else{
 		echo 'error';
 	}*/
 }
?>