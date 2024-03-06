<?php
    session_start();
    include("../connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exam Agency - Dashboard</title>
    <!-- Add your CSS and JavaScript files here -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/committee.css"> -->
    <link rel="stylesheet" href="../css/fontawesome-free-6.4.0-web/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-toggle').click(function() {
                $('.sidebar').toggleClass('open');
            });

            $('#sidebar ul li').click(function() {
                $(this).toggleClass('active');
                $(this).find('ul').slideToggle();
            });

            $('#sidebar ul li ul li').click(function(e) {
                e.stopPropagation();
            });
        });
    </script>
    <style>
       body {
            margin: 0;
            padding: 0;
        }

         header {
    background-color: #00BFA6;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  #header {
    display: flex;
    align-items: center;
  }

  .logo {
    display: inline-block;
  vertical-align: middle;
  height: 80px;
  width: 80px;
  border-radius: 50%;
  overflow: hidden;
  }

  .header-content {
    display: flex;
    flex-direction: column;
  }

 .heading {
    font-family: 'Times New Roman', Times, serif;
    margin-left: 5px;
    font-size: 28px; /* Increase the font size as desired */
    font-weight: bold;
    color: #fff; /* Set the text color */
  }

  .subheading {
    margin-top: 5px; /* Add margin-top for spacing */
    margin-left: 20px; /* Add margin-left to move the text slightly to the right */
    font-size: 16px; /* Increase the font size as desired */
    color: #fff; /* Set the text color */
  }

  .search-form {
    display: flex;
    align-items: center;
  }

  .search-form input[type="text"] {
    padding: 5px;
    border: none;
    border-radius: 3px;
    margin-right: 5px;
  }

  .search-form button[type="submit"] {
    background-color: #fff; /* Set the button background color */
    color: #00BFA6; /* Set the button text color */
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
  }

        .container {
            display: flex;
        }

        aside {
            background-color: #f2f2f2;
            width: 200px;
            height: 100vh;
            padding: 10px;
        }

        .scrollable-sidebar {
            height: 100%;
            overflow-y: auto;
        }

        .user-profile-container {
            display: flex;
            align-items: center;
        }

        .user-profile-image img {
            width: 100px;
            height: 100px;
            border-radius: 100%;
            object-fit: cover;
            margin-left: 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .user-profile-details {
            margin-left: 20px;
        }

        .user-profile-details h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-top: 25px;
        }

        .user-profile-details p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
            margin-left: 40px;
        }
         .user-profile-hr {
    border: none;
    border-top: 1px solid #ccc;
    margin: 10px 0;
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
    <div id="main">
        <?php
        if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
        ?>
         <header class="header">
       
            <div id="header"  >
                <img src="../image/logo.png" alt="Logo" class="logo" style="display: inline-block;">
                <div class="header-content" style="display: inline-block;">
                    <h1 class="heading" style="display: inline-block;">Online Exit Examination System</h1>
                    <p class="subheading">Welcome To Exam Agency Page</p>
                </div>
            </div>
            <div>
            <form class="search-form">
                <input type="text" placeholder="Search...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        </header>
        
        <nav>
            <!-- Add your navigation bar code here -->
        </nav>



        <aside>
            <div id="sidebar" class="scrollable-sidebar ">
                <div class="user-profile">
                    <?php
                    $fullname = $_SESSION['fullname'];
                    $uname = $_SESSION['sun'];
                    $role = $_SESSION['role'];
                    $photo = $_SESSION['sphoto'];
                    ?>
                    <div class="user-profile-image">
                        <img src="<?php echo $photo; ?>" alt="Profile Image">
                    </div>
                    <div class="user-profile-details">
                        <h3><?php echo $fullname; ?></h3>
                        <!-- <p><?php echo $uname; ?></p> -->
                        <p><?php echo $role; ?></p>
                    </div>
                    <hr class="user-profile-hr">
                </div>
                <?php require("committee_menu.php"); ?>
            </div>
        </aside>

   <section id="content-section">
    <div id="content">
        <div class="image-instructions-container">
            <div id="carousel" class="carousel">
                <img src="../image/agency.svg" alt="Image" class="content-image">
                <img src="../image/agency1.svg" alt="Image 2" class="content-image">
                <img src="../image/agency2.svg" alt="Image 3" class="content-image">
            </div>
            <ul class="instruction-list">
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
            </ul>
        </div>
    </div>
</section>



        <footer>
            <div>
                <?php require("../footer.php"); ?>
            </div>
        </footer>
        <?php
        } else {
            header("location:../index.php");
        }
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
