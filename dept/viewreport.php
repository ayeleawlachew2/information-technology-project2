<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View Report</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">
table 
{
    border-collapse: collapse;
}

th, td {
    text-align: left;
    padding: 8px;
}
th {
    text-align: center;
   
}
  tr:nth-child(even)
  {
  	background-color: #f2f2f2
  }
.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
   width: 535px;
	text-align: left;
	margin-left: 10px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;
	}
	  #content {
      position: absolute;
      top: 150px;
      left: 400px;
      width: 60%;
      height: 100px;
    }

  </style>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:600px;border:-10px solid red;margin-left:400px; font-size:16px; font-family:TimesNewRoman;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$year=$_POST['year'];

$sql="select * from depthead where did='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_num_rows($record)>0)
{
	$univer = '';
while($row=mysqli_fetch_array($record))
{
$unverid=$row["uid"];
$sql2=mysqli_query($con, "select * from university where uid='$unverid'");

while ($unrow = mysqli_fetch_array($sql2)) {
    $univer = $unrow["uname"];
}

}	
}
?>
  
	  <div>
    <?php
    require("registrar_commen.php");  
    ?>
  </div>
 
 <div id="content" >
 <fieldset class="fieldset">
<div style="height: 600px;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<?php
$totlarecordexist=mysqli_query($con, "select*from candidate where year='$year'");
if(mysqli_num_rows($totlarecordexist)>0)
{
?>
 <div id="print_content">
 <?php
$rolenumber=0;
$m=0;
$f=0;
$totalstudent=0;
$totalstatus1=0;
$totalstatus2=0;
$sql="select * from result ";
$recordexist=mysqli_query($con, $sql);
if(mysqli_num_rows($recordexist)>0)
 {
 ?>
   <br><br>
<table border="1"  style="margin-left: 15px;">
<tr><td colspan="12" style="text-align: center;font-weight: bold;font-size: 18px;">Graduate Student List Who Are Take Exit Exam in <?php echo $univer;?>  For All Department  In <?php echo $year; ?> </td></tr>	
<tr>
<th>Role Number</th>
<th>Frist Name</th>	
<th>Middle Name</th>	
<th>Last Name</th>	
<th>Gender</th>	
<th>Dept</th>		
<th >University</th>	
<th>Status</th>	
<th>Score</th>
<th>Year</th>		
</tr>
<?php
while($row=mysqli_fetch_array($recordexist))
{

$status=$row["status"];
$score=$row["total"];
$candidateid=$row["uid"];	

		$query="select * from candidate  where year ='$year' and cid='$candidateid' and unversity='$univer'";
		$resultexist=mysqli_query($con, $query);
		if(mysqli_num_rows($resultexist)>0)
		{
		while($row2=mysqli_fetch_array($resultexist))
		{
			$sql=mysqli_query($con, "select*from user where uid='$candidateid'");
             while($rw1=mysqli_fetch_assoc($sql))
			
			{	
			$rolenumber++;
		$sex=$rw1["sex"];
		if($sex=='m')
		$m++;
		else
		$f++;	
			if($status=='Competent')
			$totalstatus1++;
			else
			$totalstatus2++;
		echo "<tr> <td>".$rolenumber."</td><td>".$rw1["ufname"]."</td> <td>".$rw1["umname"].
		"</td> <td>".$rw1["ulname"]."</td> <td>".$rw1["sex"]."</td>  <td>".$row2["dept"]."</td>
		<td>".$row2["unversity"]."</td> <td>".$status."</td>
		<td>".$score."</td><td>".$row2["year"]."</td></tr>";	
		}}}
		}
$totalstudent=$m+$f;
$totalstatus=$totalstatus1+$totalstatus2;
	echo"<tr> <td colspan=12>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
	echo"<tr> <td colspan=5 style='text-align: center;font-weight: bold;'>Total Candidate</td> <td colspan=6   
	  style='text-align: center;font-weight: bold;'>Total Status</td></tr>";
	echo"<tr> <td colspan=2>Male</td><td colspan=3>$m</td> <td colspan=3>Competent</td><td colspan=3>$totalstatus1</td></tr>";
	echo"<tr> <td colspan=2>Female</td><td colspan=3>$f</td> <td colspan=3>Not Competent</td><td colspan=3>$totalstatus2</td></tr>";
	echo"<tr> <td colspan=2>Total</td><td colspan=3>$totalstudent</td> <td colspan=3>Total</td><td colspan=3>$totalstatus</td></tr>";
?>
</table>

 </div>
 <!-- <br><br>
 <a href="javascript:Clickheretoprint()" target="_blank" ><font size="5"color="#3d80c2">Print Report!</font></a> -->
<?php

$activity="Total candidate who take exit exam(Female=$f,Male=$m,total=$totalstudent),Result(Competent=$totalstatus1,Total Non Competent=$totalstatus2,Total=$totalstatus)";
      
 
//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// variable declaration
$time = time();
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="view candidate report";
$logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role',' ',' ','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	//.....end log file record


}
else
echo"No Report Found!! $year";
}
else
echo"No Report Found  In $year Year";
?>	 
<br><br><br><br> 
  
  
    </div>  
    </fieldset> 
</div>

  <?php
}
else
{
header("location:../index.php");
}
?>
  </div>
 
   
</div>
 
</div>
</body>
</html>







