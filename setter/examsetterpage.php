 
 <?php
session_start();
include("../connection.php");
?>
 

<head>
  <title>Exam setter pagee</title>
  <link rel="icon" href="../image/logo.png">
  
  <style>
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
</head>

<body>
 <div>
     <?php
          require("setter_commen.php");  
          ?>     
</div>
 <section >
    <div >
        <div class="image-instructions-container">
            <div id="carousel" class="carousel">
               <img src="../image/setter_1.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/setter_2.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/setter_3.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/setter_4.svg" alt="Image" class="content-image" style="background-color: #fff;">

                <img src="../image/setter_5.svg" alt="Image" class="content-image" style="background-color: #fff;">

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
</body>
</html>

