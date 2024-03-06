<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Enter Year</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <link rel="stylesheet" type="text/css" href="../css/home.css">
    <script type="text/javascript" src="../css/javasscript.js"></script>
  <style type="text/css">
.style1 
{
     font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size:20px;;
	width:920px;
	text-align:left;
	margin-top: 10px;
	color: black;
	margin-left: 50px;
	border-radius:0px;
	
}
  	.fieldset
{
	width: 535px;
	text-align: left;
	margin-left: 200px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;


	}
  </style>
  
</head>

<body>
 <div id="main">
   <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("../dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("committee_menu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
 <fieldset class="fieldset">
<br>
 <br>
 <table style="margin-left: 30px;">
<form action="" method="post" name="myForm" onsubmit="return validateForm()">
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Year To View Candidate:<br>
<input type="number" name="year" required  onKeyPress="return isNumberKey(event)"/></td>
</tr>

<tr>
<td><input type="submit" name="search" value="Search"/></td>
</tr>

</form>
</table>
 <br>
  <br>
</fieldset>
<?php
if(isset($_POST["search"]))
{
$_SESSION['year']=$_POST["year"];
//header("location:viewcandidate.php");	
}
?>

 <?php
}
else
{
header("location:../index.php");
}
?>
 <br><br><br><br> <br><br><br><br> <br><br><br><br>
 <br><br>
</div>
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
