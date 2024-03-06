<?php
$conn=mysqli_connect("localhost","root","") or die(mysqli_error());
	$sdb=mysqli_select_db($conn, "exitexam") or die(mysqli_error()); 
if(isset($_GET['id']))
{
	$email=$_GET['id'];
	$select_status=mysqli_query($conn, "select * from notification where request_id='$email'");
	while($row=mysqli_fetch_object($select_status))
	{
		//$st=$row->email;
	

	$query1=mysqli_query($conn, "UPDATE notification SET committee_status ='reject' where  request_id='$email'");
	if($query1)
	{
	$x='<script type="text/javascript">alert("Reject !!!");
window.location=\'messagedd.php\';</script>';
echo $x;
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