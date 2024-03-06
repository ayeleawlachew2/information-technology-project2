<html>
<head>
  <title>About page</title>
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
	 <br><br><br><br>
 

 
				<ul class="instruction-list">
                <li class="instruction-item">
Today many organizations are conducting Online examinations system in worldwide successfully and issue results online. Online exit examination system is the system that examinations is conducted through the extranet or in an intranet (if within the Organization) for a remote candidate(s). Most of the examinations issue results as the candidate finish the examination, when there is an answer processing module also included within the system. Candidate is given a limited time to answer the questions and after the time expiry the answer place is disabled automatically and answers is sent to the database. Because all question and answer is placed in the database of the system. Therefore the system will evaluate answers, through automated process and the results will be sent to the candidate through candidate identity on candidate pages in the available in the web site. But up to this time the examination process is given by through manual process. That means every student takes an exam in a classroom, because they are to sit there and have the examiners during the exam. This Online Examination System is to efficiently evaluate the exam through a fully automated system that not only saves lot of time but also give fast results. It will solve all the paper works in the examination process usually spent by the teacher or instructor in reading and checking the answer one after the other. The college or institute which provide exit exam through manually process in Ethiopian higher education institute are school of law and medical health college started around in 2003 E.C. but now starting from this year will be started in all college and schools in 2015 E,C so this project will start ,any graduate student take exit exam before it graduate.
</li>
            </ul>
</div>
<footer style="background-color:  #e2e0e0;">
    <?php
        require("footer.php");
    ?>
</footer>
 
</body>
</html>


