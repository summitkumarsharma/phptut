<?php

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
    echo " connection is successful<br>";
}

// create a database
$sql="CREATE DATABASE sumittestdb3";
$result=mysqli_query($conn,$sql);

//check for database creation
if($result)
{
    echo"The db is created successfully!!<br>";
}
else{
    echo"The db is not created successfully because of this error------>".mysqli_error($conn);
}

?>