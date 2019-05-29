<?php

$link = mysqli_connect("localhost","root","","mysql");
$table_name = "customer";

$fp = fopen('php://output', 'w');
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$table_name.'.csv"');
header('Pragma: no-cache');
header('Expires: 0');

$resultE = mysqli_query("SELECT * FROM $table_name");
if (!$resultE) die("Couldn't fetch records");
$num_fields = mysql_num_fields($resultE);
$headers = array();
for ($i = 0; $i < $num_fields; $i++) {
    $headers[] = mysql_field_name($resultE , $i);
}

if ($fp && $resultE) {
    fputcsv($fp, $headers);
    while ($row = mysql_fetch_assoc($resultE)) {
        fputcsv($fp, $row);
    }
}

exit;
?>