<?php
session_start();
include("../connection.php");
?>

<html>
<head>
  <title>Update Candidate</title>
 
   <style type="text/css">

.style1 
{
    font-family: "Times New Roman", Times, serif;
    font-weight: bold;
    font-size: medium;
}
.fieldset {
        position: absolute;
        top: 150px;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        text-align: left;
        margin-top: 20px;
        height: auto;
        border-radius: 0px;
        border-color: #801137;
        text-align: center;
    }
table 
{
    border-collapse: collapse;
}

th, td {
    text-align: left;
    padding: 8px;
}
th {
    text-align: center;
   
}
  tr:nth-child(even)
  {
    background-color: #f2f2f2
  }
input[type=text],select,input[type=submit],input[type=reset],textarea,input[type=file]
     {
    width: 80%;
    padding: 5px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #70c0c9;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    
 
}
input[type=text]:focus {
    border: 1px solid #8f1b29;
}
  </style>
</head>

<body>
  <div id="main">
    <?php
    if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      $uid = $_SESSION['$uid'];
      if ($con) {
        $sql = "select * from registrar where rid='$uid'";
        $recordfound = mysqli_query($con, $sql);
        if (mysqli_affected_rows($con)) {
          while ($row = mysqli_fetch_assoc($recordfound)) {
            $unverid = $row["uid"];
            $sql2 = mysqli_query($con, "select * from university where uid='$unverid'");
            while ($unrow = mysqli_fetch_array($sql2))
              $university = $unrow["uname"];
          }
        } else {
          echo "No records found!";
        }
      } else {
        echo "Connection failed";
      }
    ?>
      
      <div>
        <?php
          require("registrar_commen.php");  
          ?> 
      </div>
       
        <div id="content" style="margin-left:30px;margin-top: 20px;">
          <fieldset class="fieldset">
            <br> <br>
            <fieldset style="border-radius: 0px;width: 500px; margin-top: 5px;margin-left: 250px;">
              <legend>Enter Candidate ID to edit</legend>
              <br>
              <center>
                <table width="80%">
                  <form action="" method="post">
                    <tr>
                      <td><input type="text" name="key" placeholder="Enter ID you need" required/></td>
                      <td><input type="submit" name="search" value="Search"/></td>
                    </tr>
                  </form>
                </table>
              </center>
              <br>
              <br>
            </fieldset>
            <br>
            <br>
            <?php
            if (isset($_POST["search"])) {
              $cid = $_POST["key"];
              $sql = "SELECT * FROM candidate WHERE cid='$cid'";
              $cand = mysqli_query($con, $sql);
              if (mysqli_num_rows($cand) > 0) {
                echo "<center><table width='60%'>";
                while ($row = mysqli_fetch_array($cand)) {
                  $sq = mysqli_query($con, "SELECT * FROM user WHERE uid='$cid'");
                  while ($row1 = mysqli_fetch_array($sq)) {
            ?>
                    <form action="" method="post" enctype="multipart/form-data">
                      <tr>
                        <td>Candidate Id<input type="text" value="<?php echo $row["cid"]; ?>" readonly name="cid"/></td>
                        <td>First Name<input type="text" value="<?php echo $row1["ufname"]; ?>" name="fname" /></td>
                      </tr>
                     <tr>
<td>
Midle Name<input  type="text" value="<?php echo $row1["umname"]; ?>"  name="umname"/></td>
<td>Last Name<input  type="text" value="<?php echo $row1["ulname"]; ?>"  name="lname" />    </td>   
</tr>   
<tr>
<td>Email<input  type="email" value="<?php echo $row1["email"]; ?>"   name="email"/></td>
<td>Phone<input  type="text" value="<?php echo $row1["mobile"]; ?>"  name="mb" /></td>  
</tr>
<tr>
<td>Department<input  type="text" value="<?php echo $row["dept"]; ?>"   name="dept"/></td>
<td>Year<input  type="text" value="<?php echo $row["year"]; ?>"  name="year" /></td>  
</tr>
<tr>
<td>Gender<br>
<select name="sex">
<option value=""> choose</option>
<option value="m">Male</option>
<option value="f">Female</option>   
</select>
</td>
<td>Photo<br>
<!-- <input type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file"/></td> -->
<input type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file"/></td>
</tr>
                      <tr>
<td><input  type="submit" value="Update"  name="update" /></td> 
<td><input  type="reset" value="Cnacel"  /></td>    
</tr>
<tr>
<td rowspan="3" align="center"> <?php echo '<img src="'.$row1["photo"].'" width=140 height=130/>'; ?> </td>
<!-- <td rowspan="3" align="center"> <img id="file"  width="140" height="130"/> </td>  -->
<!-- <td colspan="2" rowspan="3" align="center"><img id="output"  width="140" height="130"/></td>    -->
</tr>
                    </form>
            <?php
                  }
                }
                echo "</center></table>";
              } else {
                echo "This Candidate Is Not Known!";
              }
            }
            ?>
            <?php
            if (isset($_POST["update"])) {
              $id = $_POST["cid"];
              $fname = $_POST["fname"];
              $mname=$_POST["umname"];  
              $lname=$_POST["lname"];
              $dept=$_POST["dept"];
              $year=$_POST["year"]; 
              $sex=$_POST["sex"]; 
              $email=$_POST["email"]; 
//photo
$ptmploc=$_FILES["photo"]["tmp_name"];
$pname=$_FILES["photo"]["name"];
$psize=$_FILES["photo"]["size"];
$ptype=$_FILES["photo"]["type"];
$phone=$_POST["mb"];


// Check if the file upload is successful
              if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                $ptmploc = $_FILES["photo"]["tmp_name"];
                $pname = $_FILES["photo"]["name"];

                // Move the uploaded file to the destination folder
                $photopath = "userphoto/" . $pname;
                if (move_uploaded_file($ptmploc, $photopath)) {
                  // Update the user information in the database
                  $update = "UPDATE user SET ufname='$fname',umname='$mname',ulname='$lname',mobile='$phone',email='$email',sex='$sex', photo='$photopath' WHERE uid='$id'";
                  $update2 =  "UPDATE candidate SET dept='$dept',year='$year' WHERE cid='$id'";
                  $udted = mysqli_query($con, $update);
                  $udted2 = mysqli_query($con, $update2);
                  if ($udted && $udted2) {
                    echo "Update successfully";
                  } else {
                    echo "Unable to update: " . mysqli_error($con);
                  }
                } else {
                  echo "Unable to upload the photo!";
                }
              } else {
                // File upload failed
                echo "Error uploading the photo: " . $_FILES["photo"]["error"];
              }
            }
            ?>
          </fieldset>
        </div>
      </div>

      <div>
      <fieldset>
      <?php

