<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
	 <title>add question page</title>
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
	width: 750px;
	text-align: left;
	margin-left:500px;
	margin-top: -750px;
	height: auto;
	border-radius:0px;
	background: #fcf1ed;
	text-align-last: auto;
     font-family: times new roman;
	


	}
	input[type=text],select,input[type=submit],input[type=reset],textarea
	 {
    width: 90%;
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
<script>
function validateform()
{
var question = document.forms["myForm"]["txtquest"].value;
if (question == "") 
{
alert("The Question Is Empty");
document.myForm.txtquest.focus() ;
return false;
}
var a = document.forms["myForm"]["txta"].value;
if (a == "") 
{
alert("The Exam Question Choice A Is Empty");
document.myForm.txta.focus() ;
return false;
}
var b = document.forms["myForm"]["txtb"].value;
if (b == "") 
{
alert("The Exam Question Choice B Is Empty");
document.myForm.txtb.focus() ;
return false;
}
var d = document.forms["myForm"]["txtc"].value;
if (d == "") 
{
alert("The Exam Question Choice C Is Empty");
document.myForm.txtc.focus() ;
return false;
}
var d = document.forms["myForm"]["txtd"].value;
if (d == "") 
{
alert("The Exam Question Choice D Is Empty");
document.myForm.txtd.focus() ;
return false;
}

var answ = document.forms["myForm"]["txtansw"].value;
if (answ == "") 
{
alert("The Exam Question Selection Answer Is Empty");
document.myForm.txtansw.focus() ;
return false;
}
	
}	
	
</script>
	</style>

	</head>

	<body>
	<div id="main">
	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$year=$_SESSION['year'];
$qtype=$_SESSION['questiontype'];
$sql="select * from Examsetter where sid='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
	while($row=mysqli_fetch_assoc($record))
	{
//$dept=$row["dept"];
$id=$row["sid"];
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
	<div >
	<fieldset class="fieldset"><legend>Any Exam Setter Can Set Question In Below Form!</legend>
<br>
<div style="margin-left: 50px;">	
<form action="" method="post" name="myForm">



<table width="90%">
  <tr>
<td><label for="Sid">Exam Setter_ID</label><input type="text"  name="sid" value="<?php echo($id);?>" readonly /></td>
<td> <label for="year">Year</label><input type="number"  name="years" readonly value="<?php echo $year;?>" /></td>
  </tr>

  <tr>
<td><label for="Department">Department</label><input type="text"  name="departmentname" readonly value="<?php echo $dept;?>" /></td>
<td><label for="qtype">Question Type</label><input type="text"  name="qtype" readonly value="<?php echo $qtype;?>" /></td>
</tr>
<tr>
<td><label>Quetion Number</label><input type="number"  name="question_number"   placeholder="Fill Choice quetion number" /></td>
<td><label>Select Answer</label><br>
<select name="txtansw" >
<option value="">choose correct answer</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
</select>
</td>
</tr>
<tr>
<td colspan="2"><label for="question">Question</label><br>
<textarea name="txtquest"  rows="10" placeholder="FillQuestion Detail..." ></textarea> </td>
</tr>
<tr>
<td><label>Choice A</label><input type="text"  name="txta"   placeholder="Fill Choice 1...." /></td>
<td><label>Choice B</label><input type="text"  name="txtb"   placeholder="Fill Choice 2...." /></td>
</tr>
<tr>
<td><label>Choice C</label><input type="text"  name="txtc"   placeholder="Fill Choice 3...." /></td>
<td><label>Choice D</label><input type="text"  name="txtd"   placeholder="Fill Choice 4...." /></td>
</tr>
<tr>
<td><input type="submit" name="savequestion" value="save" onclick="return validateform()">	</td>
<td><input type="reset"  value="Cancel"></td>
</tr>

 </table>
 
 
 
</form>

</div>
<div style="margin-left: 20px;">
<?php
if(isset($_POST['savequestion']))
{
$dname=$_POST["departmentname"];
$question_number=$_POST["question_number"];
$txtquest=$_POST["txtquest"];
$txta=$_POST["txta"];
$txtb=$_POST["txtb"];
$txtc=$_POST["txtc"];
$txtd=$_POST["txtd"];
$txtansw=$_POST["txtansw"];
$qstatus="active";
$sid=$_POST["sid"];
$qtype1=$_POST["qtype"];
if($con)
{

  $sql="insert into question values(' ','$question_number','$year','$dname','$txtquest','$txta','$txtb','$txtc','$txtd','$txtansw','$qtype','$qstatus','$sid')";
   $insert=mysqli_query($con, $sql);

   if(mysqli_affected_rows($con))
   	echo mysqli_affected_rows($con)."  Exam Question Is Saved Sucessfully".mysqli_error($con);
   else
   	echo "Exam Question Saved Sucessfully, Because You May be Add Repeated Quetion.".mysqli_error($con);

  //  if($insert)
  //   echo"Exam Question Is Saved Sucessfully";
	// else
	// echo" NO Exam Question Saved Sucessfully".mysqli_error($con);			
}
else
echo"Connection Failed:".mysqli_error($con);
}
?>
</div>
<br><br><br><br>
</fieldset>
<br><br>
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
	
	<div id="footer">
	<?php
	//require("../footer.php");
	?>

	</div>
	<br><br>
	</div>
	</body>
	</html>
