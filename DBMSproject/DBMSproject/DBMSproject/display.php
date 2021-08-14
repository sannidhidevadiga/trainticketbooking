
<html>
<body style="background-image:url('https://cdn.pixabay.com/photo/2018/03/04/18/54/wall-3198880_1280.jpg');">
<?php
ob_start();
session_start();
$con=mysqli_connect("localhost","root","","trainticket");
if(mysqli_connect_errno()){
    echo "Failed to connect:".mysqli_connect_error();
}
$sql="select p.pid,p.name,p.gender,p.age,p.city,p.phno,t.train_id,t.tname,t.from,t.to,t1.ticket_id from passenger p,train t, ticket t1 where t1.name=p.name and t.train_id=t1.train_id";
$result=mysqli_query($con,$sql);

echo "<center>";
echo "<h1 style='color: black '>Ticket Details</h1>";

echo "</hr>";
echo "<table  border='2' cellspacing = '5' width='100%'>
<tr>
<th style='color:black' >Pid</th>
<th style='color:black'>Name</th>
<th  style='color:black'>Gender</th>
<th  style='color:black'>Age</th>
<th  style='color:black'>City</th>
<th  style='color:black'>Phno</th>
<th  style='color:black'>Trainid</th>
<th  style='color:black'>Train name</th>
<th  style='color:black'>From</th>
<th  style='color:black'>To</th>
<th  style='color:black'>Ticket id</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr >";
    echo "<td  style='color:black'>".$row['pid']."</td>";
    echo "<td  style='color:black'>".$row['name']."</td>";
    echo "<td  style='color:black'>".$row['gender']."</td>";
    echo "<td  style='color:black'>".$row['age']."</td>";
    echo "<td  style='color:black'>".$row['city']."</td>";
    echo "<td  style='color:black'>".$row['phno']."</td>";
    echo "<td  style='color:black'>".$row['train_id']."</td>";
    echo "<td  style='color:black'>".$row['tname']."</td>";
    echo "<td  style='color:black'>".$row['from']."</td>";
    echo "<td  style='color:black'>".$row['to']."</td>";
     echo "<td  style='color:black'>".$row['ticket_id']."</td>";
    echo "</tr>";
}



echo "</table>";
echo "</center>";
mysqli_close($con);
?><br>
<br><br>
<a href="admin.html">Go Back</a>
</html>