<?php
 $emailid=$_POST['email'];
 $password=$_POST['pass'];
 
$con= new mysqli("localhost","root","","trainticket");
if($con->connect_error){
   die("failed to connect:".$con->connect_error);
} 
else {
   $stmt=$con->prepare("select * from user_login where email =? ");
   $stmt->bind_param("s",$emailid);
   $stmt->execute();
   $stmt_result=$stmt->get_result();
   if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data['password']===$password){
              echo"<script>window.open('main1.html','_self')</script>";
         }

        else{
           echo "<script>window.alert('invalid email or password');
window.open('login_user.html','_self');
</script>";
        }
   }else{
          echo "<script>window.alert('invalid email or password');
window.open('login_user.html','_self');
</script>";
}
}
 ?>