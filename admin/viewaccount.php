<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>View Account</title>
   <link rel="icon" href="../image/logo.png">
  <style type="text/css">
    .style1 {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: medium;
    }
.fieldset {
    width: 750px;
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
  .tablestyle {
    width: 100%;
    border-collapse: collapse;
    margin-left: -10px;
    margin-right: -10px;
  }
  .tablestyle th,
  .tablestyle td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .tablestyle th {
    text-align: center;
    background-color: #f2f2f2;
  }

  .tablestyle tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  .tablestyle tr:hover {
    background-color: #f5f5f5;
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
      <div>
        <fieldset class="fieldset">
          <legend>All Users with an Account</legend>
          <div style="margin-left: 20px;">
            <div id="content" style="margin-left: 30px; margin-top: 20px;">
              <div style="height: 700px; width: 700px; border: solid 4px #dldbeg; overflow-y: scroll; overflow-x: scroll;">
                <?php
                if ($con) {
                  $sql = "select * from account";
                  $recordfound = mysqli_query($con, $sql);
                  if (mysqli_affected_rows($con)) {
                    echo "<table class='tablestyle'>";
                    echo "<tr> <th>User_ID</th><th>UserName</th> <th>Password</th><th>Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($recordfound)) {
                      echo "<tr> <td>" . $row["uid"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["status"] . "</td></tr>";
                    }
                    echo "</table>";
                  } else {
                    echo "No records found!";
                  }
                } else {
                  echo "Connection failed";
                }
                ?>
              </div>
            </div>
          </div>
        </fieldset>
        <br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    <?php
    } else {
      header("location:../index.php");
    }
    ?>
    <div id="footer">
      <?php
      require("../footer.php");
      ?>
    </div>
    <br><br>
  </div>
</body>

</html>
