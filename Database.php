<?php
$domain="localhost";
$dbuser="root";
$dbpass="";
$dbname="ExitExam";
$x=0;
$total=0;
mysqli_connect($domain,$dbuser,$dbpass) or die(mysqli_error());
if(mysqli_select_db($dbname))
$x=1;
else
$x=2;
if($x==2)
{
	
mysqli_query("create database ExitExam") or die(mysqli_error());
		echo "<br>Your Database is Successfully created";
}else if($x==1)

{
mysqli_query("create table user(uid varchar(50) primary key,ufname varchar(50),umname varchar(50),ulname varchar(50),sex VARCHAR(20),mobile varchar(50),email varchar(50),photo varchar(50),role varchar(50))") or die(mysqli_error());
echo "<br>User table created depthead";
$total++;	
	
	 //create exam editor table
mysqli_query("create table Exameditor(eid varchar(30) primary key,FOREIGN key(eid)REFERENCES user(uid))") or die(mysqli_error());
echo "<br>Exam Editor table created";
$total++;
//create unversity table
mysqli_query("create table university(uid VARCHAR(50) PRIMARY key,uname varchar(50) UNIQUE)") or die(mysqli_error());
echo "<br>University table created";
$total++;
//create department table
mysqli_query("create table department(did VARCHAR(50) PRIMARY key ,cname varchar(50),dname varchar(50) ,uid VARCHAR(50),FOREIGN KEY(uid)REFERENCES university(uid) )") or die(mysqli_error());
echo "<br>department table created";
$total++;

//exam setter table
mysqli_query("create table Examsetter(sid varchar(20) primary key,dname varchar(50) UNIQUE ,eid varchar(30),
FOREIGN KEY(eid)REFERENCES Exameditor(eid),year int,FOREIGN key(sid)REFERENCES user(uid))") or die(mysqli_error());
echo "<br>Examsetter table created";
$total++;
//registrar
mysqli_query("create table registrar(rid varchar(20) primary key,uid  varchar(50) UNIQUE ,eid varchar(30),
    FOREIGN KEY(eid)REFERENCES Exameditor(eid),FOREIGN key(rid)REFERENCES user(uid))") or die(mysqli_error());
echo "<br>registrar table created ";
$total++;
//Candidate
mysqli_query("create table candidate(cid varchar(20) primary key,dept varchar(50),colleage varchar(50),
      unversity varchar(50),rid varchar(20),FOREIGN KEY(rid)REFERENCES registrar(rid),year int,FOREIGN key(cid)REFERENCES user(uid) )") or die(mysqli_error());
echo "<br>candidate table created";
$total++;

mysqli_query("create table question(qid int PRIMARY key AUTO_INCREMENT,year int,dept varchar(50), question varchar(2000),optiona varchar(1000),optionb varchar(1000),optionc varchar(1000),optiond varchar(1000),answer varchar(1000),status varchar(50),question_type VARCHAR(50),sid varchar(20),
    FOREIGN KEY(sid) REFERENCES Examsetter(sid))") or die(mysqli_error());
echo "<br>Question table created";
$total++;


mysqli_query("create table depthead(did varchar(20) primary key,
    dname varchar(50) ,uid varchar(50)  ,eid varchar(30),
    FOREIGN KEY(eid)REFERENCES Exameditor(eid),FOREIGN key(did)REFERENCES user(uid)
    ,FOREIGN key(did)REFERENCES user(uid))") or die(mysqli_error());
echo "<br>Department head table created";
$total++;


//create account table
mysqli_query("create table account (uid varchar(50) primary key,username varchar(100) UNIQUE,password varchar(1000),status varchar(50),FOREIGN key(uid) REFERENCES user(uid),password_status VARCHAR(50))") or die(mysqli_error());
echo "<br>account table created";
$total++;

mysqli_query("create table notice(notice_number int primary key AUTO_INCREMENT ,status VARCHAR(50),title varchar(50), Dates date,Ex_Dates date,Content varchar(2000),sender varchar(50))") or die(mysqli_error());
echo "<br> notice table created";
$total++;
mysqli_query("create table timer(tid int primary key AUTO_INCREMENT, dept VARCHAR(50) ,question_type VARCHAR(20),hour int,min int,year int)") or die(mysqli_error());
echo "<br> Timer table created";
$total++;
mysqli_query("create table takenexam(uid varchar(50) PRIMARY key ,program VARCHAR(20), FOREIGN key(uid) REFERENCES candidate(cid))") or die(mysqli_error());
echo "<br>  takenexam table created";
$total++;
mysqli_query("create table result(uid varchar(50) PRIMARY KEY,totalQestion int,correctanswer int,wronganswer int,
     total varchar(50),status varchar(50),program VARCHAR(20), FOREIGN key(uid) REFERENCES takenexam(uid))") or die(mysqli_error());
echo "<br>  Result table created";
$total++;

mysqli_query("create table set_score(score_id int  PRIMARY key AUTO_INCREMENT,dept varchar(50),score int,year int)") or die(mysqli_error());
echo "<br>  set_score created";
$total++;
mysqli_query("create table notification(request_id int  PRIMARY key AUTO_INCREMENT,uid varchar(50),dept varchar(50),unvisersity VARCHAR(50),resean VARCHAR(2000),year int,dates date ,editor_status varchar(20),user_status varchar(20),pay_fee varchar(20),check_status varchar(20),image varchar(50),user_last_response varchar(50))") or die(mysqli_error());
echo "<br>  notification table created";
$total++;

mysqli_query("create table examdate(date_id int  PRIMARY key AUTO_INCREMENT,question_type VARCHAR(50), start_date DATE,end_date DATE,start_time TIME,end_time TIME,year int)") or die(mysqli_error());
echo "<br>  Examdate created";
$total++;
mysqli_query("create table comment(comment_id int  PRIMARY key AUTO_INCREMENT,user_id  varchar(50),fname VARCHAR(50),lname VARCHAR(50),Date date,email VARCHAR(50),content VARCHAR(2000),FOREIGN KEY(user_id) REFERENCES user(uid))") or die(mysqli_error());
echo "<br>  comment Comment";
$total++;
mysqli_query("create table logtable( lig_id  int  PRIMARY key AUTO_INCREMENT,user_id  varchar(50),username VARCHAR(50),role VARCHAR(50),
login_time  VARCHAR(50),logout_time  VARCHAR(50), start_time VARCHAR(50), activity_type VARCHAR(50),activity_performed VARCHAR(2000),ip_address VARCHAR(50),date date)") or die(mysqli_error());
echo "<br>logtable table created  ";
$total++;
mysqli_query("create table exam_passord( pw_id int  PRIMARY key AUTO_INCREMENT,password  varchar(100),year int)") or die(mysqli_error());
echo "<br>exam_passord table created  ";
$total++;
mysqli_query("create table attempt( at_id int  PRIMARY key AUTO_INCREMENT,status  varchar(100))") or die(mysqli_error());
echo "<br>Attempt table created  <br><br>";
$total++;
echo $total." table is created";

}
?>