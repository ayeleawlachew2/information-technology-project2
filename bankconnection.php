<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="bank";
$conn=mysqli_connect($server,$dbuser,$dbpass) or die(mysqli_error($conn));
mysqli_select_db($dbname,$conn) or die(mysqli_error($conn));
?>
