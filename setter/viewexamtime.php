<?php
session_start();
include("../connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>View exam time</title>
     <link rel="icon" href="../image/logo.png">
  <style type="text/css">
    body {
      font-family: "Times New Roman", Times, serif;
      font-size: 16px;
      color: black;
      margin: 0;
      padding: 0;
    }

    .style1 {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: 20px;
      width: 200px;
      text-align: left;
      margin-top: 10px;
      color: black;
      margin-left: 50px;
    }

    .fieldset {
      width: 600px;
      text-align: left;
      margin-left: 200px;
      margin-top: 20px;
      height: auto;
      border-radius: 5px;
      border-color: #801137;
    }

    table {
      border-collapse: collapse;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    th {
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .code-container {
      position: absolute;
      top: 20%;
      right: 20%;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
    $uid = $_SESSION['$uid'];

    $sql = "select * from Examsetter where sid='$uid'";
    $record = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)) {
      while ($row = mysqli_fetch_assoc($record)) {
        $dept = $row["dname"];
      }
    } else {
      echo "No Result found!";
    }

    $uid = $_SESSION['$uid'];
    $sql = "select * from timer where dept='$dept'";
    $record = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)) {
      while ($row = mysqli_fetch_assoc($record)) {
        $qtype = $row["question_type"];
      }
    } else {
      echo "No Result found!";
    }
  ?>

    <div>
      <?php require("setter_commen.php"); ?>
    </div>
    <br>

    <div class="code-container">
      <div class="code-container">
        <fieldset class="fieldset">
          <legend>Welcome TO ExitExam  Display Exam Time</legend>
          <br>
          <div class="style1">
            <?php
            if ($con) {
              $year = $_SESSION["year"];
              $sql = "select * from timer where dept='$dept'  and year='$year' ";
              $recordfound = mysqli_query($con, $sql);
              $number = mysqli_num_rows($recordfound);
              if (mysqli_affected_rows($con)) {
                echo "<table border='1'>";
                echo "<tr> <th>Timer_ID</th><th>year</th><th>Question type</th><th>Department</th><th>Hour</th><th>Minute</th></tr>";
                while ($row = mysqli_fetch_assoc($recordfound))
                  echo "<tr> <td>" . $row["tid"] . "</td><td>" . $row["year"] . "</td> <td>" . $row["question_type"] . "</td><td>" . $row["dept"] . "</td> <td>" . $row["hour"] . "</td><td>" . $row["min"] . "</td></tr>";
                echo "</table>";
              } else {
                echo "No records found!";
              }
            } else {
              echo "Connection Failed!!!" . mysqli_error($con);
            }
            ?>
            <br><br><br>
          </div>
        </fieldset>
      </div>
      <br><br><br>
      <br><br><br>
      <br><br><br>
      <br><br><br>
      <br><br><br>
    </div>

  <?php
  } else {
    header("location:../index.php");
  }
  ?>
</body>

</html>
