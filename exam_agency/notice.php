<?php
session_start();
include("../connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Notice</title>
  <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
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

@media (max-width: 768px) {
  /* Styles for screens smaller than 768px */
  #fieldset {
    margin-top: 10px; /* Adjust the desired vertical position for smaller screens */
    margin-right: 5%; /* Adjust the right margin for smaller screens */
  }
}
 input[type="text"],input[type="date"]
 {
  width: 200px;
  margin-left:0px;	
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
  .form-table select,
  .form-table textarea {
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
  .form-table select:focus,
  .form-table textarea:focus {
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
  </style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$sql="select*from user where uid='$uid'";
$query=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
while($row=mysqli_fetch_array($query))
$role=$row["role"];	
}
else
echo"The Record Is Not Found";
?>
  
	<div>
	<?php
require("examagency_commen.php");

		
?>

    </div> 
 
 <fieldset id="fieldset">
  <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Write and post new notice</legend>
 
 <table class="form-table">
  <form action="" method="post">
    <tr>
      <td>Status:</td>
      <td>
        <select name="status" required>
          <option value="">choose status</option>
          <option value="active">Active</option>
          <option value="not_active">Not Active</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Date:</td>
      <td><input type="text" name="ndate" value="<?php echo date("Y-m-d"); ?>" required /></td>
    </tr>
    <tr>
      <td>Expire Date:</td>
      <td><input type="date" name="exdate" required /></td>
    </tr>
    <tr>
      <td>Title:</td>
      <td><input type="text" name="title" required /></td>
    </tr>
    <tr>
      <td>Content:</td>
      <td>
        <textarea name="ncontent" required cols="50" rows="5"></textarea>
      </td>
    </tr>
    <tr>
      <td>Send From:</td>
      <td>
        <input type="text" name="sender" readonly value="<?php echo $role; ?>" />
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="notice" value="Post"></td>
      <td><input type="reset" value="Cancel"></td>
    </tr>
  </form>
</table>
<?php

if(isset($_POST['notice']))
{
$ndate=$_POST["ndate"];
$status=$_POST["status"];
$ex_date=$_POST["exdate"];
$tilte=$_POST["title"];
$content=$_POST["ncontent"];
$sender=$_POST["sender"];

if($con)
{
  $sql="insert into notice values(' ','$status','$tilte','$ndate','$ex_date','$content','$sender')";
   $insert=mysqli_query($con, $sql);
   if($insert)
    echo" a record is inserted sucessfully";
	else
	echo" NO record inserted".mysqli_error($con);
	
}
else
echo"Connection Failed:".mysqli_error($con);
}
?>


 
</fieldset>
 
       <?php
}
else
{
header("location:../index.php");
}
?> 
 
</body>
</html>
