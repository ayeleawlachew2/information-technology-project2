<?php
  //  session_start();
    if( empty( $_SESSION['quiz'] ) )
    
    $_SESSION['quiz']=date('Y-m-d H:i:s');

include("../connection.php");

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">

    <title></title>
</head>
<body onload="f1()" >

<?php
$uid=$_SESSION['$uid'];
 $sql="select * from candidate where cid='$uid'";
$recordfound=mysqli_query($con, $sql);
while($row=mysqli_fetch_assoc($recordfound))
{
 $dept=$row["dept"];
 $year=$row["year"];
 }
 $sq="select * from timer where dept='$dept' and question_type='Re_Exam' and year='$year'";
$t=mysqli_query($con, $sq);
while($row=mysqli_fetch_array($t))
{
	$h=$row["hour"];
	$m=$row["min"];
}
?>
<script language ="javascript" >
	<?php
	$start=$_SESSION['quiz'];
	$end=date(' H:i:s', strtotime( $_SESSION['quiz'] . ' +20 minutes' ) );
	echo "
	var date_quiz_start='$start';
	var date_quiz_end='$end';
	var time_quiz_end=new Date('$end').getTime();";
	?>
	
var tim;
var hour=<?php echo $h;?>;
var min =<?php echo $m;?>;
var sec = 0;
var f = new Date();

function f1()
{
f2();
document.getElementById("starttime").innerHTML = "Your started  Exam at " + f.getHours() + ":" + f.getMinutes();
}
function f2() 
{
		if (parseInt(sec) > 0)
		{
		sec = parseInt(sec) - 1;
		document.getElementById("showtime").innerHTML = "Your Left Time  is "+hour+" :"+min+" :" + sec;
		tim = setTimeout("f2()", 1000);
		}
		else
		 {
		if (parseInt(sec) == 0)
		 {
		min = parseInt(min) - 1;
		
		if (parseInt(min) == 0) 
		{
		clearTimeout(tim);
		location.href ="display1.php";
		}
		else
		 {
		sec = 60;
		document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
		tim = setTimeout("f2()", 1000);
		}
		}
		}
}
</script>
    <form id="form1" runat="server">
    <div>
      <table width="100%" align="center">
        <tr>
          <td colspan="2">
          </td>
        </tr>
        <tr>
          <td>
            <div id="starttime"></div><br />
            <div id="endtime"></div><br />
            <div id="showtime"></div>
          </td>
        </tr>
        <tr>
          <td>
              <br />
          </td>
        </tr>
      </table>
      <br />
    </div>
    </form>
</body>
</html>