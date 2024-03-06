<?php
// Retrieve the parameters from the GET request
$userId = $_GET['userId'];
$questionId = $_GET['questionId'];

// Perform necessary sanitization and validation on the input

// Establish a database connection
$con = mysqli_connect("localhost", "root", "", "exitexam");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Retrieve the selected answer for the user and question
$query = "SELECT selected_answer FROM user_answers WHERE user_id = '$userId' AND question_id = '$questionId'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$selectedAnswer = $row['selected_answer'];

// Close the database connection
mysqli_close($con);

// Return the selected answer
echo $selectedAnswer;
?>