<style>
    /* Sidebar styles */
       .sidebar_admin {
        background-color: #f4f4f4;
        width: 15%; /* Set the width to a percentage value */
        min-width: 200px; /* Set a minimum width to ensure it doesn't become too narrow */
        height: 150vh; /* Set the height to occupy the full viewport height */
        /* position: fixed; */
        top: 14%;
        left: 0;
        right: 0;
        overflow-y: auto; /* Enable vertical scrolling */
        padding-top: 20px;
    }
  
    .sidebar_admin ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar_admin li {
        margin-bottom: 10px;
    }

    .sidebar_admin a {
        display: block;
        padding: 10px;
        color: #555;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .sidebar_admin a:hover {
        background-color: #ccc;
    }

    /* Sub-menu styles */
     .sub-menu {
    display: none;
    padding-left: 20px;
    padding-right: 50px;
    margin-top: 10px; /* Add margin-top for separation */
  }

    /* Scrollable sub-menu */
    .scrollable-sub-menu {
        max-height: 200px;
        overflow-y: auto; /* Enable vertical scrolling */
    }

    /* Drop-down button styles */
    .dropbtn {
        background-color: #f4f4f4;
        color: #555;
        padding: 10px;
        border: none;
        cursor: pointer;
        outline: none;
        width: 100%;
        text-align: left;
        transition: background-color 0.3s ease;
    }

    .dropbtn:hover {
        background-color: #ccc;
    }

    .active {
        background-color: #ccc;
    }

    .dropdown-content {
        display: none;
        padding-left: 20px;
        transition: max-height 0.3s ease;
    }

    .dropdown-content.show {
        display: block;
        max-height: 200px;
    }
   .user-profile {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px;
  margin-bottom: 20px;
}

.user-profile-image img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
 box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.user-profile-details {
  margin-top: 10px;
  text-align: center;
}

.user-profile-details h3,
.user-profile-details p {
  margin: 0;
  color: #555;
  font-size: 14px;
}
 .user-profile-hr {
    border: none;
    border-top: 1px solid #ccc;
    margin: 10px 0;
  }

</style>

<div class="sidebar_admin">
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
    <hr class="user-profile-hr">
    <ul>
        <li>
            <div align="left">
                <a href="adminpage.php" class="button-link"><i class="fas fa-home"></i> Home</a>
            </div>
        </li>
        <li>
            <button class="dropbtn" onclick="toggleSubMenu(event)"><i class="fas fa-eye"></i> View<font size="1" color="#555"><span>&#9660;</span></font></button>
            <ul class="sub-menu">
                <li><a href="viewexamdate.php"><i class="far fa-calendar-alt"></i> Exam Date</a></li>
                <li><a href="viewuser.php"><i class="fas fa-users"></i> System user</a></li>
                <li><a href="viewaccount.php"><i class="fas fa-user-cog"></i> User accounts</a></li>
                <li><a href="logfile.php"><i class="fas fa-history"></i> View user activity</a></li>
            </ul>
        </li>
        <li>
            <button class="dropbtn" onclick="toggleSubMenu(event)"><i class="fas fa-users-cog"></i> Manage User<font size="1" color="#555"><span>&#9660;</span></font></button>
            <ul class="sub-menu scrollable-sub-menu">
                <li><a href="account.php"><i class="fas fa-user-plus"></i> Create Account</a></li>
                <li><a href="blockaccount.php"><i class="fas fa-user-lock"></i> Block & Update Account</a></li>
                <li><a href="blockall.php"><i class="fas fa-user-times"></i> Block ALL Candidate</a></li>
                <li><a href="activate_all_account.php"><i class="fas fa-user-check"></i> Activate ALL Candidate</a></li>
                <li><a href="backupdb.php"><i class="fas fa-database"></i> Take Database Backup</a></li>
                <!-- <li><a href="restoredb.php"><i class="fas fa-undo-alt"></i> Restore Database</a></li> -->
            </ul>
        </li>
        <!-- <li>
            <button class="dropbtn" onclick="toggleSubMenu(event)"><i class="fas fa-chart-bar"></i> Report<font size="1" color="#555"><span>&#9660;</span></font></button>
            <ul class="sub-menu scrollable-sub-menu">
                <li  align="left"><a href="filluniversity.php"><i class="fas fa-file-alt"></i> Individual Report</a></li>
                <li><a href="year.php"><i class="fas fa-chart-line"></i> Total Report</a></li>
            </ul>
        </li> -->
        <!-- <li>
            <div align="left"><a href="feedback.php"><i class="fas fa-comment"></i> Feedback Us</a></div>
        </li> -->
        <li>
            <button class="dropbtn" onclick="toggleSubMenu(event)"><i class="fas fa-user"></i> Profile<font size="1" color="#555"><span>&#9660;</span></font></button>
            <ul class="sub-menu">
                <li><a href="change_pw.php"><i class="fas fa-key"></i> Change Password</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

<script>
    function toggleSubMenu(event) {
        event.target.classList.toggle("active");
        var subMenu = event.target.nextElementSibling;
        if (subMenu.style.display === "block") {
            subMenu.style.display = "none";
        } else {
            subMenu.style.display = "block";
        }
    }
</script>
