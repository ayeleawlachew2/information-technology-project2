<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>view user account</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">
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
.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
width: 535px;
text-align: left;
margin-left: 10px;
margin-top: 20px;
height: 600px;;
border-radius:0px;
border-color: #801137;

}

  </style>
<script language="javascript">
function Clickheretoprint()
{
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:600px;border:-10px solid red;margin-left:400px; font-size:16px; font-family:TimesNewRoman;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$year=$_SESSION['year'];
$sql="select*from depthead where did='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_num_rows($record)>0)
{
while($row=mysqli_fetch_array($record))
{
$dept=$row["dname"];
$unverid=$row["uid"];	
$sql2=mysqli_query($con, "select*from university where uid='$unverid'");
while($unrow=mysqli_fetch_array($sql2))
$univer=$unrow["uname"];	
}	
}

function decryptPassword($encryptedPassword)
{
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    $ivLength = openssl_cipher_iv_length('AES-256-CBC');
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encryptedPassword = substr($encryptedPassword, $ivLength);
    $decryptedPassword = openssl_decrypt(base64_decode($encryptedPassword), 'AES-256-CBC', md5($cryptKey), OPENSSL_RAW_DATA, $iv);
    return rtrim($decryptedPassword, "\0");
}

// function decryptPassword($encryptedPassword)
// {
//     $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
//     $iv = substr($cryptKey, 0, 8); // Use the first 8 bytes of the cryptKey as IV
//     $encryptedPassword = substr($encryptedPassword, 8);
//     $decryptedPassword = openssl_decrypt(base64_decode($encryptedPassword), 'DES-CBC', md5($cryptKey), OPENSSL_RAW_DATA, $iv);
//     return rtrim($decryptedPassword, "\0");
// }
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
//require("dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
//require("deptmenu.php");	

		
?>

    </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 <fieldset class="fieldset">
 <br>
 <!-- <center><a href="javascript:Clickheretoprint()" target="_blank" ><font size="5"color="#3d80c2">Print</font></a></center> -->
 <div style="height: 600px;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<?php
$totlarecordexist=mysqli_query($con, "select*from candidate where year='$year' and unversity='$univer' and dept='$dept'");
if(mysqli_num_rows($totlarecordexist)>0)
{
?>
 <div id="print_content">
 <?php
$rolenumber=0;
$sql="select * from account where password_status='unchanged'";
$recordexist=mysqli_query($con, $sql);
if(mysqli_num_rows($recordexist)>0)
{		
 ?>
   <br><br>
<table border="1" style="margin-left: 20px;" >
<tr><td colspan="12" style="text-align: center;font-weight: bold;font-size: 18px;">Graduate Student account List Who Are Take Exit Exam in <?php echo $univer;?>  For Department Of <?php echo $dept; ?> In <?php echo $year; ?></td></tr>	
<tr>
<th>N<u>O</u></th>
<th>candidate_ID</th>
<th>Frist Name</th>	
<th>Middle Name</th>	
<th>Last Name</th>	
<th>Gender</th>	
<th>Dept</th>	
<th >University</th>	
<th>User Name</th>	
<th>Password</th>
<th>Year</th>		
</tr>
<?php
while($row=mysqli_fetch_array($recordexist))
{
$userid=$row["uid"];
$un=$row["username"];
$encrypt_pw=$row["password"];
$pw=decryptpassword($encrypt_pw);
$candidates="select*from candidate where cid='$userid' and dept='$dept' and year='$year'";
$candidateexist=mysqli_query($con, $candidates);
while($ro=mysqli_fetch_array($candidateexist))
{
$sql=mysqli_query($con, "select*from user where uid='$userid'");
while($row1=mysqli_fetch_assoc($sql))
{
	
		
$fname=$row1["ufname"];
$mname=$row1["umname"];	
$lname=$row1["ulname"];
$sex=$row1["sex"];
$rolenumber++;
echo "<tr>";
echo"<td>".$rolenumber."</td>
	<td>".$userid."</td>
	<td>".$fname."</td> 
	<td>".$mname."</td>
	<td>".$lname."</td> 
	<td>".$sex."</td>  
	<td>".$dept."</td> 
	<td>".$univer."</td> 
	<td>".$un."</td> 
	<td>".$pw."</td>
	<td>".$year."</td>";
echo"</tr>";
}
}
}

?>
</table>
 </div>
 </div>
 <br><br>
<?php
}
else
echo"No Result  Found!!!".mysqli_error($con);
}
else
echo"No Candidate Registered  In $year Year";
?> 
  </fieldset>
  <br>  <br> 
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