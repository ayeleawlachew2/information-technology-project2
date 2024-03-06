<!-- <?php
session_start();
include("../connection.php");
?> -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Register user</title> 
   <link rel="icon" href="../image/logo.png">
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
      margin: -650px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .legend-style {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: 18px;
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
    .form-table select {
      width: 100%;
      padding: 8px;
      border: none;
      border-bottom: 1px solid #ccc;
      margin-bottom: 10px;
      background-color: #f2f2f2;
      transition: border-color 0.3s ease;
    }

    .form-table input[type="text"]:focus {
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

    #output {
      max-width: 80px;
      max-height: 120px;
      margin-left: 10px;
      border-radius: 5px;
    }

    @media (max-width: 768px) {
      #fieldset {
        margin: 20px 10px; /* Adjust this value to set the desired vertical position */
        box-shadow: none;
        border: none;
      }
    }

  </style>
   
 <script lang="javascript">
function validateemailform()
{
 var mb = document.forms["myForm"]["mb"].value;
if (mb == "") 
{
alert("Phone Number Is Empty please Fill");
return false;
}
var str=document.forms["myForm"]["mb"].value;
var valid="0123456789+"; 
for(i=0;i<str.length;i++)
{
if(valid.indexOf(str.charAt(i))==-1)
{
alert("please insert phone_number number only number");
document.forms["myForm"]["mb"].value="";
document.forms["myForm"]["mb"].focus();
return false;
}
}
if(str.length!=10)
{
alert("please enter phone number 10  digit.");
document.forms["myForm"]["mb"].focus();
return false;
}  
if (str.charAt(0)!="0")
{
alert("phone number should be start with 0");
document.forms["myForm"]["mb"].focus();
return false;
} 
if (str.charAt(1)!="9")			   
{
alert("phone number should be start with 09");
document.forms["myForm"]["mb"].focus();
return false;
}

//email
if(document.myForm.email.value == "" )
{
alert("Please fill your 's email!" );
document.myForm.email.focus() ;
return false;
}
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
{
alert("Not a valid e-mail address");
document.myForm.email.value="";
return false;
}


}
</script>
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
 <div>
		 
	   <?php
require("examagency_commen.php");	   
?> 
	  </div> 
 <fieldset id="fieldset">
  <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Register Admin or Exam Agency Committee</legend>
 
 
  <div id="form-container">
     
     <table class="form-table">
    <form action="" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
      <tr>
        <td>User_ID:</td>
        <td><input type="text" name="committee_id" pattern="[a-zA-Z0-9/_.\-+]+" required /></td>
        <td>Gender:</td>
        <td>
          <select name="sex" required>
            <option value="">choose option</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>First Name:</td>
        <td><input type="text" name="fn" onKeyPress="return ValidateAlpha(event)" /></td>
        <td>Mobile Phone:</td>
        <td><input type="text" name="mb" placeholder="Enter Phone" onKeyPress="return isNumberKey(event)"/></td>
      </tr>
      <tr>
        <td>Middle Name:</td>
        <td><input type="text" name="mn" onKeyPress="return ValidateAlpha(event)"/></td>
        <td>Email:</td>
        <td><input type="text" name="email" placeholder="Enter Correct Email Address"/></td>
      </tr>
      <tr>
        <td>Last Name:</td>
        <td><input type="text" name="gfn" onKeyPress="return ValidateAlpha(event)" /></td>
        <td>Photo:</td>
        <td><input type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file"/></td>
      </tr>
      <tr>
        <td>Role:</td>
        <td>
          <select name="role" required>
            <option value="">Choose</option>
            <option value="Admin">Administrator</option>
            <option value="Committee">Exam Agency Committee</option>
          </select>
        </td>
        <td><input type="submit" name="registere_committee" value="Register" onclick="return validateemailform()"></td>
        <td><input type="reset"  value="Cancel"></td>
      </tr>
      <tr>
        <td colspan="4"><img id="output" width="100" height="170" style="float: right;"/></td>
      </tr>
    </form>
  </table>
<?php
if(isset($_POST['registere_committee']))
{
$id=$_POST["committee_id"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$role=$_POST["role"];
//photo
$ptmploc=$_FILES["photo"]["tmp_name"];
$pname=$_FILES["photo"]["name"];
$psize=$_FILES["photo"]["size"];
$ptype=$_FILES["photo"]["type"];
if($con)
{	
if(!file_exists("userphoto"))
mkdir("userphoto");
$photopath="userphoto/$pname";

$sqq22="select *from user WHERE uid='$id'";
$result22 = mysqli_query($con, $sqq22);
$count= mysqli_num_rows($result22);
if($count<1){
  
if(copy($ptmploc,$photopath))
{
  
$sq="insert into user values('$id','$fname','$mname','$lname','$sex','$mobile','$email','$photopath','$role')";
$insert1=mysqli_query($con, $sq);
if($insert1)
{
	if($role=="Committee")
	{
	$in=mysqli_query($con, "insert into committee values('$id')");
	if($in)
	echo" User Succesfully Registerd";	
	else
	echo"unable to registered".mysqli_error($con);	
	}
	else if($role=="Admin")
	echo" User Succesfully Registerd";
	else
	echo "No Registered".mysqli_query($con);
	}  
else
echo" No User Succesfully Registerd<br>";
}
else
echo "Unable to upload the photo!";}
else
echo "User Id Already Exist!";
}
else
die("Connection Failed:".mysqli($con));
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
