<?php
session_start();
include("../connection.php");
?>
<html>

<head>
  <title>View Question Page</title>
  <link rel="icon" href="../image/logo.png">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

 .custom-fieldset {
  width: 535px;
  text-align: left;
  margin: 10px auto;
  border-radius: 5px;
  border-color: #801137;
  position: absolute;
  top: 30%;
  right: 20%;
}



    .custom-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .custom-table th,
    .custom-table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    .custom-table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    .custom-select {
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 16px;
      width: 100%;
      box-sizing: border-box;
    }

    .custom-button {
      padding: 10px 20px;
      background-color: #00BFA6;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .custom-button:hover {
      background-color: #45a049;
    }

    .custom-font {
      font-size: 18px;
      color: blue;
      font-style: italic;
    }

    .custom-hr {
      margin-left: -50px;
      width: calc(100% + 100px);
      border-color: #0d0000;
    }

     .custom-content {
        margin-top: 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f2f2f2;
    }

    .custom-question {
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }
  </style>
</head>

<body>
  <div id="main">
    <?php
    if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      $uid = $_SESSION['$uid'];
      //dept and year
      $sql = "select * from Examsetter where sid='$uid'";
      $record = mysqli_query($con, $sql);
      if (mysqli_affected_rows($con)) {
        while ($row = mysqli_fetch_assoc($record)) {
          $year = $row["year"];
          $dept = $row["dname"];
          $sid = $row["sid"];
        }
      } else {
        echo "No Result found!";
      }
    ?>

      <div id="content">
        <?php
        require("setter_commen.php");
        ?>

        <div class="custom-fieldset">
          <form action="" method="post">
            <table class="custom-table">
              <tr>
                <th colspan="2">Search Questions</th>
              </tr>
              <tr>
                <td>
                  <select name="program" class="custom-select" required>
                    <option value="">Choose Question Type</option>
                    <option value="Regular">Regular</option>
                    <option value="Re_Exam">Re_Exam</option>
                  </select>
                </td>
                <td><input type="submit" name="search" value="Search" class="custom-button" /></td>
              </tr>
            </table>
          </form>
        </div>

        <?php
        if (isset($_POST["search"])) {
          $qtype = $_POST["program"];
          ?>
          <div class="custom-content">
            <p class="custom-font">
              Welcome to the Exit Exam Question Display<br>
              The following questions are prepared for:<br>
              Department: <?php echo $dept; ?><br>
              Year: <?php echo $year . " E.C"; ?><br>
              Question Type: <?php echo $qtype; ?>
            </p>

            <hr class="custom-hr">

            <?php
            //view question
            if ($con) {
              $i = 0;
              $sql = "select * from question where dept='$dept' and year='$year' and question_type='$qtype' and sid='$sid'";
              $recordfound = mysqli_query($con, $sql);
              $number = mysqli_num_rows($recordfound);
              if (mysqli_affected_rows($con)) {
                while ($row = mysqli_fetch_assoc($recordfound)) {
                  $i++;
                  $qid = $row["qid"];
                  $answer = $row["answer"];
                  ?>

                  <div class="custom-question">
                    <p><?php echo "$i. " . $row["question"]; ?></p>
                    <p>A. <?php echo $row["optiona"]; ?></p>
                    <p>B. <?php echo $row["optionb"]; ?></p>
                    <p>C. <?php echo $row["optionc"]; ?></p>
                    <p>D. <?php echo $row["optiond"]; ?></p>
                    <p>Question ID: <?php echo $qid; ?> and answer is <?php echo $answer; ?></p>
                  </div>

            <?php
                }
              } else {
                echo "<p>No records found!</p>";
              }
            } else {
              echo "<p>Connection Failed!!!" . mysqli_error($con) . "</p>";
            }
            ?>
          </div>
        <?php
        }
        ?>
      </div>

    <?php
    } else {
      header("location:../index.php");
    }
    ?>
  </div>
</body>

</html>
