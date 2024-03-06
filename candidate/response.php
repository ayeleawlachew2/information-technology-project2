<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>New Notification</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <script type="text/javascript" src="../css/javasscript.js"></script>
   
</head>

<body>
<div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	$uid=$_SESSION['$uid'];
?>
	<div id="header">
	<div id="banner">
	<?php
	// require("dmu.php");	
	?>	 
	</div>
	</div>
	<div id="navigation">
	<?php
	require("cand_commen.php");
	?>
	</div>



	<div>	

	 
 

	<h2>Link</h2>

   <?php
	require("cansidelink.php");
	?>

	</div> 
	<br><br><br><br>
	</div>
	</div>		 
<div id="content">
<div class="content_item" style="margin-top: 140px;">
<?php
$uid=$_SESSION['$uid'];

$count1=0;
$count2=0;
$count3=0;
$query = "select * from notification where committee_status='read' and user_status='unread' and uid='$uid'";
$record=mysqli_query($con, $query);
$count1=mysqli_num_rows($record);

$query1 = mysqli_query($con, "select * from notification where committee_status='read'  and user_status='read' and pay_fee='Yes' and check_status='Yes' and user_last_response='No' and uid='$uid'");
$count2=mysqli_num_rows($query1);

$query2 = mysqli_query($con, "select * from notification where  committee_status='reject' and 
           user_status='unread' and pay_fee='No' and check_status='No' and user_last_response='No' and uid='$uid'")or die(mysqli_error());
$count3 = mysqli_num_rows($query2);
$query3 = mysqli_query($con, "select * from notification where  committee_status='read' and 
           user_status='read' and pay_fee='Yes' and check_status='reject' and user_last_response='No' and uid='$uid'")or die(mysqli_error());
$count4 = mysqli_num_rows($query3);

if($count1>0)
{
?>
<fieldset class="fieldset"><legend>bank payement </legend>
<br>
<div style="margin-left: 20px;">

<form action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td colspan="2">Any candidate who wants to take re_exam must should upload bank receipt and send to exam editor.after upload and send to exam editor the candidate must see the response from the Notification link.</td>
</tr>
<tr>
<td><input type="file" name="receipt" title="upload bank receipt" accept="image/*" onchange="loadFile(event)" id="file"/></td>
<td colspan="2"><input type="submit" name="pay"  value="send"  /></td>
</tr>
<tr><td colspan="2"><img id="output"  width="120" height="170"  style="float: right;"/></td></tr>
</table>	
</form>

</div>
<?php
if(isset($_POST["pay"]))
{
$receipt=$_FILES["receipt"]["tmp_name"];
$rname=$_FILES["receipt"]["name"];
if(!file_exists("../exam_agency/Bank_Receipt"))
mkdir("../exam_agency/Bank_Receipt");
$receitpath="../exam_agency/Bank_Receipt/$rname";
if(copy($receipt,$receitpath))
{         
$update=mysqli_query($con, "UPDATE notification SET user_status='read', pay_fee='Yes',image='$receitpath' where  uid='$uid'");
$x='<script type="text/javascript">alert("THE TRANSACTION IS SUCCESS Click OK!!!!");window.location=\'reexam.php\';</script>';
echo $x;	
}
else
echo "Unable to upload the Receipt!";
}

?>
<br><br>
</fieldset>
<?php
}
else if($count2>0)
{
//LAST RESPONSE
$update=mysqli_query($con, "UPDATE notification SET user_last_response='Yes' where  uid='$uid'");	
if($update)
	echo "You are Allowed to  take Re_Exam";
else
echo"Not allowed to Take Re_Rexam".mysqli_error($con);	
}
else if($count3>0)
{
echo" The Request That You Sent Is Reject resent again ";
$update=mysqli_query($con, "delete from notification  where  uid='$uid'");		
}
else if($count4>0)
{
	//echo "Please Again Send Bank Receipt Again";
	
	
	?>
<fieldset class="fieldset"><legend>bank payement </legend>
<br>
<br>
<div style="margin-left: 20px;">

<form action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td colspan="2">Please Again Send Bank Receipt Again</td>
</tr>
<tr>
<td><input type="file" name="receipt" title="upload bank receipt" accept="image/*" onchange="loadFile(event)" id="file"/></td>
<td colspan="2"><input type="submit" name="pay1"  value="send"  /></td>
</tr>
<tr><td colspan="2"><img id="output"  width="120" height="170"  style="float: right;"/></td></tr>
</table>	
</form>

</div>
<?php
if(isset($_POST["pay1"]))
{
$receipt=$_FILES["receipt"]["tmp_name"];
$rname=$_FILES["receipt"]["name"];
if(!file_exists("../editor/Bank_Receipt"))
mkdir("../editor/Bank_Receipt");
$receitpath="../editor/Bank_Receipt/$rname";
if(copy($receipt,$receitpath))
{         
$update=mysqli_query($con, "UPDATE notification SET user_status='read', pay_fee='Yes',image='$receitpath', check_status='No' where  uid='$uid'");
$x='<script type="text/javascript">alert("THE TRANSACTION IS SUCCESS Click OK!!!!");window.location=\'reexam.php\';</script>';
echo $x;	
}
else
echo "Unable to upload the Receipt!";
}

?>
<br><br>
</fieldset>
<?php
}
else 
echo"No Notification Is Found!!!";

?>
</div> 
</div>
</div>
	 <?php
}
else 
{
header("location:../index.php");
}
?>

<div id="footer">
<?php
require("../footer.php");
?>
</div>

<!--close footer-->  
<br> <br>
</div>
</body>
</html>


