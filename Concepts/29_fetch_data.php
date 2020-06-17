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
$sql="SELECT * FROM `mytrip`";
$result=mysqli_query($conn,$sql);


// find the number of records

$num_row=mysqli_num_rows($result);
echo "Number of records in the database is : - $num_row<br>";


// fetch records from the table
// for ($i=0; $i <$num_row; $i++) { 
//     $row=var_dump(mysqli_fetch_assoc($result));
//     echo "<br>$row";

//     // echo $row['sno'] . $row['name'] . $row['address'] . $row['dest'] . $row['date'];
// }

// fetch records from the table using foreach loop
// $row=mysqli_fetch_assoc($result);
// foreach ($row as $key => $value) {
//     echo "$key is $value <br>";
// }
if($num_row>0){
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row["sno"] ."  " . $row["name"] . "  " . $row["address"] . "  " . $row["dest"] . "  " . $row["date"];
        echo "<br> ";
    }
}

?>

