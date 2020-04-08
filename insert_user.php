<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
if(isset($_SESSION['id'])){
    $con= mysqli_connect("localhost", "root", "", "user")or die(mysqli_errno($con));
$arr=$_REQUEST['arr'];
$querry="select * from my_users";
 $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
        $count= mysqli_num_rows($res);
        $i=0;
        $id=0;
        while($i!=$count)
        {   $out= mysqli_fetch_array($res)or die(mysqli_errno($con));
      
            if($out['email']==$_SESSION['id'])
        {       $id=$out['user_id'];
       
        }
        $i++;
        }
        
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = substr( str_shuffle( $chars ), 0, 8 );
$con= mysqli_connect("localhost", "root", "", "user")or die(mysqli_errno($con));
$querry='insert into my_users(full_name,email,password,is_admin,created_by) values("'.$arr[0].'","'.$arr[1].'","'.$password.'",False,'.$id.')';
$res= mysqli_query($con, $querry)or die(mysqli_error($con));


  require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 $mail = new PHPMailer;
 $mail->IsSMTP();       
 $mail->Host = 'tls://smtp.gmail.com:587';   
 $mail->Port = 587;       
 $mail->SMTPAuth = true;      
 $mail->Username = 'goutham.n@vitap.ac.in';    
 $mail->Password = 'gnq316gnq316';     
 $mail->SMTPSecure = 'tls';      
 $mail->From = 'goutham.n@vitap.ac.in';   
 $mail->FromName = 'Goutham Natarajan';   
 $mail->AddAddress($arr[1], "sent");  
 $mail->WordWrap = 50;      
 $mail->IsHTML(true);              
 $mail->Subject = 'Password Details|TaSk';   
 $mail->Body = 'Your account was created and your password is '.$password;
 if($mail->Send())        
 {
     
 echo "successfully inserted into database and mail has been sent to user";

 
 }
 else
 { echo "hello";
 
 }
        

      

}

?>

