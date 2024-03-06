<?php
include("connection.php");
?>
<html>
<head>
  <title>View Exam Date</title>
 <link rel="icon" href="image/logo.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/image_slide.js"></script>
   <script type="text/javascript" src="../css/javascriptdate.js"></script>
  
</head>
<style>
  .fieldset {
    width: 750px;
    text-align: left;
    margin: 0 auto; /* Center the fieldset horizontally */
    margin-top: 10px; /* Adjust the top margin as needed */
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translateX(-50%);
  border-radius: 5px;
    border-color: #801137;
}
 .custom-table {
  width: 750px;
      border-collapse: collapse;
    }

    .custom-table th,
    .custom-table td {
      text-align: left;
      padding: 8px;
    }

    .custom-table th {
      text-align: center;
    }

    .custom-table tr:nth-child(even) {
      background-color: #f2f2f2;
    }


</style>
<body>
<header>
  <div>
    <img src="image/logo.png" alt="Logo" class="logo">
    <h1 class="heading">Online Exit Examination System</h1>
  </div>
</header>

<nav>
  <div>
    <?php
    require("menu.php");
    ?>
  </div>
</nav>
<fieldset class="fieldset"><legend>View Schedule</legend>
<BR><BR>
<div style="margin-left: 20px; background-color:#bccdf1;">
 
</div>
<?php
if($con)
 {
 $sql="select * from examdate  ORDER by year ASC" or die(mysqli_error());;
$recordfound=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
	
?>
<div  >
	<?php
	echo "<table class='custom-table'>";
	echo"<tr> <th>Department</th><th>Activity</th><th>Start_date</th><th>End_Date</th><th>Start_Time</th><th>End_Time</th><th>year</th></tr>";
	while($row=mysqli_fetch_assoc($recordfound))
echo "<tr> <td>". $row["dept"]."</td><td>".$row["question_type"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";
	echo "</table></div>";	
}
    else
     echo "No records found!";
 }
   else
   echo"connection failed";
?>

<br>
 </fieldset>


</div> 
</div>
 
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
</div>
</div>
</div>

<footer style="background-color:  #e2e0e0;">
    <?php
        require("footer.php");
    ?>
</footer>
  
  
</body>
</html>