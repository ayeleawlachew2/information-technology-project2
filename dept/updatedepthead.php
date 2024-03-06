<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Update  Department head profile</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css"> -->
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
	margin-left: 25px;
	width: 940px;
	text-align: justify;
	margin-top: 10px;
}
.fieldset {
        position: absolute;
        top: 100px;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        text-align: left;
        margin-top: 20px;
        height: auto;
        border-radius: 0px;
        border-color: #801137;
        text-align: center;
    }
	
input[type="text"], input[type="submit"],input[type="email"],select
 {
width: 180px;
height: 30px;

  
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
</style>
  
</head>

<body>
 <div id="main">
 <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
   
		<div>
	   <?php
          require("registrar_commen.php");  
          ?>
	<div > 

<div id="site_content">
<div id="content">
 <?php
$fullname=$_SESSION['fullname'];
$uname=$_SESSION['sun'];
$role=$_SESSION['role'];
$photo=$_SESSION['sphoto'];
$uid=$_SESSION['$uid'];

if ($con) {
	$sql = "select * from registrar where rid='$uid'";
	$recordfound = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con)) {
	  while ($row = mysqli_fetch_assoc($recordfound)) {
		$unverid = $row["uid"];
	  }
	} else {
	  echo "No records found!";
	}
  } else {
	echo "Connection failed";
  }

?>
 <fieldset id="fieldset" class="style" style="position: absolute; top:20%; right: 20%;">
 <legend>Update Department head info</legend>
	<div style="margin-left: 20px; background-color:#bccdf1;width: 540px;">
	<br>

	<table  border=0>
	<form action="" method="post"  enctype="multipart/form-data">
	<tr>
	<td><input type="text" name="searchkey" placeholder="search by using ID"/> </td>
	<td><input type="submit" name="search" value="search"/></td>
	</tr>
	<tr>
	<td colspan="2"><hr style="border-color: #801137;width: 535px;"></td>
	</tr>

	<?php
	if(isset($_POST["search"]))
	{
	$searchvalue=$_POST["searchkey"];	
	$d=mysqli_query($con, "select*from depthead where did='$searchvalue'");
	while($r=mysqli_fetch_array($d))
	{
	$dept=$r["dname"];
	$uname1=$r["uid"];	
	// $committee_id=$r["committee_id"];	
	}
	if(mysqli_num_rows($d)>0)
	{
	$sql="select * from user where uid='$searchvalue'";
	$recordfound=mysqli_query($con, $sql);
	if(mysqli_affected_rows($con))
	{

	while($row=mysqli_fetch_assoc($recordfound))
	{



	echo"<tr><td>ID:</td><td><input type=text name='did1' value='".$row["uid"]."'readonly></td></tr>";
	echo "<tr><td>Frist Name:</td><td><input type=text name='fname1' value='".$row["ufname"]."' required pattern='[a-zA-Z]+'></td></tr>";
	echo "<tr><td>Father Name:</td><td><input type=text name='fname2' value='".$row["umname"]."' required pattern='[a-zA-Z]+'></td></tr>";
	echo "<tr><td>Grand Father Name :</td><td><input type=text name='lname2' value='".$row["ulname"]."' required pattern='[a-zA-Z]+'></td></tr>";
	echo "<tr><td>Gender:</td><td><input type=text name='sex' value='".$row["sex"]."' required></td></tr>";
	echo "<tr><td>Mobile :</td><td><input type=text name='mb' value='".$row["mobile"]."' required></td></tr>";
	echo "<tr><td>Email :</td><td><input type='email' name='email' value='".$row["email"]."' required></td></tr>";

	}
	echo "<tr><td><input type=submit name='update' value='update'></td> ";
	echo "<td><input type=reset value=Cancel></td></tr>";
	}
	else
	echo "<div class='style1'>No result found</div>";

	}
	else
	echo "No Record Found";
	}

	elseif(isset($_POST["update"]))
	{
	$id=$_POST["did1"];
	$fname=$_POST["fname1"];
	$mname=$_POST["fname2"];
	$lname=$_POST["lname2"];
	$sex=$_POST["sex"];
	$email=$_POST["email"];
	$mobile=$_POST["mb"];
	//photo
	if($con)
	{	
	$sql="update user  set ufname='$fname',umname='$mname',ulname='$lname',sex='$sex',mobile='$mobile',email='$email' where uid='$id'";
	// $sq="update depthead  set dname='$dept',uid='$univer' where did='$id'";
	echo"<div class='style1'>";
	$updated=mysqli_query($con, $sql);
	// $updated1=mysql_query($con, $sq);
	if(mysqli_affected_rows($con))
	echo mysqli_affected_rows($con)."  a record/s update successfully!";
	else
	echo "Unable to update!".mysqli_error($con);
	echo"</div>";
	}

	else
	die("Connection Failed:".mysqli($con));	
	}
	else
	echo"<div class='style1'>well come to editing department head information/profile</div>";
	?>
</form>
</table>
</div>
</fieldset>


<?php
	if($con)
	{
	$sql="select * from depthead where uid='$unverid'";
	$recordfound=mysqli_query($con, $sql);
	if(mysqli_affected_rows($con))
	{
	?>
	<div style="height: auto;width: 955px;
	border:solid 4px #dldbeg;
	overflow-y:scroll;
	overflow-x:scroll; margin-left: 20px;" >
	<?php
	echo "<table border='1'>";
	echo"<tr> <th>ID_Number</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Gender </th>
	<th>Mobile</th><th>photo</th><th>Email</th><th>Department</th><th>university</th></tr>";
	while($row=mysqli_fetch_assoc($recordfound))
	{
	$did=$row["did"];
	$deptid=$row["dname"];
	$unverid=$row["uid"];
	$dept=mysqli_query($con, "select*from department where dname='$deptid'");
	while($deptrow=mysqli_fetch_array($dept))
	$deptname=$deptrow["dname"];	
	$un=mysqli_query($con, "select*from university where uid='$unverid'");
	while($unrow=mysqli_fetch_array($un))
	$unname=$unrow["uname"];	
	$sql=mysqli_query($con, "select*from user where uid='$did'");
	$user=mysqli_num_rows($sql);
	if($user>0)
	{
	while($row1=mysqli_fetch_assoc($sql))
	echo "<tr> <td>". $row["did"]."</td><td>".$row1["ufname"]."</td> <td>".$row1["umname"]."</td> <td>".$row1["ulname"]."</td> <td>".$row1["sex"]."</td> <td>".$row1["mobile"]."</td> <td><img src=".$row1["photo"]." width=50 height=60 alt='image'/></td> <td>".$row1["email"]."</td> <td>".$deptname."</td> <td>".$unname."</td></tr>";
	}
	else
	echo"No Record Found";
	}
	echo "</table></div>";
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	?>




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






