<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>View Exam Date page</title>
  <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">
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
    margin: 0 auto; /* Center the fieldset horizontally */
    margin-top: 10px; /* Adjust the top margin as needed */
    position: absolute;
    top: 20%;
    left: 60%;
    transform: translateX(-50%);
  border-radius: 5px;
    border-color: #801137;
}
.custom-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.custom-table th,
.custom-table td {
  padding: 10px;
}

.custom-table th {
  background-color: #f2f2f2;
  text-align: left;
}

.custom-table td {
  border-bottom: 1px solid #ddd;
}

.custom-table tr:last-child td {
  border-bottom: none;
}

.message {
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  font-weight: bold;
  background-color:#EF8888;
  padding: 10px;
  border-radius: 5px;
  margin-top: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}


 /* .custom-table {
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
    } */

    .custom-form {
      text-align: center;
      margin-top: 20px;
    }

    .form-row {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .form-input {
      padding: 8px;
    }

    .form-button {
      padding: 8px 20px;
      border: none;
      border-radius: 4px;
      background-color: #0B770E;
      color: #fff;
      cursor: pointer;
    }
  </style>
  
</head>

<body>
  <div id="main">
    <?php
    if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
    ?>

      <div>
        <?php
        require("admin_commen.php");
        ?>
      </div>


      <div id="content">
        <fieldset class="fieldset">
          <center>
            <br>
            <br>
            <table class="custom-table">
              <form action="" method="post" class="custom-form">
                <tr>
                  <td colspan="2">Enter Year to See Exam Date:</td>
                </tr>
                <tr class="form-row">
                  <td><input type="number" name="year" required placeholder="Enter Year" class="form-input" /></td>
                  <td><input type="submit" name="search" value="Search" class="form-button" /></td>
                </tr>
              </form>
            </table>
            <br>

           <?php
if (isset($_POST["search"])) {
  $y = $_POST["year"];
  $sql = "select * from examdate where year='$y'";
  $year = mysqli_query($con, $sql);
  $yearexist = mysqli_num_rows($year);
  if ($yearexist > 0) {
    echo "<table class='custom-table'><tr> <th>Question Type</th><th>Start Date</th><th>End Date</th><th>Start Time</th><th>End Time</th><th>Year</th></tr>";
    while ($row = mysqli_fetch_assoc($year)) {
      echo "<tr><td>" . $row["question_type"] . "</td><td>" . $row["start_date"] . "</td> <td>" . $row["end_date"] . "</td><td>" . $row["start_time"] . "</td><td>" . $row["end_time"] . "</td><td>" . $row["year"] . "</td></tr>";
    }
    echo "</table>";
  } else {
    echo "<p class='message'>No Exam Date Posted for Year $y.</p>";
  }
}
?>

          </center>
          <br>
        </fieldset>
      <?php
    } else {
      header("location:../index.php");
    }
      ?>

      </div>
      </div>
      </div>
      <div id="footer">
        <?php
        require("../footer.php");
        ?>
      </div>
      <br><br>
      </div>
</body>

</html>