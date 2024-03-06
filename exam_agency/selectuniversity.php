<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Register University</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
  #fieldset {
      width: 750px;
      text-align: left;
      margin: -650px auto 0; /* Adjust this value to set the desired vertical position */
       margin-right: 15%;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
		 .form-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }

  .form-table td {
    padding: 8px;
  }

  .form-table label {
    font-weight: bold;
  }

  .form-table select,
  .form-table input[type="submit"],
  .form-table input[type="reset"] {
    width: 100%;
    padding: 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
    background-color: #f2f2f2;
    transition: border-color 0.3s ease;
  }

  .form-table select:focus,
  .form-table input[type="submit"]:focus,
  .form-table input[type="reset"]:focus {
    border-color: #801137;
  }

  .form-table input[type="submit"],
  .form-table input[type="reset"] {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    background-color:#00BFA6;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form-table input[type="submit"]:hover,
  .form-table input[type="reset"]:hover {
    background-color: #66092d;
		}

  </style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{

if(isset($_POST["next"]))
{
$_SESSION['university']=$_POST["university"];
header("location:regdept.php");	
}

?>
   <div>
	   
	<?php
require("examagency_commen.php");	
?>
			</div>
    
<fieldset id="fieldset">
  <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Select University</legend>
  <table class="form-table">
    <form action="" method="post">
      <tr>
        <td>Choose University:</td>
        <td>
          <select name="university" required>
            <option value="">Choose option</option>
            <?php
            if ($con) {
              $sql = "select * from university";
              $recordfound = mysqli_query($con, $sql);
              if (mysqli_affected_rows($con)) {
                while ($row = mysqli_fetch_assoc($recordfound)) {
                  ?>
                  <option value="<?php echo $row["uid"]; ?>"><?php echo $row["uname"]; ?></option>
                <?php
                }
              } else {
                echo "No records found!";
              }
            } else {
              echo "Connection failed";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><input type="submit" name="next" value="Next" /></td>
        <td><input type="reset" name="" value="Cancel" /></td>
      </tr>
    </form>
  </table>
</fieldset>
 
</div> 
 <?php
}
else
{
header("location:../index.php");
}
?>
</div> 
 
</body>
</html>
