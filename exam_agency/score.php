<?php
session_start();
include("../connection.php");
?>

<html>
<head>
  <title>Set Score Page</title>
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
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .form-container select,
    .form-container input[type="number"],
    .form-container input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 4px;
      background-color: #f2f2f2;
    }

    .form-container input[type="submit"],
    .form-container input[type="reset"] {
      padding: 10px 20px;
      background-color: #00BFA6;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-container input[type="submit"]:hover,
    .form-container input[type="reset"]:hover {
      background-color: #45a049;
    }

    .success-message {
      color: #4CAF50;
      background-color: #e9f7ef;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    .error-message {
      color: #FF5252;
      background-color: #ffebee;
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

    <fieldset class="fieldset">
      <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Fill All form Correctly</legend>

      <?php
      if(isset($_POST['set']))
      {
        $year = $_POST["year"];
        $score = $_POST["score"];
        $dept = $_POST["dept"];
        $sq = "SELECT * FROM set_score WHERE dept='$dept' AND year='$year'";
        $recordexist = mysqli_query($con, $sq);

        if(mysqli_num_rows($recordexist) > 0)
        {
          echo '<div class="error-message">The Score Already Exists</div>';
        }
        else
        {
          if($con)
          {
            $sql = "INSERT INTO set_score VALUES ('', '$dept', '$score', '$year')";
            $insert = mysqli_query($con, $sql);

            if($insert)
            {
              echo '<div class="success-message">The Score is Set Successfully</div>';
            }
            else
            {
              echo '<div class="error-message">Failed to set the score: ' . mysqli_error($con) . '</div>';
            }
          }
          else
          {
            echo '<div class="error-message">Connection Failed: ' . mysqli_error($con) . '</div>';
          }
        }
      }
      ?>

      <form action="" method="post" class="form-container">
        <table>
          <tr>
            <td>Department:</td>
            <td>
              <select name="dept" required>
                <option value="">Select Your Option</option>
                <?php
                if($con)
                {
                  $sql = "SELECT DISTINCT dname FROM department";
                  $recordfound = mysqli_query($con, $sql);

                  if(mysqli_affected_rows($con))
                  {
                    while($row = mysqli_fetch_assoc($recordfound))
                    {
                      echo '<option value="' . $row["dname"] . '">' . $row["dname"] . '</option>';
                    }
                  }
                  else
                  {
                    echo "No records found!";
                  }
                }
                else
                {
                  echo "connection failed";
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Set Score:</td>
            <td><input type="number" name="score" min="0" max="100" required placeholder="Enter Score up to 100%" /></td>
          </tr>
          <tr>
            <td>Year:</td>
            <td><input type="text" name="year" pattern="[0-9]+" placeholder="Enter Year like 2010" required /></td>
          </tr>
          <tr>
            <td><input type="submit" name="set" value="set score"></td>
            <td><input type="reset" value="Cancel"></td>
          </tr>
        </table>
      </form>
    </fieldset>

    <?php
    }
    else
    {
      header("location:../index.php");
    }
    ?>

    <br><br>
  </div>
</body>
</html>
