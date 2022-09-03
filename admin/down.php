<?php
//error_reporting(0);
session_start();
//if(!isset($_SESSION['down']))
//header('location:download1.php');	
//else{
//$id = $_SESSION['down'];
//$myfile = 'messages/Perfection and Excellence Pt 1 by Pastor Chris.mp3';
$file_path  = $_REQUEST['file'];
//$file_path = "uploads/videos/BOBO.MP4";
$path_parts = pathinfo($file_path);
$file_name  = $path_parts['basename'];
$file_ext   = $path_parts['extension'];
//$file_path  = './myfiles/' . $file_name;

// allow a file to be streamed instead of sent as an attachment
//$is_attachment = isset($_REQUEST['stream']) ? false : true;
$is_attachment = isset($_REQUEST['stream']) ? false : true;

// make sure the file exists
if (is_file($file_path))
{
	$file_size  = filesize($file_path);
	$file = @fopen($file_path,"rb");
	
		// set the headers, prevent caching
		header("Pragma: public");
		header("Expires: -1");
		header("Cache-Control: public, must-revalidate, post-check=0, pre-check=0");
		header("Content-Disposition: attachment; filename=\"$file_name\"");

        // set appropriate headers for attachment or streamed file
        if ($is_attachment) {
                header("Content-Disposition: attachment; filename=\"$file_name\"");
        }
        else {
                header('Content-Disposition: inline;');
                header('Content-Transfer-Encoding: binary');
        }

        // set the mime type based on extension, add yours if needed.
        $ctype_default = "application/octet-stream";
        $extension = strtolower(end(explode('.',$file_name))); 

                /* List of File Types */ 
                $fileTypes['swf'] = 'application/x-shockwave-flash'; 
                $fileTypes['pdf'] = 'application/pdf'; 
                $fileTypes['exe'] = 'application/octet-stream'; 
                $fileTypes['zip'] = 'application/zip'; 
                $fileTypes['doc'] = 'application/msword'; 
                $fileTypes['xls'] = 'application/vnd.ms-excel'; 
                $fileTypes['ppt'] = 'application/vnd.ms-powerpoint'; 
                $fileTypes['gif'] = 'image/gif'; 
                $fileTypes['png'] = 'image/png'; 
                $fileTypes['jpeg'] = 'image/jpg'; 
                $fileTypes['jpg'] = 'image/jpg'; 
                $fileTypes['rar'] = 'application/rar';     

                $fileTypes['ra'] = 'audio/x-pn-realaudio'; 
                $fileTypes['ram'] = 'audio/x-pn-realaudio'; 
                $fileTypes['ogg'] = 'audio/x-pn-realaudio'; 

                $fileTypes['wav'] = 'video/x-msvideo'; 
                $fileTypes['wmv'] = 'video/x-msvideo'; 
                $fileTypes['avi'] = 'video/x-msvideo'; 
                $fileTypes['asf'] = 'video/x-msvideo'; 
                $fileTypes['divx'] = 'video/x-msvideo'; 

                $fileTypes['mp3'] = 'audio/mpeg'; 
                $fileTypes['mp4'] = 'audio/mpeg'; 
                $fileTypes['mpeg'] = 'video/mpeg'; 
                $fileTypes['mpg'] = 'video/mpeg'; 
                $fileTypes['mpe'] = 'video/mpeg'; 
                $fileTypes['mov'] = 'video/quicktime'; 
                $fileTypes['swf'] = 'video/quicktime'; 
                $fileTypes['3gp'] = 'video/quicktime'; 
                $fileTypes['m4a'] = 'video/quicktime'; 
                $fileTypes['aac'] = 'video/quicktime'; 
                $fileTypes['m3u'] = 'video/quicktime'; 

                $contentType = $fileTypes[$extension]; 
				
        header("Content-Type: " . $contentType);

		//check if http_range is sent by browser (or download manager)
		if(isset($_SERVER['HTTP_RANGE']))
		{
			list($size_unit, $range_orig) = explode('=', $_SERVER['HTTP_RANGE'], 2);
			if ($size_unit == 'bytes')
			{
				//multiple ranges could be specified at the same time, but for simplicity only serve the first range
				//http://tools.ietf.org/id/draft-ietf-http-range-retrieval-00.txt
				list($range, $extra_ranges) = explode(',', $range_orig, 2);
			}
			else
			{
				$range = '';
				header('HTTP/1.1 416 Requested Range Not Satisfiable');
				exit;
			}
		}
		else
		{
			$range = '';
		}

		//figure out download piece from range (if set)
		list($seek_start, $seek_end) = explode('-', $range, 2);

		//set start and end based on range (if set), else set defaults
		//also check for invalid ranges.
		$seek_end   = (empty($seek_end)) ? ($file_size - 1) : min(abs(intval($seek_end)),($file_size - 1));
		$seek_start = (empty($seek_start) || $seek_end < abs(intval($seek_start))) ? 0 : max(abs(intval($seek_start)),0);
	 
		//Only send partial content header if downloading a piece of the file (IE workaround)
		if ($seek_start > 0 || $seek_end < ($file_size - 1))
		{
			header('HTTP/1.1 206 Partial Content');
			header('Content-Range: bytes '.$seek_start.'-'.$seek_end.'/'.$file_size);
			header('Content-Length: '.($seek_end - $seek_start + 1));
		}
		else
		  header("Content-Length: $file_size");

		header('Accept-Ranges: bytes');
    
		set_time_limit(0);
		fseek($file, $seek_start);
		
		while(!feof($file)) 
		{
			print(@fread($file, 1024*8));
			ob_flush();
			flush();
			if (connection_status()!=0) 
			{
				@fclose($file);
				exit;
			}			
		}
		
		// file save was a success
		@fclose($file);
		exit;
	
	
}

//include('connect.php');
	
	//$upd = mysql_query("update Downloads set downloaded = 'true' where email = '$id'" );

	//session_destroy();
//}
?>
