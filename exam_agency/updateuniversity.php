<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Update  university profile</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/committee.css"> -->
    <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/home.css">
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
}
.fieldset
{
	width: 350px;
	text-align: left;
	margin-left: 50px;
	margin-top: 25px;
	height: auto;
	 color: #333;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

	}
.fieldset1
{
	width: 370px;
	text-align: left;
	margin-left: 500px;
	margin-top: 20px;
	height: auto;
	position: absolute;

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
    background-color:#00BFA6;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form-table input[type="submit"]:hover {
    background-color: #66092d;
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
		<legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Update University</legend>
 <br>
<table class="form-table">
  <form action="" method="post" enctype="multipart/form-data">
    <tr>
      <td><input type="text" name="searchkey" placeholder="Enter User ID" required /></td>
      <td><input type="submit" name="search" value="Search" /></td>
    </tr>
  </form>
</table>

<?php
if(isset($_POST["search"]))
	{
	$id=$_POST["searchkey"];
	$sql="select * from university where uid='$id'";
	$recordexist=mysqli_query($con, $sql);
	if(mysqli_num_rows($recordexist)>0)
	{
	while($row=mysqli_fetch_array($recordexist))
	{
	echo "<table width='100%' border=0><form action='' method=post>";
	echo"<tr><td>university ID:</td><td><input type=text name='uid' value='".$row["uid"]."'readonly></td></tr>";
	echo "<tr><td>Enter New university Name:</td><td><input type=text name='uname' value='".$row["uname"]."' required></td></tr>";
	echo "<tr><td><input type=submit name=update value=update></td> ";
	echo "<td><input type=reset value=Cancel></td></tr>";
	echo"</form></table>";
	}	
	}
	else
	echo "No University Is Registerd by $id ID ";
	}
else
{
if(isset($_POST["update"]))
{
		$uid=$_POST["uid"];
		$uname=$_POST["uname"];
	
		$sql="update university set uname='$uname' where uid='$uid'";
		$updated=mysqli_query($con, $sql);
		if(mysqli_affected_rows($con))
		echo mysqli_affected_rows($con)." record/s update successfully!";
		else
		echo "Unable to update!";	
}
}

?>
</fieldset>
</center>
<br><br>
<center>
<?PHP

			if($con)
			{	
			$sql="select * from university ORDER BY  uid asc";
			$record=mysqli_query($con, $sql);
			if(mysqli_num_rows($record)>0)
			{
			echo"<table border=1 ><tr><th>University ID</th><th>University Name</th></tr>";
			while($row=mysqli_fetch_array($record))
			{
			echo "<tr>";
			echo"<td>".$row['uid']."</td>";
			echo"<td>".$row['uname']."</td>";
		
			echo"</tr>";
			}
			echo "</table>";
			}
			else
			echo "No Record Found!";
			}


?>
</center>
 </div> 
<br> <br><br><br><br><br>
  </div>
 <?php
}
else
{
header("location:../index.php");
}
?>  
 
       <div>
<?php
require("../footer.php");
?>
   
</div>
 <br> <br>  
</div>
</body>
</html>






