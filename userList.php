<?php

// get the name from cookie
// $name = "";
// if (isset($_COOKIE["name"])) {
//     $name = $_COOKIE["name"];
// }

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" type="text/javascript">
        var loadTimer = null;
        var request;
        var datasize;
        var lastMsgID;
        var prevMessageLen = 0;
        var rowIndex;
        function load() {
            // var username = document.getElementById("username");
            // if (username.value == "") {
            //     loadTimer = setTimeout("load()", 100);
            //     return;
            // }
            
            loadTimer = null;
            datasize = 0;
            lastMsgID = 0;
            

            getUpdate();
        }

        function unload() {
            var username = document.getElementById("username");
            if (username.value != "") {
                //request = new ActiveXObject("Microsoft.XMLHTTP");
                request = new XMLHttpRequest();
                request.open("POST", "logout.php", true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(null);
                username.value = "";
            }
            if (loadTimer != null) {
                loadTimer = null;
                clearTimeout("load()", 100);
            }
        }

        function getUpdate() {
            //request = new ActiveXObject("Microsoft.XMLHTTP");
            request = new XMLHttpRequest();
            request.onreadystatechange = stateChange;
            request.open("POST", "server.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("datasize=" + datasize);
        }

        function stateChange() {
            if (request.readyState == 4 && request.status == 200 && request.responseText) {
                var xmlDoc;
                var parser = new DOMParser();
                xmlDoc = parser.parseFromString(request.responseText, "text/xml");
                datasize = request.responseText.length;
                updateChat(xmlDoc);
                getUpdate();
            }
        }

        function updateChat(xmlDoc) {

            var table = document.getElementById("list");

             while (table.rows.length > 1) {
             table.deleteRow(1);
                }

            rowIndex = 1;
            //point to the message nodes
            var users = xmlDoc.getElementsByTagName("user");

            console.log(users);

            // create a string for the messages
        
        
            for (var i = 0; i < users.length; ++i) {
                var username = users[i].getAttribute("name");
                var userPic = users[i].getAttribute("userpic");

                showList(username,userPic);
            }
            
        }

        function showList(username,userPic) {
               
                var table = document.getElementById("list");
                var row = table.insertRow(rowIndex++);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);

                cell1.innerHTML = username;
                cell2.innerHTML = "<img src=" + userPic+ " width='50'  height='50' />";

         
        }

        </script>


<body onload="load()" onunload="unload()">


<table id = "list" border="0" cellspacing="5" cellpadding="0" >

            <tr id ="firstRow">
                <th>UserName</th> <th>Profile Picture</th>
            </tr>
  


            </table>


</body>

</html>