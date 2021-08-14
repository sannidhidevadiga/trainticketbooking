<?php
     $name=$_POST['pname'];    
      $gender=$_POST['gender'];   
      $age=$_POST['age'];   
      $city=$_POST['pcity']; 
     $phno=$_POST['telephone'];
     $from=$_POST['from'];  
    $to=$_POST['to'];
    $date=$_POST['date']; 
     $time=$_POST['time'];
     $tname=$_POST['train'];
    $class=$_POST['cname'];
   if($tname==='Rajdhani Express-Bangalore to Mangalore')
{
$trainid="RAJ";
}
else if($tname==='Shatabdhi Express-Mumbai to Bangalore')
{
$trainid="SHA";
}
else if($tname==='Bharath Express-Mumbai to Delhi')
{
$trainid="BHA";
}
else if($tname==='Rajya Rani Express-Delhi to Bangalore')
{
$trainid="RRE";
}
else if($tname==='Yuva Express-Mangalore to Mumbai')
{
$trainid="YUV";
}
else if($tname==='Superfast Express-Mangalore to Delhi')
{
$trainid="SUP";
}
 $con= new mysqli("localhost","root","","trainticket");
  if($con->connect_error){
   die("failed to connect:".$con->connect_error);
} 
else {
 $stmt=$con->prepare("INSERT INTO `trainticket`.`passenger` (`pid`, `name`, `gender`, `age`, `city`, `phno`) VALUES (NULL, '$name', '$gender', '$age', '$city', '$phno')");
$stmt->execute();
$stmt1=$con->prepare("INSERT INTO `trainticket`.`train` (`train_id`, `tname`, `from`, `to`, `date`, `time`, `class`) VALUES ('$trainid', '$tname', '$from', '$to', '$date', '$time', '$class')");
$stmt1->execute();
$stmt2=$con->prepare("INSERT INTO `trainticket`.`ticket` (`ticket_id`, `train_id`, `name`) VALUES ( NULL,'$trainid','$name')");
$stmt2->execute();
$sql="SELECT ticket_id FROM ticket where train_id='$trainid' and name='$name' ";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
$t=$row['ticket_id'];
 echo "<script>window.alert('your ticket number is:'+$t)
window.open('booking.html','_self');
</script>";
}


$stmt->close();
$con->close();
}
?>