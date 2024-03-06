<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title>View exam date page</title>
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
 
	margin-left: 50px;
}


.fieldset
{
	width: 350px;
	text-align: left;
	margin-left: 500px;
	margin-top: 25px;
	height: auto;
 border-color: #801137;
			 box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
	}

	/* .fieldset2
{
width: 1400px;
text-align: left;
margin-left: 5px;
margin-top: 20px;
height: 600px;;
border-radius:0px;
border-color: #801137;
 color: #333;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	} */
	.form-table {
    margin-left: 30px;
  }

  .form-table td {
    padding: 8px;
  }

  .form-table input[type="number"] {
    width: 100%;
    padding: 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    background-color: #f2f2f2;
    transition: border-color 0.3s ease;
  }

  .form-table input[type="number"]:focus {
    border-color: #801137;
  }

  .form-table input[type="submit"] {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    background-color: #801137;
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
$uid=$_SESSION['$uid'];
//$year=$_SESSION['year'];
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
 <fieldset id="fieldset" ><legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; ">View Candidate</legend>
 <fieldset class="fieldset">
<br>
 <br>
 <table class="form-table">
  <form action="" method="post" name="myForm" onsubmit="return validateForm()">
    <tr>
      <td>Enter Year To View Candidate:<br>
        <input type="number" name="year" required onKeyPress="return isNumberKey(event)" />
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="search" value="Search" /></td>
    </tr>
  </form>
</table>
 <br>
  <br>
</fieldset>
<?php
if(isset($_POST["search"]))
{
$year=$_POST["year"];
//header("location:viewcandidate.php");
?>
  
</div>
</div>
 
<fieldset2 class="fieldset2" >
<br>
<div class="style1">
<?php

$sql="select * from candidate WHERE year='$year'";
$recordfound=mysqli_query($con, $sql);
if(mysqli_num_rows($recordfound)>0)
{

?>
<!-- <div style="height: 550px;width:800px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;"> -->

<?php
echo "<table border='1'>";
echo"<tr><td colspan=12 align='center'>All Graduate Student List Who Are Take Exit Exam In  $year</td></tr>";
echo"<tr> <th>Candidate_ID</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Gender </th>
<th>Mobile</th><th>Email</th><th>Photo</th><th>Department</th><th>University</th><th>Year</th>
</tr>";
while($row=mysqli_fetch_assoc($recordfound))
{
	
	
$cid=$row["cid"];
$sql=mysqli_query($con, "select*from user where uid='$cid'");
$user=mysqli_num_rows($sql);
if($user>0)
{
while($row1=mysqli_fetch_assoc($sql))
echo "<tr> <td>". $row["cid"]."</td><td>".$row1["ufname"]."</td> <td>".$row1["umname"]."</td> <td>".$row1["ulname"]."</td> <td>".$row1["sex"]."</td> <td>".$row1["mobile"]."</td> <td>".$row1["email"]."</td> <td><img src=".$row1["photo"]." width=20 height=20></td> <td>".$row["dept"]."</td>  <td>".$row["unversity"]."</td><td>".$row["year"]."</td></tr>";
}else
echo "No Record Found";

}

echo "</table>";
}
else
echo "No records found!";
?>
</div>
</fieldset2>
</div>
<?php	
}
// else
// {
// echo "No records found!";
// }
?>
 <?php
}
else
{
header("location:../index.php");
}
?>  
</div>
       <div>
<?php
require("../footer.php");
?>
   
</div>
 
</div>
</body>
</html>
