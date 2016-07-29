<?php

    // configuration
    require("../includes/config.php"); 
    
    
    $positions = [];
    
    $rows=CS50::query("SELECT symbol,shares from portfolios where user_id=?",$_SESSION["id"]);
    
    
    $row1=CS50::query("SELECT cash from users where id=?",$_SESSION["id"]);
   if($rows!=false)
   {
    foreach ($rows as $row)
    {
      $stock = lookup($row["symbol"]);
     if ($stock !== false)
     {
             $positions[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            
            ];
    }
    }
    }
    
    $cash=$row1[0]["cash"];
    
    // render portfolio
   render("portfolio.php", ["positions" => $positions,"cash"=>$cash, "title" => "Portfolio"]);


?>
