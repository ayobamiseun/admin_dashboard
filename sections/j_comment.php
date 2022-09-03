<?php 
	include('connect.php');

	function time_ago( $date )
	{
	    if( empty( $date ) )
	    {
	        return "No date provided";
	    }

	    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

	    $lengths = array("60","60","24","7","4.35","12","10");

	    $now = time();

	    $unix_date = strtotime( $date );

	    // check validity of date

	    if( empty( $unix_date ) )
	    {
	        return "Bad date";
	    }

	    // is it future date or past date

	    if( $now > $unix_date )
	    {
	        $difference = $now - $unix_date;
	        $tense = "ago";
	    }
	    else
	    {
	        $difference = $unix_date - $now;
	        $tense = "from now";
	    }

	    for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
	    {
	        $difference /= $lengths[$j];
	    }

	    $difference = round( $difference );

	    if( $difference != 1 )
	    {
	        $periods[$j].= "s";
	    }

	    return "$difference $periods[$j] {$tense}";

	}

	if(empty($_REQUEST['uu'])){
		$array = array();
		$post = $_REQUEST['group_id'];
		$uuid = $_REQUEST['uuid'];
		$check = mysqli_query($con, "select uid from comments where puid ='$uuid' ");
		$num = mysqli_num_rows($check);
		$sql = mysqli_query($con, "select * from comments where puid = '$uuid' order by id desc limit 50");
		while ( $row = mysqli_fetch_array($sql)) {
			$d = explode(' ', $row['date']);

			$nn = $row['name'];
			$st = substr($nn,0,1);
			$array_row['st'] = $st;
			$array_row['uid'] = $row['uid'];
			$array_row['name'] = $row['name'];
			$array_row['email'] = $row['email'];
			$array_row['post'] = $row['comment'];
			$array_row['sender'] = $row['sender'];
			$array_row['sname'] = $row['sname'];
			$array_row['date'] = $d[0];
			$array_row['all'] = $num;

			array_push($array, $array_row);
		}
		header('Content-Type: application/json');
		echo '{"Chat":'.json_encode($array).'}';
	}
	else{
		$array = array();
		$uu = $_REQUEST['uu'];
		$uuid = $_REQUEST['uuid'];
		$check = mysqli_query($con, "select uid from comments where puid ='$uuid' ");
		$num = mysqli_num_rows($check);
		$cal = $num - $uu;
		if($cal < 0){
			$cal = $cal;
		}
		else{
			$cal = $cal;
		}
		$sql = mysqli_query($con, "select * from comments where puid = '$uuid' order by id desc limit $cal");
		while ( $row = mysqli_fetch_array($sql)) {
			$d = explode(' ', $row['date']);
			$nn = $row['name'];
			$st = substr($nn,0,1);
			$array_row['st'] = $st;
			$array_row['uid'] = $row['uid'];
			$array_row['name'] = $row['name'];
			$array_row['email'] = $row['email'];
			$array_row['post'] = $row['comment'];
			$array_row['sender'] = $row['sender'];
			$array_row['sname'] = $row['sname'];
			$array_row['date'] = $d[0];
			$array_row['all'] = $num;

			array_push($array, $array_row);
		}
		header('Content-Type: application/json');
		echo '{"Chat":'.json_encode($array).'}';
	}


?>