<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Exit Examination</title>
   <link rel="icon" href="image/logo.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
     link[rel="icon"] {
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }
    .my-image {
      display: inline-block;
      margin-right: 10px; /* Optional: Add some space between the images */
      transition: opacity 0.5s ease-in-out; /* Fade transition */
    }
    
     #clockContainer {
      position: absolute;
      top: 7px;
      right: 10px;
      width: 150px; /* Adjust the width if necessary */
      height: 90px;
      background-color: #f2f2f2;
      padding: 10px;
      border-radius: 4px;
      font-size: 16px;
      font-family: Arial, sans-serif;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    
    #clockContainer #clockText {
      font-weight: bold;
      font-size: 15px;
      margin-bottom: 4px;
    }
    
    #clockContainer #clockTime {
      font-size: 24px; /* Adjust the font size if necessary */
      font-family: "Roboto", sans-serif;
    }
    
    #clockContainer #clockDate {
      margin-top: 2px;
    }
  </style>
</head>
<body>
<header>
  <div>
    <img src="image/logo.png" alt="Logo" class="logo">
    <h1 class="heading">Online Exit Examination System</h1>
  </div>
</header>

<nav>
  <div>
    <?php
    require("menu.php");
    ?>
  </div>
</nav>

<main>
  <section class="content">
    <div id="imageContainer" style="background-color: #f2f2f2; width: 500px; height: auto; display: flex;">
      <img src="image/ca1.jpg" alt="Description of image" class="my-image">
      <img src="image/ca2.jpg" alt="Description of image" class="my-image">
      <img src="image/ca3.jpg" alt="Description of image" class="my-image">
    </div>
    <div id="clockContainer">
      <div id="clockText">WKU</div> <!-- Added "WKU" text at the top -->
      <div id="clockTime"></div> <!-- Display the time dynamically here -->
      <div id="clockDate"></div> <!-- Display the date dynamically here -->
    </div>
  </section>
</main>

<footer style="background-color:  #e2e0e0;">
    <?php
        require("footer.php");
    ?>
</footer>

<script>
  var images = document.querySelectorAll('.my-image');
  var currentIndex = 0;

  function changeImage() {
    images[currentIndex].style.opacity = 0;
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].style.opacity = 1;
  }

  setInterval(changeImage, 5000); // Change image every 3 seconds
</script>

<script>
  function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var day = now.getDate();
    var month = now.getMonth() + 1; // Months are zero-based, so add 1
    var year = now.getFullYear();
    var dayOfWeek = now.toLocaleDateString('en-US', { weekday: 'long' }); // Get the day of the week
    
    // Format the time with leading zeros if necessary
    hours = String(hours).padStart(2, '0');
    minutes = String(minutes).padStart(2, '0');
    seconds = String(seconds).padStart(2, '0');

    // Display the time, day of the week, and date in the clock container
    document.getElementById('clockTime').textContent = hours + ':' + minutes + ':' + seconds;
    document.getElementById('clockDate').textContent = dayOfWeek + ', ' + day + '/' + month + '/' + year;
  }

  // Update the clock immediately
  updateClock();

  // Update the clock every second
  setInterval(updateClock, 1000);
</script>
</body>
</html>