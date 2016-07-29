<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
   
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if(!empty($_POST["password"]))
        {
            if(!empty($_POST["confirmation"]))
            {
                if(!empty($_POST["username"]))
                {
                    if($_POST["password"]==$_POST["confirmation"])
                    {
                        $rows = CS50::query("INSERT IGNORE into users(username, hash, cash,email) VALUES(?,?,10000.0000,?)", $_POST["username"],password_hash($_POST["password"],PASSWORD_DEFAULT),$_POST["email"]);
                        if($rows==0)
                        {
                            apologize("username already exist pls select another one!");
                        }
                        
                        $row1 = CS50::query("SELECT LAST_INSERT_ID() AS id");
                        
                            
                            $id=$row1[0]["id"];
                            $_SESSION["id"]=$id;
                            redirect("/");
                             
                        
                        
                    }
                    else
                    {
                        apologize("password and confirm password does not match!");
                        
                    }
                }
                
                else
                {
                    apologize("please provide username!");
                }
            }
            else
            {
                    apologize("please provide confirm password!");        
            }
            
        }
        else
        {
            apologize("please provide password");   
        }
        
        
        
        
        
    }

?>