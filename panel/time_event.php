<?php
include "setting.php";

$endDate = null;

if($content_time[0] === "on"){
    $endDate = $endDate_start;
} elseif($content_time[1] === "on"){
    $endDate = 'NaN';
}

echo json_encode(['endDate' => $endDate]);