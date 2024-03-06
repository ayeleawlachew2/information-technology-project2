<?php
include('../connection.php');
// $conn=mysqli_connect("localhost","root","") or die(mysqli_error());
// 	$sdb=mysqli_select_db("exitexam",$conn) or die(mysqli_error()); 
if(isset($_GET['id']))
{
	$email=$_GET['id'];
	$select_status=mysqli_query($con, "select * from comment where comment_id='$email'");
	while($row=mysqli_fetch_object($select_status))
	{
		// $st=$row->email;
	

	$delet=mysqli_query($con, "DELETE FROM  comment WHERE comment_id='$email' ");
	if($delet)
	{
		header("Location:unseencomment.php");
	}
	else
	{
		echo mysqli_error();
	}
	}
	?>
     
    <?php
}
?>