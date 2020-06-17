<?php

echo "checking the connection.......<br>";

//connecting to the database
$servername="localhost";
$username="root";
$password="";

//create a connection
$conn=mysqli_connect($servername,$username,$password);

//die if connection was not successful

if(!$conn)
{
    die("sorry we failed to connect:".mysqli_connect_error());
}
else{
    echo " connection is successful";
}
?>