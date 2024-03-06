<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Registrar page</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" />
<script type="text/javascript" src="../css/javasscript.js"></script> -->
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
 
.fieldset {
        position: absolute;
        top: 150px;
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

	input[type=text],select,input[type=submit],input[type=reset],textarea,,input[type=file]
	 {
    width: 60%;
    padding: 5px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #70c0c9;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    
 
}
input[type=text]:focus {
    border: 1px solid #8f1b29;
}

  </style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
//$year=$_SESSION['year'];
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";
	
$sql="select * from registrar where rid='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
while($row=mysqli_fetch_assoc($record))
{	
$unverid=$row["uid"];
$sql2=mysqli_query($con, "select*from university where uid='$unverid'");
     while($unrow=mysqli_fetch_array($sql2))
      $university=$unrow["uname"];
	}

	}
	else
	echo "No records found!";
?>
   
	<div>
	 <?php
          require("registrar_commen.php");  
          ?> 

   
 <fieldset class="fieldset"><legend>upload from excel</legend>
 <br><br>
 
 
 <form action="" method="post" enctype="multipart/form-data">
 <center>
 <table border="1">
 <tr>
 <td colspan="2"><input type="file" name="file" required title="upload csv file"/>	
 </td>	
</tr>
<tr>
<td><input type="submit" name="registerfromexcel" value="Insert into Database"/></td>
<td><input type="reset"  value="cancel"/></td>
</tr>

 </table>
  </center>
 </form>
<?php


if(isset($_POST["registerfromexcel"]))
{

if($_FILES['file']['name'])
	{
		
include("../connection.php");
$uid=$_SESSION['$uid'];
$rolecan="Candidate";
		$filename=explode(".",$_FILES['file']['name']);
		if($filename[1]=='csv')
		{
			$handle=fopen($_FILES['file']['tmp_name'],"r");
			while($data=fgetcsv($handle))
			{
					$cid=mysqli_real_escape_string($con, $data[0]);
					$fname=mysqli_real_escape_string($con, $data[1]);
					$mname=mysqli_real_escape_string($con, $data[2]);
					$lname=mysqli_real_escape_string($con, $data[3]);
					$sex=mysqli_real_escape_string($con, $data[4]);
					$dept=mysqli_real_escape_string($con, $data[5]);
					$phone=mysqli_real_escape_string($con, $data[6]);
					$university=mysqli_real_escape_string($con, $data[7]);
					$year=mysqli_real_escape_string($con, $data[8]);
					$email=mysqli_real_escape_string($con, $data[9]);

$sqq22="select *from user WHERE uid='$cid'";
$result22 = mysqli_query($con, $sqq22);
$count= mysqli_num_rows($result22);
if($count<1){

$sql1="insert into user  values('$cid','$fname','$mname','$lname','$sex','$phone','$email',' ','$rolecan')";
$result1=mysqli_query($con, $sql1)or die(mysqli_error());
$sql="insert into candidate  values('$cid','$dept','$university','$uid','$year')";
$result=mysqli_query($con, $sql)or die(mysqli_error());
				}else
echo "User Id Already Exist!";
			}
			if($result && $result1)
          	print "Successfully Registerd";
          	else
          	print"Not Registerd".mysqli_error($con);
            
		}
		else
		print "<font color=#9355aa>file is not csv type</font>";
	}	
}

?>
 
 
<br><br>
<br>
 </fieldset>

 <br><br><br> 
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

 
<br><br>
</div>
</body>
</html>
