<?php

    // configuration
    require("../includes/config.php"); 
    
    if($_SESSION["id"]==-1)
	{
		redirect("../public/login.php");
	}
    
    
    // render portfolio
   render("../views/index_print.php", ["title" => "main_page"]);


?>
