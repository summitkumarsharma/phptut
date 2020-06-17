<?php

// start the session and get the data

session_start();
if(isset($_SESSION['username'])){
echo "welcome " .$_SESSION['username'];
echo " <br>your favorate cataegory is " .$_SESSION['favCat'];
echo " <br> ";
}
else{
    echo "please login to continue";
}

?>