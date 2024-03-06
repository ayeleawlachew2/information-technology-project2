<?php
session_start();
include("../connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>update exam time</title>
     <link rel="icon" href="../image/logo.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/image_slide.js"></script>
  <script type="text/javascript" src="../css/javascriptdate.js"></script>
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
    }

    .fieldset {
      width: 600px;
      text-align: left;
      margin-left: 200px;
      margin-top: 20px;
      padding: 20px;
      border-radius: 5px;
      /* border-color: #801137; */
    }

    .code-container {
      position: absolute;
      top: 20%;
      right: 20%;
    }

    input[type="text"] {
      width: 200px;
      padding: 5px;
    }

    input[type="submit"],
    input[type="reset"] {
      padding: 10px 20px;
      background-color: #00BFA6;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #9e1d42;
    }
  </style>
</head>

<body>
  <div id="main">
    <?php
    if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      $uid = $_SESSION['$uid'];
    ?>

      <div>
        <?php require("setter_commen.php"); ?>
      </div>
      <br>

      <div class="code-container">
        <fieldset class="fieldset">
          <legend>We can update Each Exam Time information</legend>
          <br>
          <br>
          <!-- <div style="margin-left: 20px; background-color:#bccdf1;"> -->
            <br>
            <table width="50%">
              <form action="" method="post">
                <tr>
                  <td><input type="text" name="key" placeholder="Enter Timer_ID" /></td>
                  <td><input type="submit" name="search" value="search" /></td>
                </tr>

                <tr>
                  <td colspan="2" width="535px">
                    <hr style="border-color: #801137;width: 600px;margin-left: -20px;">
                  </td>
                </tr>

                <?php
                if (isset($_POST["search"])) {
                  $key = $_POST["key"];
                  $sql = "SELECT * FROM timer WHERE tid='$key' AND setter_id='$uid'";
                  $recordfound = mysqli_query($con, $sql);
                  if (mysqli_affected_rows($con)) {
                    while ($row = mysqli_fetch_assoc($recordfound)) {
                      echo "<tr><td>Timer ID :</td><td><input type='text' name='tid' value='" . $row["tid"] . "' readonly/></td></tr>";
                      echo "<tr><td>year :</td><td><input type='text' name='year' value='" . $row["year"] . "' readonly/></td></tr>";
                      echo "<tr><td>Department :</td><td><input type='text' name='dept' value='" . $row["dept"] . "' readonly/></td></tr>";
                      echo "<tr><td>Hour :</td><td><input type='text' name='hr' value='" . $row["hour"] . "'/></td></tr>";
                      echo "<tr><td>Minute :</td><td><input type='text' name='min' value='" . $row["min"] . "'/></td></tr>";
                      echo "<tr><td><input type='submit' name='update' value='update'></td> ";
                      echo "<td><input type='reset' value='Cancel'></td></tr>";
                    }
                  } else {
                    echo "No result found!!!";
                  }
                  echo "<br><br><br> <br> ";
                } else {
                  if (isset($_POST["update"])) {
                    $tid = $_POST["tid"];
                    $h = $_POST["hr"];
                    $m = $_POST["min"];
                    if ($con) {
                      $sql = "UPDATE timer SET hour='$h', min='$m' WHERE tid='$tid'";
                      $updated = mysqli_query($con, $sql);
                      if (mysqli_affected_rows($con)) {
                        echo mysqli_affected_rows($con) . " record(s) updated successfully!" . mysqli_error($con);
                      } else {
                        echo "Unable to update!" . mysqli_error($con);
                      }
                    } else {
                      die("Connection Failed:" . mysqli($con));
                    }
                  }
                }
                ?>

              </form>
            </table>
          </div>
          <br><br>
        </fieldset>
        <br>
        <br>
        <br>
        <br><br><br> <br>
        <br><br> <br>
        <br><br><br> <br>
      </div>
    </div>
  </div>

<?php
    } else {
      header("location:../index.php");
    }
?>

</body>

</html>
