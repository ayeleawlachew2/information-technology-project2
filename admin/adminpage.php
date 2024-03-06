<?php
session_start();
include("../connection.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Admin page</title>
   <link rel="icon" href="../image/logo.png">
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <!-- <link rel="stylesheet" type="text/css" href="../css/committee.css"> -->
  <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
  <style>
     link[rel="icon"] {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
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
     .image-instructions-container {
 
    width: 850px;
    text-align: left;
    margin: 0 auto;  
    margin-top: 10px; 
    position: absolute;
    top: 30%;
    left: 70%;
    transform: translateX(-50%);
    border-radius: 0;
    border-color: #801137;
    background-color: #fff;
/* Add padding to create space between content and container edges */
}

.content-image {
  width: 1000px;
  height: 400px;
  /* border: 1px solid #ccc; */
  margin-bottom: 10px;
}

.instruction-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  background-color: #fff; /* Set background color to white */
  padding: 20px; /* Add padding to create space between content and container edges */
}

.instruction-item {
  margin-bottom: 5px;
}

.instruction-number {
  font-weight: bold;
  margin-right: 5px;
}

.instruction-text {
  font-size: 14px;
}

.carousel {
  position: relative;
  overflow: hidden;
  width: 100%;
  background-color: #fff;
}

.carousel img {
  display: none;
  max-width: 60%; /* Increase the size of the carousel images */
  height: auto;
}

.carousel img.active {
  display: block;
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
  <div class="sidebar_admin">
    <?php require("adminmenu.php"); ?>
  </div>
   <section >
    <div >
        <div class="image-instructions-container">
            <div id="carousel" class="carousel">
               <img src="../image/admin_1.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/admin_2.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/admin_3.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/admin_4.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/admin_5.svg" alt="Image" class="content-image" style="background-color: #fff;">

            </div>
            <!-- <ul class="instruction-list">
                <li class="instruction-item">
                    <span class="instruction-number">1.</span>
                    <span class="instruction-text">You can perform any tasks which are listed in the siderbar.</span>
                </li>
                <li class="instruction-item">
                    <span class="instruction-number">2.</span>
                    <span class="instruction-text">You can register department and university.</span>
                </li>
                <li class="instruction-item">
                    <span class="instruction-number">3.</span>
                    <span class="instruction-text">You can also post different notice.</span>
                </li>
            </ul> -->
        </div>
    </div>
</section>
 
  <?php
  } else {
    header("location:../index.php");
  }
  ?>
    <div id="footer">
<?php
require("../footer.php");
?>
   
</div>

    <script>
window.addEventListener('DOMContentLoaded', function () {
    var carousel = document.getElementById('carousel');
    var images = carousel.getElementsByTagName('img');
    var currentIndex = 0;

    // Add the 'active' class to the first image
    images[0].classList.add('active');

    // Function to show the next image in the carousel
    function showNextImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add('active');
    }

    // Set an interval to automatically show the next image every 3 seconds
    setInterval(showNextImage, 7000);
});
</script>
</body>
</html>
