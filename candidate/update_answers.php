<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>display</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
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
$dept=$_SESSION['dept'];
$univesity=$_SESSION['univesity'];	
$year=$_SESSION['year'];
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
$activity_type="Take Exit Exam as Regular";


// $activity="During These Time Candidate Take Exam.Detail Information<br>
//           [Candidate_ID:$uid,Department:$dept,University:$univesity,Year:$year]";	
          
// $logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time',
//          '$start_time','$activity_type','$activity','$ipaddress','$work_date')");

// update_answers.php

if (isset($_POST['questionId']) && isset($_POST['selectedAnswer'])) {
  $questionId = $_POST['questionId'];
  $selectedAnswer = $_POST['selectedAnswer'];

  // Perform your database operations here (insert/update)

  // Example code:
  $qid = 1; // Extract question ID from the string

  $checkQuery = "SELECT * FROM user_answers WHERE user_id = '$uid' AND question_id = '$qid'";
  $sqL = mysqli_query($con, $checkQuery);
  $coun = mysqli_num_rows($sqL);

  if ($coun > 0) {
    $updateQuery = "UPDATE user_answers SET selected_answer = '$selectedAnswer' WHERE user_id = '$uid' AND question_id = '$qid'";
    mysqli_query($con, $updateQuery);
  } else {
    $insertQuery = "INSERT INTO user_answers (user_id, question_id, selected_answer) VALUES ('$uid', '$qid', '$selectedAnswer')";
    mysqli_query($con, $insertQuery);
  }
}

<?php
}
else
{
header("location:../index.php");
}
?>
 <br><br><br><br><br><br><br><br><br><br><br><br> 
  <br><br><br><br><br><br><br><br><br><br><br><br> 
  <br><br><br>        
</div>
       <div id="navigation">
<?php
require("../footer.php");
?>
   
</div>
</body>
</html>
