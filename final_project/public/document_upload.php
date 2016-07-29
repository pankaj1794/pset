<?php

    // configuration
    require("../includes/config.php"); 
    
			$contents = file_get_contents("../config.json");
            if ($contents === false)
            {
                trigger_error("Could not read {$path}", E_USER_ERROR);
            }

            // decode contents of configuration file
            $config = json_decode($contents, true);
            if (is_null($config))
            {
                trigger_error("Could not decode {$path}", E_USER_ERROR);
            }
   
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
       render("document_form.php", ["result" => "","title" => "Document Upload"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
   
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$result;
		$max=10000000;
		if(getimagesize($_FILES["tenth"]["tmp_name"])!=false && getimagesize($_FILES["twelveth"]["tmp_name"])!=false)
		{
		if((!isset($_FILES['tenth'])) || (!isset($_FILES['twelveth'])))
		{
			$result="please select image";
		}
		else
		{	
		if($_FILES["twelveth"]["size"]<$max && $_FILES["tenth"]["size"]<$max)
		{
			
				
		$host = $config["database"]["host"];
		$user = $config["database"]["username"];
		$pass = $config["database"]["password"];
		$dbname=$config["database"]["name"];
		$conn = mysqli_connect($host, $user, $pass, $dbname);

		
// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
		else
		{
		$q="";
		$image=addslashes (file_get_contents($_FILES['tenth']['tmp_name']));
		$image1=addslashes (file_get_contents($_FILES['twelveth']['tmp_name']));		
		$name1=addslashes($_FILES["twelveth"]["name"]);		
		$name=addslashes($_FILES["tenth"]["name"]);
		$stype=$_FILES["tenth"]["type"];
		$htype=$_FILES["twelveth"]["type"];
	    //$image=base64_encode($image);
		//$image1=base64_encode($image1);
		$c=CS50::query("select * from image where student_id=?",$_SESSION["id"]);
		if($c==false)
		{
			$q="INSERT INTO image (student_id,ssc_image,ssc_name,hsc_image,hsc_name,ssc_type,hsc_type)  VALUES('{$_SESSION['id']}','{$image}','{$name}','{$image1}','{$name1}','{$stype}','{$htype}')";
		}
		else
		{
			$q="update image SET ssc_image='{$image}',ssc_name='{$name}',hsc_image='{$image1}',hsc_name='{$name1}',ssc_type='{$stype}',hsc_type='{$htype}'  where student_id='{$_SESSION["id"]}'";
		}
		if(mysqli_query($conn, $q))
		{
			$result="<h4>Successfully uploaded</h4>";
			

		}
		else
		{
			$result="failure";
		}
		mysqli_close($conn);
		}	
		}
		else
		{
			$result="image should not be greater then 10mb";
		}
		}
		}
	else
	{
		$result="invalid image";
	}
		
		render("document_form.php", ["result" => $result,"title" => "Document Upload"]);
		
	}
	
   
    
   ?>