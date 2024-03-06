<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Enter University</title>
   <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
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
   table {
        border-collapse: collapse;
        margin-left: 30px;
    }

    table td {
        padding: 10px;
    }

    select,
    input[type="number"] {
        width: 300px;
        padding: 10px;
        margin-bottom: 15px;
        border: none;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
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
	  
<div id="content">
 <fieldset class="fieldset"><legend>View Report</legend>
<br>
 <br>
 <center><table>
    <form action="" method="post">
        <tr>
            <td>Select University:</td>
            <td>
                <select name="uname" required>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM university");
                    if (mysqli_num_rows($sql) > 0) {
                        echo "<option value=''>Choose</option>";
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?php echo $row["uname"]; ?>"><?php echo $row["uname"]; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Enter Year:</td>
            <td><input type="number" name="year" required /></td>
        </tr>
        <tr>
            <td>Question Type:</td>
            <td>
                <select name="qtype" required>
                    <option value="">Select type</option>
                    <option value="Regular">Regular</option>
                    <option value="Re_Exam">Re_Exam</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="search" value="Search" /></td>
        </tr>
    </form>
</table>
</center>
 <br>
  <br>
</fieldset>
<?php
if(isset($_POST["search"]))
{
$_SESSION['year']=$_POST["year"];
$_SESSION['unanme']=$_POST["unanme"];
$_SESSION['qtype']=$_POST["qtype"];
header("location:indiv_report.php");	
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
