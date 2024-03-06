<!DOCTYPE html>
<html>
<head>
    <style>
        /* Footer styles */
        body {
            margin: 0;
            padding: 0;
        }
        
        #footer {
  
  font-family: Times New Roman, Times, serif;
  background-color: #f2f2f2;
  padding: 10px;
  text-align: center;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;

}

        #footer p {
            margin: 0;
            color: black;
            font-size: 12px;
        }

        #footer a {
            color: #fafafa;
            text-decoration: none;
            font-style: italic;
            margin-left: 10px;
        }

        #footer a:hover {
            background-color: rgb(8, 90, 79);
        }

        #myBtn {
            background-color: #4682B4;
            color: black;
            border-color: #4682B4;
            width: 40px;
            display: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 5px;
            cursor: pointer;
        }

        #myBtn:hover {
            background-color: #357CA5;
        }
    </style>

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
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
    <div id="navigation">
        <center>
            <table>
                <tr>
                    <td>
                        <b><span class="copyright">&copy;</span> 2015/2023 All rights reserved!</b>
                    </td>
                    <td>
                        <a href="../contact.php">Designed by</a>
                    </td>
                    <td width="100" align="center">
                        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
                    </td>
                </tr>
            </table>
        </center>
    </div>
</body>
</html>
