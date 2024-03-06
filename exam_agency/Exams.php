<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Exam Setting page</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->

  <style type="text/css">
  .style1
  {
  		font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size:15px;;
	margin-top: -130px;

	color: black;
	margin-left: -180px;
	line-height: 25px;
	
	
  	} 
  	.fieldset
{
  width: 750px;
   text-align: left;
   position: fixed;
   top: 150px; /* Adjust this value to set the desired vertical position */
   left: 500px; /* Adjust this value to set the desired horizontal position */
   border-radius: 0px;
   border-color: #801137;
			 box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);


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
    <div style="text-align: center;">
      <h2>Additional Link</h2>
      <?php
      require("committee_sidelink.php");
      ?>
    </div>
    <?php
    } else {
      header("location:../index.php");
    }
    ?>
    <div>
    </div>
    <!--close footer-->  
    <br><br>  
  </div> 
</body>

</html>


