  <?php
  require("../includes/config.php");
  $rows=CS50::query("SELECT transcation,symbol,shares,price,datetime from history where user_id=?",$_SESSION["id"]);
   if($rows!=false)
   {
    foreach ($rows as $row)
    {
     
             $positions[] = [
            "transcation" => $row["transcation"],
            "symbol" => $row["symbol"],
            "shares" => $row["shares"],
            "price" => $row["price"],
            "datetime" => $row["datetime"]
            ];
    
    }
    }
    
    
    
    // render portfolio
   render("history_view.php", ["positions" => $positions, "title" => "Portfolio"]);

  ?>
  