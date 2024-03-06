<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title>block user account</title>
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
.container {
    margin-left: 100px;
}

.input-field {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-search {
    padding: 10px 20px;
    background-color: #0B770E;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.divider {
    border-color: #801137;
}

 .message-input {
        width: 200px;
        padding: 5px;
    }

    .select-field {
        width: 200px;
        padding: 5px;
    }

    .success-message {
        background-color:#A9E8AA;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    /* Error Message */
    .error-message {
        background-color: #F58D91;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }
     .form-container {
        display: flex;
        flex-direction: column;
        align-items:stretch;
    }

    .form-container label {
        margin-bottom: 10px;
    }

    .form-container input[type="text"],
    .form-container select {
        width: 300px;
        padding: 5px;
        margin-bottom: 15px;
    }
.submit-button{
     padding: 10px;
  background-color: #0B770E;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
  .submit-button:hover
  {
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

<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>We can block or update  user status by searching id number</legend>
<br><br>
<div class="container">
    <table>
        <form action="" method="post">
            <tr>
                <td><input type="text" name="key" placeholder="Enter User ID number" class="input-field" required/></td>
                <td><input type="submit" name="search" value="Search" class="btn-search"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr class="divider">
                </td>
            </tr>
        </form>
    </table>
</div>
<form action="" method="post" class="form-container">
    <?php
    if(isset($_POST["search"]))
    {
        $key=$_POST["key"];
        $sql="select * from account where uid='$key'";
        $recordfound=mysqli_query($con, $sql);
        if(mysqli_affected_rows($con))
        {
            while($row=mysqli_fetch_assoc($recordfound))
            {	
                ?>
                <tr>
                    <td>User_ID:</td>
                    <td><input type="text" name="uid" value="<?php echo $row["uid"]; ?>" readonly class="message-input"></td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="un" value="<?php echo $row["username"]; ?>" class="message-input"></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>
                        <select name="status" required class="select-field">
                            <option value="">Choose option</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Role:</td>
                    <td>
                       <select name="role" required class="select-field">
    <option value="" class="option-value">Choose option</option>
    <?php
    $sql=mysqli_query($con, "select * from user where uid='$key'");
    while($r=mysqli_fetch_array($sql))
    {
        $role=$r["role"];
    }
    if($role=="Admin")
    {
        ?>
        <option value="<?php echo $role;?>" selected class="option-value"><?php echo $role;?></option>
        <option value="Candidate" class="option-value">Candidate</option>
        <option value="Exam setter" class="option-value">Exam Setter</option>
        <option value="Committee" class="option-value">Exam Agency Committee</option>
        <option value="Registrar" class="option-value">Registrar</option>
        <option value="Department Head" class="option-value">Department Head</option>
        <?php	
    }
    else if($role=="Committee")
    {
        ?>
        <option value="<?php echo $role;?>" selected class="option-value"><?php echo $role;?></option>
        <option value="Candidate" class="option-value">Candidate</option>
        <option value="Exam setter" class="option-value">Exam Setter</option>
        <option value="Registrar" class="option-value">Registrar</option>
        <option value="Department Head" class="option-value">Department Head</option>
        <option value="Admin" class="option-value">Admin</option>
        <?php
    }
    else if($role=="Registrar")
    {
        ?>
        <option value="<?php echo $role;?>" selected class="option-value"><?php echo $role;?></option>
        <option value="Candidate" class="option-value">Candidate</option>
        <option value="Exam setter" class="option-value">Exam Setter</option>
        <option value="Committee" class="option-value">Exam Agency Committee</option>
        <option value="Department Head" class="option-value">Department Head</option>
        <option value="Admin" class="option-value">Admin</option>
        <?php
    }
    else if($role=="Candidate")
    {
        ?>
        <option value="<?php echo $role;?>" selected class="option-value"><?php echo $role;?></option>
        <option value="Exam setter" class="option-value">Exam Setter</option>
        <option value="Committee" class="option-value">Exam Agency Committee</option>
        <option value="Registrar" class="option-value">Registrar</option>
        <option value="Department Head" class="option-value">Department Head</option>
        <option value="Admin" class="option-value">Admin</option>
        <?php
    }
    else if($role=="Exam setter")
    {
        ?>
        <option value="<?php echo $role;?>" selected class="option-value"><?php echo $role;?></option>
        <option value="Candidate" class="option-value">Candidate</option>
        <option value="Committee" class="option-value">Exam Agency Committee</option>
        <option value="Registrar" class="option-value">Registrar</option>
        <option value="Department Head" class="option-value">Department Head</option>
        <option value="Admin" class="option-value">Admin</option>
        <?php
    }
    else if($role=="Department Head")
    {
        ?>
        <option value="<?php echo $role;?>" selected class="option-value"><?php echo $role;?></option>
        <option value="Candidate" class="option-value">Candidate</option>
        <option value="Committee" class="option-value">Exam Agency Committee</option>
        <option value="Registrar" class="option-value">Registrar</option>
        <option value="Department Head" class="option-value">Department Head</option>
        <option value="Admin" class="option-value">Admin</option>
        <?php
    }
    else 
    {
        ?>
        <option value="<?php echo $role;?>" selected class="option-value"><?php echo $role;?></option>
        <option value="Candidate" class="option-value">Candidate</option>
        <option value="Committee" class="option-value">Exam Agency Committee</option>
        <option value="Exam setter" class="option-value">Exam Setter</option>
        <option value="Registrar" class="option-value">Registrar</option>
        <option value="College Dean" class="option-value">College Dean</option>
        <option value="Department Head" class="option-value">Department Head</option>
        <option value="Admin" class="option-value">Admin</option>
        <?php
    }
    ?>
</select>
<input type="submit" name="bolcked" value="Block/update" class="submit-button">

                    </td>
                </tr>
                <tr>
                    <!-- <td><input type="submit" name="blocked" value="Block/update"/></td> -->
                </tr>
                <?php
            }
        }
        else
        {
            echo '<p class="success-message">No result found!!!.</p>';
        }
    }
     
    if(isset($_POST["blocked"]))
        {
            $id=$_POST["uid"];
            $status=$_POST["status"];
            $un=$_POST["un"];
            $role=$_POST["role"];

            if($con)
            {	
                $sql="update account  set status='$status',username='$un' where uid='$id'";
                $sql1="update user  set role='$role' where uid='$id'";
                $updated=mysqli_query($con, $sql);
                $updated1=mysqli_query($con, $sql1);
                if(mysqli_affected_rows($con))
                {
                    if($status=="inactive")
                    {
                        echo '<p class="success-message">' . mysqli_affected_rows($con) . '  User IS Successfully Blocked!</p>';
                        $activity="update User account Information(userid=$id,username=$un,status of  active user change by inactive or blocked)";
                        $logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
                    }
                    else
                    {	
                        echo '<p class="success-message">' . mysqli_affected_rows($con) . '  User IS Successfully Updated!</p>';
                        $activity="update User account Information(userid=$id,change username by $un)";
                        $logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
                    }
                }
                else
                {
                    echo '<p class="error-message">The User Is Not Blocked or Updated! ' . mysqli_error($con) . '</p>';
                }
            }
            else
            {
                die("Connection Failed:".mysql($con));	
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
