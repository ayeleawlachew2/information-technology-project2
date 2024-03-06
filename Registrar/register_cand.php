<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Registrar page</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
<script type="text/javascript" src="../css/javasscript.js"></script>
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset {
        position: absolute;
        top: 70px;
        left: 50%;
        transform: translateX(-50%);
        width: 1000px;
        text-align: left;
        margin-top: 10px;
        
    }
	input[type=text],select,input[type=submit],input[type=reset],textarea,input[type=file]
	 {
    width: 50%;
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
td{
	width: 125px;
}
 table {
        width: 90%;
        margin: auto;
    }

    td {
        padding: 10px;
    }

    label {
        font-weight: bold;
    }

    select,
    input[type="text"],
    input[type="file"] {
        width: 80%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .form-button {
        margin-top: 10px;
    }
  </style>
  
<script lang="javascript">
function validateemailform()
{
 var mb = document.forms["myForm"]["mb"].value;
if (mb == "") 
{
alert("Phone Number Is Empty please Fill");
return false;
}
var str=document.forms["myForm"]["mb"].value;
var valid="0123456789+"; 
for(i=0;i<str.length;i++)
{
if(valid.indexOf(str.charAt(i))==-1)
{
alert("please insert phone_number number only number");
document.forms["myForm"]["mb"].value="";
document.forms["myForm"]["mb"].focus();
return false;
}
}
if(str.length!=10)
{
alert("please enter phone number 10  digit.");
document.forms["myForm"]["mb"].focus();
return false;
}  
if (str.charAt(0)!="0")
{
alert("phone number should be start with 0");
document.forms["myForm"]["mb"].focus();
return false;
} 
if (str.charAt(1)!="9")			   
{
alert("phone number should be start with 09");
document.forms["myForm"]["mb"].focus();
return false;
}

//email
if(document.myForm.email.value == "" )
{
alert("Please fill your 's email!" );
document.myForm.email.focus() ;
return false;
}
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
{
alert("Not a valid e-mail address");
document.myForm.email.value="";
return false;
}


}
</script> 
  
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
//$year=$_SESSION['year'];
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";

	
$sql="select * from registrar where rid='$uid'";
$record=mysqli_query($con, $sql);
if(mysqli_affected_rows($con))
{
while($row=mysqli_fetch_assoc($record))
{
$unverid=$row["uid"];
$sql2=mysqli_query($con, "select*

from university where uid='$unverid'");
     while($unrow=mysqli_fetch_array($sql2))
      $university=$unrow["uname"];
	}

	}
	else
	echo "No records found!";
	//$_POST["cname"]=NULL;
?>
  
	    
	    
	<div>
	   <?php
          require("registrar_commen.php");  
          ?> 
  
	 
	<div >
 <div class="fieldset"> 
 <br><br>
<form action="" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">

<div style="margin-left: 50px;">


<form>
    <table width="90%" align="center">
        <tr>
            <td>
                <label class="form-label">Colleage/Institute</label><br>
                <select name="cname" required onchange="this.form.submit()" class="form-input">
                    <option value="">Select Your Option</option>
<?php
if($con){

	if(isset($_POST["cname"]))
	{
		$sql=mysqli_query($con, "select DISTINCT cname from department WHERE uid='$unverid'");

	while($finresult = mysqli_fetch_array($sql)){

	//$did = $finresult ['regionid'];
	$name = $finresult ['cname'];

	if($_POST["cname"]==$name)

	{
		$name = $finresult ['cname'];
		?>
	<option value="<?php echo $name; ?>" selected><?php echo $name; ?></option>
	<?php 
	}
	else
	{
	?>
	<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
	<?php
	 }}


	}
	else
	{
	?>
	<option value="" selected>choose option</option>
	<?php
	$result1 = mysqli_query("select DISTINCT cname from department WHERE uid='$unverid'");
	while($finresult = mysqli_fetch_array($result1)){

	//$did = $finresult ['regionid'];
	$name = $finresult ['cname'];
	?>
	<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
	<?php
	}}} 
	 ?>

</select>


 </td>
            <td>
                <label class="form-label">Department</label><br>
                <select name="dname" required class="form-input">
                    <option value="">Select Your Option</option>
	<?php
	if($con){
	if(isset ($_POST["cname"]))
	{
	$cname1=$_POST["cname"];
	
	if($con)
	{
	$sql="select dname from department WHERE uid='$unverid' and cname='$cname1'";
	$recordfound=mysqli_query($con, $sql);
	if(mysqli_affected_rows($con))
	{
	while($row=mysqli_fetch_assoc($recordfound))
	{
	?>
<option value="<?php echo $row["dname"];?>"><?php echo $row["dname"];?></option>
	<?php
	}
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	}}
	
	?> 
</select>
</td>

</tr>
<tr>
            <td>
                <label class="form-label">University</label>
                <input type="text" name="unvi" value="<?php echo $university; ?>" readonly class="form-input" />
            </td>
            <td>
                <label class="form-label">Year</label>
                <input type="text" name="year" class="form-input" />
            </td>
        </tr>
        <tr>
            <td>
                <label class="form-label">Registrar ID</label>
                <input type="text" name="rid" value="<?php echo $uid; ?>" readonly class="form-input" />
            </td>
            <td>
                <label class="form-label">Candidate ID</label>
                <input type="text" name="cid" pattern="[a-zA-Z0-9/_.\-+]+" required class="form-input" />
            </td>
        </tr>
        <tr>
            <td>
                <label class="form-label">Frist Name</label>
                <input type="text" name="fn" onKeyPress="return ValidateAlpha(event)" class="form-input" />
            </td>
            <td>
                <label class="form-label">Father Name</label>
                <input type="text" name="mn" onKeyPress="return ValidateAlpha(event)" class="form-input" />
            </td>
        </tr>
        <tr>
            <td>
                <label class="form-label">Grand Father Name</label>
                <input type="text" name="gfn" onKeyPress="return ValidateAlpha(event)" class="form-input" />
            </td>
            <td>
                <label class="form-label">Email</label>
                <input type="text" name="email" required class="form-input" />
            </td>
        </tr>
        <tr>
            <td>
                <label class="form-label">Gender</label><br>
                <select name="sex" required class="form-input">
                    <option value="">Choose option</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
            </td>
            <td>
                <label class="form-label">Mobile Phone</label>
                <input type="text" name="mb" class="form-input" />
            </td>
        </tr>
        <tr>
            <td>
                <label class="form-label">Photo</label><br>
                <input type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file" class="form-input" />
            </td>
            <td rowspan="3" align="center">
                <img id="output" width="140" height="130" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="registercand" value="Register" onclick="return validateemailform()" class="form-button" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="reset" value="Cancel" class="form-button" />
            </td>
        </tr>
    </table>
</form>


<?php
if(isset($_POST['registercand']))
{
$rid=$_POST["rid"];
$id=$_POST["cid"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$univer=$_POST["unvi"];
$col=$_POST["cname"];
$dept=$_POST["dname"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$year=$_POST["year"];
//photo
$ptmploc=$_FILES["photo"]["tmp_name"];
$pname=$_FILES["photo"]["name"];
$psize=$_FILES["photo"]["size"];
$ptype=$_FILES["photo"]["type"];
$new=$_SESSION['$uid'];
$rolecan="Candidate";
//$unv=mysql_query($sql2,$con);
if($con)
{	
$checkdept=mysqli_query($con, "select * from department where cname='$col' and dname='$dept' ");
$database_dept=mysqli_num_rows($checkdept);
if($database_dept>0)
{
	
//log file
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
//variable for log file
$time = time();
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Register Candidate";
$activity="id:$id "." Frist Name:$fname"." Father Name:$mname"." Last Name:$lname"." 
     sex:$sex"."phone:$mobile"."year:$year"."dept:$dept"."university:$univer";
//echo $activity;

if(!file_exists("userphoto"))
mkdir("userphoto");
$photopath="userphoto/$pname";
if(copy($ptmploc,$photopath))
{	

$sq="insert into user values('$id','$fname','$mname','$lname','$sex','$mobile','$email','$photopath','$rolecan')";
$sql = "insert into candidate values ('$id','$dept','$univer','$rid','$year')";

$logsql= "insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')";

$insert1=mysqli_query($con, $sq);
$insert=mysqli_query($con, $sql);
$insert2=mysqli_query($con, $logsql);

if($insert1 && $insert)
echo" Record Is Successfully Inserted!!!";
else
echo" NO record inserted!! ".mysqli_error($con);	
}
else
echo "Unable to upload the photo!";
}
else
echo $dept." Is Not Found In $col Colleage";
}
else
die("Connection Failed:".mysqli($con));
}

?>
</fieldset>
 </div>
        </div>
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
