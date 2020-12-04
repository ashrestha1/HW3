<?php 



require_once('xmlHandler.php');

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    exit;
}

// create the chatroom xml file handler
$xmlh = new xmlHandler("chatroom.xml");
if (!$xmlh->fileExist()) {
    header("Location: error.html");
    exit;
}

$xmlh->openFile();
 $userArray = $xmlh->getChildNodes("user");
 $getUser = $xmlh->getElement("users");

 foreach ($userArray as $x) {
    
    if($xmlh->getAttribute($x,"name") == $_COOKIE["name"])
    $xmlh->removeElement($getUser,$x);

  }
  $xmlh->saveFile();


  setcookie("name",$_COOKIE["name"],time()-3600);

header("Location: login.html"); 



?>
