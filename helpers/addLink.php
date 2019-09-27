<?php
$link = $_POST['link'];
$id = $_POST['id'];
$str = 'qwertyuiopasdfghjklzxcvbnm1234567890';
$length = rand(3,5);
$minLink = '/';
for( $i = 0; $i < $length; $i++){
    $minLink .= $str[rand(0,strlen($str) - 1)];
}
$minLink .= '.tk';
if ((strrpos($link,'http')) === false) {
    $link = 'http://' . $link;
}
$result = json_decode(file_get_contents('../results/result.txt'),true);
$result[$id]['LINKS'][$minLink]['FULL_LINK'] = $link;
$result[$id]['LINKS'][$minLink]['COUNT'] = 0;
$access = PHP_EOL.'Redirect ' . $minLink . ' /helpers/updateCount.php?link='. $minLink . '&fullLink='.$link;
file_put_contents('../.htaccess', $access, FILE_APPEND);
file_put_contents('../results/result.txt',json_encode($result));