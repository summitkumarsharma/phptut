<?php
echo "Welcome to the world of dates<br>";
date_default_timezone_set('Asia/Kolkata');
// $d = date("dS F Y");
$d = date("dS F Y, g:i A");
echo "Todays date is $d <br>";
// Quick Quiz - Post at least 3 examples of dates in php in the comments below

// Prints something like: Monday 8th of August 2005 03:12:46 PM
echo date('l jS \of F Y h:i:s A');
 
$year = date("Y");
echo "<br>";
echo "Copyright $year | All rights reserved <br>";

echo date('Y-m-d\TH:i:sO');


$today = getdate();
print_r($today);


?>