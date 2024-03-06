<?php
// session_start();
include("../connection.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Admin page</title>
   <link rel="icon" href="../image/logo.png">
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <link rel="stylesheet" type="text/css" href="../css/committee.css">
  <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
  <style>
    /* Your sidebar styles from adminmenu.php */
    .sidebar_admin {
      /* Adjust the width as per your requirement */
      width: 220px;
      float: left;
    }
    .content {
      /* Adjust the margin and padding as per your requirement */
      margin-left: 220px;
      padding: 20px;
    }
    .clearfix::after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>
<body>
  <?php
  if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
  ?>
  <header class="header_admin">
    <img src="../image/logo.png" alt="Logo" class="logo_admin" style="display: inline-block;">
    <h1 class="heading_admin">Online Exit Examination System</h1>
    <nav class="nav_admin">
      <form class="search-form">
        <input type="text" placeholder="Search..." />
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>
      <ul>
        <li class="notification"><a href="#"><i class="fas fa-bell"></i></a></li>
      </ul>
    </nav>
  </header>
  <aside>
  <div class="sidebar_admin">
    <?php require("adminmenu.php"); ?>
  </div>
  </aside>
  <div class="content">
    <!-- Your page content goes here -->
  </div>
  <div class="clearfix"></div>
  <?php
  } else {
    header("location:../index.php");
  }
  ?>
  
</body>
</html>
