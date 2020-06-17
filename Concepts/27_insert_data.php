<?php

//connecting to the database

$servername="localhost";
$username="root";
$password="";
$database="sumittestdb";

//create a connection
$conn=mysqli_connect($servername,$username,$password,$database);

//die if connection was not successful

if(!$conn)
{
    die("sorry we failed to connect:".mysqli_connect_error());
}
else{
    echo " connection is successful<br>";
}

// we can use variables to insert record
$name="sumit";
$address="delhi";
$dest="mysore";
// $date=current_timestamp(); // not work

// insert data into a table
$sql="INSERT INTO `mytrip` (`name`, `address`, `dest`, `date`) VALUES ( '$name', '$address', '$dest',current_timestamp());";
$result=mysqli_query($conn,$sql);

//check for insert data  success
if($result)
{
    echo"The record is inserted successfully!!<br>";
}
else{
    echo"The record is not inserted successfully because of this error------>".mysqli_error($conn);
}

?>