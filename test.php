<?php

$file_open = fopen("lista.csv", "a");
$row = count(file("lista.csv"));
$delimiter=",";
if($row > 1){
    $row = ($row - 1) + 1;
}
$list = array (
    "id"=>$row,
    "nazwa" => "test1",
    "email" => "test2",
    "csooo" => "test3",
    "nowe" => "test4"
);
$heders = array ("ID","nazwa","email","csooo","nowe");
fputcsv($file_open,$heders,$delimiter);
fputcsv($file_open,$list,$delimiter);
// echo '<tr>';
// foreach ($list as $fields) {
//     fputcsv($fp, $fields);
// }
// echo '</tr>';
fseek($file_open,0);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'."lista.csv".'"');
fpassthru($file_open);
?>