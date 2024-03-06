	<style>
    body {
        font-family: Arial, sans-serif;
    }

    .custom-list {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .custom-list li {
        position: relative;
        margin-bottom: 10px;
    }

    .custom-list li a {
        display: block;
        padding-left: 20px;
        text-decoration: none;
    }

    .custom-list li:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 16px;
        height: 16px;
        margin-top: -8px;
        background-repeat: no-repeat;
        background-position: center;
    }

    .sub-menu {
        display: none;
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .active .sub-menu {
        display: block;
    }
						.custom-list-container {
        height: 500px; /* Adjust the height as needed */
        overflow-y: auto;
    }
</style>
	<div class="custom-list-container">
	<ul>
    <li>
        <div align="left"><a href="registrar.php"><i class="fas fa-home"></i> Home</a></div>
    </li>

    <li>
        <div align="left"><a href="#.php"><i class="fas fa-eye"></i> View</a>
            <ul class="sub-menu">
                <li><div align="left"><a href="viewcandidate.php">Candidate</a></div></li>
                <li><div align="left"><a href="viewdepthead.php"><i class="fas fa-chalkboard-teacher"></i>Candidate Unchanged Account</a></div></li>
                <!-- <li><div align="left"><a href="view_examiner.php"><i class="fas fa-user-tie"></i> Assigned Examiners</a></div></li> -->
                <li><div align="left"><a href="fillyear_report.php"><i class="fas fa-file-alt"></i> Report</a></div></li>
            </ul>
        </div>
    </li> 

    <li>
        <div align="left"><a href="#.php"><i class="fas fa-user"></i> Profile</a>
            <ul class="sub-menu">
                <li><div align="left"><a href="change_pw.php"><i class="fas fa-key"></i> Change Password</a></div></li>
                <li><div align="left"><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></div></li>	
            </ul>
        </div>
    </li>   
</ul>

</div>

