<?php

$info = json_decode(file_get_contents('results/result.txt'));

if ($_COOKIE['ID']) {
    $id = $_COOKIE['ID'];
    $data = $info['ID'];
} else {
    if (empty($info)) {
        $id = 1;
    } else {
        $id = count($info);
    };
    setcookie('ID',$id);
}

//file_put_contents('.htaccess',PHP_EOL.'Redirect /123/ http://vk.com/',FILE_APPEND);
include 'layouts/layout.php';