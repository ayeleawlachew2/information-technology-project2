<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title>Activate All Candidate Account</title>
 <link rel="icon" href="../image/logo.png">
<!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->

<style type="text/css">

.style1 
{
font-family: "Times New Roman", Times, serif;
font-weight: bold;
font-size: medium;
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
    border-radius: 5px;
    border-color: #801137;
}
table {
        border-collapse: collapse;
        margin: 20px auto;
    }

    table td {
        padding: 10px;
    }

    input[type="number"],
    input[type="text"] {
        width: 300px;
        padding: 10px;
        margin-bottom: 15px;
        border: none;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
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
$activity_type="Update user account ";
//log file
?>
	<div >
	<?php
require("admin_commen.php");
		
?>
	</div>
<br><br><br>
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>We can activate all candidate account in the year</legend>
<br><br>
<div  >
<table>
    <form action="" method="post">
        <tr>
            <td>Enter Year:</td>
            <td><input type="number" name="year" required></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;Role:</td>
            <td><input type="text" name="role" value="Candidate" readonly></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;</td>
            <td><input type="submit" name="activateall" value="Activet All Account"></td>
        </tr>
 
<?php
if(isset($_POST["activateall"]))
{
$year=$_POST["year"];
$role=$_POST["role"];
$update=0;
if($role=='Candidate')
{
$cand=mysqli_query($con, "select*from candidate WHERE year='$year'");
if(mysqli_num_rows($cand)>0)
{
while($row=mysqli_fetch_array($cand))
{
$cid=$row["cid"];
$update=mysqli_query($con, "update account  set status='active' where uid='$cid'");	
}
if($update!=0)	
echo"User Account Is Successfully Activate!!!";
else
echo"Unable To Block User Account".mysqli_error($con);
}
else
echo"No $role Can Be Found In $year Year";
}

}
?>
</form>
</table>
<br><br><br><br>
</div>
<br><br>
</fieldset>

</div>

</div>
<br><br><br><br><br><br>
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
<br><br>
</div>
</body>
</html>
