<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Set Exam Date page</title>
  <style>
  .style1 {
    font-family: "Times New Roman", Times, serif;
    font-weight: bold;
    font-size: 15px;
    width: 550px;
    text-align: left;
    color: black;
    margin-left: -180px;
    line-height: 25px;
  }

  .fieldset {
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

  .search-form {
    margin-left: 20px;
  }

  .search-form input[type="text"] {
    padding: 5px;
  }

  .search-form input[type="submit"] {
    padding: 5px 10px;
    background-color: #00BFA6;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .search-results {
    margin-left: 20px;
  }

  .search-results table {
    margin-top: 20px;
    margin-left: 20px;
  }

  .error-message {
    color: #FF5252;
    background-color: #ffebee;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
  }
  </style>
</head>

<body>
<div id="main">
  <?php
  if(isset($_SESSION['sun']) && isset($_SESSION['spw']))
  {
  ?>

		<div>
      <?php
      require("examagency_commen.php");
      ?>
    </div>
  <div class="content_item" style="margin-top:10px; margin-left:250px;">
     <fieldset class="fieldset">
      <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">View Exam Date Here</legend>
						<br>
      <div class="search-form">
        <form action="" method="post">
          <input type="text" name="searchkey" placeholder="Search by Year"/>
          <input type="submit" name="search" value="Search" />
        </form>
      </div>
      <hr style="border-color: #801137;width: 700px;">
      <br>
      <?php
      if(isset($_POST["search"]))
      {
        $searchvalue = $_POST["searchkey"];
        $sql = "SELECT * FROM examdate WHERE year='$searchvalue'";
        $recordfound = mysqli_query($con, $sql);
        if(mysqli_num_rows($recordfound) > 0)
        {
          echo "<table border='1' style='margin-left: 20px;'>";
          echo "<tr><th>Date ID</th><th>Question type</th><th>Department</th><th>Start Date</th><th>End Date</th><th>Start Time</th><th>End Time</th><th>Year</th></tr>";
          while($row = mysqli_fetch_assoc($recordfound))
          {
            echo "<tr><td>".$row["date_id"]."</td><td>".$row["question_type"]."</td><td>".$row["dept"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";
          }
          echo "</table>";
        }
        else
        {
          echo "<p class='error-message'>No records found!</p>";
        }
      }
      ?>
    </fieldset>
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
