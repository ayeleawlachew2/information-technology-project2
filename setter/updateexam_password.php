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
      width: 450px;
      text-align: left;
      margin-left: auto;
      margin-right: auto;
      margin-top: 20px;
      padding: 20px;
      border-radius: 5px;
      border-color: #801137;
    }

    .fieldset legend {
      font-weight: bold;
      font-size: 20px;
    }

    table {
      margin-left: auto;
      margin-right: auto;
      margin-top: 20px;
    }

    table td {
      padding: 5px;
    }

    input[type="text"],
    input[type="number"] {
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
      <div class="code-container">
        <fieldset class="fieldset">
          <legend>Update Exam Password</legend>
          <center>
            <br>
            <br>
            <table>
              <form action="" method="post">
                <tr>
                  <td colspan="2">
                    <center>Enter Exam Password ID:</center>
                  </td>
                </tr>
                <tr>
                  <td><input type="text" name="pid" required placeholder="Enter Password ID..." /></td>
                  <td colspan="2"><input type="submit" name="search" value="Search" /></td>
                </tr>
              </form>
            </table>
            <br>

            <?php
            if (isset($_POST["search"])) {
              $pw = $_POST["pid"];
              $sql = "SELECT * FROM exam_passord WHERE pw_id='$pw' AND dept='$dept'";
              $pwexist = mysqli_query($con, $sql);
              $yesrexist = mysqli_num_rows($pwexist);
              if ($yesrexist > 0) {
                echo "<form action='' method='post'><table>";
                while ($r = mysqli_fetch_array($pwexist)) {
                  echo "<tr><td>Password ID:</td><td><input type='text' name='pid' value='" . $r["pw_id"] . "'  readonly></td> </tr>";
                  echo "<tr><td>Department:</td><td><input type='text' name='dept' value='" . $r["dept"] . "'  readonly></td> </tr>";
                  echo "<tr><td>Password Name:</td><td><input type='text' name='pwname' value='" . $r["password"] . "' ></td> </tr>";
                  echo "<tr><td>Academic Year</td><td><input type='number' name='year' value='" . $r["year"] . "' ></td> </tr>";
                  echo "<tr><td>Question Type:</td><td><input type='text' name='qtype' value='" . $r["program"] . "' ></td> </tr>";
                  echo "<tr><td colspan='2'><input type='submit' name='update' value='Update'></td> </tr>";
                }
                echo "</table></form>";
              } else
                echo "NO Exam Password Set By $pw Year.";
            }

            // Update
            if (isset($_POST["update"])) {
              $pid = $_POST["pid"];
              $pw = $_POST["pwname"];
              $qtype = $_POST["qtype"];
              $year = $_POST["year"];
              $sql = mysqli_query($con, "UPDATE exam_passord SET password='$pw', year='$year', program='$qtype' WHERE pw_id='$pid'");
              if ($sql)
                echo "Record Successfully Updated";
              else
                echo "Unable To Update" . mysqli_error($con);
            }
            ?>
          </center>
          <br>
        </fieldset>
        <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br>
      </div>
  </div>
  <?php
    } else {
      header("location:../index.php");
    }
  ?>

</body>

</html>
