
<?php
	include('../connection.php');
	$con= mysqli_connect('localhost','root','');
$id=$_GET['id'];
$query3=mysql_query($con, "select * from notification where committee_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' and request_id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con, "UPDATE notification SET check_status ='reject' where  request_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("Reject !!!");
window.location=\'last_unread.php\';</script>';
echo $x;
}
?>