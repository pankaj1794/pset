<?php
 require("../includes/config.php"); 
  if ($_SERVER["REQUEST_METHOD"] == "GET")
  {
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
			$host = $config["database"]["host"];
		$user = $config["database"]["username"];
		$pass = $config["database"]["password"];
		$dbname=$config["database"]["name"];
		$conn = mysqli_connect($host, $user, $pass, $dbname);
		$r1=mysqli_query($conn, "select * from image where student_id='{$_SESSION["id"]}'");
		$row=mysqli_fetch_array($r1,MYSQLI_ASSOC);
		if($_GET["name"]=="scc_image")
			header("content-type:'{$row["ssc_type"]}'");
		else
			header("content-type:'{$row["hsc_type"]}'");

		//$image=base64_decode($row["ssc_image"]);
		echo $row[$_GET["name"]];
  }

?>