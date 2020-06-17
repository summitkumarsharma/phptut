<?php
// writing to a file

echo"welcome we will write the content in a file using php\n";

// $fptr=fopen("myfile2.txt","w");
// fwrite($fptr,"This content is to written in the file.\n");
// fwrite($fptr,"This is another content.\n");
// fclose($fptr);


// Appending to file.

$fptr=fopen("myfile2.txt","a");
fwrite($fptr,"This is being appended to the end of the file content.\n");
fclose($fptr);

?>