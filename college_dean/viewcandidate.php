<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View Candidate</title>
 
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
	width: 950px;
	text-align: left;
	margin-left: 10px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;


	}
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
		  #content {
        position: absolute;
        top: 30px;
        left: 30px;
        width: 60%;
        height: 100px;
    }
  </style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
		$year=$_SESSION['year'];
		$uid=$_SESSION['$uid'];
if($con)
 {
$sql="select * from depthead where did='$uid'";
$recordfound=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
while($row=mysqli_fetch_assoc($recordfound))
{
$unverid=$row["uid"];
$sql2=mysqli_query($con, "select*from university where uid='$unverid'");
while($unrow=mysqli_fetch_array($sql2))
$university=$unrow["uname"];
}

}
else
echo "No records found!";
}
else
echo"connection failed";
?>
  
	<div>
	   <?php
          require("registrar_commen.php");  
          ?>
	<div >

		


  <div id="content" >
<fieldset style="border-radius: 0px;width: 200px; margin-top: 5px;margin-left: 250px;">
 <br> <br>
 <fieldset style="border-radius: 0px;width: 200px; margin-top: 5px;margin-left: 250px;"><legend>Enter Year to view Candidate Information</legend>
 <br> 
 <table >
<form action="" method="post">
<tr>
<td><input type="text" name="key" placeholder="Enter year you need" required/></td>
<td><input type="submit" name="serarch" value="search"/></td>
</tr>
</form>
</table>
<br> 
<br> 	
 </fieldset>
 <br> <br>


<br>
<?php
if(isset($_POST["serarch"]))
{
$key=$_POST["key"];	
?>
<h2 style="margin-left: 15px;">Candidates In <?php echo $university;?> Who Are Allowed To Take Exit Exam In<?php echo $key;?>year</h2>
<hr style="margin-left:-1px;">
<br>
<?php
if($con)
 {
 ?>
  <div style="height:500px;width:940px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<div style="margin-left: 20px;">
 
 <?php
 $sql="select * from candidate where year='$key' and unversity='$university'";
$recordfound=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
	echo "<table border='1'>";
	echo"<tr> <th>Candidate_ID</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Sex </th>
	<th>Mobile</th><th>Email</th><th>Photo</th><th>Department</th><th>University</th><th>year</th>
	</tr>";
	while($row=mysqli_fetch_assoc($recordfound))
	{
		$candidateid=$row["cid"];
$sql=mysqli_query($con, "select*from user where uid='$candidateid'");
while($rw1=mysqli_fetch_assoc($sql))		
echo "<tr> <td>". $row["cid"]."</td><td>".$rw1["ufname"]."</td> <td>".$rw1["umname"]."</td> <td>".$rw1["ulname"]."</td> <td>".$rw1["sex"]."</td> <td>".$rw1["mobile"]."</td> <td>".$rw1["email"]."</td><td><img src=".$rw1["photo"]." width=40 height=30/></td> <td>".$row["dept"]."</td> <td>".$row["unversity"]."</td><td>".$row["year"]."</td></tr>";
}
	echo "</table></div>";
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
}
?>
<br>
 
  
 </div> 
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
</body>
</html>
