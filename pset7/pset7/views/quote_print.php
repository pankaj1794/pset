<? php
 require("../includes/config.php"); 
?>

<h2> <?php print $name; ?><?php print"({$symbol})"; ?> </h2>
<h1> <?php  $english_format_number = number_format($price, 2, '.', ''); print "Price:{$english_format_number}"; ?> </h1>


