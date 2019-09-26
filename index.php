<?php
//$result = [
//    1 => [
//        'LINKS' => [
//            'https://dae.tk' => 'vk.com',
//            'COUNT' => 0
//        ]
//    ]
//];
//file_put_contents('results/result.txt',json_encode($result)); die();
$info = json_decode(file_get_contents('results/result.txt'),true);

if ($_COOKIE['ID']) {
    $id = $_COOKIE['ID'];
} else {
    if (empty($info)) {
        $id = 1;

    } else {
        $id = count($info);
    };
    $info[$id] = [];
    file_put_contents('results/result.txt',json_encode($info));
    setcookie('ID',$id);
}

//file_put_contents('.htaccess',PHP_EOL.'Redirect /123/ http://vk.com/',FILE_APPEND);
include 'layouts/layout.php';