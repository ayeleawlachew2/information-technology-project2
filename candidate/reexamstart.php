<?php
session_start();
include("../connection.php");


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta charset="utf-8">
  <title>Candidate Page</title>
  <link rel="stylesheet" type="text/css" href="../css/candidate.css">
  <link rel="stylesheet" type="text/css" href="../css/examstart.css">
  <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.sidebar-toggle').click(function() {
        $('.sidebar').toggleClass('open');
      });
    });
  </script>
  <!-- Add Bootstrap CSS and JS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
.confirm-box {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

.confirm-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
}

.confirm-content h2 {
  margin: 0;
}

.confirm-buttons {
  margin-top: 20px;
}

.confirm-button {
  padding: 10px 20px;
  margin: 0 10px;
  border: none;
}
</style>
</head>

<body>
  <header>
    <div>
      <img src="../image/logo.png" alt="Logo" class="logo">
      <h1 class="heading">Online Exit Examination System</h1>
      <p class="heading">Welcome To Candidate Page</p>
    </div>
    <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>
  </header>

  <aside class="sidebar">
    <div class="profile">
      <?php
      $fullname=$_SESSION['fullname'];
      $uname=$_SESSION['sun'];
      $role=$_SESSION['role'];
      $photo=$_SESSION['sphoto'];
      ?>
      <img src="../editor/<?php echo $photo; ?>" alt="Profile Image">
      <h2><?php echo $uname; ?></h2>
      <p><?php echo $role; ?></p>
      <hr class="line">
      <div>
        <a href="change_pw.php"><i class="fas fa-lock"></i> Change Password</a>
      </div>
      <div>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </aside>

  <div id="main">
    <?php
    if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
  $uid = $_SESSION['$uid'];
    ?>
    <div id="header">
      <div id="banner">
        <div id="navigation">
          <?php
          require("candmenu.php");  
          ?>
        </div><!--close menubar--> 

        <div id="site_content"> 
          <div class="sidebar_container"></div>
          <div id="content" style="margin-top: 50px;margin-left: 60px;font-family: times new roman;font-size: 25px;">
            <?php
            $row1=0;
            $row2=0;
            $row3=0;
            $sql1="select*from result WHERE uid='$uid' and status='Competent' and program='Regular'";
            $userfound1=mysqli_query($con, $sql1);
            $row1=mysqli_num_rows($userfound1);

            $sql12="select*from result WHERE uid='$uid' and status='Not Competent' and program='Regular'";
            $userfound12=mysqli_query($con, $sql12);
            $row4=mysqli_num_rows($userfound12);


            $sql2="select*from result WHERE uid='$uid' and status='Competent' and program='Re_Exam'";
            $userfound2=mysqli_query($con, $sql2);
            $row2=mysqli_num_rows($userfound2);

            $sql3="select*from result WHERE uid='$uid' and status='Not Competent' and program='Re_Exam'";
            $userfound3=mysqli_query($con, $sql3);
            $row3=mysqli_num_rows($userfound3);

            if($row1 > 0)
              //echo "Not Allowed To Take Re_Exam!!!, Because You are Competent Exit Exam Before";
              echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i>Not Allowed To Take Re_Exam!!!, Because You are Competent Exit Exam Before!</p>";
            elseif($row2 > 0)
             // echo "Not Allowed To Take Re_Exam Again!!!, Because You are Competent In Re_Exam Before";
              echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i>Not Allowed To Take Re_Exam Again!!!, Because You are Competent In Re_Exam Before!</p>";
            elseif($row3 > 0)
             // echo "You Already Take The Re-Exam!";
              echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i>You Already Take The Re-Exam!</p>";
            elseif($row4> 0){
              $checkfee="select*from  notification where uid='$uid' and pay_fee='Yes'";
              $yesfee=mysqli_query($con, $checkfee);
              $r=mysqli_num_rows($yesfee);
              if($r > 0) {
															// session_start();
$dept = $_SESSION['dept'];  
$year = $_SESSION['year'];  

// Rest of your code...

                //question info
                $sql="select*from question WHERE dept='$dept' and year='$year' and question_type='Re_Exam'";
                $recordexist=mysqli_query($con, $sql);
                $totalquestion=mysqli_num_rows($recordexist);
                //date and time
                $chechdate="select * from examdate where year='$year' and dept='$dept' and question_type='Re_Exam'";
                $recorddate=mysqli_query($con, $chechdate);
                $datecount=mysqli_num_rows($recorddate);
                while($row1=mysqli_fetch_assoc($recorddate)) {
                  $sdate=$row1["start_date"];
                  $edate=$row1["end_date"];
                  $stime=$row1["start_time"];
                  $etime=$row1["end_time"];
                }
                $currenttime=date("h:i:s ", time());
                $currentdate=date("Y-m-d");
                //taken exam

                //timer
                $timer="select*from timer WHERE dept='$dept' and year='$year' and question_type='Re_Exam'";
                $existtimer=mysqli_query($con, $timer);
                $totaltime=mysqli_num_rows($existtimer);

                if(mysqli_num_rows($existtimer) > 0) {
                  while($row=mysqli_fetch_array($existtimer)) {
                    $hr=$row["hour"];  
                    $min=$row["min"];  
                  }
                  if($hr > 0)
                    $examtime=$hr.":".$min. "H/Minute ";
                  else
                    $examtime=$min." minute";
                }
            ?>
              <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3>The Permitted Time To Take the Exam</h3>
            <p>Current time: <?php echo $currenttime; ?></p>
             <p>Start time: <?php echo $stime; ?></p> 
            <p>End time: <?php echo $etime; ?></p> 
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
                <div id="style1">
                  <?php
                  if($datecount > 0) {
                    if($sdate <= $currentdate && $edate >= $currentdate) {
                      if($totaltime > 0) {
                        if($stime <= $currenttime && $etime >= $currenttime) {
                          if($totalquestion > 0) {
                            ?>
                            <p><ul>
                              <!-- <img width="40" height="20" src="../image/right.jpg"> -->
                              <li><i class="fas fa-check-circle"></i> Any candidate who takes <strong>Re Exit Exam</strong> must read all instructions carefully before starting the exam. So, before you start, please read the following instructions carefully:</li>
                               
                               <ul>
    <li><i class="fas fa-check"></i> You must read all instructions.</li>
    <li><i class="fas fa-check"></i> You must check the exam date in the home page notice link.</li>
    <li><i class="fas fa-check"></i> You must check the exam starting and ending time in the home page notice link.</li>
    <li><i class="fas fa-check"></i> This exit exam is for <b><?php echo $year; ?></b> graduate students in the <b><?php echo $dept; ?></b> department only.</li>
    <li><i class="fas fa-check"></i> The total number of questions is <b><?php echo $totalquestion; ?></b>.</li>
    <li><i class="fas fa-check"></i> All questions are multiple-choice, so you should select one option from the list.</li>
    <li><i class="fas fa-check"></i> The total time allowed for this exit exam is <b><?php echo $examtime; ?></b>.</li>
    <li><i class="fas fa-check"></i> To start the exam, click the <b>Start Exam</b> button below, and after clicking, the exam questions will be displayed.</li>
  </ul>
</ul>
                          <script>
function msg() {
  var confirmBox = document.createElement('div');
  confirmBox.className = 'confirm-box';
  confirmBox.innerHTML = `
    <div class="confirm-content">
      <h2>Are You Ready To Take Exam?</h2>
      <div class="confirm-buttons">
        <button class="confirm-button confirm-yes">Yes</button>
        <button class="confirm-button confirm-no">No</button>
      </div>
    </div>
  `;
  
  document.body.appendChild(confirmBox);
  
  document.querySelector('.confirm-yes').addEventListener('click', function() {
    window.location.href = "reexampasswordpage.php";
    document.body.removeChild(confirmBox);
  });
  
  document.querySelector('.confirm-no').addEventListener('click', function() {
    document.body.removeChild(confirmBox);
  });
}

</script>
                             <button class="btn-primary" onclick="msg()" style="background-color: rgb(100, 185, 173);" onmouseover="this.style.backgroundColor='#66cdb1';" onmouseout="this.style.backgroundColor='rgb(100, 185, 173)';">Start Exam</button>

                            <?php
                          }
                          else
                          echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i>The Exam Question Is Not Posted</p>";
                            
                        }
                        else
                        echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i> The Exam Time Has Expired!!!</p>";
                          
                      }
                      else
                       echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i> The Exam Time Is Not Specified!!!</p>";
                         
                    }
                    else
                     echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i> The Exam Date Has Expired</p>";
                       
                  }
                  else
                   echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i> The Exam Date Is Not Specified</p>";
                     
                  ?>
                </div>
            <?php
              }
              else
              echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i> You Must Pay Fee To Take Re_Exam, To Pay Fee Click Exam Applicant header link</p>";
                 
            }
            else {
            echo "<p style='color: red; font-size: 18px; text-align: center; padding: 10px; background-color: #ffcdd2; border: 1px solid #f44336; border-radius: 4px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 20px auto; max-width: 500px;'><i class='fas fa-exclamation-triangle' style='margin-right: 5px;'></i>You Are Not Allowed To Take Re-Exam, You Can Take Regular Exam Instead!</p>";
          }
          ?>
          <?php
          }
          else {
            header("location:../index.php");
          }
          ?>
          
              
        </div>
      <footer>
    <?php
    require("../footer.php");
    ?>
  </footer>
  </body>
</html>
