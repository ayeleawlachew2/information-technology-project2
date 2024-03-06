<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>feedback page</title>
   <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">
.style1 
{
     font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size:20px;;
	width:920px;
	text-align:left;
	margin-top: 10px;
	color: black;
	margin-left: 50px;
}
.fieldset {
    width: 650px;
    text-align: left;
    margin: 0 auto; /* Center the fieldset horizontally */
    margin-top: 10px; /* Adjust the top margin as needed */
    position: absolute;
    top: 20%;
    left: 60%;
    transform: translateX(-50%);
    border-radius: 0;
    border-color: #801137;
}
table {
        border-collapse: collapse;
        margin-left: 10px;
    }

    table td {
        padding: 10px;
    }

    input[type="text"],
    input[type="email"] {
        width: 300px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    textarea {
        width: 300px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    input[type="submit"],
    input[type="reset"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #45a049;
    }
  </style>
  
</head>

<body>
 <div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";

//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="send comment to exam editor";

$sql="select*from user where uid='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_num_rows($record)>0)
{
while($row=mysqli_fetch_array($record))
{
$id=$row["uid"];	
$fn=$row["ufname"];	
$mn=$row["umname"];
$email=$row["email"];			
}
	
}
?>
  	<div >
	<?php
require("admin_commen.php");
		
?>
	</div>
	  
<div id="content">
<fieldset class="fieldset"><legend>Feedback us</legend>
<br><br>
<table>
    <form action="" method="post">
        <tr>
            <td>Frist Name:</td>
            <td><input type="text" name="fn" placeholder="Enter Frist Name" value="<?php echo $fn; ?>" readonly /></td>
            <td>Father Name:</td>
            <td><input type="text" name="fan" placeholder="Enter Father Name" value="<?php echo $mn; ?>" readonly /></td>
        </tr>
        <tr>
            <td>Date:</td>
            <td><input type="text" name="date" value="<?php echo date("Y-m-d"); ?>" readonly /></td>
            <td>Email:</td>
            <td><input type="email" name="email" placeholder="Enter Correct Email Address" value="<?php echo $email; ?>" readonly /></td>
        </tr>
        <tr>
            <td>Comment:</td>
            <td colspan="3"><textarea name="comment" required cols="50" rows="10" placeholder="Write Your Comment From Here......."></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="feedback" value="Send"></td>
            <td><input type="reset" value="Cancel"></td>
        </tr>
    </form>
</table>
<br>
<?php
if(isset($_POST["feedback"]))
{
$fn=$_POST["fn"];	
$ln=$_POST["fan"];
$date=$_POST["date"];
$email=$_POST["email"];
$comment=$_POST["comment"];
$status="unread";
$activity="content of comment($comment)";
if($con)
{
$insert="insert into comment values(' ','$id','$fn','$ln','$date','$email','$comment','$status')";
$logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
$correctinsert=mysqli_query($con, $insert);
if($correctinsert && $logsql)
echo"The Comment Successfully Sent,Thank you!!!";
else
echo"The Comment Is Not Successfully Sent".mysqli_error($con);	
}
else
echo"connection faild".mysqli_error();

}
?>
<br><br>
</fieldset>  
<br><br><br><br>
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
