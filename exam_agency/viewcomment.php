<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View Comment</title>
	<link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style type="text/css">
  .content-item {
   width: 950px;
      text-align: left;
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

   table {
    width: 80%;
    border-collapse: collapse;
  }
  
  th, td {
    text-align: left;
    padding: 8px;
  }
  
  th {
    text-align: center;
    background-color: #f2f2f2;
  }
  
  tr:nth-child(even) {
    background-color: #ffffff;
  }
  
  tr:hover {
    background-color: #f9f9f9;
  }
  
  td a {
    text-decoration: none;
    color: #333;
    padding: 2px 6px;
    border-radius: 3px;
    background-color: #f2f2f2;
  }
  
  td a:hover {
    background-color: #801137;
    color: #fff;
  }

  #contenttable {
    width: 750px;
    text-align: left;
    position: fixed;
    top: 150px;
    left: 500px;
    border-radius: 0px;
    border-color: #801137;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
  </style>
</head>

<body>
<div id="main">
 	  <?php
    if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      ?>
      <div>
        <?php
        require("examagency_commen.php");
        ?>
      </div>
      <div class="content-item">
        <?php
        //Include the PS_Pagination id
        include('ps_pagination.php');
        ?>
        <form action="" method="get">
          <?php
          $query = mysqli_query($con, "SELECT * FROM comment WHERE status='unread' ORDER BY Date DESC") or die(mysqli_error());
          $count = mysqli_num_rows($query);
          ?>
          <div class="links-container">
            <a href="unseencomment.php">
  <i class="fas fa-comment"></i>
  <span>Unseen Comment [<?php echo $count; ?>]</span>
</a>
<a href="seencomment.php">
  <i class="fas fa-save"></i>
  <span>Saved Comment</span>
</a>

          </div>
          <font size="3px">
          <?php
          $sql = "SELECT * FROM comment ORDER BY Date DESC";
          // Create a PS_Pagination object
          $pager = new PS_Pagination($con, $sql, 3, 8);
          // The paginate() function returns a mysql result set for the current page
          $rs = $pager->paginate();
          $query1 = mysqli_query($con, "SELECT * FROM comment ORDER BY Date DESC") or die(mysqli_error());
          $count = mysqli_num_rows($query1);
          if ($count != '0') {
          ?>
          <br>
       <table>
  <tr>
    <th>comment_id</th>
    <th>User_ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Date</th>
    <th>Content</th>
    <th colspan="2" align="center">Action</th>
  </tr>
  <?php
  while ($row = mysqli_fetch_array($query1)) {
    $id = $row["comment_id"];
  ?>
  <tr>
    <td><?php echo $row["comment_id"]; ?></td>
    <td><?php echo $row["user_id"]; ?></td>
    <td><?php echo $row["fname"]; ?></td>
    <td><?php echo $row["lname"]; ?></td>
    <td><?php echo $row["Date"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["content"]; ?></td>
    <td><?php echo '<a href="savecomment.php?id='.$row['comment_id'].'">save</a>'; ?></td>
    <td><?php echo '<a href="rejectcomment.php?id='.$row['comment_id'].'">Reject</a>'; ?></td>
  </tr>
  <?php
  }
  ?>
</table>
          <?php
          echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
          } else {
          ?>
          <div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New comment found!</div>
          <?php
          }
          ?>
        </form>
      </div>
    <?php
    } else {
      header("location:../index.php");
    }
    ?>
</div>
</body>
</html>
