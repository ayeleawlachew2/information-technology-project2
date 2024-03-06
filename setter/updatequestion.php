<?php
session_start();
include("../connection.php");
?>

<html>
<head>
  <title>Update Question</title>
  <link rel="icon" href="../image/logo.png">
  <style type="text/css">
    body {
      font-family: "Times New Roman", Times, serif;
      font-size: 15px;
      color: black;
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

    .style1 {
      font-weight: bold;
      width: 550px;
      text-align: left;
      margin-top: 0px;
      margin-left: 0px;
      line-height: 25px;
    }

    .container {
      margin-left: 20px;
      /* background-color: #bccdf1; */
    }

    .container table {
      width: 50%;
    }

    .container input[type="text"],
    .container textarea {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    .container hr {
      border-color: #801137;
    }

    .container input[type="submit"],
    .container input[type="reset"] {
      padding: 5px 10px;
      background-color: #00BFA6;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .container input[type="submit"]:hover {
      background-color: #45a049;
    }

    .container input[type="reset"]:hover {
      background-color: #f44336;
    }

    .code-container {
      position: absolute;
      top: 20%;
      right: 20%;
    }
  </style>
</head>

<body>
<div id="main">
  <?php
  if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
    $uid = $_SESSION['$uid'];
  ?>
  <div>
    <?php require("setter_commen.php"); ?>
  </div>
  <br>

  <div class="code-container">
    <fieldset class="custom-fieldset">
      <legend>You can update each question information that you set previously!</legend>
      <br><br>
      <div class="container">
        <br>
        <table>
          <form action="" method="post">
            <tr>
              <td><input type="text" name="key" placeholder="Enter Question ID" /></td>
              <td><input type="submit" name="search" value="Search" /></td>
            </tr>

            <tr>
              <td colspan="2"><hr></td>
            </tr>

            <?php
            if (isset($_POST["search"])) {
              $key = $_POST["key"];
              $sql = "SELECT * FROM question WHERE qid='$key' AND sid='$uid'";
              $recordfound = mysqli_query($con, $sql);

              if (mysqli_affected_rows($con)) {
                while ($row = mysqli_fetch_assoc($recordfound)) {
                  $qus = $row["question"];
            ?>
                  <tr>
                    <td>Question Number :</td>
                    <td><input type="number" name="question_number" value="<?php echo $row["question_number"]; ?>" /></td>
                  </tr>

                  <tr>
                    <td>Question:</td>
                    <td><textarea name="question1" cols="2" rows="1"><?php echo $qus; ?></textarea></td>
                  </tr>

                  <tr>
                    <td>Choice A :</td>
                    <td><input type="text" name="ch1" value="<?php echo $row["optiona"]; ?>" /></td>
                  </tr>

                  <tr>
                    <td>Choice B :</td>
                    <td><input type="text" name="ch2" value="<?php echo $row["optionb"]; ?>" /></td>
                  </tr>

                  <tr>
                    <td>Choice C :</td>
                    <td><input type="text" name="ch3" value="<?php echo $row["optionc"]; ?>" /></td>
                  </tr>

                  <tr>
                    <td>Choice D :</td>
                    <td><input type="text" name="ch4" value="<?php echo $row["optiond"]; ?>" /></td>
                  </tr>

                  <tr>
                    <td>Answer [Set Capital letter[A-D]]:</td>
                    <td><input type="text" name="answer" value="<?php echo $row["answer"]; ?>" pattern="[A-E]+" /></td>
                  </tr>

                  <tr>
                    <td>Question ID:</td>
                    <td><input type="text" name="qid" value="<?php echo $row["qid"]; ?>" readonly /></td>
                  </tr>

                  <tr>
                    <td><input type="submit" name="update" value="Update" /></td>
                    <td><input type="reset" value="Cancel" /></td>
                  </tr>
            <?php
                }
              } else {
                echo "You can edit only the questions prepared by yourself!";
              }
            } else {
              if (isset($_POST["update"])) {
                $qus = $_POST["question1"];
                $qn = $_POST["question_number"];
                $a = $_POST["ch1"];
                $b = $_POST["ch2"];
                $c = $_POST["ch3"];
                $d = $_POST["ch4"];
                $ans = $_POST["answer"];
                $id = $_POST["qid"];

                if ($con) {
                  $sql = "UPDATE question SET question_number='$qn', question='$qus', optiona='$a', optionb='$b', optionc='$c', optiond='$d', answer='$ans' WHERE qid='$id'";
                  $updated = mysqli_query($con, $sql);

                  if (mysqli_affected_rows($con)) {
                    echo mysqli_affected_rows($con) . " record/s updated successfully!" . mysqli_error($con);
                  } else {
                    echo "Unable to update!" . mysqli_error($con);
                  }
                } else {
                  die("Connection Failed: " . mysql($con));
                }
              }
            }
            ?>
          </form>
        </table>
      </div>
      <br><br>
    </fieldset>
  </div>

  <?php
  } else {
    header("location:../index.php");
  }
  ?>

  <br><br>
</div>
</body>
</html>
