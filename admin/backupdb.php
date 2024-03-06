<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>backup database </title>
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
$activity_type="Backup database";
//log file
?>
	
  	<div >
	<?php
require("admin_commen.php");
		
?>
	</div>
		


    </div><!--close menubar-->	

	<fieldset class="fieldset">

<div id="content">
<script type = "text/javascript" >
 function preventBack()
 {
 window.history.forward();
 } 
 setTimeout("preventBack()", 0); 
 window.onunload=function(){null};
 
  </script>
<?php
$tables = array();
$query = mysqli_query($con, 'SHOW TABLES');
while($row = mysqli_fetch_row($query))
{
     $tables[] = $row[0];
}

$result = "";
foreach($tables as $table)
{
$query = mysqli_query($con, 'SELECT * FROM '.$table);
$num_fields = mysqli_num_fields($query);

$result .= 'DROP TABLE IF EXISTS '.$table.';';
$row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE '.$table));
$result .= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++)
 {
while($row = mysqli_fetch_row($query))
{
   $result .= 'INSERT INTO '.$table.' VALUES(';
     for($j=0; $j<$num_fields; $j++)
     {
       $row[$j] = addslashes($row[$j]);
       $row[$j] = str_replace("\n","\\n",$row[$j]);
       if(isset($row[$j]))
       {
		   $result .= '"'.$row[$j].'"' ; 
		}
		else
		{ 
			$result .= '""';
		}
		if($j<($num_fields-1))
		{ 
			$result .= ',';
		}
    }
   	$result .= ");\n";
}
}
$result .="\n\n";
}

//Create Folder
$folder = 'C:/xampp/htdocs/';
if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);

//$date = date('m-d-Y-h-m-s'); 
$filename = $folder."backup"; 

$handle = fopen($filename.'.sql','w+');
$take=fwrite($handle,$result);
fclose($handle);
?>

	
	<?php
	echo"<div style='margin-left:190px;margin-top:50px;font-size:20px;'>";
if($take)
{
 echo "Database Backed Up Successfully!!!<br>";
 echo "<br>Path=$filename";	
 $activity="Admin take backup database to path= $filename";
$logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
 
}
else
echo "Unable to take backup!!!!".mysqli_error($con);
echo"</div>"  ;    
    ?>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br>  
	</fieldset>
</div>
<?php
}
else
{
header("location:../index.php");
}
?>    
 
       <div id="footer" >
<?php
require("../footer.php");
?>
   
</div>
 <br><br>
 
  </div>
</body>
</html>
