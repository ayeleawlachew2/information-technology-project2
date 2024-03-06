<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>request page</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
 
</head>

<body>
<div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{


if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];

// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Request";
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";
	
	
	
$uid=$_SESSION['$uid'];
$sql="select * from candidate where cid='$uid'";
$recordfound=mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($recordfound))
{
$dept=$row["dept"];
$univer=$row["unversity"];
$year=$row["year"];
}
?>
	<div id="header">
	<div id="banner">
	<?php
	// require("dmu.php");	
	?>	 
	</div>
	</div>
	<div >
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
	</div>		 
<div id="content">
<div class="content_item" style="margin-top: 20px;margin-left: 200px;">
<div class="style1">
<fieldset class="fieldset"><legend>Write Your Resean</legend>
<?php
$currentdate=date("Y-m-d");
$chechdates="select * from examdate where year='$year' and question_type='Payment'";
$records=mysqli_query($con, $chechdates);
if(mysqli_num_rows($records)>0)
{
while($row=mysqli_fetch_assoc($records))
{
$sdate=$row["start_date"];
$edate=$row["end_date"];
 }
 if($sdate <=$currentdate && $edate>=$currentdate )
 {
?>
<?php

$sql="select*from notification where uid='$uid'";
$recordexist=mysqli_query($con, $sql);
$total=mysqli_num_rows($recordexist);
if($total<1)
{
$r=mysqli_query($con, "select*from result where uid='$uid' and status='Not Competent'");
if(mysqli_num_rows($r)>0)
{
$D=date("Y-m-d");
?>
<table style="margin-left: 10px;">
<form action="" method="post">
<tr>
<td>User_ID:</td><td><input type="text" name="uid"  value="<?php echo $uid;?>" required readonly/></td>
<td>Department:</td><td><input type="text" name="dept1"  value="<?php echo $dept;?>" required readonly/></td>

</tr>
<tr>
<td>University:</td><td><input type="text" name="univ"  value="<?php echo $univer;?>" required readonly/></td>
<td>Year:</td><td><input type="text" name="year"   value="<?php echo $year;?>" readonly  /></td>
</tr>
<tr>
<td> Resean:</td>
<td><textarea name="resean"  placeholder="write your resean from here... " required ></textarea></td>
<td>Date:</td><td><input type="text" name="dates" value="<?php echo $D;?>"  readonly /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="send" value="Send"></td>
<td colspan="2"><input type="reset"  value="Cancel"></td>
</tr>
</form>
</table>
<?php
}
else
echo"Candidate Who Can Send Request Only Can't Pass The Exit Exam";
}
else
echo "Not Allowed To Sent Request More 1 times !!!.";
}
 else
 echo "The Applicant Date IS bitween $sdate upto  $edate";
 }
 else
 echo "<div style='margin-left:300px;'>Exam Date Is Not Post</div>";
?>

</div> 
<?php
if(isset($_POST["send"]))
{
$id=$_POST["uid"];
$unv=$_POST["univ"];
$depart=$_POST["dept1"];
$reasean=$_POST["resean"];
$year=$_POST["year"];
$date1=$_POST["dates"];
$editorstatus='unread';
$userstatus='unread';
$pay_fee='No';
$check='No';
$userlastresponse='No';

if($con)
{
 $sql="insert into notification values(' ','$id','$depart','$unv','$reasean','$year','$date1','$editorstatus','$userstatus','$pay_fee','$check','No Bank_Receipt','$userlastresponse')";
 $insert=mysqli_query($con, $sql);
   if($insert)
	{
	$x='<script type="text/javascript">alert("The Request Is   Sucessfully Sent!!!!");
	window.location=\'reexam.php\';</script>';
	 echo $x;	
	 
$activity="Candidate Send Requuest To Exam Editor
          [Candidate_ID:$uid,Department:$dept,,Year:$year,Content:$reasean]";	
          
$logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time',
         '$start_time','$activity_type','$activity','$ipaddress','$work_date')");	 
	 
	 
	 
	 
	}
	else
	echo" NO Request Is Not Sent".mysqli_error($con);
	
}
else
echo"Connection Failed:".mysqli_error($con);
}
?>
<br>
</fieldset>
</div>
</div>

<?php
}
else
{
header("location:../index.php");
}
?>
</div>

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


