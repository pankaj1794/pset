<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];
    $p;
    // TODO: search database for places matching $_GET["geo"], store in $places
   
     //$s=strrpos( $_GET["geo"] , " ");
     $c=strrpos( $_GET["geo"] , ",");
    
    if($c!=false)
    {
        $p=substr($_GET["geo"],$c+1);
    }
    else
    {
        $p="";
    }
    $p = preg_replace('/\s+/', '', $p);
     $places=CS50::query("SELECT * FROM places WHERE MATCH(postal_code, place_name) AGAINST (?) OR MATCH(admin_name1) AGAINST (?)", $_GET["geo"],$p);
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>