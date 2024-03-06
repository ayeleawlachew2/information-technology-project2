<html>
<head>
  <title>Forgot Password Page </title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
   <script type="text/javascript" src="css/javascriptdate.js"></script>
    <script type="text/javascript" src="css/javasscript.js"></script>
  <style type="text/css">
fieldset
{
margin-top: 90px;
width: 500px;
margin-left: 300px;

}
#forgot input[type="submit"],input[type="reset"]
 {
  height: 25px;
  width: 150px;;
  background:white;
  color: #150000;
  font-size: 15px;
  border-color: #a20000;
  
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
<br><br><br><br><br><br><br>
<br><br><br>
	</div>
	</div>
	
<fieldset><legend align="right">Fill The Form Correctly</a></legend>
<br><br>
<form action="" method="post">
<center>
<div id="forgot">
<table>
<tr><td>Enter User Name	</td><td><input  type="text" name="username"  required /></td>	</tr>
<tr><td>Phone Number</td><td><input  type="text" name="mb"  required /></td>	</tr>
<tr><td>Last Name</td><td><input  type="text" name="lname"  required /></td>	</tr>
<tr><td>Email</td><td><input  type="text" name="email"  required /></td>	</tr>
<tr>
<td><input type="submit" name="forgot" value="Next"/></td>
<td><input type="reset" value="Cancel" style=" height: 25px;
  width: 150px;;
  background:white;
  color: #150000;
  font-size: 15px;
  border-color: #a20000;"/></td>
</tr>
</table>
</div>
</center>
<br><br>
</form>
<?php
if(isset($_POST["forgot"]))
{
include("connection.php");
$uname=$_POST["username"];
$phone=$_POST["mb"];
$name=$_POST["lname"];
$email=$_POST["email"];

$exist=0;	
$sql=mysqli_query("select*from account where username='$uname'",$con);
$exist=mysqli_num_rows($sql);
if($exist>0)
{	
if($row1=mysqli_fetch_array($sql))
{
$userid=$row1["uid"];
$un=$row1["username"];
$chekeit=mysqli_query("select*from user WHERE uid='$userid'");
if(mysqli_num_rows($chekeit)>0)
{
while($row=mysqli_fetch_array($chekeit))
{
$name1=$row["ulname"];	
$mb1=$row["mobile"];	
$emai1=$row["email"];
}
if($name==$name1 && $phone=$mb1 && $un==$uname && $emai1==$email)
{
$_SESSION['uname']=$uname;
$_SESSION['userid']=$userid;

header("location:forgot_passord_change.php");		
}
else
echo "<br>In Correct Entry";
	
}
else
echo "<br>You Enter Invalid Entry";
}
}
else
echo "<br>Invalid UserName That You Enter";
}


?>
<br><br>
</fieldset>

			 
<div id="content">
<div class="content_item" style="margin-top: 0px; margin-left:250px;width:700px; >
<div id="style1">


   
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


