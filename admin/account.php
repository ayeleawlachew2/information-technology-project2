<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>user account page</title>
  <link rel="icon" href="../image/logo.png">
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->

  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset {
    width: 650px;
    text-align: left;
    margin: 0 auto; /* Center the fieldset horizontally */
    margin-top: 10px; /* Adjust the top margin as needed */
    position: absolute;
    top: 20%;
    left: 60%;
    transform: translateX(-50%);
   border-radius: 5px;
    border-color: #801137;
}
.my-table {
  width: 100%;
  border-collapse: collapse;
}

.my-table select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.my-table input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #0B770E;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.my-table input[type="submit"]:hover {
  background-color: #45a049;
}
.my-form-table {
  width: 100%;
  border-collapse: collapse;
}

.my-form-table td {
  padding: 8px;
}

.my-form-table input[type="text"],
.my-form-table input[type="password"],
.my-form-table select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.my-form-table input[type="submit"],
.my-form-table input[type="reset"] {
  padding: 10px;
  background-color: #0B770E;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.my-form-table input[type="submit"]:hover,
.my-form-table input[type="reset"]:hover {
  background-color: #45a049;
}
   /* Success Message */
    .success-message {
        background-color:#A9E8AA;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    /* Error Message */
    .error-message {
        background-color: #F58D91;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    /* Info Message */
    .info-message {
        background-color: #2196F3;
        color: white;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
    }
  </style>
  
</head>

<body>
 <div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{

$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";


//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="create account";
//log file

function encryptpassword($password)
{
    $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
    $iv = substr(md5(md5($cryptKey)), 0, 16); // Truncate IV to 16 bytes
    $encryptedPassword = openssl_encrypt($password, 'AES-256-CBC', $cryptKey, 0, $iv);
    return base64_encode($encryptedPassword);
}
?>
	
  	<div >
	<?php
require("admin_commen.php");	

		
?>
	</div>

<fieldset class="fieldset"><legend>Create User Account </legend>
<br/>
<div style="margin-left: 20px;width: 500px;">
<table class="my-table">
  <form action="" method="post" enctype="multipart/form-data">
    <tr>
      <td>
        <select name="role" required>
          <option value="">Choose</option>
          <option value="Candidate">Candidate</option>
          <option value="Exam setter">Exam Setter</option>
          <option value="Committee">Committee</option>
          <option value="Registrar">Registrar</option>
          <option value="Admin">Admin</option>
          <option value="Department Head">Department Head</option>
          <option value="College Dean">College Dean</option>
        </select>
      </td>
      <td>
        <input type="submit" name="auto" value="Create Automatically" />
      </td>
    </tr>
  </form>
</table>

<br>
<?php
if (isset($_POST["auto"])) {
    $value = date("s") + date("m") + date("h") + date("d") + date("m") + date("y");
    $userrole = $_POST["role"];
    $insert = 0;

    if ($userrole == "Admin") {
        $accountcreatedexist = 0;
        $sql = "SELECT * FROM user WHERE role='$role'";
        $record = mysqli_query($con, $sql);
        $recordexist = mysqli_num_rows($record);

        if ($recordexist > 0) {
            while ($r = mysqli_fetch_assoc($record)) {
                $id = $r["uid"];
                $accountcreated = "SELECT * FROM account WHERE uid='$id'";
                $yesexist = mysqli_query($con, $accountcreated);
                $accountcreatedexist = mysqli_num_rows($yesexist);

                if ($accountcreatedexist <= 0) {
                    $plaintext_password = "12345678";
                    $encryptedpassword = encryptpassword($plaintext_password);
                    $sq = "INSERT INTO account VALUES('$id','admin@$value','$encryptedpassword','active','unchanged')";
                    $insert = mysqli_query($con, $sq);

                    $activity = "created User account Information(userid=$id,username=admin@$value,password=$encryptedpassword,status=active)";
                    $logsql = mysqli_query($con, "INSERT INTO logtable VALUES('','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

                    $value++;
                }
            }
            if ($insert != 0) {
                echo '<p class="success-message">All User accounts were successfully created.</p>';
            } else {
                echo '<p class="error-message">Account is already created! ' . mysqli_error($con) . '</p>';
            }
        } else {
            echo '<p class="info-message">No New Admin User is Registered.</p>';
        }
    } elseif ($userrole == "Candidate") {
        $accountcreatedexist = 0;
        $sql = "SELECT * FROM user WHERE role='$userrole'";
        $record = mysqli_query($con, $sql);
        $recordexist = mysqli_num_rows($record);

        if ($recordexist > 0) {
            while ($r = mysqli_fetch_assoc($record)) {
                $id = $r["uid"];
                $accountcreated = "SELECT * FROM account WHERE uid='$id'";
                $yesexist = mysqli_query($con, $accountcreated);
                $accountcreatedexist = mysqli_num_rows($yesexist);

                if ($accountcreatedexist == 0) {
                    $plaintext_password = "12345678";
                    $encryptedpassword = encryptpassword($plaintext_password);
                    $uname = "cand@" . $value;
                    $sq = "INSERT INTO account VALUES('$id','$uname','$encryptedpassword','active','unchanged')";
                    $insert = mysqli_query($con, $sq);

                    $activity = "created User account Information(userid=$id,username=cand@$value,password=$encryptedpassword,status=active)";
                    $logsql = mysqli_query($con, "INSERT INTO logtable VALUES('','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

                    $value++;
                }
            }
            if ($insert != 0) {
                echo '<p class="success-message">User account is successfully created.</p>';
            } else {
                echo '<p class="error-message">Account is already created! ' . mysqli_error($con) . '</p>';
            }
        } else {
            echo '<p class="info-message">No New Candidate User is Registered.</p>';
        }
    } elseif ($userrole == "Exam setter") {
        //$accountcreatedexist=0;
        $sql = "SELECT * FROM user WHERE role='Exam setter'";
        $record = mysqli_query($con, $sql);
        $recordexist = mysqli_num_rows($record);

        if ($recordexist > 0) {
            while ($r = mysqli_fetch_assoc($record)) {
                $id = $r["uid"];
                $accountcreated = "SELECT * FROM account WHERE uid='$id'";
                $yesexist = mysqli_query($con, $accountcreated);
                $accountcreatedexist = mysqli_num_rows($yesexist);

                if ($accountcreatedexist <= 0) {
                    $plaintext_password = "12345678";
                    $encryptedpassword = encryptpassword($plaintext_password);
                    $sq = "INSERT INTO account VALUES('$id','setter@$value','$encryptedpassword','active','unchanged')";
                    $insert = mysqli_query($con, $sq);

                    $activity = "created User account Information(userid=$id,username=setter@$value,password=$encryptedpassword,status=active)";
                    $logsql = mysqli_query($con, "INSERT INTO logtable VALUES('','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

                    $value++;
                }
            }
            if ($insert != 0) {
                echo '<p class="success-message">User account is successfully created.</p>';
            } else {
                echo '<p class="error-message">Account is already created! ' . mysqli_error($con) . '</p>';
            }
        } else {
            echo '<p class="info-message">No New Exam setter User is Registered.</p>';
        }
    } elseif ($userrole == "Committee") {
        //$accountcreatedexist=0;
        $sql = "SELECT * FROM user WHERE role='Committee'";
        $record = mysqli_query($con, $sql);
        $recordexist = mysqli_num_rows($record);

        if ($recordexist > 0) {
            while ($r = mysqli_fetch_assoc($record)) {
                $id = $r["uid"];
                $accountcreated = "SELECT * FROM account WHERE uid='$id'";
                $yesexist = mysqli_query($con, $accountcreated);
                $accountcreatedexist = mysqli_num_rows($yesexist);

                if ($accountcreatedexist <= 0) {
                    $plaintext_password = "12345678";
                    $encryptedpassword = encryptpassword($plaintext_password);
                    $sq = "INSERT INTO account VALUES('$id','committee@$value','$encryptedpassword','active','unchanged')";
                    $insert = mysqli_query($con, $sq);

                    $activity = "created User account Information(userid=$id,username=committee@$value,password=$encryptedpassword,status=active)";
                    $logsql = mysqli_query($con, "INSERT INTO logtable VALUES('','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

                    $value++;
                }
            }
            if ($insert != 0) {
                echo '<p class="success-message">User account is successfully created.</p>';
            } else {
                echo '<p class="error-message">Account is already created! ' . mysqli_error($con) . '</p>';
            }
        } else {
            echo '<p class="info-message">No New Committee User is Registered.</p>';
        }
    } elseif ($userrole == "Registrar") {
        //$accountcreatedexist=0;
        $sql = "SELECT * FROM user WHERE role='$userrole'";
        $record = mysqli_query($con, $sql);
        $recordexist = mysqli_num_rows($record);

        if ($recordexist > 0) {
            while ($r = mysqli_fetch_assoc($record)) {
                $id = $r["uid"];
                $accountcreated = "SELECT * FROM account WHERE uid='$id'";
                $yesexist = mysqli_query($con, $accountcreated);
                $accountcreatedexist = mysqli_num_rows($yesexist);

                if ($accountcreatedexist <= 0) {
                    $plaintext_password = "12345678";
                    $encryptedpassword = encryptpassword($plaintext_password);
                    $sq = "INSERT INTO account VALUES('$id','reg@$value','$encryptedpassword','active','unchanged')";
                    $insert = mysqli_query($con, $sq);

                    $activity = "created User account Information(userid=$id,username=reg@$value,password=$encryptedpassword,status=active)";
                    $logsql = mysqli_query($con, "INSERT INTO logtable VALUES('','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

                    $value++;
                }
            }
            if ($insert != 0) {
                echo '<p class="success-message">User account is successfully created.</p>';
            } else {
                echo '<p class="error-message">Account is already created! ' . mysqli_error($con) . '</p>';
            }
        } else {
            echo '<p class="info-message">No New Registrar User is Registered.</p>';
        }
    } elseif ($userrole == "Department Head") {
        //$accountcreatedexist=0;
        $sql = "SELECT * FROM user WHERE role='$userrole'";
        $record = mysqli_query($con, $sql);
        $recordexist = mysqli_num_rows($record);

        if ($recordexist > 0) {
            while ($r = mysqli_fetch_assoc($record)) {
                $id = $r["uid"];
                $accountcreated = "SELECT * FROM account WHERE uid='$id'";
                $yesexist = mysqli_query($con, $accountcreated);
                $accountcreatedexist = mysqli_num_rows($yesexist);

                if ($accountcreatedexist <= 0) {
                    $plaintext_password = "12345678";
                    $encryptedpassword = encryptpassword($plaintext_password);
                    $sq = "INSERT INTO account VALUES('$id','depthead@$value','$encryptedpassword','active','unchanged')";
                    $insert = mysqli_query($con, $sq);

                    $activity = "created User account Information(userid=$id,username=depthead@$value,password=$encryptedpassword,status=active)";
                    $logsql = mysqli_query($con, "INSERT INTO logtable VALUES('','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

                    $value++;
                }
            }
            if ($insert != 0) {
                echo '<p class="success-message">User account is successfully created.</p>';
            } else {
                echo '<p class="error-message">Account is already created! ' . mysqli_error($con) . '</p>';
            }
        } else {
            echo '<p class="info-message">No New Department Head User is Registered.</p>';
        }
    }elseif ($userrole == "College Dean") {
      //$accountcreatedexist=0;
      $sql = "SELECT * FROM user WHERE role='$userrole'";
      $record = mysqli_query($con, $sql);
      $recordexist = mysqli_num_rows($record);

      if ($recordexist > 0) {
          while ($r = mysqli_fetch_assoc($record)) {
              $id = $r["uid"];
              $accountcreated = "SELECT * FROM account WHERE uid='$id'";
              $yesexist = mysqli_query($con, $accountcreated);
              $accountcreatedexist = mysqli_num_rows($yesexist);

              if ($accountcreatedexist <= 0) {
                  $plaintext_password = "12345678";
                  $encryptedpassword = encryptpassword($plaintext_password);
                  $sq = "INSERT INTO account VALUES('$id','dean@$value','$encryptedpassword','active','unchanged')";
                  $insert = mysqli_query($con, $sq);

                  $activity = "created User account Information(userid=$id,username=dean@$value,password=$encryptedpassword,status=active)";
                  $logsql = mysqli_query($con, "INSERT INTO logtable VALUES('','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

                  $value++;
              }
          }
          if ($insert != 0) {
              echo '<p class="success-message">User account is successfully created.</p>';
          } else {
              echo '<p class="error-message">Account is already created! ' . mysqli_error($con) . '</p>';
          }
      } else {
          echo '<p class="info-message">No New Department Head User is Registered.</p>';
      }
  } else {
        echo '<p class="error-message">Invalid role selection.</p>';
    }
}
?>

<br><br>
<hr>
<br><br>
<table class="my-form-table">
  <form action="" method="post" enctype="multipart/form-data">
    <tr>
      <td>User_ID:</td>
      <td><input type="text" name="uid" pattern="[a-zA-Z0-9/ _.\-+]+" required/></td>
    </tr>
    <tr>
      <td>User Name:</td>
      <td><input type="text" name="un" pattern="[a-zA-Z0-9/ _.\-+]+" required/></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="password" name="pw" pattern="[a-zA-Z0-9/ _.\-+]+" required/></td>
    </tr>
    <tr>
      <td>Status:</td>
      <td>
        <select name="status" required>
          <option value="">choose option</option>
          <option value="active">active</option>
          <option value="inactive">inactive</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="useracc" value="Create account"></td>
      <td><input type="reset" value="Cancel"></td>
    </tr>
  </form>
</table>

<br>
<?php
if(isset($_POST["useracc"]))
{
    $id = $_POST["uid"];    
    $un = $_POST["un"];    
    $pw = $_POST["pw"];
    
    if(strlen($pw) <= 5 || strlen($pw) >= 9) {
        echo '<p class="error-message">Password Length Must Be Between 6 and 8 Characters</p>';
    } else {
        $encryptedpassword = encryptpassword($pw);
        $status = $_POST["status"];
        $pwstatus = "unchanged";        
        
        $sql = "insert into account values('$id','$un','$encryptedpassword','$status','$pwstatus')";
        $insert = mysqli_query($con, $sql);
        
        if($insert) {
            $activity = "created User account Information(userid=$id,username=$un,password=$encryptedpassword,status=active)";
            $logsql = mysqli_query($con, "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
            echo '<p class="success-message">User account is successfully created</p>';
        } else {
            echo '<p class="error-message">No account is created! ' . mysqli_error($con) . '</p>';
        }
    }
}
?>

</div>
<br><br/>
</fieldset>
 </div>
</div>

      	 <?php
}
else
{
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
