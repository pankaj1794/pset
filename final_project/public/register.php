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
                    if($_POST["password"]==$_POST["confirmation"])
                    {
						$c=CS50::query("SELECT * from student1 WHERE username=?",$_POST["username"]);
						if($c==false)
						{	
							$rows = CS50::query("INSERT IGNORE into student1(first_name,last_name,email,username, password,ssc_marks,hsc_marks,gender) VALUES(?,?,?,?,?,?,?,?)", $_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["username"],password_hash($_POST["password"],PASSWORD_DEFAULT),$_POST["ssc"],$_POST["hsc"],$_POST["gender"]);
							if($rows==0)
							{
								apologize("sudent not registered");
							}
							
							$row1 = CS50::query("SELECT LAST_INSERT_ID() AS id");
                        
                            
                            $id=$row1[0]["id"];
                            $_SESSION["id"]=$id;
							CS50::query("insert into merit(student_id) Values(?)",$_SESSION["id"]);
                            redirect("../public/index.php");
                             
                        
                        }
						else
						{
							apologize("username already exist pls select another one!");
						}
                    }
                    else
                    {
                        apologize("password and confirm password does not match!");
                        
                    }
    }
                
                    
        
    

?>