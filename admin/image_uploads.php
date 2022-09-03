<?php 
				
				$uid = uniqid().time();
				$img3 = $_POST['file'];
				//$time = time();
				$img3 = str_replace('data:image/jpeg;base64,', '', $img3);
				$img3 = str_replace('data:image/jpg;base64,', '', $img3);
				$img3 = str_replace('data:image/png;base64,', '', $img3);
				$img3 = str_replace('data:image/gif;base64,', '', $img3);
				$img3 = str_replace(' ', '+', $img3);
				$data3 = base64_decode($img3);
				$file3 = "uploads/".$uid.'.jpg';
				$file33 = "http://superfm963.com/apps/admin/uploads/".$uid.'.jpg';
				//$file2 = $uid.$time.'.jpg';
				$success3 = file_put_contents($file3, $data3);

				if($success3){
					echo $file33;
				}
				else{
					echo 'error';
				}

				//echo $_POST['file'];


?>