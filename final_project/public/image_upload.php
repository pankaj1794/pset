<?php
	ini_set("mysql.connect_timeout",300);
	ini_set("default_socket_timeout",300);
		
		$image1=addslashes($_FILES["twelveth"]["tmp_name"]);
		$name1=addslashes($_FILES["twelveth"]["name"]);
		$image=addslashes($_FILES["tenth"]["tmp_name"]);
		$name=addslashes($_FILES["tenth"]["name"]);
		$image=file_get_contents($image);
		$image1=file_get_contents($image1);
		$image=base64_encode($image);
		$image1=base64_encode($image1);
		$r=CS50::query("INSERT INTO image (student_id,ssc_image,ssc_size,hsc_image,hsc_size) VALUES(?,?,?,?,?)",$_SESSION["id"],$image,$name,$image1,$name1);
		
		if($r==1)
		{
			echo "success";
		}
		else
		{
			echo "failure";
		}
<?