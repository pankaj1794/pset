<?php

    // configuration
    require("../includes/config.php"); 
    
    
    require("libphp-phpmailer/class.phpmailer.php");
    $info = [];
    
    $rows=CS50::query("SELECT symbol,shares from portfolios where user_id=?",$_SESSION["id"]);
    
    
   
   
    foreach ($rows as $row)
    {
      $stock = lookup($row["symbol"]);
     if ($stock !== false)
     {
             $info[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            
            ];
    }
   
    }
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
         render("sell_form.php", ["info" => $info, "title" => "Sell Stocks"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Please provide symbol");
        }
        else
        {$flag=0;
        $share=0;
        $name;
         $rows=CS50::query("SELECT symbol,shares from portfolios where user_id=?",$_SESSION["id"]);
            foreach($rows as $row)
            {
                if($row["symbol"]==strtoupper($_POST["symbol"]))
                {
                    
                    $symbol=strtoupper($row["symbol"]);            
                    $share=$row["shares"];   
                    $flag=1;
                    break;
                }
            }$p;
            if($flag==1)
            {
                $stock=lookup($symbol);
                $name=$stock["name"];
                $p=$stock["price"];
                $price=$stock["price"]*$share;
                $up=CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?",$price,$_SESSION["id"]);
                $del=CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?",$_SESSION["id"],$symbol);
                $sel=CS50::query("SELECT cash from users WHERE id = ?",$_SESSION["id"]);
                $email=CS50::query("SELECT email from users WHERE id = ?",$_SESSION["id"]);
                $d=CS50::query("INSERT into history (user_id,transcation,symbol,shares,price,datetime) VALUES(?,'SELL',?,?,?,now())",$_SESSION["id"],$symbol,$share,$stock["price"]);
                $price1=$sel[0]["cash"];
                
                if($up!=false && $del!=false)
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
                        $mail->Subject="Sold Stocks";
                        $mail->Body="hello,\n you sold {$share} shares of {$name} ({$symbol}) \n at price $ {$p} per share \n total you earn while selling shares is $ {$price} \n total now you have in your wallet is $ {$price1} ";
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
                    apologize("transcation error please retry");
            }
            else
            {
                apologize("Invalid Symbol please re enter symbol");
            }
        }
    }

?>