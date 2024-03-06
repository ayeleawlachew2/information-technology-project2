	<?php
	session_start();
	include("../connection.php");
	?>
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
	<title>logfile</title>
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
    width: 750px;
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
table 
{
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
	</style>

	</head>

	<body>
	<div id="main">
	<?php

	if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
	{
	?>

		<div >
	<?php
require("admin_commen.php");	

		
?>
	</div>

	<fieldset class="fieldset"><legend>All User Activity </legend>
	<br>
	<div style="margin-left: 20px;">
	<div id="content" style="margin-top: 20px;">
	<div style="height:900px ;width:900px;
	border:solid 4px #dldbeg;
	overflow-y:scroll;
	overflow-x:scroll;">
	<?php
		if($con)
		{
			$sql="select * from logtable ORDER BY  date DESC";
			$log=mysqli_query($con, $sql);
			$logexist=mysqli_num_rows($log);
			if($logexist>0)
			{
			$no=1;
			?>
	<table border="1">
			<tr>
			<th>&nbsp;&nbsp;&nbsp;</th>	
			<th>User_ID</th>
			<th>User Name</th>
			<th>Role</th>
			<th>Login_Time</th>
			<th>Logout_Time</th>
			<th>Start Time</th>
			<th>Activity Type</th>
			<th>Activity Performed</th>
			<th>IP Address</th>
			<th>Work Done Date</th>
			</tr>
			<?php
			while($row=mysqli_fetch_assoc($log))
			{
			echo "<tr> <td> $no</td><td>". $row["user_id"]."</td><td>".$row["username"]."</td><td>".$row["role"].
			"</td><td>".$row["login_time"]."</td><td>".$row["logout_time"]."</td><td>".$row["start_time"]."</td>
			<td>".$row["activity_type"]."</td><td>".$row["activity_performed"]."</td><td>".$row["ip_address"]."
			</td><td>".$row["date"]."</td></tr>";
			$no++;	
			}


			?>	
	</table>

			<?php	
			}
			else
			echo"No User Activity Is Registered";

		}
		else
		echo"connection failed";
			?>
	
	</div>
	</div>
	</fieldset>
	<br><br><br><br><br><br><br><br><br><br><br><br>

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
	<br> <br> 
	</div>
	</body>
	</html>
