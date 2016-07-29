<?php

    // configuration
    require("../includes/config.php"); 
	$rows=CS50::query("Select * from student1 ORDER BY hsc_marks DESC");
	if($rows==false)
	{
		apologize("Sorry merit list not found");
	}
	else
	{	$ps=[];
		$mno=1;
		foreach($rows as $row)
		{
			$ps[]=array(
				"merit_no" => $mno,
				"first_name"=> $row["first_name"],
				"last_name" => $row["last_name"],
				"username" => $row["username"],
				"email" =>$row["email"],
				"ssc_marks" =>$row["ssc_marks"],
				"hsc_marks" =>$row["hsc_marks"]
			);
			CS50::query("update merit set merit_no=? where student_id=?",$mno,$row["id"]);
			$mno++;
		}
		render("../views/merit_view.php",["ps"=>$ps,"title"=>"meritList"]);
	}
?>