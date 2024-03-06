<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Response</title>
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
<div style="height: 500px;width:759px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<form action="" method="post">									
<?php
$query1 = mysqli_query($con, "select * from notification where committee_status='read' and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No'")
or die(mysqli_error());
$counts = mysqli_num_rows($query1);
?>		
 <div class="links-container">
<a href="last_unread.php">
    <i class="fas fa-bell"></i>
    <span>Unseen Request <span class="count-container"><&nbsp;<?php echo $counts;?>&nbsp;></span></span>
  </a>									
 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="seen_last_response.php">
    <i class="fas fa-check"></i>
    <span>Seen Pay  Fee Request</span>
  </a>					
 </div>
<?php
$sql = "select * from notification where committee_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No' ORDER BY dates DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysqli_query($con, "select * from notification where committee_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No' ORDER BY dates DESC")
or die(mysqli_error());
$count = mysqli_num_rows($query1);	
if ($count != '0')
{
?>
<table border="1" >
<tr>
<th>Request_id</th>
<th>User_ID</th>
<th>Department</th>
<th>University</th>
<th>Resean Of Request</th>
<th>Year</th>
<th>Date</th>
<th>Bank Receipt</th>
<th colspan="2">Action</th>

</tr>
        <?php
while($row = mysqli_fetch_array($query1))
{	
$id=$row["request_id"]; 							 
	//mysql_query("UPDATE notification SET status='unread'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["request_id"]; ?></td>
<td><?php echo $row["uid"]; ?></td>
<td><?php echo $row["dept"]; ?></td>
<td><?php echo $row["unvisersity"]; ?></td>
<td><?php echo $row["resean"]; ?></td>
<td><?php echo $row["year"]; ?></td>
<td><?php echo $row["dates"]; ?></td>
<td><div class="zoomimage"><?php echo "<img src=".$row["image"]." width='100' height='100' alt='NO Bank_Receipt'/>"; ?></div></td>
<td><?php echo '<a  href="save_last.php?id='.$row['request_id'].'">Accept</a>';?></td>
<td><?php echo '<a  href="Reject.php?id='.$row['request_id'].'">Reject</a>';?></td>
</div>																			
<?php 
}
?>
</tr></table>

<?php
echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
}						
else
{ 
?>
<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New Request found!</div>
<?php 
} 
?>
</form>		                
  <!-- /block -->
</div> 
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



