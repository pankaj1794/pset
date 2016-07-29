<?php

    // configuration
    require("../includes/config.php"); 
    
    require("libphp-phpmailer/class.phpmailer.php");
    

   
    
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
         render("buy_form.php", [ "title" => "Sell Stocks"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Please provide symbol");
        }
        else
        {
            if(empty($_POST["shares"]))
            {
                apologize("Please provide number of shares to buy");
            }
            else{
            
                if(preg_match("/^\d+$/", $_POST["shares"]))
                {
                    $row1=CS50::query("SELECT cash from users where id=?",$_SESSION["id"]);
                    $cash=$row1[0]["cash"];
                    $stock=lookup($_POST["symbol"]);
                    $name;
                    if($stock!=false)
                    {   $name=$stock["name"];
                        $symbol=strtoupper($_POST["symbol"]);
                        $price=$stock["price"];
                        $total=$price*$_POST["shares"];
                        if($cash>=$total)
                        {
                               $l=CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",$_SESSION["id"],$symbol,$_POST["shares"]);
                                $j=CS50::query("update users SET cash=cash-? where id=?",$total,$_SESSION["id"]);
                                $d=CS50::query("INSERT into history (user_id,transcation,symbol,shares,price,datetime) VALUES(?,'BUY',?,?,?,now())",$_SESSION["id"],$symbol,$_POST["shares"],$stock["price"]);
                                $sel=CS50::query("SELECT cash from users WHERE id = ?",$_SESSION["id"]);
                                 $email=CS50::query("SELECT email from users WHERE id = ?",$_SESSION["id"]);
                                if($l!=false && $j!=false)
                                {   $mail=new PHPMailer();
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->Username = "pankajdharia17@gmail.com"; 
                                    $mail->Password="pratpank";
                                    $mail->Port = 587;
                                    $mail->SMTPAuth=true;
                                    $mail->SMTPDebug=2;
                                    $mail->SMTPSecure = 'tls';
                                    $mail->setFrom=("pankajdharia17@gmail.com");
                                    $mail->Subject="Buyed Stocks";
                                     $mail->Body="hello,\n you Buy {$_POST["shares"]} shares of {$name} ({$symbol}) \n at price $ {$price} per share \n total you spent while buying shares is $ {$total}\n total now you have in your wallet is $ {$sel[0]["cash"]} ";

                                    $mail->addAddress($email[0]["email"]);
                                    
                                    if($mail->Send())
                                    {
                                        redirect("/");    
                                    }
                                    else
                                    {
                                        apologize("Shares buyed successfulle but not able to send email due to technical error");
                                    }
                                    
                                    
                                }
                                else
                                {
                                    apologize("Values not inserted!");
                                }
                                
                            
                        }
                        else
                        {
                            apologize("Not enough money to buy this shares!");
                        }
                    }
                    else
                    {
                        apologize("Please provide a valid symbol");
                    }
                    
                }
            }
    }
    }

?>