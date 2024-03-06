<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>update score page</title>
   <link rel="icon" href="../image/logo.png">
  <style>
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
      background-color:  #00BFA6;
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

    <div>
      <fieldset class="fieldset">
        <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">You can update Passing Score Here</legend>
        <br>
        <div class="form-container">
          <br>
          <table>
            <form action="" method="post">
              <tr>
                <td><input type="text" name="key" placeholder="Enter ID number" /></td>
                <td><input type="submit" name="serarch" value="search" /></td>
              </tr>
              <tr>
                <td colspan="2" width="535px"><hr></td>
              </tr>
              <?php
              if(isset($_POST["serarch"]))
              {
                $key = $_POST["key"];
                $sql = "SELECT * FROM set_score WHERE score_id='$key'";
                $recordfound = mysqli_query($con, $sql);
                if(mysqli_affected_rows($con))
                {
                  while($row = mysqli_fetch_assoc($recordfound))
                  {
                    $dept = $row["dept"];
                    echo "<tr><td>SCORE_ID:</td><td><input type='text' name='sid' value='" . $row["score_id"] . "' readonly></td></tr>";
                    echo "<tr><td>Department:</td>";
                    $sql1 = "SELECT dname FROM department";
                    $recordfound1 = mysqli_query($con, $sql1);
                    if(mysqli_affected_rows($con))
                    {
                      echo "<td><select name='dname'>";
                      while($row1 = mysqli_fetch_assoc($recordfound1))
                      {
                        $dept1 = $row1["dname"];
                        if($dept1 == $dept)
                        {
                          ?>
                          <option value="<?php echo $dept1; ?>" selected><?php echo $dept1; ?></option>
                          <?php
                        }
                        else
                        {
                          ?>
                          <option value="<?php echo $dept1; ?>"><?php echo $dept1; ?></option>
                          <?php
                        }
                      }
                      echo "</td></tr></select>";
                    }
                    echo "<tr><td>Score:</td><td><input type='number' name='score' min='1' max='100' value='" . $row["score"] . "'></td></tr>";
                    echo "<tr><td>Year:</td><td><input type='text' name='year' value='" . $row["year"] . "'></td></tr>";
                    echo "<tr><td><input type='submit' name='update' value='update'></td>";
                    echo "<td><input type='reset' value='Cancel'></td></tr>";
                  }
                }
                else
                {
                  echo "<tr><td colspan='2' class='error-message'>No result found!!!</td></tr>";
                }
              }
              else
              {
                if(isset($_POST["update"]))
                {
                  $id = $_POST["sid"];
                  $dept = $_POST["dname"];
                  $score = $_POST["score"];
                  $year = $_POST["year"];
                  if($con)
                  {
                    $sql = "UPDATE set_score SET dept='$dept', score='$score', year='$year' WHERE score_id='$id'";
                    $updated = mysqli_query($con, $sql);
                    if(mysqli_affected_rows($con))
                      echo "<tr><td colspan='2' class='success-message'>" . mysqli_affected_rows($con) . " record/s updated successfully!</td></tr>";
                    else
                      echo "<tr><td colspan='2' class='error-message'>Unable to update!</td></tr>";
                  }
                  else
                    die("Connection Failed: " . mysqli($con));
                }
              }
              ?>
            </form>
          </table>
        </div>
        <br><br>
      </fieldset>
    </div>
    </div>
    </div>
    </div>
    <?php
    }
    else
    {
      header("location:../index.php");
    }
    ?>
   
  </div>
</body>
</html>
