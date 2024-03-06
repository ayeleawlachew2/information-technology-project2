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
  /* justify-content: space-between; */
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
        height: 400px; /* Adjust the height as needed */
        overflow-y: auto;
    }
</style>
<div class="custom-list-container">
    <ul class="custom-list">
        <li>
            <button class="toggle-btn" onclick="window.location.href = 'examsetterpage.php';"><i class="fas fa-home"></i> Home</button>
 
        <li>
  <button class="toggle-btn"><i class="fas fa-question"></i> Question</button>
  <ul class="sub-menu">
    <li><button onclick="window.location.href='fillyear.php'"><i class="fas fa-plus"></i> Set question</button></li>
    <li><button onclick="window.location.href='viewquestion.php'"><i class="fas fa-eye"></i> View question</button></li>
    <li><button onclick="window.location.href='updatequestion.php'"><i class="fas fa-edit"></i> Edit question</button></li>
  </ul>
</li>
         
   <li>
  <button class="toggle-btn"><i class="fas fa-lock"></i> Exam Password</button>
  <ul class="sub-menu">
    <li><button onclick="window.location.href='exam_password.php'"><i class="fas fa-plus"></i> Set Exam Password</button></li>
    <li><button onclick="window.location.href='updateexam_password.php'"><i class="fas fa-edit"></i> Update Exam Password</button></li>
    <li><button onclick="window.location.href='viewexam_password.php'"><i class="fas fa-eye"></i> View Exam Password</button></li>
  </ul>
</li>
 

  <li>
  <button class="toggle-btn"><i class="far fa-clock"></i> Exam Time</button>
  <ul class="sub-menu">
    <li><button onclick="window.location.href='addexam_time.php'"><i class="fas fa-plus"></i> Set exam time</button></li>
    <li><button onclick="window.location.href='updateexamtime.php'"><i class="fas fa-edit"></i> Edit exam time</button></li>
    <li><button onclick="window.location.href='viewexamtime.php'"><i class="fas fa-eye"></i> View exam time</button></li>
  </ul>
</li>
<li>      
        
             <li>
             <button class="toggle-btn" onclick="window.location.href = 'change_pw.php';"><i class="fas fa-keyt"></i>  Change Password</button>
            
        </li>
       
           
        </li>
        <li>
             <button class="toggle-btn" onclick="window.location.href = '../logout.php';"><i class="fas fa-sign-out-alt"></i> Logout</button>
            
        </li>
    </ul>
</div>