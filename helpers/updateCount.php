<?php
$link = $_GET['link'];
$fullLink = $_GET['fullLink'];
$result = json_decode(file_get_contents('../results/result.txt'),true);
foreach ($result as $key => $value) {
    $keys = array_keys($value['LINKS']);
    if (in_array($link,$keys)) {
        $result[$key]['LINKS'][$link]['COUNT'] += 1;
        break;
    } else {
        continue;
    }
}

file_put_contents('../results/result.txt',json_encode($result));
ob_start();
header('Location: '.$fullLink);
ob_end_flush();