<?php

// what is session?
// use to manage information across pages

echo "Welcome to the session concept";
// verify the user login info

session_start();
$_SESSION['username']="sumit";
$_SESSION['favCat']="Books";
echo "<br>we have saved your session ";


?>