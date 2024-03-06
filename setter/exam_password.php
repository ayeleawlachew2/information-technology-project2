<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Exam Password</title>
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

    .fieldset {
      width: 535px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 20px;
      padding: 20px;
      border: 1px solid #801137;
      border-radius: 5px;
    }

    .fieldset legend {
      font-weight: bold;
      font-size: 20px;
    }

    table {
      margin-left: 10px;
    }

    table td {
      padding: 5px;
    }

    input[type="text"],
    input[type="password"],
    select {
      width: 250px;
      padding: 5px;
    }

    input[type="submit"],
    input[type="reset"] {
      padding: 10px 20px;
      background-color:#00BFA6;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #9e1d42;
    }

    .message {
      margin-top: 20px;
      text-align: center;
    }
				.code-container {
      position: absolute;
      top: 20%;
      right: 20%;
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
				  <div>
    <?php require("setter_commen.php"); ?>
  </div>
  <br>
				
				<div class="code-container">
        <fieldset class="fieldset">
          <legend>Set Exam Password</legend>
          <table>
            <form action="" method="post">
              <tr>
                <td>Department:</td>
                <td><input type="text" name="departmentname" readonly value="<?php echo $dept; ?>" /></td>
              </tr>
              <tr>
                <td>Enter Academic Year:</td>
                <td><input type="number" name="accyear" min="1" required /></td>
              </tr>
              <tr>
                <td>Question Type:</td>
                <td>
                  <select name="qtype" required>
                    <option value="">select type</option>
                    <option value="Regular">Regular</option>
                    <option value="Re_Exam">Re_Exam</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Enter Exam Password:</td>
                <td><input type="password" name="epw" required /></td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="submit" name="setpw" value="Set Exam Password">
                  <input type="reset" value="Cancel">
                </td>
              </tr>
            </form>
          </table>
          <div class="message">
            <?php
            if (isset($_POST["setpw"])) {
              $dept = $_POST["departmentname"];
              $program = $_POST["qtype"];
              $pw = $_POST["epw"];
              $year = $_POST["accyear"];

              $sql = "SELECT * FROM exam_passord WHERE year='$year' AND dept='$dept'";
              $pwsetexist = mysqli_query($con, $sql);
              if (mysqli_num_rows($pwsetexist) > 0)
                echo "Exam Password for $year already exists";
              else {
                $sql = "INSERT INTO exam_passord VALUES (' ', '$dept', '$pw', '$year', '$program')";
                $insert = mysqli_query($con, $sql);
                if ($insert)
                  echo "Exam Password successfully registered";
                else
                  echo "Exam Password is not registered" . mysqli_error($con);
              }
            }
            ?>
          </div>
        </fieldset>
      </div>
    <?php
    } else {
      header("location:../index.php");
    }
    ?>
  </div>
</body>

</html>
