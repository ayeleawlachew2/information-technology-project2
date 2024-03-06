
<?php
	include('../connection.php');
	//$con= mysqli_connect('localhost','root','');
$id=$_GET['id'];
$query3=mysqli_query($con, "select * from comment where status='unread' and comment_id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con, "UPDATE comment SET  status='read' where comment_id='$id'");
	
// if ($query1)
// {
$x='<script type="text/javascript">alert("Comment Saved !!!");
window.location=\'unseencomment.php\';</script>';
echo $x;
// }else{
	// echo "You already saved Before!";
// }
?>