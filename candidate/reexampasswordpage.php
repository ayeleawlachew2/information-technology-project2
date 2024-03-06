<?php
session_start();
include("../connection.php");

if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {

$uid=$_SESSION['$uid'];
$sql="select * from candidate where cid='$uid'";
$recordfound=mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($recordfound))
{
 $dept=$row["dept"];
 $year=$row["year"];
 }

  if(isset($_POST["exampw"])) {
    $pw = $_POST["epass"];

    $sql = mysqli_query($con, "SELECT * FROM exam_passord WHERE year='$year' AND dept='$dept' AND program='Re_Exam' AND password='$pw'");

    if(mysqli_num_rows($sql) > 0) {
      header("Location: takereexam.php");
      exit(); // Add exit() to stop further script execution
    } else {
      echo "Incorrect Password";
    }
  }
} else {
  header("Location: ../index.php");
  exit(); // Add exit() to stop further script execution
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta charset="utf-8">
  <title>Candidate Page</title>
  <link rel="stylesheet" type="text/css" href="../css/candidate.css">
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
    <?php if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) { ?>
      <div id="header">
        <div id="banner">
          <div id="navigation">
          <?php
          require("candmenu.php");
          ?>
        </div><!--close menubar-->

        <div id="site_content">
          <div class="sidebar_container"></div>
          <div id="content">
            <?php
            $uid = $_SESSION['$uid'];
            $fullname = $_SESSION['fullname'];
            $uname = $_SESSION['sun'];
            $role = $_SESSION['role'];
            $photo = $_SESSION['sphoto'];

            $sql = "SELECT * FROM candidate WHERE cid='$uid'";
            $recordfound = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($recordfound)) {
              $dept = $row["dept"];
              $year = $row["year"];
            }
            ?>

            <div id="site_content">
              <div id="content">
                <fieldset class="fieldset">
                  <center>
                    <br>
                    <br>
                    <table style="border-collapse: collapse; width: 100%; max-width: 400px; margin: 0 auto; background-color: #f2f2f2; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                      <form action="" method="post">
                        <tr>
                          <td colspan="2" style="text-align: center; padding: 10px; background-color: #17c7c1e1; color: #fff; font-weight: bold;">Enter Correct Exam Password</td>
                        </tr>
                        <tr>
                          <td style="padding: 10px;"><input type="password" name="epass" required placeholder="Enter Password" style="width: 100%; padding: 5px; border: 1px solid #ccc; border-radius: 4px;"></td>
                          <td style="padding: 10px;"><input type="submit" name="exampw" value="Go To Exam Page" style="width: 100%; padding: 10px; background-color: rgb(100, 185, 173); color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;"></td>
                        </tr>
                      </form>
                    </table>
                    <br>
                    <?php
                    if(isset($_POST["exampw"])) {
                      $pw = $_POST["epass"];
                      $sql = mysqli_query($con, "SELECT * FROM exam_passord WHERE year='$year' AND dept='$dept' AND program='Regular' AND password='$pw'");
                      if(mysqli_num_rows($sql) > 0) {
                        header("Location: takereexam.php");
                        exit(); // Add exit() to stop further script execution
                      } else {
                        echo "Incorrect Password";
                      }
                    }
                    ?>
                  </center>
                  <br>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } else {
      header("Location: ../index.php");
      exit(); // Add exit() to stop further script execution
    } ?>
  </div>

  <footer>
  <?php
    require("../footer.php");
    ?>
  </footer>

  <script>
    $(document).ready(function() {
      $('.sidebar').toggleClass('open');
    });
  </script>
</body>
</html>
