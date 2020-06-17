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
    echo "connection is successful<br>";
}


// Delete record from the database

$sql="DELETE FROM `mytrip` WHERE `mytrip`.`address` = 'delhi' LIMIT 3";
$result = mysqli_query($conn,$sql);
echo var_dump($result);
$aff=mysqli_affected_rows($conn);
echo "<br>The Number of affected rows are:- $aff ";
if($result)
{
    echo"<br>Record Deleted Successfully";
}
else{
    $err=mysqli_error($conn);
    echo"<br>Record is not Deleted Successfully due to this error---> $err";
}

?>

