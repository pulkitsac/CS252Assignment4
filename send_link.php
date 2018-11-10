<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';  


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// echo "HI Uopar";
if(isset($_POST['submit_email']) && $_POST['email'])
{
   $email = $_POST['email'];
   // echo $email;

  // $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
  if ($mysqli->connect_error) {
     // echo "UNable to connect";
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
    }
  

    $sql= "SELECT * FROM members WHERE email='".$email."';";
     $select=$mysqli->query($sql);

    $flag=0;
    while ($row = $select->fetch(\PDO::FETCH_ASSOC)) {
            $id=($row['id']);
            $pass=($row['password']);
            $username=($row['username']);
            $email=($row['email']);
            $flag=1;
            break;
    }
  if($flag==1)
  {
    
    $link="<a href='https://loginsystemcs252.herokuapp.com/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
     
   
    require 'vendor/autoload.php';
    $mail = new PHPMailer(TRUE);
    
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "cstestcs3@gmail.com";
    // GMAIL password
    $mail->Password = "cs12345test";
    
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server

    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='cstestcs3@gmail.com';
    $mail->FromName='CS252';
    
    
    $mail->AddAddress($email, 'CS252_receipient');
    $mail->Subject  =  'Reset Password';


    $mail->IsHTML(true);
    
    $mail->Body    = ".$link.";  
    //$mail->Body    = 'Click ';
    
    if($mail->Send())
    {
      
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      
      echo "Mail Error - >".$mail->ErrorInfo;
    }
    
   }	
 }
?>