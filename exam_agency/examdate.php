<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Set Exam Date page</title>
  <style type="text/css">
  .fieldset {
    width: 750px;
      text-align: left;
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .form-container {
    width: 600px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }

  .form-container select,
  .form-container input[type="number"],
  .form-container input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 8px;
    border: none;
    border-radius: 4px;
    background-color: #f2f2f2;
  }

  .form-container input[type="submit"],
  .form-container input[type="reset"] {
    padding: 8px 15px;
    background-color:#00BFA6s;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .form-container input[type="submit"]:hover,
  .form-container input[type="reset"]:hover {
    background-color: #45a049;
  }

  /* New styles */

  .form-container legend {
    font-size: 1.1em;
    color: #801137;
    border-bottom: 2px solid #801137;
    padding-bottom: 5px;
    margin-bottom: 15px;
  }

  .form-container table {
    width: 100%;
  }

  .form-container td {
    padding-bottom: 8px;
  }

  .form-container input[type="date"],
  .form-container input[type="time"],
  .form-container input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  .form-container input[type="submit"],
  .form-container input[type="reset"] {
    margin-top: 8px;
  }

  .success-message {
    color: #4CAF50;
    background-color: #e9f7ef;
    padding: 8px;
    border-radius: 4px;
    margin-bottom: 8px;
  }

  .error-message {
    color: #FF5252;
    background-color: #ffebee;
    padding: 8px;
    border-radius: 4px;
    margin-bottom: 8px;
  }
</style>


</head>

<body>
  <div id="main">
    <?php
    if(isset($_SESSION['sun']) && isset($_SESSION['spw']))
    {
    ?>
    <div>
      <?php
      require("examagency_commen.php");
      ?>
    </div>
				
    <div class="fieldset">
     <legend class="form-container h2">Fill All Form Correctly</legend>
      <div class="form-container">
        <form action="" method="post">
          <table>
            <tr>
              <td>Question Type:</td>
              <td>
                <select class="form-container-select" name="qtype" required>
                  <option value="">select type</option>
                  <option value="Regular">Regular</option>
                  <option value="Re_Exam">Re_Exam</option>
                  <option value="Payment">Payment</option>
                </select>
              </td>
            </tr>
            <tr>
      <td>Department:</td>
      <td>
        <select class="form-container-select" name="dname" required>
          <option value="">Select Your Option</option>
          <?php
            if ($con) {
              $sql = "select DISTINCT dname from department";
              $recordfound = mysqli_query($con, $sql);
              if (mysqli_affected_rows($con)) {
                while ($row = mysqli_fetch_assoc($recordfound)) {
                  ?>
                  <option value="<?php echo $row["dname"]; ?>"><?php echo $row["dname"]; ?></option>
                  <?php
                }
              } else {
                echo "No records found!";
              }
            } else {
              echo "connection failed";
            }
          ?>
        </select>
      </td>
    </tr>
    <tr>
            <tr>
              <td>Start Date:</td>
              <td><input class="form-container-input" type="date" name="sdate" required/></td>
            </tr>
            <tr>
              <td>End Date:</td>
              <td><input class="form-container-input" type="date" name="edate" required/></td>
            </tr>
            <tr>
              <td>Start Time:</td>
              <td><input class="form-container-input" type="time" name="stime" required pattern="[0-9:]+" /></td>
            </tr>
            <tr>
              <td>End Time:</td>
              <td><input class="form-container-input" type="time" name="etime" pattern="[0-9:]+" required/></td>
            </tr>
            <tr>
              <td>Year:</td>
              <td><input class="form-container-input" type="number" name="year" min="1" required/></td>
            </tr>
            <tr>
              <td><input class="form-container-button" type="submit" name="adddate" value="Add"></td>
              <td><input class="form-container-button" type="reset" value="Cancel"></td>
            </tr>
          </table>
        </form>
      </div>

      <?php
      if(isset($_POST['adddate']))
      {
        $qtype = $_POST["qtype"];
        $dname = $_POST["dname"];
        $sdate = $_POST["sdate"];
        $edate = $_POST["edate"];
        $stime = $_POST["stime"];
        $etime = $_POST["etime"];
        $year = $_POST["year"];

        if($sdate > $edate || $stime >= $etime)
        {
          echo "<div class='error-message'>Unable to add, check start date or time must be less than end date or time!</div>";
        }
        else
        {
          if($con)
          {
            $sq = "SELECT * FROM examdate WHERE year='$year' AND question_type='$qtype' And dept='$dname'";
            $recordexist = mysqli_query($con, $sq);
            if(mysqli_affected_rows($con))
              echo "<div class='error-message'>The Exam Date Schedule for $year is already exist!</div>";
            else
            {
              $sql = "INSERT INTO examdate VALUES ('','$dname', '$qtype', '$sdate', '$edate', '$stime', '$etime', '$year')";
              $insert = mysqli_query($con, $sql);
              if($insert)
                echo "<div class='success-message'>The Exam Date is added successfully</div>";
              else
                echo "<div class='error-message'>Failed to add Exam Date: " . mysqli_error($con) . "</div>";
            }
          }
          else
            echo "<div class='error-message'>Connection Failed: " . mysqli_error($con) . "</div>";
        }
      }
      ?>
    </div>
    <?php
    }
    else
    {
      header("location:../index.php");
    }
    ?>
    <br> <br>
  </div>
</body>
</html>
