<html>
<head>
   
</head>
<body>

<div >
<ul>
<li><a href="request.php">Send Request</a></li>
<?php
$uid=$_SESSION['$uid'];
$query = mysqli_query($con, "select * from notification where committee_status='read' and 
           user_status='unread' and pay_fee='No' and check_status='No' and user_last_response='No' and uid='$uid'")or die(mysqli_error());
$coun = mysqli_num_rows($query);

$query1 = mysqli_query($con, "select * from notification where  committee_status='read' and 
           user_status='read' and pay_fee='Yes' and check_status='Yes' and user_last_response='No' and uid='$uid'")or die(mysqli_error());
$coun1 = mysqli_num_rows($query1);

$query2 = mysqli_query($con, "select * from notification where  committee_status='reject' and 
           user_status='unread' and pay_fee='No' and check_status='No' and user_last_response='No' and uid='$uid'")or die(mysqli_error());
$coun2 = mysqli_num_rows($query2);

$query3 = mysqli_query($con, "select * from notification where  committee_status='read' and 
           user_status='read' and pay_fee='Yes' and check_status='reject' and user_last_response='No' and uid='$uid'")or die(mysqli_error());
$count4 = mysqli_num_rows($query3);

if($coun>0)
{
?>
<li><a href="response.php">Notification[&nbsp;<?php echo $coun?>&nbsp;]</a></li>
<?php	
}
else if($coun1>0)
{
?>
<li><a href="response.php">Notification[&nbsp;<?php echo $coun1?>&nbsp;]</a></li>
<?php		
}
else if($coun2>0)
{
	?>
<li><a href="response.php">Notification[&nbsp;<?php echo $coun2?>&nbsp;]</a></li>	
<?php
}
else 
{
?>
<li><a href="response.php">Notification[&nbsp;<?php echo $count4?>&nbsp;]</a></li>	
<?php
}
?>
</ul>	
</div>
</body>
</html>