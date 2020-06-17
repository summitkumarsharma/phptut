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

// create a table
$sql="CREATE TABLE `mytrip` ( `sno` INT(5) NOT NULL AUTO_INCREMENT ,  `name` VARCHAR(15) NOT NULL ,  `address` VARCHAR(30) NOT NULL ,  `dest` VARCHAR(30) NOT NULL ,  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`sno`)) ENGINE = InnoDB;";
$result=mysqli_query($conn,$sql);

//check for Table creation success
if($result)
{
    echo"The table is created successfully!!<br>";
}
else{
    echo"The table is not created successfully because of this error------>".mysqli_error($conn);
}

?>