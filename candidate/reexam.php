<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Feedback page</title>
</head>
<body>
<div id="main">
  <?php
  if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
  ?>
    <div id="header">
      <div id="banner">
        <?php
        // require("dmu.php");
        ?>
      </div>
    </div>
    <div id="navigation">
      <?php
      require("cand_commen.php");
      ?>
    </div>
    <?php
    require("cansidelink.php");
    ?>
    <br><br><br>
  </div>
  </div>
  </div>
  <?php
  }
  else {
    header("location:../index.php");
  }
  ?>
  <div id="footer">
    <?php
    require("../footer.php");
    ?>
  </div>
  <br><br>
</div>
</body>
</html>
