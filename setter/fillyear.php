<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Fill Year page</title>
  <link rel="icon" href="../image/logo.png">
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
      border-radius: 0px;
    }
    .fieldset {
      width: 535px;
      text-align: left;
      margin-left: 500px;
      /* Change this value to adjust the horizontal position */
      margin-top: 10px;
      /* Change this value to adjust the vertical position */
      height: auto;
      border-radius: 5px;
      border-color: #801137;
      position: absolute;
      /* Add this property to position the fieldset */
      top: 200px;
      /* Add this property to move the fieldset to the top */
    }
    /* Media queries for responsive design */
    @media (max-width: 768px) {
      .fieldset {
        width: 100%;
        margin-left: 0;
        margin-top: 10px;
        position: relative;
        top: 0;
      }
    }
     table {
        border-collapse: collapse;
        margin-left: 10px;
    }

    table td {
        padding: 10px;
    }

    input[type="number"],
    select {
        width: 300px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #f2f2f2;
    }

    input[type="submit"],
    input[type="reset"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #00BFA6;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #45a049;
    }
  </style>
</head>

<body>
  <div id="main">
    <?php
    if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
      $uid=$_SESSION['$uid'];
      $sql="select * from examsetter where sid='$uid'";
      $record=mysqli_query($con, $sql);
      if(mysqli_affected_rows($con)) {
        while($row=mysqli_fetch_assoc($record)) {
          $year=$row["year"];	
        }
      } else {
        echo "No records found!";
      }
      ?>
      <div>
        <?php require("setter_commen.php"); ?>
      </div>
      <div id="content">
        <fieldset class="fieldset">
          <br><br>
          <center>
           <table>
    <form action="addquestion.php" method="post">
        <tr>
            <td>Enter year which set exam:</td>
            <td><input type="number" name="year" value="<?php echo $year; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Question Type:</td>
            <td>
                <select name="qtype" required>
                    <option value="">select type</option>
                    <option value="Regular">Regular</option>
                    <option value="Re_Exam">Re_Exam</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="next" value="Next"/></td>
            <td><input type="reset" name="" value="Cancel"/></td>
        </tr>
    </form>
</table>
          </center>
          <br><br>
        </fieldset>
        <?php
        if(isset($_POST["next"])) {
          $_SESSION['year']=$_POST["year"];
          $_SESSION['questiontype']=$_POST["qtype"];
          //header("location:addquestion.php");	
        }
        ?>
      </div>
      <?php
    } else {
      header("location:../index.php");
    }
    ?>
  </div>
</body>
</html>
