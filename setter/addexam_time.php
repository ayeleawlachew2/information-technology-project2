<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
	 <title>add exam time page</title>
		  <link rel="icon" href="../image/logo.png">
  
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
	width: 600px;
	text-align: left;
	margin-left:200px;
	margin-top: 50px;
	height: auto;
	border-radius:5px;
	border-color: #801137;

	}
	 table {
    margin-left: 30px;
  }

  table td {
    padding: 10px;
  }

  input[type="text"],
  input[type="number"] {
    width: 200px;
    padding: 5px;
    margin-bottom: 10px;
  }

  input[type="submit"],
  input[type="reset"] {
    padding: 5px 10px;
    background-color: #00BFA6;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="submit"]:hover,
  input[type="reset"]:hover {
    background-color: #0056b3;
  }
	.code-container {
      position: absolute;
      top: 20%;
      right: 20%;
    }
	
	</style>

	</head>

	<body>
	<div id="main">
	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$uname=$_SESSION['sun'];
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
$role=$_SESSION['role'];;
$qtype=$_SESSION['questiontype'];
$sql="select * from Examsetter where sid='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
	while($row=mysqli_fetch_assoc($record))
	{
	 //$dept=$row["dept"];
   $year=$row["year"];
 $dept=$row["dname"];
//$unverid=$row["uid"];
	}

	}
	else
	echo "No records found!";
?>
	<div>
    <?php require("setter_commen.php"); ?>
  </div>
  <br>
			<div class="code-container">
	<fieldset class="fieldset"><legend><b>Dr. Exam Setter Add Exam Time Only Once!!!</b></legend>
	<br>
	<table>
<form action="" method="post">
<tr>
<td>Year:</td><td><input type="text" name="year" readonly value="<?php echo $year;?>"></td>
</tr>
<tr>
<td>Question Type:</td><td><input type="text" name="qtype" value="<?php echo $qtype;?>"></td>
</tr>
<tr>
<td>Department:</td><td><input type="text" name="dept" readonly  value="<?php echo($dept);?>"></td>
</tr>
<tr>
<td>Hour:</td><td><input type="number"  name="hr" min="0" placeholder="Enter Hour if hour<1 set 0"/></td>
</tr>
<tr>
<td>Minute:</td><td><input type="number" name="min" min="0" placeholder="Enter Minute" required/></td>
</tr>
<tr>
<td><input  type="submit" name="timer" value="set time"/></td>
<td><input type="reset" value="Cancel"/></td>
</tr>

</form>
</table>

<?php
if(isset($_POST['timer']))
{
$hr=$_POST["hr"];
$min=$_POST["min"];	
$dept=$_POST["dept"];
$year=$_POST["year"];
$qtype=$_POST["qtype"];
$_SESSION["qtype"]=$qtype;
$_SESSION["year"]=$year;
$sql2="select*from timer where dept='$dept' and  question_type='$qtype' and year='$year'";
$timeexist=mysqli_query($con, $sql2);
if(mysqli_num_rows($timeexist)>0)
echo"The Exam Time For  <b>$dept</b> Department  Is Already Exist";
else
{
if($con)
{
	$sql="insert into timer values(' ','$qtype','$dept','$hr','$min','$year','$uid')";
	$insert=mysqli_query($con, $sql);
	if($insert)
	echo"Sucessfully set Exam time";
	else
	echo" NO Sucessfully set Exam time !!!".mysqli_error($con);

}
else
echo"Connection Failed:".mysqli_error($con);
}	
}
?>
 
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
	 
	</body>
	</html>
