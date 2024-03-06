<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>View User</title>
  <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">

/* Standard Styles */
.style1 {
  font-family: "Times New Roman", Times, serif;
  font-weight: bold;
  font-size: medium;
}

/* Modern Styles */
.fieldset {
  width: 650px;
  text-align: left;
  margin: 0 auto; /* Center the fieldset horizontally */
  margin-top: 10px; /* Adjust the top margin as needed */
  position: absolute;
  top: 20%;
  left: 60%;
  transform: translateX(-50%);
 border-radius: 8px;
  border-color: #801137;
}

.table-container {
  margin-left: 20px;
  background-color: #f8f8f8;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  height: 400px; /* Set a fixed height for vertical scrolling */
  overflow: auto; /* Enable scrolling */
}

.custom-table {
  width: 100%;
  border-collapse: collapse;
}

.custom-table th, .custom-table td {
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

.custom-table th {
  background-color: #f1f1f1;
  text-align: left;
}

.custom-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

/* Additional Styles */
#site_content {
  margin-top: 20px;
}

#footer {
  /* Styles for the footer */
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

    <div id="site_content">
      <div id="content">
        <fieldset class="fieldset">
          <legend>All System Users</legend>
          <br>
          <div class="table-container">
            <table class="custom-table">
              <thead>
                <tr>
                  <th>User_ID</th>
                  <th>First Name</th>
                  <th>Father Name</th>
                  <th>Last Name</th>
                  <th>Sex</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Photo</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($con) {
                  $sql = "select * from user";
                  $recordfound = mysqli_query($con, $sql);
                  if (mysqli_affected_rows($con)) {
                    while ($row = mysqli_fetch_assoc($recordfound)) {
                      echo "<tr>
                              <td>" . $row["uid"] . "</td>
                              <td>" . $row["ufname"] . "</td>
                              <td>" . $row["umname"] . "</td>
                              <td>" . $row["ulname"] . "</td>
                              <td>" . $row["sex"] . "</td>
                              <td>" . $row["mobile"] . "</td>
                              <td>" . $row["email"] . "</td>
                              <td><img src=" . $row["photo"] . " width='60' height='70' alt='images'></td>
                              <td>" . $row["role"] . "</td>
                            </tr>";
                    }
                  } else {
                    echo "<tr><td colspan='9'>No records found!</td></tr>";
                  }
                } else {
                  echo "<tr><td colspan='9'>Connection failed</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </fieldset>
        <br><br>
      </div>
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
