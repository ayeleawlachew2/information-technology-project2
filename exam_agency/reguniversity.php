<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Register University</title>
   <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
      <script type="text/javascript" src="../css/javasscript.js"></script>
 <style type="text/css">
  .style1 {
    font-family: "Times New Roman", Times, serif;
    font-weight: bold;
    font-size: medium;
  }

  #fieldset {
      width: 750px;
      text-align: left;
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

  #form-container {
    margin: 0 auto;
    width: 100%;
    background-color: #f2f2f2;
    padding: 20px;
    border-radius: 0;
    /* border: 2px solid #801137; */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  #form-container table {
    width: 100%;
    border-collapse: collapse;
  }

  #form-container td {
    padding: 10px;
  }

  #form-container label {
    font-weight: bold;
  }

  #form-container input[type="text"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-bottom: 2px solid #ccc;
    margin-bottom: 15px;
    background-color: #f2f2f2;
    transition: border-color 0.3s ease;
  }

  #form-container input[type="text"]:focus {
    border-color: #801137;
  }

  #form-container input[type="submit"],
  #form-container input[type="reset"] {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color:#00BFA6;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  #form-container input[type="submit"]:hover,
  #form-container input[type="reset"]:hover {
    background-color: #66092d;
  }

  #form-container img {
    float: right;
    max-width: 100px;
    max-height: 170px;
    margin-left: 10px;
    border-radius: 5px;
  }
</style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
   
	    
	    <div  >
		 
	   <?php
require("examagency_commen.php");   
?>
	   <!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
    
	  <br><br>
 <div id="content">
<fieldset id="fieldset">
  <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Register University which provide Exit Exam</legend>

<div style="margin-left: 40px;width: 500px;">
 <br><br>
<div id="form-container">
  <form action="" method="post" name="myForm" onsubmit="return validateForm()">
    <table>
      <tr>
        <td colspan="2">
          <label for="uid">University ID</label>
          <input type="text" id="uid" name="uid" required/>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <label for="uname">University Name</label>
          <input type="text" id="uname" name="uname" pattern="[a-zA-Z ]+" required onkeypress="return ValidateAlpha(event)"/>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="unviregister" value="Register" id="register-btn">
        </td>
        <td>
          <input type="reset" value="Cancel" id="cancel-btn">
        </td>
      </tr>
    </table>
  </form>
</div>


 <br><br>
<?php

//register university

if(isset($_POST['unviregister']))
{
$uname=$_POST["uname"];
$uid=$_POST["uid"];
$registerexist="select*from university where uname='$uname' ";
$record=mysqli_query($con, $registerexist);

$idexist="select*from university where uid='$uid' ";
$record2=mysqli_query($con, $idexist);

if(mysqli_num_rows($record)>0 || mysqli_num_rows($record2)>0)
echo $uname." University is allready Exist,Not allowed to register one University More than one times";
else
{
$sql="insert into university values('$uid','$uname')";
$insert=mysqli_query($con, $sql);
if($insert)
echo" University Sucessfully Registered";
else
echo" NO University Sucessfully Registered".mysqli_error($con);	
}
}
?>
</div>
<br><br>
</fieldset>
</div> 
<br><br><br>
<br><br><br>
<br><br><br>
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

