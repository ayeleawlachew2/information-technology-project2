	<html>
	<head>
	<title>View Notice</title>
	<link rel="icon" href="image/logo.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
	<script type="text/javascript" src="css/javascriptdate.js"></script>
	<style type="text/css">
table
{
margin-left:50px;
width:900px;
margin-top:10px;
text-align: justify;
line-height:20px;	
font-size: 18px;
}
	</style>
	</head>

	<body>
	<header>
  <div>
    <img src="image/logo.png" alt="Logo" class="logo">
    <h1 class="heading">Online Exit Examination System</h1>
  </div>
</header>

<nav>
  <div>
    <?php
    require("menu.php");
    ?>
  </div>
</nav>
	<div >			 
	<div >
<br><br><br>
	<table>
	<tr>
	<td style="line-height: 20px;">
	<?php
	
	include("connection.php");
	include('ps_pagination.php');
	$date=date('Y-m-d');
	
	$sq="SELECT * from notice where Ex_Dates >='$date' and status='active' ORDER BY dates ASC";
//Create a PS_Pagination object
$pager = new PS_Pagination($con, $sq, 1, 2);
//The paginate() function returns a mysql result set for the current page
$rs = $pager->paginate();
  mysqli_query($con, "delete from notice where Ex_Dates <='$date' ORDER BY dates ASC") or die(mysqli_error());	
$sql1=mysqli_query($con, "SELECT * from notice where Ex_Dates >='$date' and status='active' ORDER BY dates ASC") or die(mysqli_error());
	$ro=mysqli_num_rows($sql1);
	if($ro!='0')
	{
	$sql=mysqli_query($con, "SELECT * from notice where Ex_Dates>='$date' and status='active' ORDER BY dates ASC") or die(mysqli_error());
 while($row = mysqli_fetch_array($sql))	
	{

	echo"<p align='right'><b>Date:</b>"."<u>".$row['Dates']."</u>"."</p>";
	echo"<font  size='7' color='#347098'><center>"."<u>".$row['title']."</u>"."</center>"."</p>";
	echo "<font  size='3' color='#00000b'>".$row['Content'];
	echo"<font size='4' color='#0000CD'><center>".$row['sender']."</center>"."</p>";

	}
	echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}
	else
	echo "There No Post Notice!!!";

	?>
	</td>		
	</tr>
	</table>
	</div>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	
	</div>      
	<footer style="background-color:  #e2e0e0;">
    <?php
        require("footer.php");
    ?>
</footer>
	<!--close footer-->  
	<br><br>
	</div> 
	</body>
	</html>


