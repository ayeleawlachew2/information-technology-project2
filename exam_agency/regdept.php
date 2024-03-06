<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Register Department</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
   <script type="text/javascript" src="../css/javasscript.js"></script>
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
 #fieldset {
      width: 750px;
      text-align: left;
      margin: -650px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
 
  .form-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }

  .form-table td {
    padding: 8px;
  }

  .form-table label {
    font-weight: bold;
  }

  .form-table input[type="text"],
  .form-table input[type="submit"],
  .form-table input[type="reset"] {
    width: 100%;
    padding: 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
    background-color: #f2f2f2;
    transition: border-color 0.3s ease;
  }

  .form-table input[type="text"]:focus,
  .form-table input[type="submit"]:focus,
  .form-table input[type="reset"]:focus {
    border-color: #801137;
  }

  .form-table input[type="submit"],
  .form-table input[type="reset"] {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    background-color: #00BFA6;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form-table input[type="submit"]:hover,
  .form-table input[type="reset"]:hover {
    background-color: #66092d;
  }
</style>

  </style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	$uni=$_SESSION['university'];
$sql=mysqli_query($con, "select*from university where uid='$uni' ");
while($r1=mysqli_fetch_array($sql))
$uniname=$r1["uname"];

?>
   
	<div>
	<?php
require("examagency_commen.php");	
?>
    </div> 
 <fieldset id="fieldset">
  <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Register Department which provide Exit Exam</legend>
 
 
<table class="form-table">
  <form action="" method="post" name="myForm" onsubmit="return validateForm()">
    <tr>
      <td>University Name:</td>
      <td><input type="text" name="uname" value="<?php echo $uniname; ?>" readonly required /></td>
    </tr>
    <tr>
      <td>Department ID:</td>
      <td><input type="text" name="did" required /></td>
    </tr>
    <tr>
      <td>College Name:</td>
      <td><input type="text" name="cname" required onKeyPress="return ValidateAlpha(event)" /></td>
    </tr>
    <tr>
      <td>Department Name:</td>
      <td><input type="text" name="dname" required onKeyPress="return ValidateAlpha(event)" /></td>
    </tr>
    <tr>
      <td><input type="submit" name="regdept" value="Register"></td>
      <td><input type="reset" value="Cancel"></td>
    </tr>
  </form>
</table
  
<?php

//register university

if(isset($_POST['regdept']))
{
$unid=$_POST["uname"];
$did=$_POST["did"];
$dname=$_POST["dname"];
$cname=$_POST["cname"];
$registerexist="select*from department where dname='$dname'  and uid='$uni' ";
$record=mysqli_query($con, $registerexist);
if(mysqli_num_rows($record)>0)
echo $dname." Department is allready Exist,Not allowed to register one Department More than one times";
else
{
$sql="insert into department values('$did','$cname','$dname','$uni')";
$insert=mysqli_query($con, $sql);
if($insert)
echo" Department Sucessfully Registered";
else
echo" NO Department Sucessfully Registered".mysqli_error($con);
}
}
?>
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
</body>
</html>

