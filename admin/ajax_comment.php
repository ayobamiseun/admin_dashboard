<?php
 include('connect.php');
 $uid = uniqid().time();
 $hour = gmdate("H")+1;
 $time = gmdate(":i:s");
 //$date = gmdate("Y-m-d ").$hour.$time;
 if(empty($_POST['post'])){
 	echo 'null';
 }
 else{
//$today = gmdate('Y-m-d');
 	//$date = gmdate('d M Y');
 	//$country = $_POST['country'];
 	$name = mysqli_real_escape_string($con, $_POST['name']);
 	$email = mysqli_real_escape_string($con, $_POST['email']);
 	$date = mysqli_real_escape_string($con, $_POST['date']);
 	$post = mysqli_real_escape_string($con, $_POST['post']);
 	//$date = mysqli_real_escape_string($con, $_POST['date']);
 	$uuid = mysqli_real_escape_string($con, $_POST['uuid']);
 	$sname = mysqli_real_escape_string($con, $_POST['sname']);
 	$code = mysqli_real_escape_string($con, $_POST['code']);
 	$sender = mysqli_real_escape_string($con, $_POST['sender']);
 	$type = mysqli_real_escape_string($con, $_POST['type']);
 	$insert = mysqli_query($con, "insert into comments (id,uid,puid,name,email,code,sname,sender,comment,type,date) 
 		values('','$uid','$uuid', '$name','$email','$code','$sname','$sender','$post','$type','$date')");
 	if($insert){
 		echo 'success';
 	}
 	else{
 		echo 'error';
 	}
 }
?>