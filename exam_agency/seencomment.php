<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>comment</title>
   
  <style>
   

  .fieldset {
width: 950px;
      text-align: left;
      margin: -750px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 1s0%;
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
if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
?>

  <?php
        require("examagency_commen.php");
        ?>
      </div>
<fieldset class="fieldset">
      <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">You can check Unseen  and Saved Comment Here  </legend>
 
	</div>

		<div class="content_item">
			 
				<?php
				// Include the PS_Pagination id
				include('ps_pagination.php');
				?>
				<form action="" method="post">									
					<?php
					$query = mysqli_query($con, "select * from comment where status='unread' ORDER BY Date DESC") or die(mysqli_error());
					$count = mysqli_num_rows($query);
					?>		
					        <div class="links-container">
  <a href="unseencomment.php">
    <i class="fas fa-comment"></i>
    <span>Unseen Comment <span class="count-container">&nbsp;<?php echo $count; ?>&nbsp;</span></span>
  </a>					
					 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="seencomment.php">
    <i class="fas fa-save"></i>
    <span>Saved Comment</span>
  </a>
</div>				
					 
					<font size="3px">
					<p align="right" style="color: #2773d8;font-family: time new romans;font-size: 17;">
						Number of record: 
						<?php 
						$count_item = mysqli_query($con, "select * from comment where status='read'") or die(mysql_error());
						$count = mysqli_num_rows($count_item);	
						echo "<font color='red'>".($count)."</font>"; 
						?>
					</p>							
					<?php
					$query1 = mysqli_query($con, "select * from comment where status='read' ORDER BY Date DESC") or die(mysqli_error());
					?>

					<?php
					$sql = "select * from comment where status='read' ORDER BY Date DESC";
					// Create a PS_Pagination object
					$pager = new PS_Pagination($con, $sql, 3, 8);
					// The paginate() function returns a mysql result set for the current page
					$rs = $pager->paginate();									
					$query1 = mysqli_query($con, "select * from comment where status='read' ORDER BY Date DESC") or die(mysqli_error());
					$count = mysqli_num_rows($query1);	
					if ($count != '0') {
					?>
						<table border="1" id="resultTable">
							<tr>
								<th>comment_id</th>
								<th>User_ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Date</th>
								<th>Email</th>
								<th>Content</th>
								<th colspan="2" align="center">Action</th>
							</tr>
							<?php
							while($row = mysqli_fetch_array($query1)) {	
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
									<td><?php echo '<a href="rejectcomment.php?id='.$row['comment_id'].'">Reject</a>';?></td>
								</tr>
							<?php
							}
							?>
						</table>
						<?php
						echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
					}						
					else {
					?>
						<div class="alert alert-info">
							<i class="icon-info-sign"></i> <font size="3px">No Comment to be saved!</div>
					<?php 
					} ?>
				</form>		
                               
				</fildset>        <!-- /block -->
			</div>
		</div>
	</div>
<?php
}
else {
	header("location:../index.php");
}
?>
</div>
<!--close footer-->  
<br><br>
</div>  
</body>
</html>
