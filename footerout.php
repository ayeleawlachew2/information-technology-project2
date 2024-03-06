<html>
<head>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function()
 {
 	scrollFunction()};

function scrollFunction() 
{
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>	
</head>
<body>
<div id="footer">
<center>
<table style="margin-top: -15px;">
<tr>
<td><b><font color="white" size="3px" align="center">&copy; 2015/2023  All rights reserved!</font></b></td>
<td><a href="contact.php" style="color:#fafafa;font-style: italic; margin-left:180px; ">Designed by</a></td>
<td width="100" align="center">&nbsp;<button onclick="topFunction()" id="myBtn" title="Go to top">
<font style="background-color: #4682B4;color: #fffbfb;border-color:#4682B4;width: 40px;">Top</font></button></td>
</tr>
</table>
</center>
</div>
</body>
</html>