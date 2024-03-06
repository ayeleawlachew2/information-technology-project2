<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View department head</title>
  <style type="text/css">
    .style1 {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: medium;
    }
    .fieldset {
      width: 350px;
      text-align: left;
      margin-left: 0;
      margin-top: 20px;
      height: auto;
      border: none;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      padding: 20px;
      border-radius: 8px;
    }
    #content {
      position: absolute;
      top: 200px;
      left: 400px;
      width: 60%;
      height: 100px;
    }
				#content {
      position: absolute;
      top: 150px;
      left: 400px;
      width: 60%;
      height: 100px;
    }
    /* Add your custom table style */
    .custom-table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #ccc;
    }
    .custom-table th,
    .custom-table td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    .custom-table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
 <div id="main">
  <?php
if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
?>
   
  <div>
    <?php
    require("registrar_commen.php");  
    ?>
  <div>
  </div><!--close menubar-->  
  <div>
  </div>
  <div id="content">
<?php
if($con) {
  $sql = "SELECT * FROM depthead";
  $recordfound = mysqli_query($con, $sql);
  if(mysqli_affected_rows($con)) {
    ?>
    <fieldset class="fieldset">
      <legend class="style1">You can see the Department here</legend>
      <div style="height: auto;width: 100%; overflow-y:scroll; overflow-x:scroll;">
        <table class="custom-table">
          <tr>
            <th>ID_Number</th>
            <th>First Name</th>
            <th>Father Name</th>
            <th>Grandfather Name</th>
            <th>Gender</th>
            <th>Mobile</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Department</th>
            <th>University</th>
          </tr>
          <?php
          while($row = mysqli_fetch_assoc($recordfound)) {
            $did = $row["did"];
            $sql = mysqli_query($con, "SELECT * FROM user WHERE uid='$did'");
            $user = mysqli_num_rows($sql);
            if($user > 0) {
              while($row1 = mysqli_fetch_assoc($sql)) {
                echo "<tr>";
                echo "<td>".$row["did"]."</td>";
                echo "<td>".$row1["ufname"]."</td>";
                echo "<td>".$row1["umname"]."</td>";
                echo "<td>".$row1["ulname"]."</td>";
                echo "<td>".$row1["sex"]."</td>";
                echo "<td>".$row1["mobile"]."</td>";
                echo "<td><img src=../".$row1["photo"]." width=20 height=30 alt='image'/></td>";
                echo "<td>".$row1["email"]."</td>";
                echo "<td>".$row["dname"]."</td>";
                echo "<td>".$row["uid"]."</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='10'>No Record Found</td></tr>";
            }
          }
          ?>
        </table>
      </div>
    </fieldset>
  <?php
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
<?php
} else {
  header("location:../index.php");
}
?>
</div>
</body>
</html>
