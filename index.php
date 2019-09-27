<?php

$info = json_decode(file_get_contents('results/result.txt'),true);

if ($_COOKIE['ID']) {
    $id = $_COOKIE['ID'];
} else {
    if (empty($info)) {
        $id = 1;

    } else {
        $id = count($info) + 1;
    };
    $info[$id] = [];
    file_put_contents('results/result.txt',json_encode($info));
    setcookie('ID',$id);
}

include 'layouts/layout.php';