<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Registrar page</title>

  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css"> -->
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
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
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
  .form-table input[type="reset"],
  .form-table select {
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
  .form-table input[type="reset"]:focus,
  .form-table select:focus {
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
    max-width: 100px;
    max-height: 102px;
    margin-left: 10px;
    border-radius: 5px;
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
$uid=$_SESSION['$uid'];

?>
  
	<div>
	<?php
require("examagency_commen.php");	
?>
   <fieldset id="fieldset">
  <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">  Register Exam setter</legend>
 
<table class="form-table">
  <form action="" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
    <tr>
      <td>Setter-ID:</td>
      <td><input type="text" name="sid" pattern="[a-zA-Z0-9/_.\-+]+" required /></td>
      <td>Department:</td>
      <td>
        <select name="dname" required>
          <option value="">Select Your Option</option>
          <?php
            if ($con) {
              $sql = "select DISTINCT dname from department";
              $recordfound = mysqli_query($con, $sql);
              if (mysqli_affected_rows($con)) {
                while ($row = mysqli_fetch_assoc($recordfound)) {
                  ?>
                  <option value="<?php echo $row["dname"]; ?>"><?php echo $row["dname"]; ?></option>
                  <?php
                }
              } else {
                echo "No records found!";
              }
            } else {
              echo "connection failed";
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>First Name:</td>
      <td><input type="text" name="fn" onKeyPress="return ValidateAlpha(event)" /></td>
      <td>Mobile Phone:</td>
      <td><input type="text" name="mb" placeholder="Enter Phone Number" /></td>
    </tr>
    <tr>
      <td>Middle Name:</td>
      <td><input type="text" name="mn" onKeyPress="return ValidateAlpha(event)" /></td>
      <td>Email:</td>
      <td><input type="text" name="email" placeholder="Enter Correct Email Format" /></td>
    </tr>
    <tr>
      <td>Last Name:</td>
      <td><input type="text" name="gfn" onKeyPress="return ValidateAlpha(event)" /></td>
      <td>Photo:</td>
      <td><input type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file" /></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td>
        <select name="sex" required readonly>
          <option value="">choose option</option>
          <option value="m">Male</option>
          <option value="f">Female</option>
        </select>
      </td>
      <td>Year:</td>
      <td><input type="text" name="year" onKeyPress="return isNumberKey(event)" /></td>
    </tr>
    <tr>
      <td>Committee ID:</td>
      <td><input type="text" name="committee_id" value="<?php echo $uid; ?>" readonly /></td>
      <td><input type="submit" name="registersetter" value="Register" onclick="return validateemailform()"></td>
      <td><input type="reset" value="Cancel"></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><img id="output" width="100" height="102" style="float: right;" /></td>
      <td></td>
    </tr>
  </form>
</table>
<br>
<?php
if(isset($_POST['registersetter']))
{
$id=$_POST["sid"];
$committee_id=$_POST["committee_id"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$dept=$_POST["dname"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$year=$_POST["year"];
$role="Exam setter";
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
if(copy($ptmploc,$photopath))
{
$sq="insert into user values('$id','$fname','$mname','$lname','$sex','$mobile','$email','$photopath','$role')";
$insert1=mysqli_query($con, $sq);	
	
	if($insert1)
	{
  $sql="insert into Examsetter values('$id','$dept','$committee_id','$year')";
	$insert=mysqli_query($con, $sql);
	if($insert)
    echo" Exam Setter Successfully Registered";
    else
    echo" Unable To Registered<BR>".mysqli_error($con);
    }
	else
	echo" Unable To Registered<BR>".mysqli_error($con);


}

else
echo "Unable to upload the photo!";
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
