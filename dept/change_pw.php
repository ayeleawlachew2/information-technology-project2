<?php
session_start();
include("../connection.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta charset="utf-8">
  <title>Registrar page|| Change Password</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/candidate.css">
  <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
   
  <!-- Add Bootstrap CSS and JS -->
 
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
  width: 750px;
  text-align: left;
  position: fixed;
  top: 200px;
  left: 500px;
  border-radius: 0px;
  border-color: #801137;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
  /* Adjust the max-width value based on your desired breakpoint */
  .fieldset {
    position: static; /* Remove the fixed positioning on smaller screens */
    width: auto; /* Let the element adjust its width based on content */
    left: auto; /* Reset the horizontal position */
    margin: 0 10px; /* Add some margin to center the element */
  }
}

  </style>
</head>

<body>
 <div id="main">
   <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
   
  <div>
    <?php
    require("registrar_commen.php");  
    ?>
  </div>
<div id="content">
             

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
                $oldpw=$_POST["opw"];
                $newpw=$_POST["npw"]; 
                $confrimpw=$_POST["cpw"]; 
                if(strlen($newpw)<=5)
                 echo '<p><i class="fas fa-exclamation-triangle"></i> Password Length Must Be Between 6 and 8 Characters</p>';
elseif(strlen($newpw) >= 9)
  echo '<p><i class="fas fa-exclamation-triangle"></i> Password Length Must Be Between 6 and 8 Characters</p>';

                else
                {
                  if($newpw==$confrimpw)
                  {
                    //$newpassword=encryptpassword($newpw);
                    $newpassword=$newpw;
                    $sql="update account set password='$newpassword' where uid='$uid'";
                    $updatepassword=mysqli_query($con, $sql); 
                    if($updatepassword)
                    echo '<p><i class="fas fa-check-circle"></i> Your Password Was Successfully Changed!</p>';
else
  echo '<p><i class="fas fa-exclamation-circle"></i> Password Was Not Changed: ' . mysqli_error($con) . '</p>';
}
else
  echo '<p><i class="fas fa-exclamation-triangle"></i> New Password and Confirm Password Do Not Match!</p>';

                }
              }
              ?>
              <br>
            </fieldset>
          </div>
          <?php
          }
          else
          {
            header("location:../index.php");
          }
          ?>
        </div><!--close content-->   
      </div><!--close site_content-->   
    </div><!--close main--> 
  </div><!--close container-->

   
</body>
</html>
