<style>
    body {
        font-family: Arial, sans-serif;
    }

    .custom-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .custom-list li {
        position: relative;
        margin-bottom: 10px;
    }

    .custom-list li .toggle-btn {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 10px 20px;
        font-family: Arial, sans-serif;
        font-size: 16px;
        background-color: #f5f5f5;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-list li .toggle-btn:hover {
        background-color: #eaeaea;
    }

    .custom-list li .toggle-btn i {
        margin-right: 10px;
    }

    .sub-menu {
        display: none;
        list-style-type: none;
        padding: 0;
        margin: 10px 0 0 0;
    }

    .active .sub-menu {
        display: block;
    }

    .sub-menu li button {
        display: block;
        width: 100%;
        padding: 10px 40px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        background-color: #f5f5f5;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .sub-menu li button:hover {
        background-color: #eaeaea;
    }

    .custom-list-container {
        height: 400px;
        overflow-y: auto;
    }
</style>

<div class="custom-list-container">
    <ul class="custom-list">
        <li>
            <button class="toggle-btn" onclick="window.location.href = 'registrar.php';"><i class="fas fa-home"></i> Home</button>
        </li>

        <li>
            <button class="toggle-btn"><i class="fas fa-registered"></i> Register</button>
            <ul class="sub-menu">
                <li><button onclick="window.location.href='register_cand.php'">Candidate</button></li>
                <li><button onclick="window.location.href='register_dept_head.php'"><i class="fas fa-chalkboard-teacher"></i> Department Head</button></li>
                <!-- <li><button onclick="window.location.href='register_college_dean.php'"><i class="fas fa-graduation-cap"></i> College Dean</button></li> -->
                <!-- <li><button onclick="window.location.href='assign_examiner.php'"><i class="fas fa-user-tie"></i> Assign Examiner</button></li> -->
                <li><button onclick="window.location.href='registrefromexcel.php'"><i class="fas fa-file-excel"></i> Upload Candidate Info</button></li>
            </ul>
        </li>

        <li>
            <button class="toggle-btn"><i class="fas fa-edit"></i> Modify</button>
            <ul class="sub-menu">
                <li><button onclick="window.location.href='updatecandidateinfo.php'">Candidate</button></li>
                <li><button onclick="window.location.href='updatedepthead.php'"><i class="fas fa-chalkboard-teacher"></i> Department Head</button></li>
                <!-- <li><button onclick="window.location.href='update_college_dean.php'"><i class="fas fa-graduation-cap"></i> College Dean</button></li>
                <li><button onclick="window.location.href='update_examiner.php'"><i class="fas fa-user-tie"></i> Examiner</button></li> -->
            </ul>
        </li>

        <li>
            <button class="toggle-btn"><i class="fas fa-eye"></i> View</button>
            <ul class="sub-menu">
                <li><button onclick="window.location.href='viewcandidate.php'">Candidate</button></li>
                <li><button onclick="window.location.href='viewdepthead.php'"><i class="fas fa-chalkboard-teacher"></i> Department Head</button></li>
                <!-- <li><button onclick="window.location.href='view_college_dean.php'"><i class="fas fa-graduation-cap"></i> College Dean</button></li>
                <li><button onclick="window.location.href='view_examiner.php'"><i class="fas fa-user-tie"></i> Assigned Examiners</button></li> -->
                <li><button onclick="window.location.href='fillyear_report.php'"><i class="fas fa-file-alt"></i> Report</button></li>
            </ul>
        </li>

        <li>
            <button class="toggle-btn" onclick="window.location.href = 'feedback.php';"><i class="fas fa-comment"></i> Give Feedback</button>
        </li>

        <li>
            <button class="toggle-btn"><i class="fas fa-user"></i> Profile</button>
            <ul class="sub-menu">
                <li><button onclick="window.location.href='change_pw.php'"><i class="fas fa-key"></i> Change Password</button></li>
                <li><button onclick="window.location.href='../logout.php'"><i class="fas fa-sign-out-alt"></i> Logout</button></li>	
            </ul>
        </li>
    </ul>
</div>
