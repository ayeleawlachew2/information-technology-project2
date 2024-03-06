<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Certificate</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">
table {
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

  </style>
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$year=$_SESSION['year'];
$sql="select*from depthead where did='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_num_rows($record)>0)
{
while($row=mysqli_fetch_array($record))
{
$dept=$row["dname"];
$unid=$row["uid"];

$sql=mysqli_query("select*from university where uid='$unid'");
while($r=mysqli_fetch_array($sql))
 $univer=$r["uname"];		
}	
}
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("deptmenu.php");	

		
?>

    </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 <fieldset class="fieldset">
<div style="height: 600px;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">

 <div id="print_content">
 <?php
$rolenumber=0;
$sql="select * from candidate  where dept='$dept' and year ='$year' and unversity='$univer'";
$recordexist=mysqli_query($con, $sql);
if(mysql_num_rows($recordexist)>0)
{
	
 ?>
   <br><br>
<table border="1"  style="margin-left: 15px;">
<tr><td colspan="12" style="text-align: center;font-weight: bold;font-size: 18px;">Graduate Student List Who Are Take Exit Exam and Computent Exit Exam  in <?php echo $univer;?> University For Department Of <?php echo $dept; ?> In <?php echo $year; ?> E.C </td></tr>	
<tr>
<th>Role Number</th>
<th>Frist Name</th>	
<th>Middle Name</th>	
<th>Last Name</th>	
<th>Sex</th>	
<th>Dept</th>	
<th>Colleage </th>	
<th >University</th>	
<th>Year</th>
<th>Certificate</th>		
</tr>
<?php
while($row=mysqli_fetch_array($recordexist))
{

$id=$row["cid"];
$query="select*from result where uid='$id'";
$resultexist=mysqli_query($con, $query);
while($row2=mysqli_fetch_array($resultexist))
{
$cid=$row2["uid"];
$status=$row2["status"];
$score=$row2["total"];	
if($status=='Competent')
{
$rolenumber++;
$sql=mysqli_query("select*from user where uid='$id'");
while($row1=mysqli_fetch_assoc($sql))

echo "<tr> 
	<td>".$rolenumber."</td>
	<td>".$row1["ufname"]."</td> 
	<td>".$row1["umname"]."</td> 
	<td>".$row1["ulname"]."</td> 
	<td>".$row1["sex"]."</td> 
	<td>".$row["dept"]."</td> 
	<td>".$row["colleage"]."</td> 
	<td>".$row["unversity"]."</td>
	<td>".$row["year"]."</td>";
	?>
	<td>
	<?php echo "<a  href='certificatepage.php?id=$cid'>Click Here</a>";?></td>
	<?php
	echo"</tr>";	
}
}

}
}
else
echo"No Result Found";

?>
</table>

 </div>
 <br><br> 
<br><br><br><br> 
  <br><br><br><br> 
    <br><br><br><br> 
      <br><br><br><br>   
      <br><br><br><br> 
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
 
    <div id="footer">
<?php
require("../footer.php");
?>
   
</div>
<br><br>
</div>
</body>
</html>







