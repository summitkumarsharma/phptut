<?php

$fptr=fopen("myfile.txt","r");
// echo $fptr;
if(!$fptr){
    die("Unable to open the file. please enter the valid file name");
}

$content=fread($fptr,filesize("myfile.txt"));
echo $content;

fclose($fptr);

?>