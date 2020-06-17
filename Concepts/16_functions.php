<?php
echo "Welcome to php tutorial on functions <br>";

function processMarks($marksArr){
    $sum = 0;
    foreach ($marksArr as $value) {
        $sum += $value;
    }
    return $sum;
}

function avgMarks($marksArr){
    $sum = 0;
    $i = 1;
    foreach ($marksArr as $value) {
        $sum += $value;
        $i++;
    }
    return $sum/$i;
}

$rohanDas = [97, 98, 95, 90, 98, 93];
$sumMarks = processMarks($rohanDas);
// $sumMarks = avgMarks($rohanDas);

$sumit = [99, 98, 93, 94, 91, 100];
$sumMarksSumit = processMarks($sumit);
// $sumMarksHarry = avgMarks($harry);

echo "Total marks scored by Rohan out of 600 is $sumMarks <br>";
echo "Total marks scored by Harry out of 600 is $sumMarksSumit";

?>
