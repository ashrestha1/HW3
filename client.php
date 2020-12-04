<?php

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    return;
}

// get the name from cookie
$name = $_COOKIE["name"];

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Message Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
            .div-color {
                position: absolute;
                width: 50px;
                height: 50px;
            }
        </style>
        <script type="text/javascript">
        function load() {
            var name = "<?php print $name; ?>";

            setTimeout("document.getElementById('msg').focus()", 100);
        }

        function select(color) {
            if (confirm('Are you sure to change your message color to ' + color + '?')) {
                document.getElementById("color").value = color;
            }
        }
        </script>
    </head>

    <body style="text-align: left" onload="load()">
        <form action="add_message.php" method="post">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr>
                    <td>What is your message?</td>
                </tr>
                <tr>
                    <td><input class="text" type="text" name="message" id="msg" style= "width: 780px" /></td>
                </tr>
                <tr>
                    <td>
                        <input class="button" type="submit" value="Send Your Message" style="width: 200px" />
                        
                        <div style="position:relative">
                            Choose your color:
                            <div class="div-color" style="background-color:black;left:0px" onclick="select('black')"></div>
                            <div class="div-color" style="background-color:yellow;left:50px" onclick="select('yellow')"></div>
                            <div class="div-color" style="background-color:green;left:100px" onclick="select('green')"></div>
                            <div class="div-color" style="background-color:cyan;left:150px" onclick="select('cyan')"></div>
                            <div class="div-color" style="background-color:blue;left:200px" onclick="select('blue')"></div>
                            <div class="div-color" style="background-color:magenta;left:250px" onclick="select('magenta')"></div>
                        </div>
                        <input type="hidden" name="color" id="color" value="black" />
                    </td>
                </tr>
                
            </table>
        </form>


        
        <!--logout button-->
        <hr style="margin-top:60px" />
        
        
        <table border="0" cellspacing="5" cellpadding="0" >
                <tr>
                    <td>
                        <input class="button" type="button" onclick="location.href = 'logout.php';" value="Logout" style="width: 200px" />
                    </td>
                    <td>
                        <input class="button" type="button"  onclick="window.open('userList.php');" value="Show Online User List" style="width: 200px" />
                    </td>
                </tr>
            </table>
          

       

    </body>
</html>
