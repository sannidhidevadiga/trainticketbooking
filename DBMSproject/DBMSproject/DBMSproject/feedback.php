<?php
     $username=$_POST['name'];    
     $email=$_POST['email'];   
     $recom=$_POST['recommend'];
   $comment=$_POST['message'];
     
      
     $con= new mysqli("localhost","root","","trainticket");

     if($con->connect_error){
   die("failed to connect:".$con->connect_error);
} 
else {
 $stmt=$con->prepare("INSERT INTO feedback(`id`, `name`, `email`, `rate`, `comment`) VALUES (NULL, '$username', '$email', '$recom', '$comment');");

$stmt->execute();
echo "<script>window.alert('feedback successfully submitted')
           window.open('feedback.html','_self')</script>";
          
$stmt->close();
$con->close();
}
?>