<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Update Exam Date page</title>
    <link rel="icon" href="../image/logo.png">
  
  <style type="text/css">
    body {
      font-family: "Times New Roman", Times, serif;
      font-size: 16px;
      color: black;
      margin: 0;
      padding: 0;
    }

    #main {
      width: 100%;
      margin: 0 auto;
    }

    .style1 {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: 20px;
      width: 920px;
      text-align: left;
      margin-top: 10px;
      color: black;
      margin-left: 50px;
      border-radius: 0px;
    }

    .fieldset {
      width: 650px;
      text-align: left;
      margin-left: 100px;
      margin-top: 60px;
      padding: 20px;
      border-radius: 5px;
      border-color: #801137;
    }

    table {
      border-collapse: collapse;
      width: 100%;
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

    input[type="number"] {
      width: 200px;
      padding: 5px;
    }

    input[type="submit"] {
      padding: 10px 20px;
      background-color: #00BFA6;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #9e1d42;
    }
  </style>

</head>

<body>
  <div id="main">
    <?php
    if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      $uid = $_SESSION['$uid'];
      $year = $_SESSION['year'];
      $qtype = $_SESSION['questiontype'];
      $sql = "SELECT * FROM Examsetter WHERE sid='$uid'";
      $record = mysqli_query($con, $sql);
      if (mysqli_affected_rows($con)) {
        while ($row = mysqli_fetch_assoc($record)) {
          $id = $row["sid"];
          $dept = $row["dname"];
        }
      } else {
        echo "No records found!";
      }
    ?>
      <div id="content">
        <?php
        require("setter_commen.php");
        ?>

        <div class="code-container">
          <fieldset class="fieldset">
            <center>
              <br>
              <br>
              <table>
                <form action="" method="post">
                  <tr>
                    <td colspan="2">Enter Year To Exam Password:</td>
                  </tr>
                  <tr>
                    <td><input type="number" name="year" required placeholder="Enter Year" /></td>
                    <td><input type="submit" name="search" value="Search" /></td>
                  </tr>
                </form>
              </table>
              <br>

              <?php
              if (isset($_POST["search"])) {
                $y = $_POST["year"];
                $sql = "SELECT * FROM exam_passord WHERE year='$y' AND dept='$dept'";
                $year = mysqli_query($con, $sql);
                $yearexist = mysqli_num_rows($year);
                if ($yearexist > 0) {
                  echo "<table border=1>";
                  echo "<tr><th>Password ID</th> <th>Department</th> <th>Password</th><th>Year</th><th>Question Type</th></tr>";
                  if ($row = mysqli_fetch_array($year))
                    echo "<tr><td>" . $row["pw_id"] . "</td><td>" . $row["dept"] . "</td><td>" . $row["password"] . "</td><td>" . $row["year"] . "</td><td>" . $row["program"] . "</td></tr>";
                  echo "</table>";
                } else {
                  echo "NO Exam Password Set By $y Year.";
                }
              }
              ?>

            </center>
            <br>
          </fieldset>
        </div>
      </div>
    <?php
    } else {
      header("location:../index.php");
    }
    ?>
    
  </div>

</body>

</html>
