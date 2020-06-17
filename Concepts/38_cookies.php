<?php

echo"welcome to cookies concept<br>";
echo time();

// syntax to set cookie

setcookie("category","books",time()+86400,"/");
echo"The cookie has been set";


?>