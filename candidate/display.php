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


$activity="During These Time Candidate Take Exam.Detail Information<br>
          [Candidate_ID:$uid,Department:$dept,University:$univesity,Year:$year]";	
          
$logsql=mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time',
         '$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	
	
	
	
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("candmenu.php");	
// foreach ($_POST as $questionId => $selectedAnswer) {
// 	$checkQuery = "SELECT * FROM user_answers WHERE user_id = '$uid' AND question_id = '$questionId'";
// 	// Execute the $checkQuery and check if a record exists for the user and question
// 	$sqL=mysqli_query($con, $checkQuery);
// 	$coun = mysqli_num_rows($sqL);
  
// 	if ($coun>0) {
// 	  $updateQuery = "UPDATE user_answers SET selected_answer = '$selectedAnswer' WHERE user_id = '$uid' AND question_id = '$questionId'";
// 	  // Execute the $updateQuery using the appropriate method in your database library
// 	  mysqli_query($con, $updateQuery);
// 	} else {
// 	  $insertQuery = "INSERT INTO user_answers (user_id, question_id, selected_answer) VALUES ('$uid', '$questionId', '$selectedAnswer')";
// 	  mysqli_query($con, $insertQuery);
// 	}
//   }
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
<?php
//variable declaration
$sql="select * from candidate WHERE cid='$uid'";
$recordfound=mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($recordfound))
{
$year=$row["year"];
$dept=$row["dept"];
$univesity=$row["unversity"];
$sq=mysqli_query($con, "select*from user where uid='$uid'");
while($row1=mysqli_fetch_array($sq))
$fullname=$row1["ufname"]." " .$row1["umname"]." ".$row1["ulname"];	
}

	//check take exam before or not
$sqq="select *from question WHERE dept='$dept' and status='active' and year='$year' and question_type='Regular' ";
$result = mysqli_query($con, $sqq);
$Wronganswer=0;
$Correctanswer=0;
$totalquestion=0;
$total=0;

while($row = mysqli_fetch_array($result))
{


$txAns=$row["answer"];
$qid=$row["qid"];

$sqq22="select *from user_answers WHERE user_id='$uid' and question_id='$qid'";
$result22 = mysqli_query($con, $sqq22);
$count_answer= mysqli_num_rows($result22);
if($count_answer>0){
	while($row22 = mysqli_fetch_array($result22)){
	$selectedanswer=$row22["selected_answer"];
}
}

else{
	$selectedanswer="";
}
	

if($selectedanswer==$txAns)
	$Correctanswer++;
else
	$Wronganswer++;
}
$totalquestion=$Wronganswer+$Correctanswer;
//set score calculation the result;
$score1="select *from set_score where dept='$dept' and year='$year'";
$holdscore=mysqli_query($con, $score1);
if($row=mysqli_fetch_assoc($holdscore))
{
$passscore=$row["score"];
$total=($Correctanswer*100)/$totalquestion;
if($total>=$passscore)
$results="Competent";
else
$results="Not Competent";
$total=round($total,2);
$total=$total."%";
//this user take exam
mysqli_query($con, "insert into takenexam  values('$uid','Regular')");
//result sent to database
$sqlresult="insert into result values('$uid','$totalquestion','$Correctanswer','$Wronganswer','$total','$results','Regular')";
if(mysqli_query($con, $sqlresult))
echo "Yes";	
else
echo "no result set".mysqli_error($con);
header('Location: candidatepage.php');
}
else
echo"the score is not set";
?>
</div>
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
