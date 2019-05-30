<?php
error_reporting(0);
$link = mysqli_connect("localhost","root","","mysql");
$table_name = "customer";

$fp = fopen('php://output', 'w');
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$table_name.'.csv"');
header('Pragma: no-cache');
header('Expires: 0');

$resultE = mysqli_query($link, "SELECT * FROM $table_name");
if (!$resultE) die("Couldn't fetch records");
$num_fields = mysqli_num_fields($resultE);
$headers = array();

for ($i = 8; $i < $num_fields; $i++) {
    $headers[] = mysqli_fetch_field($resultE , (int)$i);
    // $headers[] = mysql_field_name($resultE , $i);
}

// for ($i = 0; $i < $num_fields; $i++) {
//     $headers[] = mysqli_fetch_field($resultE , $i);
//     // $headers[] = mysql_field_name($resultE , $i);
// }

if ($fp && $resultE) {
    fputcsv($fp, $headers);
    while ($row = mysqli_fetch_assoc($resultE)) {
        fputcsv($fp, $row);
    }
}

exit;
?>