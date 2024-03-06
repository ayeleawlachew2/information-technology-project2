<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Update Score Page</title>
  <style type="text/css">
  .style1 {
    font-family: "Times New Roman", Times, serif;
    font-weight: bold;
    font-size: 15px;
    width: 550px;
    text-align: left;
    color: black;
    margin-left: -180px;
    line-height: 25px;
  }

  .fieldset {
   width: 750px;
      text-align: left;
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
		.update-form {
  width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f8f8f8;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}


  table {
    border-collapse: collapse;
  }

  th, td {
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .search-form {
    margin-left: 45px;
    background-color: #bccdf1;
    width: 500px;
  }

  .search-form input[type="text"] {
    padding: 5px;
  }

  .search-form input[type="submit"] {
    padding: 5px 10px;
    background-color: #00BFA6;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .update-form {
    margin-left: 45px;
    background-color: #bccdf1;
    width: 500px;
    padding: 20px;
  }

  .update-form input[type="text"],
  .update-form input[type="date"],
  .update-form input[type="time"] {
    padding: 5px;
    width: 200px;
  }

  .update-form select {
    padding: 5px;
    width: 206px;
  }

  .update-form input[type="submit"],
  .update-form input[type="reset"] {
    padding: 5px 10px;
    background-color: #00BFA6;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .success-message {
    color: #4CAF50;
    background-color: #e8f5e9;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
  }
.error-message {
  color: #FF5252;
  background-color: #FFEBEE;
  padding: 10px;
  border-radius: 4px;
  margin-bottom: 10px;
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
  <div >
    <fieldset class="fieldset">
      <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">We can update Each Exam Date information Except ID</legend>
      <br>
      <div class="search-form">
        <form action="" method="post">
          <table>
            <tr>
              <td><input type="text" name="key" placeholder="Enter ID number"/></td>
              <td><input type="submit" name="search" value="Search"/></td>
            </tr>
          </table>
        </form>
      </div>
      <hr style="border-color: #801137;">
      <br>
      <?php
      if(isset($_POST["search"]))
      {
        $key = $_POST["key"];
        $sql = "SELECT * FROM examdate WHERE date_id='$key'";
        $recordfound = mysqli_query($con, $sql);
        if(mysqli_affected_rows($con))
        {
          while($row = mysqli_fetch_assoc($recordfound))
          {
            ?>
           <div class="update-form">
  <form action="" method="post">
    <input type="hidden" name="dateid" value="<?php echo $row["date_id"]; ?>" readonly>
    <label for="qtype">Question Type:</label>
    <select name="qtype">
      <option value="Regular" <?php if($row["question_type"] == "Regular") echo "selected"; ?>>Regular</option>
      <option value="Re_Exam" <?php if($row["question_type"] == "Re_Exam") echo "selected"; ?>>Re_Exam</option>
      <option value="Payment" <?php if($row["question_type"] == "Payment") echo "selected"; ?>>Payment</option>
    </select>
    <br><br>

    <!-- <label for="qtype">Department:</label>
    <select name="dname">
    <option value="">Select Your Option</option>
          <?php
            // if ($con) {
            //   $sql = "select DISTINCT dname from department";
            //   $recordfound1 = mysqli_query($con, $sql);
            //   if (mysqli_affected_rows($con)) {
            //     while ($row1 = mysqli_fetch_assoc($recordfound1)) {
            //       ?>
            //       <option value="<?//php echo $row1["dname"]; ?>">
            //       <?//php echo $row["dname"]; ?></option>
            //       <?php
            //     }
            //   } else {
            //     echo "No records found!";
            //   }
            // } else {
            //   echo "connection failed";
            // }
          ?>
    </select>
    <br><br> -->

    <label for="sdate">Start Date:</label>
    <input type="date" name="sdate" value="<?php echo $row["start_date"]; ?>">
    <br><br>
    <label for="edate">End Date:</label>
    <input type="date" name="edate" value="<?php echo $row["end_date"]; ?>">
    <br><br>
    <label for="stime">Start Time:</label>
    <input type="time" name="stime" value="<?php echo $row["start_time"]; ?>">
    <br><br>
    <label for="etime">End Time:</label>
    <input type="time" name="etime" value="<?php echo $row["end_time"]; ?>">
    <br><br>
    <label for="year">Year:</label>
    <input type="text" name="year" value="<?php echo $row["year"]; ?>">
    <br><br>
    <input type="submit" name="update" value="Update">
    <input type="reset" value="Cancel">
  </form>
</div>

            <?php
          }
        }
        else
        {
          echo "<p class='error-message'>No result found!!!</p>";
        }
      }
      else
      {
        if(isset($_POST["update"]))
        {
          $did = $_POST["dateid"];
          $sdate = $_POST["sdate"];
          $edate = $_POST["edate"];
          $stime = $_POST["stime"];
          $etime = $_POST["etime"];
          $year = $_POST["year"];
          $qtype = $_POST["qtype"];
          // $dname = $_POST["dname"];
          $sql = "UPDATE examdate SET question_type='$qtype',start_date='$sdate', end_date='$edate', start_time='$stime', end_time='$etime', year='$year' WHERE date_id='$did'";
          $updated = mysqli_query($con, $sql);
          if(mysqli_affected_rows($con))
            echo "<p class='success-message'>" . mysqli_affected_rows($con) . " record/s updated successfully!</p>" . mysqli_error($con);
          else
            echo "<p class='error-message'>Unable to update!</p>" . mysqli_error($con);
        }
      }
      ?>
    </fieldset>
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
