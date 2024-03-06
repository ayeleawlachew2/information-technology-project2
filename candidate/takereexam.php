<?php
session_start();
include("../connection.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Take exam</title>
		<link rel="stylesheet" type="text/css" href="../css/login.css">
  <link rel="stylesheet" type="text/css" href="../css/takeexam.css">
  <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
</head>

<body onload="f1()">

  <div id="main">
    <?php
    if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      $uid = $_SESSION['$uid'];
      $username = $_SESSION['sun'];
      $number=0;//role number question

      //check department
      $sql = "SELECT * FROM candidate WHERE cid='$uid'";
      $recordfound = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($recordfound)) {
        $dept = $row["dept"];
        $university = $row["unversity"];
        $year = $row["year"];

        $_SESSION['dept'] = $dept;
        $_SESSION['university'] = $university;
        $_SESSION['year'] = $year;
      }
    ?>
     <header>
    <div>
     <img src="../image/logo.png" alt="Logo" class="logo">
<h1 class="heading">Online Exit Examination System</h1>
  </div>
    </div>
  </header>
      <div id="navigation">
        <?php
        // require("candmenu.php");
        ?>
      </div>
      <div id="site_content"></div>
      <div id="site_content">
        <div class="sidebar_container"></div>
        <div id="content">
          <fieldset class="fieldset">
            <br><br>
            <?php
            $fullname = $_SESSION['fullname'];
            $uname = $_SESSION['sun'];
            $role = $_SESSION['role'];
            $photo = $_SESSION['sphoto'];
            ?>
            <div class="user-details">
              <table cellspacing="0" height="70">
                <tr>
                  <td colspan="2">
                    <center>
                      <?php echo "<img src='../editor/$photo' height=150 width=150>" ?>
                    </center>
                  </td>
                </tr>
                <tr>
                  <td><b>User Name:</b></td>
                  <td><font color="#e9163c"><?php echo $uname; ?></font></td>
                </tr>
                <tr>
                  <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Role:</b></td>
                  <td><font color="#e9163c"><?php echo $role; ?></font></td>
                </tr>
                <tr>
                  <td>Time Left&nbsp;&nbsp;</td>
                  <td style="font-weight: bold; font-size: 20px;">
                    <div id="showtime"></div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="style1">
              <?php
              // Retrieve time According to Department
              $sq = "SELECT * FROM timer WHERE dept='$dept' AND question_type='Re_Exam' AND year='$year'";
              $t = mysqli_query($con, $sq);
              while ($row = mysqli_fetch_array($t)) {
                $h = $row["hour"];
                $m = $row["min"];
              }
              ?>
              <script language="javascript">
                var tim;
                var hour = <?php echo $h; ?>;
                var min = <?php echo $m; ?>;
                var sec = 0;
                var f = new Date();

                function f1() {
                  f2();
                  document.getElementById("starttime").innerHTML = "Your started  Exam at " + f.getHours() + ":" + f.getMinutes();
                }

                function f2() {
                  if (parseInt(sec) > 0) {
                    sec = parseInt(sec) - 1;
                    document.getElementById("showtime").innerHTML = hour + " :" + min + " :" + sec;
                    tim = setTimeout("f2()", 1000);
                  } else {
                    if (parseInt(sec) == 0) {
                      min = parseInt(min) - 1;

                      if (parseInt(min) == 0) {
                        var m = document.getElementById('Exam');
                        m.submit();
                        clearTimeout(tim);

                      } else {
                        sec = 60;
                        //document.getElementById("showtime").innerHTML = "Your Left Time is " + min + " Min " + sec + " Sec";
                        tim = setTimeout("f2()", 1000);
                      }
                    }
                  }
                }
              </script>
              <?php
              $query = "SELECT * FROM question";
              $rand = mysqli_num_rows(mysqli_query($con, $query));

              // Set question
              $sq = "SELECT * FROM question WHERE dept='$dept' AND status='active' AND year='$year' AND question_type='Re_Exam' ORDER BY question_number";
              $result = mysqli_query($con, $sq);
              ?>
              <?php
              $questionIndex = 0;
              $number = 1;
              while ($row = mysqli_fetch_array($result)) {
                $qid = $row["qid"];
                $question = $row["question"];
                $option1 = $row["optiona"];
                $option2 = $row["optionb"];
                $option3 = $row["optionc"];
                $option4 = $row["optiond"];
                $number = $row["question_number"];
              ?>
                <div class="question-container radio_button" id="question-<?php echo $qid; ?>">
                  <table id="question">
                    <form id="Exam" action="display1.php" method="post">
                    <hr>
        <tr>
          <td colspan="2"><?php echo $number; ?>. &nbsp;&nbsp;<?php echo $question; ?></td>
        </tr>
        <tr>
          <td width="1"><input type="radio" name="<?php echo $qid; ?>" value="A" onclick="saveAnswer('<?php echo $uid; ?>', '<?php echo $qid; ?>', 'A')" /></td>
          <td>A)&nbsp;&nbsp;<?php echo  $option1; ?> </td>
        </tr>
        <tr>
          <td width="1"><input type="radio" name="<?php echo $qid; ?>" value="B" onclick="saveAnswer('<?php echo $uid; ?>', '<?php echo $qid; ?>', 'B')" /></td>
          <td>B)&nbsp;&nbsp;<?php echo  $option2; ?> </td>
        </tr>
        <tr>
          <td width="1"><input type="radio" name="<?php echo $qid; ?>" value="C" onclick="saveAnswer('<?php echo $uid; ?>', '<?php echo $qid; ?>', 'C')" /></td>
          <td>C)&nbsp;&nbsp;<?php echo  $option3; ?> </td>
        </tr>
        <tr>
          <td width="1"><input type="radio" name="<?php echo $qid; ?>" value="D" onclick="saveAnswer('<?php echo $uid; ?>', '<?php echo $qid; ?>', 'D')" /></td>
          <td>D)&nbsp;&nbsp;<?php echo  $option4; ?> </td>
        </tr>
    </table>
  </div>

<?php
  $number = $number + 1;
}
?>

<input type="submit" name="submit" value="Submit" id="submit" style="margin-left: 100px;">
</form>

<script>
function saveAnswer(userId, questionId, answer) {
  // Make an AJAX request to update or insert the user's answer
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "save_answer.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Response handling, if needed
    }
  };
  xhr.send("userId=" + userId + "&questionId=" + questionId + "&answer=" + answer);
}
</script>
            <div class="pagination">
              <button class="prev" onclick="previousQuestion()">Previous</button>
              <button class="next" onclick="nextQuestion()">Next</button>
            </div>
          </fieldset>
        </div>
      </div>
      <?php
      mysqli_close($con);
    } else {
      header("location:../logout.php");
    }
    ?>
  </div>
  <script>
    var questionIndex = 0;
    var questions = document.getElementsByClassName("question-container");

    function showQuestion(index) {
      for (var i = 0; i < questions.length; i++) {
        questions[i].style.display = "none";
      }
      questions[index].style.display = "block";
    }

    function previousQuestion() {
      if (questionIndex > 0) {
        questionIndex--;
        showQuestion(questionIndex);
      }
    }

    function nextQuestion() {
      if (questionIndex < questions.length - 1) {
        questionIndex++;
        showQuestion(questionIndex);
      }
    }

    showQuestion(questionIndex);
  </script>
</body>

</html>
