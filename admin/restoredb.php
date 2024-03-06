<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Restore Database</title>

  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">
    .style1 {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: medium;
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
    border-radius: 0;
    border-color: #801137;
}
  </style>

</head>

<body>
  <div id="main">
    <?php
    if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      $uid = $_SESSION['$uid'];
      $username = $_SESSION['sun'];
      $role = $_SESSION['role'];
      $login_time = $_SESSION['login_time'];
      $logout_time = "empty";


      //start log file record....
      //log file find ip address
      if (!empty($_SERVER["HTTP_CLIENT_IP"]))
        $ipaddress = $http_client_ip;
      elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
        $ipaddress = $http_x_forwarded_for;
      else
        $ipaddress = $_SERVER['REMOTE_ADDR'];
      // some variable declaration
      $start_time = date("d M Y @ h:i:s");
      $work_date = date('Y-m-d');
      $activity_type = "Restore database ";

    ?>
      	<div >
	<?php
require("admin_commen.php");
		



        function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
        {
          // Connect & select the database
          $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

          // Temporary variable, used to store current query
          $templine = '';

          // Read in entire file
          $lines = file($filePath);

          $error = '';

          // Loop through each line
          foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '') {
              continue;
            }

            // Add this line to the current segment
            $templine .= $line;

            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
              // Perform the query
              if (!$db->query($templine)) {
                //$error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
              }

              // Reset temp variable to empty
              $templine = '';
            }
          }
          return !empty($error) ? $error : true;
        }
        ?>

      </div><!--close menubar-->

      <div id="site_content">
        <div class="sidebar_container">
          <div id="content" style="width: 850px; margin-left:70px;margin-top: 70px;font-style:bold;font-size: 25px;font-family: times new roman;line-height: 2px;">


            <?php
            $domain = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "onlineexitexam";
            $x = 0;
            $con = mysqli_connect($domain, $dbuser, $dbpass) or die(mysqli_error());
            if (mysqli_select_db($con, $dbname))
              $x = 1;
            else
              $x = 2;
            if ($x == 2) {

              mysqli_query($con, "create database onlineexitexam") or die(mysqli_error());
              echo "<br>Your Database is Successfully created";
            } else if ($x == 1) {

              $filePath  = 'C:/xampp/htdocs/backup.sql';
              $restore = restoreDatabaseTables($domain, $dbuser, $dbpass, $dbname, $filePath);
              if ($restore) {
                echo "<br>Database Is Successfully Restored";
                $activity = "Admin restore database from path= $filePath";

//log file
                $logsql = mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
              } else {
                echo "<br>Database Is not Successfully Restored: " . mysqli_error($con);
              }
            }
            ?>

          </div>
          <br><br><br><br><br><br><br><br><br><br><br><br>
          
        </div>

      </div>
      <div id="footer">
        <?php
        require("../footer.php");
        ?>

      </div>
    <?php
    } else {
      header("location:../index.php");
    }
    ?>
    <br><br>
  </div>
</body>

</html>