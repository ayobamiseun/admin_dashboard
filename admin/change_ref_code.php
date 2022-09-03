<?php 
	
	include('connect.php');
	$ref = $_REQUEST['ref'];
	$code = $_REQUEST['code'];
	
	//$sql2 = mysqli_query($con, "select id from userLive where ref = '$code'");
	$upd = mysqli_query($con, "update srpp_users set code = '$code' where code = '$ref'");
	if($upd){
		echo 'success';
	}
	else{
		echo 'error';
	}
	

?>