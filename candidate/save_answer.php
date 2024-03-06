<?php
// Retrieve the parameters from the AJAX request
$userId = $_POST['userId'];
$questionId = $_POST['questionId'];
$answer = $_POST['answer'];

// Perform necessary sanitization and validation on the input

// Establish a database connection
$con = mysqli_connect("localhost", "root", "", "exitexam");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Check if a record already exists for the user and question
$checkQuery = "SELECT * FROM user_answers WHERE user_id = '$userId' AND question_id = '$questionId'";
$checkResult = mysqli_query($con, $checkQuery);
$coun = mysqli_num_rows($checkResult);

if ($coun > 0) {
  // Update the existing record
  $updateQuery = "UPDATE user_answers SET selected_answer = '$answer' WHERE user_id = '$userId' AND question_id = '$questionId'";
  mysqli_query($con, $updateQuery);
} else {
  // Insert a new record
  $insertQuery = "INSERT INTO user_answers (user_id, question_id, selected_answer) VALUES ('$userId', '$questionId', '$answer')";
  mysqli_query($con, $insertQuery);
}

// Close the database connection
mysqli_close($con);
?>