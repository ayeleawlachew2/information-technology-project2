<style>
  body {
    font-family: Arial, sans-serif;
  }

  ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  li {
    position: relative;
    margin-bottom: 10px;
  }

  button {
    display: block;
    padding: 10px 20px;
    font-family: Arial, sans-serif;
    font-size: 16px;
    background-color: #f5f5f5;
    text-decoration: none;
    color: #000;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    cursor: pointer;
  }

  button:hover {
    background-color: #eaeaea;
  }

  .has-submenu > button {
    position: relative;
  }
/* 
  .has-submenu > button::after {
    content: "\25BC";
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
  } */

  .submenu {
    display: none;
    margin-top: 10px;
    padding-left: 20px;
  }

  .has-submenu.open > .submenu {
    display: block;
  }

  .button-container {
    display: flex;
    flex-wrap: wrap;
  }

  .button-container button {
    margin-right: 10px;
    margin-bottom: 10px;
  }
</style>

<script>
  function toggleSubMenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    submenu.classList.toggle("open");
  }
</script>

<ul>
  <li>
    <button onclick="window.location.href = 'committee_page.php';"><i class="fas fa-home"></i> Home</button>
  </li>
  <li class="has-submenu">
    <button onclick="toggleSubMenu('register-submenu')"><i class="fas fa-registered"></i> Register <font size="1" color="#585858"><span>&#9660;</span></font></button>
    <ul class="submenu" id="register-submenu">
      <li><button onclick="window.location.href = 'register_admin_or_committee.php';"><i class="fas fa-user-tie"></i> Admin or Agency Committee</button></li>
      <li><button onclick="window.location.href = 'reguniversity.php';"><i class="fas fa-university"></i> University</button></li>
      <li><button onclick="window.location.href = 'selectuniversity.php';"><i class="fas fa-building"></i> Department</button></li>
      <li><button onclick="window.location.href = 'register_setter.php';"><i class="fas fa-pencil-alt"></i> Exam Setter</button></li>
      <li><button onclick="window.location.href = 'register_registrar.php';"><i class="fas fa-user-graduate"></i> Registrar</button></li>
      <li><button onclick="window.location.href = 'notice.php';"><i class="fas fa-bell"></i> Add Notice</button></li>
    </ul>
  </li>
  <li class="has-submenu">
    <button onclick="toggleSubMenu('modify-submenu')"><i class="fas fa-edit"></i> Modify <font size="1" color="#585858"><span>&#9660;</span></font></button>
    <ul class="submenu" id="modify-submenu">
      <li><button onclick="window.location.href = 'updatedept.php';"><i class="fas fa-building"></i> Department</button></li>
      <li><button onclick="window.location.href = 'updateuniversity.php';"><i class="fas fa-university"></i> University</button></li>
      <li><button onclick="window.location.href = 'updateregistrar.php';"><i class="fas fa-user-graduate"></i> Registrar</button></li>
      <li><button onclick="window.location.href = 'updateexamsetter.php';"><i class="fas fa-pencil-alt"></i> Exam Setter</button></li>
       <li><button onclick="window.location.href = 'updatenotice.php';"><i class="fas fa-bell"></i> Notice</button></li>
      <!-- <li><button onclick="window.location.href = 'change_pw.php';"><i class="fas fa-lock"></i> Change Password</button></li> -->
    </ul>
  </li>
  <li>
    <button onclick="window.location.href = 'viewcandidate.php';"><i class="fas fa-users"></i> View Candidate</button>
  </li>
  <li class="has-submenu">
    <button onclick="toggleSubMenu('exam-submenu')"><i class="fas fa-calendar-alt"></i> Exam <font size="1" color="#585858"><span>&#9660;</span></font></button>
    <ul class="submenu" id="exam-submenu">
      <li>
        <div class="button-container">
          <button onclick="window.location.href = 'score.php';"><i class="fas fa-trophy"></i> Set Passing Score</button>
           <button onclick="window.location.href = 'viewscore.php';"><i class="fas fa-eye"></i> View passing Score</button>
          <button onclick="window.location.href = 'updatescore.php';"><i class="fas fa-edit"></i> Edit Passing Score</button>
         
        </div>
      </li>
      <li>
        <div class="button-container">
          <?php
          $query = mysqli_query($con, "select * from notification where committee_status='unread' ORDER BY dates DESC")
            or die(mysqli_error());
          $coun = mysqli_num_rows($query);
          $query1 = mysqli_query($con, "select * from notification where committee_status='read' and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No' ORDER BY dates DESC") or die(mysqli_error());
          $countpay_fee = mysqli_num_rows($query1);
          $query3 = mysqli_query($con, "select * from comment WHERE status='unread' ORDER BY Date DESC") or die(mysqli_error());
          $count3 = mysqli_num_rows($query3);
          ?>
          <button onclick="window.location.href = 'response.php';"><i class="fas fa-bell"></i> Notification [&nbsp;<?php echo $coun; ?>&nbsp;]</button>
          <button onclick="window.location.href = 'last_response.php';"><i class="fas fa-money-bill-wave"></i> Pay Fee [&nbsp;<?php echo $countpay_fee; ?>&nbsp;]</button>
          <button onclick="window.location.href = 'examdate.php';"><i class="fas fa-calendar-plus"></i> Add Exam Date</button>
        </div>
      </li>
      <li>
        <div class="button-container">
          <button onclick="window.location.href = 'view_eaxmdate.php';"><i class="fas fa-calendar-alt"></i> View Exam Date</button>
          <button onclick="window.location.href = 'updateexamdate.php';"><i class="fas fa-edit"></i> Edit Exam Date</button>
          <button onclick="window.location.href = 'viewcomment.php';"><i class="fas fa-comments"></i> View Comment [&nbsp;<?php echo $count3; ?>&nbsp;]</button>
          <button onclick="window.location.href = 'fillyear.php';"><i class="fas fa-chart-bar"></i> View Report</button>
        </div>
      </li>
    </ul>
  </li>
  <li>      
        
             <li>
             <button class="toggle-btn" onclick="window.location.href = 'change_pw.php';"><i class="fas fa-keyt"></i>  Change Password</button>
            
        </li>
       
           
        </li>
  <li>
    <button onclick="window.location.href = '../logout.php';"><i class="fas fa-sign-out-alt"></i> Logout</button>
  </li>
</ul>
