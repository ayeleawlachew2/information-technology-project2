<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Update  Exam setter profile</title>
  <link rel="stylesheet" type="text/css" href="../css/committee.css">
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
	margin-left: 25px;
	width: 940px;
	text-align: justify;
	margin-top: 10px;
}
#fieldset
{
   width: 535px;
	text-align: left;
	margin-left: 200px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;
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
    background-color: #801137;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form-table input[type="submit"]:hover {
    background-color: #66092d;
  }
input[type="text"], input[type="submit"],input[type="email"],select
 {
width: 180px;
height: 30px;

  
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
<br>
  
 <fieldset id="fieldset" ><legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Update Exam Setter info</legend>
 
 
 
 <table>
  <form action="" method="post" enctype="multipart/form-data">
    <tr>
      <td><input type="text" name="searchkey" placeholder="Search by ID" /></td>
      <td><input type="submit" name="search" value="Search" /></td>
    </tr>
    <tr>
      <td colspan="2"><hr style="border-color: #801137; width: 535px;"></td>
    </tr>
 
 <?php
 if(isset($_POST["search"]))
{
$searchvalue=$_POST["searchkey"];	
$d=mysqli_query($con, "select*from examsetter where sid='$searchvalue'");
while($r=mysqli_fetch_array($d))
{
//$dept=$r["dept"];
$dept=$r["dname"];	
$committee_id=$r["committee_id"];	
}
if(mysqli_num_rows($d)>0)
{
 $sql="select * from user where uid='$searchvalue'";
 $recordfound=mysqli_query($con, $sql);
 if(mysqli_affected_rows($con))
	{

	while($row=mysqli_fetch_assoc($recordfound))
	{
		
	
	
echo"<tr><td>ID:</td><td><input type=text name='did1' value='".$row["uid"]."'readonly></td></tr>";
echo "<tr><td>Frist Name:</td><td><input type=text name='fname1' value='".$row["ufname"]."' required pattern='[a-zA-Z]+'></td></tr>";
echo "<tr><td>Father Name:</td><td><input type=text name='fname2' value='".$row["umname"]."' required pattern='[a-zA-Z]+'></td></tr>";
echo "<tr><td>Grand Father Name :</td><td><input type=text name='lname2' value='".$row["ulname"]."' required pattern='[a-zA-Z]+'></td></tr>";
echo "<tr><td>Sex:</td><td><input type=text name='sex' value='".$row["sex"]."' required></td></tr>";
echo "<tr><td>Mobile :</td><td><input type=text name='mb' value='".$row["mobile"]."' required></td></tr>";
echo "<tr><td>Email :</td><td><input type='email' name='email' value='".$row["email"]."' required></td></tr>";
	echo "<tr><td>Department:</td>";
//Display all department list
if($con)
 {
 $sql1="select dname from department";
$recordfound1=mysqli_query($con, $sql1);
if(mysqli_affected_rows($con))
{
echo"<td><select name='dname1'>";
	while($row1=mysqli_fetch_assoc($recordfound1))
	{
		$dept1=$row1["dname"];
	if($dept1==$dept)
	{
	?>
	<option value="<?php echo $dept;?>" selected ><?php echo  $dept;?></option>
	<?php	
	}	
	else
	{
	?>
  <option value="<?php echo $dept1;?>" ><?php echo $dept1;?></option>
	<?php	
	}
	
	
	}
	

echo"</td></tr></select";
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
	//ending universty edition
	echo "<tr><td>Committeee ID</td><td><input type=text name='committee_id' value='".$committee_id."' readonly required></td></tr>";

	}
	echo "<tr><td><input type=submit name='update' value='update'></td> ";
	echo "<td><input type=reset value=Cancel></td></tr>";
  }
	else
	echo "<div class='style1'>No result found</div>";
	
}
else
echo "No Record Found";
}

elseif(isset($_POST["update"]))
{
$id=$_POST["did1"];
$committee_id=$_POST["committee_id"];
$fname=$_POST["fname1"];
$mname=$_POST["fname2"];
$lname=$_POST["lname2"];
//$univer=$_POST["uname11"];
//$col=$_POST["cname"];
$dept=$_POST["dname1"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
//photo
if($con)
{	
$sql="update user  set ufname='$fname',umname='$mname',ulname='$lname',sex='$sex',mobile='$mobile',email='$email' where uid='$id'";
$sq="update examsetter  set dname='$dept' where sid='$id'";
echo"<div class='style1'>";
$updated=mysqli_query($con, $sql);
$updated1=mysqli_query($con, $sq);
if($updated&&$updated1)
echo "a record/s update successfully!";
else
echo "Unable to update!".mysqli_error($con);
echo"</div>";

}

else
die("Connection Failed:".mysqli($con));	
}
else
echo"<div class='style1'>well come to editing department head information/profile</div>";
 ?>
</form>
</table>
</div>
</fieldset>
</div>

<?php
if($con)
 {
 $sql="select * from examsetter";
$recordfound=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
	
	?>
<div style="height: auto;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll; margin-left: 20px;" >
	<?php
	
	
	echo "<table border='1'>";
	echo"<tr> <th>ID_Number</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Sex </th>
	<th>Mobile</th><th>photo</th><th>Email</th><th>Deparment</th><th>Committee ID</th></tr>";
while($row=mysqli_fetch_assoc($recordfound))
{
$did=$row["sid"];
$sql=mysqli_query($con, "select*from user where uid='$did'");
$user=mysqli_num_rows($sql);
if($user>0)
{
while($row1=mysqli_fetch_assoc($sql))
echo "<tr> <td>". $row1["uid"]."</td><td>".$row1["ufname"]."</td> <td>".$row1["umname"]."</td> <td>".$row1["ulname"]."</td> <td>".$row1["sex"]."</td> <td>".$row1["mobile"]."</td> <td><img src=".$row1["photo"]." width=40 height=50 alt='image'/></td> <td>".$row1["email"]."</td> <td>".$row["dname"]."</td>   <td>".$row["committee_id"]."</td></tr>";
}
else
echo"No Record Found";

}
echo "</table></div>";
	
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";


?>

<br><br>
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






