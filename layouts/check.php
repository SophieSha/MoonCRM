<?php

require_once '../config.php';

$options = $_GET['option'];

foreach ($options as $option) {
    echo $option;
}

?>
