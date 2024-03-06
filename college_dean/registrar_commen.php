<?php
    // session_start();
    include("../connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exam Agency - Dashboard</title>
    <!-- Add your CSS and JavaScript files here -->
    <link rel="stylesheet" type="text/css" href="../css/committee.css">
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
        .scrollable-sidebar {
  overflow-y: auto; /* Add vertical scroll */
  max-height: calc(100vh - 60px); /* Set maximum height */
}

    </style>
</head>
<body>
    <div id="main">
        <?php
        if (isset($_SESSION['sun']) && isset($_SESSION['spw'])) {
        ?>
        <header>
            <div id="header" style="display: inline-block;">
                <img src="../image/logo.png" alt="Logo" class="logo" style="display: inline-block;">
                <div class="header-content" style="display: inline-block;">
                    <h1 class="heading" style="display: inline-block;">Online Exit Examination System</h1>
                    <p class="subheading">Welcome To Exam Agency Page</p>
                </div>
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
                </div>
                <?php require("registrar_menu.php"); ?>
            </div>
        </aside>

        <section id="content-section">
            <div id="content">
                <!-- Add your Exam Agency content here -->
            </div>
        </section>

      
        <?php
        } else {
            header("location:../index.php");
        }
        ?>
    </div>
      <footer>
            <div>
                <?php require("../footer.php"); ?>
            </div>
        </footer>
</body>
</html>
