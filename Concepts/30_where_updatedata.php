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



// select data into a table
// $sql="SELECT * FROM `mytrip` WHERE `dest` = `kerela`";
// $result = mysqli_query($conn,$sql);


// // find the number of records

// $num_row=mysqli_num_rows($result);
// echo "Number of records in the database is : - $num_row<br>";


// $no=1;

// if($num_row>0){
//     while($row = mysqli_fetch_assoc($result))
//     {
//         echo $no."  " . $row["name"] . "  " . $row["address"] . "  " . $row["dest"] . "  " . $row["date"];
//         echo "<br> ";
//         $no=$no+1;
//     }
// }


// Usage of WHERE Clause to update data

$sql="UPDATE `mytrip` SET `address` = 'Bhilai' WHERE `mytrip`.`sno` = 2";
$result = mysqli_query($conn,$sql);
echo var_dump($result);
$aff=mysqli_affected_rows($conn);
echo "<br>The Number of affected rows are:- $aff ";
if($result)
{
    echo"<br>Record Updated Successfully";
}
else{
    echo"<br>Record is not Updated Successfully";
}
?>

