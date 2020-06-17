<?php

$servername="localhost";
$username="root";
$password="";
$database="myusers";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
//     echo "Connection Succeessful";
// }
// else{
    die("connection was not successful".mysqli_connect_error($conn));
}

?>