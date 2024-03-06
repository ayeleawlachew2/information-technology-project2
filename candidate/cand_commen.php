<?php
// session_start();
include("../connection.php");
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
    <?php
    if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
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
          <div id="content">
            <?php
            $fullname=$_SESSION['fullname'];
            $uname=$_SESSION['sun'];
            $role=$_SESSION['role'];
            $photo=$_SESSION['sphoto'];
            ?>
             
            <!-- Place your content here -->

          </div>
        </div>
      </div>
    </div>
    <?php
    } else {
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








