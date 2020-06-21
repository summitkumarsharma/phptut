<?php 
$logout=false;
session_start();
session_unset();
session_destroy();
$logout=true;
header("location:/phptutorial/Project-2/index.php?logout=true");
?>