<?php
session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(90, 30);
// green: 13, 108, 76
// red: 153, 11, 36
$bg = imagecolorallocate($im, 153, 11, 36); // background color
$fg = imagecolorallocate($im, 255, 255, 255); // text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 6, 26, 8, $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>