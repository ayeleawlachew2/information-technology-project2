<?php
session_start();
//include("connection.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta charset="utf-8">
  <title>Candidate Page</title>
  <link rel="stylesheet" type="text/css" href="css/candidate.css">
  <!-- <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script>
    $(document).ready(function() {
      $('.sidebar-toggle').click(function() {
        $('.sidebar').toggleClass('open');
      });
    });
  </script> -->
  <!-- Add Bootstrap CSS and JS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    .style1 {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: 20px;;
      width: 920px;
      text-align: left;
      margin-top: 10px;
      color: black;
      margin-left: 50px;
    }
    .fieldset {
      width: 535px;
      text-align: left;
      margin-left: 200px;
      margin-top: 20px;
      height: auto;
      border-radius: 0px;
      border-color: #801137;
    }
  </style>
</head>

<body>
  <header>
    <div>
      <img src="image/logo.png" alt="Logo" class="logo">
      <h1 class="heading">Online Exit Examination System</h1>
      <!-- <p class="heading">Welcome To Candidate Page</p> -->
    </div>
    <!-- <button class="sidebar-toggle"><i class="fas fa-bars"></i></button> -->
  </header>
  <?php
  function encryptpassword($password){
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    $iv = substr(md5(md5($cryptKey)), 0, 16); // Truncate IV to 16 bytes
    $encryptedPassword = openssl_encrypt($password, 'AES-256-CBC', $cryptKey, 0, $iv);
    return base64_encode($encryptedPassword);
}
?>



  <div id="main">
    <?php
    // if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
    ?>
    <div id="header">
      <div id="banner">
        <div id="navigation">
          <?php
         // require("candmenu.php");
          ?>
        </div><!--close menubar-->

        <div id="site_content">
          <div class="sidebar_container"></div>
          <div id="content">
            <?php
						// $uid=$_SESSION['$uid'];
            // $fullname=$_SESSION['fullname'];
            // $uname=$_SESSION['sun'];
            // $role=$_SESSION['role'];
            // $photo=$_SESSION['sphoto'];
            ?>


            <fieldset class="fieldset" style="border: 1px solid #ccc; border-radius: 8px; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
  <legend style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Change Password</legend>
              <form name="myForm" method="post" action="">
  <table style="border-collapse: collapse; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); background-color: #fff; padding: 20px; border-radius: 8px;">
    <tr>
      <td style="padding-right: 10px;">Old Password:</td>
      <td><input type="text" name="opw" placeholder="Enter old Password" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;"></td>
    </tr>
    <tr>
      <td style="padding-right: 10px;">New Password:</td>
      <td><input type="password" name="npw" placeholder="Enter New Password" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;"></td>
    </tr>
    <tr>
      <td style="padding-right: 10px;">Confirm Password:</td>
      <td><input type="password" name="cpw" placeholder="Confirm New Password" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;"></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center;">
        <input type="submit" name="changepw" value="Change Password" style="padding: 10px 20px; background-color: rgb(100, 185, 173); color: #fff; border: none; border-radius: 4px; cursor: pointer;">
        <input type="reset" value="Cancel" style="padding: 10px 20px; background-color: #ccc; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
      </td>
    </tr>
  </table>
</form>

              <br><br>
              <?php
              if(isset($_POST["changepw"]))
              {
                include("connection.php");
              $userid=$_SESSION['userid'];
              $oldpw=$_POST["opw"];
              $oldencript=encryptpassword($oldpw);
              $newpw=$_POST["npw"];	
              $confrimpw=$_POST["cpw"];	
              if(strlen($newpw)<=5)
              echo "Password Length IS Must Be Between 6 and 8 Character";
              elseif(strlen($newpw)>=9)
              echo "Password Length IS Must Be Between 6 and 8 Character";
              else
              {
              if($newpw==$confrimpw)
              {
              //$old=mysqli_query("select*from  account where uid='$userid'");
              $old2="select*from  account where uid='$userid'";
              $old=mysqli_query($con,$old2);
              while($row=mysqli_fetch_array($old))
              $oldpass=$row["password"];
              if($oldencript==$oldpass)
              {
              $newpassword=encryptpassword($newpw);
              $sql="update account set password='$newpassword',password_status='changed' where uid='$userid' and password='$oldencript'";
              $updatepassword=mysqli_query($con,$sql);	
              if($updatepassword)
              {
              $x='<script type="text/javascript">alert("Your Password Is Successfully Changed!!!!");window.location=\'index.php\';</script>';
              echo $x;
              }
              else
              echo"No Password Successfully Changed".mysql_error($con);
              }
              else
              echo "Old Password Is Incorrect";
              }
              else
              echo"New Password and Confrim Password is Not Match!!!";	
              }
              }
              ?>
              <br>
            </fieldset>
          </div>
          <?php
          // }
          // else
          // {
          //   header("location:index.php");
          // }
          ?>
        </div><!--close content-->
      </div><!--close site_content-->
    </div><!--close main-->
  </div><!--close container-->

  <footer>
    <?php
    require("footer.php");
    ?>
  </footer>
</body>
</html>
