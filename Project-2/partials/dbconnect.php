<?php
 //connecting to the database

 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "idiscuss";

 //create a connection
 $conn = mysqli_connect($servername, $username, $password, $database);

 //die if connection was not successful

 if (!$conn) {
     die("sorry we failed to connect:" . mysqli_connect_error());
 } 
 //else {
 //     echo "connection is successful<br>";
 // }


?>