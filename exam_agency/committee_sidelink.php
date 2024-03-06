<html>
<head>
  <style type="text/css">
    .button-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 10px;
    }

    .button-container button {
      display: block;
      background: #4682B4;
      padding: 10px 20px;
      text-decoration: none;
      color: #fff;
      font-size: 20px;
      font-family: Times New Roman;
      font-style: oblique;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .button-container button:nth-child(1) {
      background: #4682B4;
    }

    .button-container button:nth-child(2) {
      background: #66BB6A;
    }

    .button-container button:nth-child(3) {
      background: #FFA726;
    }

    .button-container button:hover {
      background: #006699;
    }
  </style>
</head>
<body>
<div class="button-container">
  <button onclick="window.location.href='score.php'">Set Passing Score</button>
  <button onclick="window.location.href='updatescore.php'">Edit Score</button>
  <button onclick="window.location.href='viewscore.php'">View Score</button>
</div>
<div class="button-container">
  <?php
  //
  $query = mysqli_query($con,"select * from notification where committee_status='unread' ORDER BY dates DESC")
    or die(mysqli_error());
  $coun = mysqli_num_rows($query);
  //
  $query1 = mysqli_query($con, "select * from notification where committee_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No' ORDER BY dates DESC")or die(mysqli_error());

  $countpay_fee = mysqli_num_rows($query1);
  $query3 = mysqli_query($con, "select * from comment WHERE status='unread' ORDER BY Date DESC")or die(mysqli_error());
  $count3 = mysqli_num_rows($query3);
  ?>
  <button onclick="window.location.href='response.php'">Notification [&nbsp;<?php echo $coun;?>&nbsp;]</button>
  <button onclick="window.location.href='last_response.php'">Pay Fee [&nbsp;<?php echo $countpay_fee;?>&nbsp;]</button>
  <button onclick="window.location.href='examdate.php'">Add Exam Date</button>
</div>
<div class="button-container">
  <button onclick="window.location.href='view_eaxmdate.php'">View Exam Date</button>
  <button onclick="window.location.href='updateexamdate.php'">Edit Exam Date</button>
  <button onclick="window.location.href='viewcomment.php'">View Comment [&nbsp;<?php echo $count3;?>&nbsp;]</button>
  <button onclick="window.location.href='fillyear.php'">View Report</button>
</div>
</body>
</html>
