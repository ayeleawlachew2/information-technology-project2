<?php
ob_start();
session_start();
?>
<html>
<head>
     <link rel="icon" href="image/logo.png">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="css/javasscript.js"></script>
  <style>
        link[rel="icon"] {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
    .popup-container {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  z-index: 9999;
  width: 300px;
  max-width: 90%;
}

.popup-heading {
  font-size: 24px;
  color: #333333;
  margin-bottom: 10px;
}

.popup-message {
  font-size: 16px;
  color: #555555;
  margin-bottom: 20px;
}

.popup-attempts {
  font-size: 14px;
  color: #888888;
  margin-bottom: 10px;
}

.popup-button {
   background-color: rgb(100, 185, 173);
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  border-radius: 30px;
  cursor: pointer;
  font-size: 16px;
}

.popup-button:hover {
 background-color: rgb(8, 90, 79);
}

.popup-button:focus {
  outline: none;
}

.popup-container::before {
  content: '';
  position: absolute;
  top: -10px;
  left: 50%;
  transform: translateX(-50%);
  border-top: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid #ffffff;
  border-left: 10px solid #ffffff;
}

.popup-container::after {
  content: '';
  position: absolute;
  top: -16px;
  left: 50%;
  transform: translateX(-50%);
  border-top: 16px solid transparent;
  border-right: 16px solid transparent;
  border-bottom: 16px solid #ffffff;
  border-left: 16px solid #ffffff;
}
 #clockContainer {
      position: absolute;
      top: 7px;
      right: 10px;
      width: 150px; /* Adjust the width if necessary */
      height: 90px;
      background-color: #f2f2f2;
      padding: 10px;
      border-radius: 4px;
      font-size: 16px;
      font-family: Arial, sans-serif;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    
    #clockContainer #clockText {
      font-weight: bold;
      font-size: 15px;
      margin-bottom: 4px;
    }
    
    #clockContainer #clockTime {
      font-size: 24px; /* Adjust the font size if necessary */
      font-family: "Roboto", sans-serif;
    }
    
    #clockContainer #clockDate {
      margin-top: 2px;
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>
  <header>
    <div>
      <?php
      require("dmu.php");
      ?>
    </div>
  </header>
  <section class="content">
    <img src="image/bg.svg" class="img" style="max-width: 45%; height: 30%;">
    <div class="login">
      <form action="" method="post" name="myForm" onsubmit="return validateuser()">
        <img src="image/avatar.svg" style="width: 100px; height: 100px;">
        <h2 class="title" style="color: #333; font-size: 24px; text-align: center;">Welcome</h2>
        <input type="text" name="un" placeholder="UserName" style="padding-left: 30px; background-image: url('css/fontawesome-free-6.4.0-web/svgs/solid/user.svg'); background-repeat: no-repeat; background-position: 10px center; background-size: 16px;">
        <input type="password" name="pass" placeholder="Password" style="padding-left: 30px; background-image: url('css/fontawesome-free-6.4.0-web/svgs/solid/lock.svg'); background-repeat: no-repeat; background-position: 10px center; background-size: 16px;">
        <input type="submit" name="login" value="Login">
      </form>
    </div>
    <div id="clockContainer">
      <div id="clockText">WKU</div>
      <div id="clockTime"></div>
      <div id="clockDate"></div>
    </div>
  </section>
  <?php
  if (isset($_POST["login"])) {
    include("connection.php");

    function encryptpassword($password){
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    $iv = substr(md5(md5($cryptKey)), 0, 16); // Truncate IV to 16 bytes
    $encryptedPassword = openssl_encrypt($password, 'AES-256-CBC', $cryptKey, 0, $iv);
    return base64_encode($encryptedPassword);
}
    $uname = $_POST["un"];
    $pass = $_POST["pass"];
    $plaintext_password = $pass;
    $password=encryptpassword($plaintext_password);
    if ($con) {
      $sql = "select * from account where username='$uname' and password='$password'";
      $matchfound = mysqli_query($con, $sql);
      $userexist = mysqli_num_rows($matchfound);
      if ($userexist > 0) {
        $sql = "delete from attempt";
        $sql = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($matchfound)) {
          $id = $row["uid"];
          $un = $row["username"];
          $pw = $row["password"];
          $status = $row["status"];
          $pw_status = $row["password_status"];
        }
         if ($pw_status == "unchanged") {
        $_SESSION['userid'] = $id;
        $_SESSION['oldpassword'] = $pass;
        header("location:change_password.php");
      } else {
        $sqll = "select * from user where uid='$id'";
        $matchfound1 = mysqli_query($con, $sqll);
        while ($user = mysqli_fetch_assoc($matchfound1)) {
          $fname = $user["ufname"];
          $mname = $user["umname"];
          $lname = $user["ulname"];
          $role = $user["role"];
          $photo = $user["photo"];
        }
        
        $sql2 = "select * from candidate where cid='$id'";
        $matchfound2 = mysqli_query($con, $sql2);
        while ($user2 = mysqli_fetch_assoc($matchfound2)) {
          $dept = $user2 ["dept"];
        }
        //store value in session
        $fullname = $fname . " " . $mname . " " . $lname;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['sun'] = $un;
        $_SESSION['spw'] = $pw;
        $_SESSION['role'] = $role;
        $_SESSION['$uid'] = $id;
        $_SESSION['dept'] = $dept;
        $_SESSION['sphoto'] = $photo;

        // variable declaration for log file registration
        $login_time = date("h:i:s");
        $_SESSION['login_time'] = $login_time;

        //end log record
        //Go to Page
        if ($role == "Admin" && $status == "active")
          header("location:admin/adminpage.php");
        else if ($role == "Candidate" && $status == "active")
          header("location:candidate/candidatepage.php");
        else if ($role == "Exam setter" && $status == "active")
          header("location:setter/examsetterpage.php");
        else if ($role == "Committee" && $status == "active")
          header("location:exam_agency/committee_page.php");
        else if ($role == "Registrar" && $status == "active")
          header("location:Registrar/registrar.php");
        else if ($role == "Department Head" && $status == "active")
          header("location:dept/registrar.php");
        else if ($role == "College Dean" && $status == "active")
          header("location:college_dean/registrar.php");
        else {
          if ($status == "inactive")
            echo "<font color='red' size=4><b><i>Sorry Your Account Is Blocked!!!</i></b></font>";
          else
            header("location:index.php");
        }
      }
    } else {
      $count = "insert";
      $sql = mysqli_query($con, "select*from attempt");
      $total = mysqli_num_rows($sql);
      $total++;
      if ($total > 2) {
        header("location:index.php");
      } else {
        $insert = mysqli_query($con, "insert into attempt values(' ','$count')");
        echo '<div id="custom-popup" class="popup-container">
                    <h2 class="popup-heading">Alert</h2>
                    <p class="popup-message">Invalid username or password.</p>
                    <p class="popup-attempts">You have made ' . $total . ' attempt(s), but only 4 attempts are allowed.</p>
                    <button id="close-popup" class="popup-button">Close</button>
                  </div>';
      }
    }
  } else {
    echo "Connection fail";
  }
}
?>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <!-- JavaScript code for the custom popup -->
  <script>
    document.getElementById('close-popup').addEventListener('click', function() {
      document.getElementById('custom-popup').style.display = 'none';
    });
  </script>

<script>
  function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var day = now.getDate();
    var month = now.getMonth() + 1; // Months are zero-based, so add 1
    var year = now.getFullYear();
    var dayOfWeek = now.toLocaleDateString('en-US', { weekday: 'long' }); // Get the day of the week
    
    // Format the time with leading zeros if necessary
    hours = String(hours).padStart(2, '0');
    minutes = String(minutes).padStart(2, '0');
    seconds = String(seconds).padStart(2, '0');

    // Display the time, day of the week, and date in the clock container
    document.getElementById('clockTime').textContent = hours + ':' + minutes + ':' + seconds;
    document.getElementById('clockDate').textContent = dayOfWeek + ', ' + day + '/' + month + '/' + year;
  }

  // Update the clock immediately
  updateClock();

  // Update the clock every second
  setInterval(updateClock, 1000);
</script>
<footer style="background-color:  #e2e0e0;">
    <?php
        require("footer.php");
    ?>
</footer>
</body>
</html>
