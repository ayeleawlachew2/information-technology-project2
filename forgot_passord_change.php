<html>
<head>
  <title>Change Password page</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
   <script type="text/javascript" src="css/javascriptdate.js"></script>
    <script type="text/javascript" src="css/javasscript.js"></script>
  <style type="text/css">
  input[type="password"], input[type="text"]
 {
width: 30px;
  
}

  </style>
</head>

<body>
<div id="main">
	<?php
	/* if (!isset($_SESSION)) {
	session_start();		
	}*/
	?>
	<div id="header">
	<div id="banner">
	<?php
	require("dmu.php");	
	?>	 
	</div>
	</div>
	<div id="navigation">
	<?php
	require("menu.php");
	?>
	</div>



	<div id="site_content">	
	<div class="sidebar_container">
	<div class="sidebar">
	<div class="sidebar_item">

	<h2>Login</h2>
	<?php
	require("login.php");
	?>
<br>
	<h2>Calender</h2> 
<script lang="javascript">
monthnames= new Array("January","Februrary","March","April","May","June","July","August","September","October","November","Decemeber");
var linkcount=0;
function addlink(month, day, href) {
var entry = new Array(3);
entry[0] = month;
entry[1] = day;
entry[2] = href;
this[linkcount++] = entry;
}
Array.prototype.addlink = addlink;
linkdays = new Array();
monthdays = new Array(12);
monthdays[0]=31;
monthdays[1]=28;
monthdays[2]=31;
monthdays[3]=30;
monthdays[4]=31;
monthdays[5]=30;
monthdays[6]=31;
monthdays[7]=31;
monthdays[8]=30;
monthdays[9]=31;
monthdays[10]=30;
monthdays[11]=31;
todayDate=new Date();
thisday=todayDate.getDay();
thismonth=todayDate.getMonth();
thisdate=todayDate.getDate();
thisyear=todayDate.getYear();
thisyear = thisyear % 100;
thisyear = ((thisyear < 50) ? (2000 + thisyear) : (1900 + thisyear));
if (((thisyear % 4 == 0) 
&& !(thisyear % 100 == 0))
||(thisyear % 400 == 0)) monthdays[1]++;
startspaces=thisdate;
while (startspaces > 7) startspaces-=7;
startspaces = thisday - startspaces + 1;
if (startspaces < 0) startspaces+=7;
document.write("<table border=5 bgcolor=#egfofl width=215 height=210");
document.write("bordercolor=black><font color=black>");
document.write("<tr bgcolor=#b6c2cd><td colspan=8><center><strong>" 
+ monthnames[thismonth] + " " + thisyear 
+ "</strong></center></font></td></tr>");
document.write("<tr>");
document.write("<td align=center>Su</td>");
document.write("<td align=center>Mo</td>");
document.write("<td align=center>Tu</td>");
document.write("<td align=center>We</td>");
document.write("<td align=center>Th</td>");
document.write("<td align=center>Fr</td>");
document.write("<td align=center>Sa</td>"); 
document.write("</tr>");
document.write("<tr>");
for (s=0;s<startspaces;s++) {
document.write("<td> </td>");
}
count=1;
while (count <= monthdays[thismonth]) {
for (b = startspaces;b<7;b++) {
linktrue=false;
document.write("<td>");
for (c=0;c<linkdays.length;c++) {
if (linkdays[c] != null) {
if ((linkdays[c][0]==thismonth + 1) && (linkdays[c][1]==count)) {
document.write("<a href=\"" + linkdays[c][2] + "\">");
linktrue=true;
      }
   }
}
if (count==thisdate) {
document.write("<font color='FF0000'><strong>");
}
if (count <= monthdays[thismonth]) {
document.write(count);
}
else {
document.write(" ");
}
if (count==thisdate) {
document.write("</strong></font>");
}
if (linktrue)
document.write("</a>");
document.write("</td>");
count++;
}
document.write("</tr>");
document.write("<tr>");
startspaces=0;
}
document.write("</table></p>");
</script>
	</div>
<br><br><br><br><br><br><br><br><br><br>
	</div>
	</div>
	


			 
<div id="content">

<?php
//password encryption
function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}

?>
<div class="content_item" style="margin-top: 0px; margin-left:250px;width:700px; >
<div id="style1">
 
 
 <fieldset class="fieldset"><legend>Change Password</legend>
<form name="myForm" method="post" action="">
<table>
<tr>
<td>New Password</td><td ><input type="password" name="npw" placeholder="Enter New Password" required /></td>
</tr>
<tr>
<td>Confrim Password::</td><td><input type="password" name="cpw"  placeholder=" Confrim New Password" required/></td>
</tr>
<tr>
<td><input type="submit" name="changepw" value="Change Password" ></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
</table>
</form>  
<br><br>
<?php
if(isset($_POST["changepw"]))
{
include("connection.php");
$userid=$_SESSION['userid'];
$newpw=$_POST["npw"];	
$confrimpw=$_POST["cpw"];	
if(strlen($newpw)<=5)
echo "Password Length Must BE Greater Than 5";
elseif(strlen($newpw)>=9)
echo "Password Length Must BE Less than Than 9";
else
{
if($newpw==$confrimpw)
{
$newpassword=encryptpassword($newpw);
$sql="update account set password='$newpassword',password_status='changed' where uid='$userid'";
$updatepassword=mysqli_query($con, $sql);	
if($updatepassword)
{
$x='<script type="text/javascript">alert("Your Password Is Successfully Changed!!!! click Ok Login To The System");window.location=\'index.php\';</script>';
echo $x;
}
else
echo"No Password Successfully Changed".mysqli_error($con);
}
else
echo"New Password and Confrim Password is Not Match!!!";	
}
}
?>
<br>
</fieldset>
 
 
</div> 
</div>
</div>


<div id="footer">
<?php
require("footerout.php");
?>
</div>
<br><br>
<!--close footer-->  
  </div>
</body>
</html>


