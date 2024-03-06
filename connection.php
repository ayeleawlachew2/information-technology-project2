<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="ExitExam";
$con = mysqli_connect($server,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>