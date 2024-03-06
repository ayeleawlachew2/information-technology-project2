
<?php
	include('../connection.php');
	//$con= mysqli_connect('localhost','root','');
$id=$_GET['id'];
$query3=mysqli_query($con, "select * from notification where committee_status='unread' and request_id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con, "UPDATE notification SET committee_status='read' where request_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("Approved !!!");
window.location=\'unreadd.php\';</script>';
echo $x;
}
?>