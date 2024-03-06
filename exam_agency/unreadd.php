<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Response</title>
   <link rel="icon" href="../image/logo.png">
		<link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .content_item {
    
      width: 750px;
      text-align: left;
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }

    table {
      border-collapse: collapse;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    th {
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .error-message {
      color: red;
      font-weight: bold;
    }

    .alert-info {
      color: #31708f;
      background-color: #d9edf7;
      border-color: #bce8f1;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }
			.links-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #f2f2f2;
    border-radius: 5px;
  }

  .links-container a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #333;
    padding: 5px;
    transition: all 0.3s ease;
  }

  .links-container a:hover {
    background-color: #801137;
    color: #fff;
  }

  .links-container a i {
    margin-right: 5px;
    font-size: 18px;
  }

  .links-container a .count-container {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: #801137;
    color: #fff;
    font-size: 14px;
  }
  </style>
</head>

<body>
  <div id="main">
    <?php
    if(isset($_SESSION['sun']) && isset($_SESSION['spw']))
    {
      require("examagency_commen.php");
    ?>
    </div>
    <div class="content_item">
      <div class="style1" id="textinput">
        <?php
        // Include the PS_Pagination id
        include('ps_pagination.php');
        ?>
        <form action="" method="post">
          <?php
          $query = mysqli_query($con, "SELECT * FROM notification WHERE committee_status='unread' ORDER BY dates DESC") or die(mysqli_error());
          $count = mysqli_num_rows($query);
          ?>
         <div class="links-container">
  <a href="unreadd.php">
    <i class="fas fa-bell"></i>
    <span>Unseen Request <span class="count-container"><?php echo $count; ?></span></span>
  </a>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="messagedd.php">
  <a href="messagedd.php">
    <i class="fas fa-check"></i>
    <span>Approved Request</span>
  </a>
</div>
            <?php
            $sql = "SELECT * FROM notification WHERE committee_status='unread' ORDER BY dates DESC";

            // Create a PS_Pagination object
            $pager = new PS_Pagination($con, $sql, 3, 8);
            // The paginate() function returns a mysql result set for the current page
            $rs = $pager->paginate();
            $query1 = mysqli_query($con, "SELECT * FROM notification WHERE committee_status='unread' ORDER BY dates DESC") or die(mysqli_error());
            $count = mysqli_num_rows($query1);
            if ($count != '0') {
            ?>
              <table border="1">
                <tr>
                  <th>Request_id</th>
                  <th>User_ID</th>
                  <th>Department</th>
                  <th>University</th>
                  <th>Resean Of Request</th>
                  <th>Year</th>
                  <th>Date</th>
                  <th colspan="2" align="center">Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($query1)) {
                  $id = $row["request_id"];
                ?>
                  <tr>
                    <div class="post" id="del<?php echo $id; ?>">
                      <td><?php echo $row["request_id"]; ?></td>
                      <td><?php echo $row["uid"]; ?></td>
                      <td><?php echo $row["dept"]; ?></td>
                      <td><?php echo $row["unvisersity"]; ?></td>
                      <td><?php echo $row["resean"]; ?></td>
                      <td><?php echo $row["year"]; ?></td>
                      <td><?php echo $row["dates"]; ?></td>
                      <td><?php echo '<a href="approvedapplicant.php?id=' . $row['request_id'] . '">Approve</a>'; ?></td>
                      <td><?php echo '<a href="removeapplica.php?id=' . $row['request_id'] . '">Reject</a>'; ?></td>
                    </div>
                  </tr>
                <?php
                }
                ?>
              </table>
              <?php
              echo '<div style="text-align:center">' . $pager->renderFullNav() . '</div>';
            } else {
              ?>
              <div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New Request found!</div>
            <?php
            }
            ?>
        </form>
      </div>
    </div>
    </div>
  <?php
    } else {
      header("location:../index.php");
    }
  ?>
  <!--close footer-->
  </div>
</body>
</html>
