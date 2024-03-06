<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Update  notice</title>
  <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">
body {
            margin: 0;
            padding: 0;
        }

         header {
    background-color: #00BFA6;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  #header {
    display: flex;
    align-items: center;
  }

  .logo {
    display: inline-block;
  vertical-align: middle;
  height: 80px;
  width: 80px;
  border-radius: 50%;
  overflow: hidden;
  }

  .header-content {
    display: flex;
    flex-direction: column;
  }

 .heading {
    font-family: 'Times New Roman', Times, serif;
    margin-left: 5px;
    font-size: 28px; /* Increase the font size as desired */
    font-weight: bold;
    color: #fff; /* Set the text color */
  }

  .subheading {
    margin-top: 5px; /* Add margin-top for spacing */
    margin-left: 20px; /* Add margin-left to move the text slightly to the right */
    font-size: 16px; /* Increase the font size as desired */
    color: #fff; /* Set the text color */
  }

  .search-form {
    display: flex;
    align-items: center;
  }

  .search-form input[type="text"] {
    padding: 5px;
    border: none;
    border-radius: 3px;
    margin-right: 5px;
  }

  .search-form button[type="submit"] {
    background-color: #fff; /* Set the button background color */
    color: #00BFA6; /* Set the button text color */
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
  }
.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
	margin-left: 25px;
	width: 940px;
	text-align: justify;
	margin-top: 10px;
}
.fieldset
{
	width: auto;
	text-align: left;
	margin-left: 50px;
	margin-top: 25px;
	height: auto;
	 color: #333;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

	}
	.form-table {
    width: 100%;
    margin-bottom: 10px;
    border-collapse: collapse;
  }

  .form-table td {
    padding: 8px;
  }

  .form-table input[type="text"],
  .form-table input[type="submit"] {
    width: 100%;
    padding: 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
    background-color: #f2f2f2;
    transition: border-color 0.3s ease;
  }

  .form-table input[type="text"]:focus,
  .form-table input[type="submit"]:focus {
    border-color: #801137;
  }

  .form-table input[type="submit"] {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    background-color: #00BFA6;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form-table input[type="submit"]:hover {
    background-color: #66092d;
  }

  .inner-table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
  }

  .inner-table th,
  .inner-table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }
	
input[type="text"], input[type="submit"],select
 {
width: 180px;
height: 30px;

  
}
.select-status {
  width: 100%;
  padding: 8px;
  border: none;
  border-bottom: 1px solid #ccc;
  margin-bottom: 10px;
  background-color: #f2f2f2;
  transition: border-color 0.3s ease;
}

.select-status:focus {
  border-color: #801137;
}

table {
  border-collapse: collapse;
  width: 80%;
  margin: 0 auto;
  font-family: Arial, sans-serif;
  color: #333;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

th, td {
  text-align: left;
  padding: 10px;
  border-bottom: 1px solid #ddd;
}

th {
  text-align: center;
  background-color: #f2f2f2;
  font-weight: bold;
  color: #555;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

tr:hover {
  background-color: #f5f5f5;
}
</style>
  </style>
  
</head>

<body>
 <div id="main">
 <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
   
	 

  <header class="header">
       
            <div id="header"  >
                <img src="../image/logo.png" alt="Logo" class="logo" style="display: inline-block;">
                <div class="header-content" style="display: inline-block;">
                    <h1 class="heading" style="display: inline-block;">Online Exit Examination System</h1>
                    <p class="subheading">Welcome To Exam Agency Page</p>
                </div>
            </div>
  


             
          <li style="list-style-type: none;">
  <button onclick="window.location.href = 'committee_page.php';" style="padding: 10px; background-color: #585858; color: #ffffff; border: none; border-radius: 5px; cursor: pointer;">
    <i class="fas fa-home" style="margin-right: 5px;"></i> Home
  </button>
</li>
        </header> 
 
 <div>
 <center><fieldset class='fieldset'>
		<legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Update Notice</legend>
 <div style="margin-top:30px;margin-left: 200px;">
 <table class="form-table">
  <form action="" method="post" enctype="multipart/form-data">
    <tr>
      <td><input type="text" name="searchkey" placeholder="search by using ID" /></td>
      <td><input type="submit" name="search" value="Search" /></td>
    </tr>
  </form>
</table>
<?php
 if(isset($_POST["search"]))
{
	$key=$_POST["searchkey"];
	$sql="select*from notice where notice_number='$key'";
	$recordfound=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
while($row=mysqli_fetch_assoc($recordfound))
{	
$q=$row["Content"];
?>
<tr>
  <td>Content</td>
  <td><textarea name="content" cols="30" rows="5"><?php echo $q;?></textarea></td>
</tr>

<?php
echo "<tr><td >Notice_id :</td><td><input type=text name='nid' value='".$row["notice_number"]."'/></td></tr>";
echo "<tr><td>Notice Title B :</td><td><input type=text name='title' value='".$row["title"]."'/></td></tr>";
echo "<tr><td>Date :</td><td><input type=text name='date' value='".$row["Dates"]."'/></td></tr>";
echo "<tr><td>Expire Date:</td><td><input type=text name='exdate' value='".$row["Ex_Dates"]."'/></td></tr>";
echo"<tr>";
?>
<td>Status:</td>
<td>
  <select name="status" class="select-status" required>
    <option value="">Choose status</option>
    <option value="active">Active</option>
    <option value="not_active">Not Active</option>
  </select>
</td>

<?php
echo "<tr><td><input type=submit name='update' value='update'></td> ";
echo "<td><input type=reset value=Cancel></td></tr>";
}
}
	else
	echo "No Notice Registerd!!!";		
}
else
{
if(isset($_POST["update"]))
{
$nid=$_POST["nid"];
$status=$_POST["status"];
$title=$_POST["title"];
$conn=$_POST["content"];
$date=$_POST["date"];
$exdate=$_POST["exdate"];

if($con)
{	
$sql="update notice  set Content='$conn',title='$title',Dates='$date',Ex_Dates='$exdate',status='$status' where notice_number='$nid'";
$updated=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
echo mysqli_affected_rows($con)."  a record/s update successfully!".mysqli_error($con);
else
echo "Unable to update!".mysqli_error($con);
}

else
die("Connection Failed:".mysqli($con));	
	}
}

//view

?>
</form></table>
	</div>
  
 <?php 
  $sql="select*from notice ";
$record=mysqli_query($con, $sql);
if(mysqli_num_rows($record)>0)
{
?>
<table class="inner-table">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Content</th>
      <th>Date</th>
      <th>Expire Date</th>
      <th>Status</th>
    </tr>
<?php
while($row=mysqli_fetch_array($record))
{
echo"<tr>

<td>".$row["notice_number"]."</td>
<td>".$row["title"]."</td>
<td>".$row["Content"]."</td>
<td>".$row["Dates"]."</td>
<td>".$row["Ex_Dates"]."</td>
<td>".$row["status"]."</td>

</tr>"	;
}
?>	
</table>
<?php	
}
else
echo"No Notice Is Registerd";


?>
 </div> 
</fildeset>
	 </center>
<br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br> 
<br><br><br><br>

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
require("../footer.php");
?>
   
</div>
 <br> <br>  
</div>
</body>
</html>






