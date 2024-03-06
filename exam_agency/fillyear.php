<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <style type="text/css">
    .error-message {
      color: #4CAF50;
      background-color: #e8f5e9;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    .update-form {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #f2f2f2;
}

.update-form td {
  padding: 10px;
}

.update-form input[type="number"],
.update-form select {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.update-form input[type="submit"],
.update-form input[type="reset"] {
  background-color: #4CAF50;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.update-form input[type="submit"]:hover,
.update-form input[type="reset"]:hover {
  background-color: #45a049;
}

.update-form input[type="submit"]:focus,
.update-form input[type="reset"]:focus {
  outline: none;
}

.update-form input[type="number"]:focus,
.update-form select:focus {
  border-color: #4CAF50;
  outline: none;
}


    .fieldset {
      width: 750px;
      text-align: left;
      position: fixed;
      top: 150px;
      left: 500px;
      border-radius: 0px;
      border-color: #801137;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <div id="main">
    <?php
    if(isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
    ?>
    <div>
      <?php
      require("examagency_commen.php");
      ?>
    </div>
				<fieldset class="fieldset">
      <legend style="font-weight: bold; font-size: 1.2em; color: #801137; border-bottom: 2px solid #801137; padding-bottom: 5px;">Fill All form Correctly</legend>
     
      <br>
      <table class="update-form">
  <form action="viewreport.php" method="post" name="myForm" onsubmit="return validateForm()">
    <tr>
      <td>Enter year to see Report:</td>
      <td><input type="number" name="year" required onKeyPress="return isNumberKey(event)"/></td>
    </tr>
    <tr>
      <td>Choose University:</td>
      <td>
        <select name="university" required>
          <option value="">choose option</option>
          <?php
          $sql="select uname from university";
          $record=mysqli_query($con, $sql);
          if(mysqli_num_rows($record) > 0) {
            while($row=mysqli_fetch_array($record)) {
          ?>
          <option value="<?php echo $row["uname"];?>" ><?php echo $row["uname"];?></option>
          <?php	
            }
          } else {
            $uname=NULL;
            echo "<option value='$uname'>$uname</option>";
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="next" value="Next"/></td>
      
      <td><input type="reset" name="" value="Cancel" /></td>
    </tr>
  </form>
</table>

    </fieldset>
    <?php
    if(isset($_POST["next"])) {
      $_SESSION['year'] = $_POST["year"];
      $_SESSION['university'] = $_POST["university"];
      //header("location:viewreport.php");

    }
    ?>
  </div> 
  </div>
  </div>
  <?php
  } else {
    header("location:../index.php");
  }
  ?>
</body>
</html>
