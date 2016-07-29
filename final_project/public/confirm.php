<?php

    // configuration
    require("../includes/config.php"); 
     require("../includes/PHPMailer-master/PHPMailerAutoload.php");
    //require("../vendor/libphp-phpmailer/class.phpmailer.php");
    

   
    
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
         render("confirm_form.php", [ "result"=>"","title" => "Confirm Admission"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $r=CS50::query("select * from student1 where id=?",$_SESSION["id"]);
		$m=CS50::query("select student_id from image where student_id=?",$_SESSION["id"]);
		$mno=CS50::query("select merit_no from merit where student_id=?",$_SESSION["id"]);
		
		if($m==false)
		{
			$result="Please Upload and Verify your document first";
			
		}
		else
		{
			if($mno[0]["merit_no"]!=$_POST["merit_no"])
			{
				$result="Invalid Merit No";
			}
			else
			{
				if($r[0]["confirm"]==0)
				{
					$im1="\\print_image.php/?name=ssc_image\\";
					$im2="\\print_image.php/?name=hsc_image\\";
					CS50::query("update student1 set confirm=?,cash=? where id=?",1,0.0,$_SESSION["id"]);
					$rows=CS50::query("select * from student1 where id=?",$_SESSION["id"]);
					$rows[0]["id"]=16000000+$rows[0]["id"];
					$body="<!DOCTYPE html>
							<html>
							<head>
							<style>
							table {
							border-collapse: collapse;
							width: 100%;	
							}

							th, td {
							text-align: left;
							padding: 14px 16px;
							}

							tr{ border-bottom: 6px solid #0A436E;
							background-color: lightgrey;}

							th {
							background-color: #4CAF50;
							color: white;
							}
							</style>
							</head>
							<body>
							<p>hello '{$rows[0]["first_name"]}' <br><br>
							congratulations you are Successfully Admitted</p>
							
							
							<table>
							<tr>
							<td>Enrollment Number</td>
							<td>'{$rows[0]["id"]}'</td>
							</tr>
							<tr>
							<td>First Name</td>
							<td>'{$rows[0]["first_name"]}'</td>
							</tr>
							<tr>
							<td>Last Name</td>
							<td>'{$rows[0]["last_name"]}'</td>
							</tr>
							<tr>
							<td>Email</td>
							<td>'{$rows[0]["email"]}'</td>
							</tr>
							<tr>
							<td>UserName</td>
							<td>'{$rows[0]["username"]}'</td>
							</tr>
							<tr>
							<td>10th Class Marks %</td>
							<td>'{$rows[0]["ssc_marks"]}'</td>
							</tr>
							
							<tr>
							<td>12th Class Marks %</td>
							<td>'{$rows[0]["hsc_marks"]}'</td>
							</tr>
							<tr>
							
							<tr>
							<td>Document</td>
							<td>Verfied</td>
							</tr>
							<tr>
							<td>Fees</td>
							<td>Paid Using E-walet</td>
							</tr>
							<tr>
							<td>Fees Amount</td>
							<td>$1000</td>
							</tr>
							</table>
							</body>
							</html>";
					  $mail=new PHPMailer();
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->Username = "pankajdharia17@gmail.com"; 
                                    $mail->Password="pratpank";
                                    $mail->Port = 587;
                                    $mail->SMTPAuth=true;
                                   // $mail->SMTPDebug=2;
								  
                                    $mail->SMTPSecure = 'tls';
                                    $mail->setFrom=("pankajdharia17@gmail.com");
                                    $mail->Subject="Admission Confirmed";
									
                                     $mail->Body=$body;
									 $mail->IsHTML(true);  
                                    $mail->addAddress($rows[0]["email"]);
                                    
                                    if($mail->Send())
                                    {
                                        $result="Admission Confirmed Successfully Check Your Registered Mail Id For Fees Reciept";    
                                    }
                                    else
                                    {
                                        $result="Shares buyed successfulle but not able to send email due to technical error";
                                    }

					
				}
				else
				{
					$result="Already Admitted";
				}
			}
		}
		render("confirm_form.php", ["result" => $result,"title" => "Document Upload"]);
        
            
                
                    
                       
                      /*          if($l!=false && $j!=false)
                                {                                     
                                    
                                }
                                else
                                {
                                    apologize("Values not inserted!");
                                }*/
                                
                            
                            }

?>