<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Fill Year page</title>
  <style type="text/css">
    .style1 {
      font-family: "Times New Roman", Times, serif;
      font-weight: bold;
      font-size: 20px;
      width: 920px;
      text-align: left;
      margin-top: 10px;
      color: black;
      margin-left: 50px;
      border-radius: 0px;
    }
    .fieldset {
      width: 535px;
      text-align: left;
      margin-left: 200px;
      margin-top: 20px;
      height: auto;
      border-radius: 8px;
      border: none;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .custom-table {
      margin-left: 30px;
    }
    .custom-table th,
    .custom-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }
    .custom-table th {
      background-color: #f2f2f2;
      border-top: 1px solid #ccc;
    }
    .custom-table input[type="number"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .custom-table input[type="submit"] {
      background-color: #4caf50;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .custom-table input[type="submit"]:hover {
      background-color: #45a049;
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
 <fieldset class="fieldset">
    <table class="custom-table">
      <form action="viewreport.php" method="post">
        <tr>
          <th colspan="2" class="style1">Enter year to see Report:</th>
        </tr>
        <tr>
          <td><input type="number" name="year" required /></td>
          <td><input type="submit" name="next" value="Next" /></td>
        </tr>
      </form>
    </table>
</fieldset>
<?php
if(isset($_POST["next"]))
{
$_SESSION['year']=$_POST["year"];
//header("location:viewreport.php"); 
}
?>

 <?php
}
else
{
header("location:../index.php");
}
?>
</div>
</div>
</body>
</html>