$sql="select * from candidate WHERE rid='$uid'";
$recordfound=mysqli_query($con, $sql);
if(mysqli_num_rows($recordfound)>0)
{

?>
<div style="height: 550px;width:800px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">

<?php
echo "<table border='1'>";
echo"<tr><td colspan=12 align='center'>All Graduate Student List Who Are Take Exit Exam In</td></tr>";
echo"<tr> <th>Candidate_ID</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Gender </th>
<th>Mobile</th><th>Email</th><th>Photo</th><th>Department</th><th>University</th><th>Year</th>
</tr>";
while($row=mysqli_fetch_assoc($recordfound))
{
	
	
$cid=$row["cid"];
$sql=mysqli_query($con, "select * from user where uid='$cid'");
$user=mysqli_num_rows($sql);
if($user>0)
{
while($row1=mysqli_fetch_assoc($sql))
echo "<tr> <td>". $row["cid"]."</td><td>".$row1["ufname"]."</td> <td>".$row1["umname"]."</td> <td>".$row1["ulname"]."</td> <td>".$row1["sex"]."</td> <td>".$row1["mobile"]."</td> <td>".$row1["email"]."</td> <td><img src=".$row1["photo"]." width=20 height=20></td> <td>".$row["dept"]."</td>  <td>".$row["unversity"]."</td><td>".$row["year"]."</td></tr>";
}else
echo "No Record Found";

}

echo "</table>";
}
else{
echo "No records found!";
}
?>
</fieldset>
 </div>

     
    <?php
    } else {
      header("location:../index.php");
    }
    ?>
  </div>
</body>
</html>