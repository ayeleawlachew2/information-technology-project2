<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View set score</title>
 <!-- <link rel="stylesheet" type="text/css" href="../css/committee.css">
    <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/home.css"> -->
  <style >
   
.fieldset {
      width: 750px;
      text-align: left;
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
<div>
      <?php
      require("examagency_commen.php");
      ?>
    </div>
 
 
<div>
<fieldset class="fieldset"><legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">View Each Score For All Department</legend>
<BR><BR>
<div style="margin-left: 20px; background-color:#bccdf1;">
 
</div>
<?php
if($con)
 {
 $sql="select * from set_score ORDER by year ASC" or die(mysqli_error());;
$recordfound=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
	
?>
<div style="height: 300px;width: auto;margin-left: 20px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<center>
	<?php
	echo "<table border='1'>";
	echo"<tr> <th>score_ID</th><th>Department</th><th>Passing score</th><th>year</th></tr>";
	while($row=mysqli_fetch_assoc($recordfound))
	echo "<tr> <td>". $row["score_id"]."</td><td>".$row["dept"]."</td> <td>".$row["score"]."</td><td>".$row["year"]."</td></tr>";
	echo "</table>";	
}
    else
     echo "No records found!";
 }
   else
   echo"connection failed";
?>
</center>
</div>
<br>
 </fieldset>


</div> 
</div>
</div>
</div>
	 <?php
}
else
{
header("location:../index.php");
}
?>
  
</div> 
</body>
</html>



