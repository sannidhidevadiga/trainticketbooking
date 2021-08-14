<?php
$ticketid=$_POST['ticketID'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("trainticket", $con);
mysql_query("DELETE FROM ticket WHERE
ticket_id='$ticketid' ");
echo "<script>window.alert('sucessfully deleted')
window.open('cancel.html','_self')</script>";
mysql_close($con);

?> 