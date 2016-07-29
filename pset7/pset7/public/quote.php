<?php
 require("../includes/config.php"); 
 if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Search Quote"]);
    }
     else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stock=lookup($_POST["symbol"]);
       if($stock==false)
       {
           apologize("stocks not found please other symbol");
       }
       else
       {
           $price=$stock["price"];
           $symbol=$stock["symbol"];
           $name=$stock["name"];
           render("quote_print.php",["name" => $name,"price" => $price,"symbol" => $symbol]);
           
           
       }
    }

?>