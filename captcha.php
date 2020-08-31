<?php

session_start();
//making dynamic text for our image string
$chars = "abcdefr340fkdsfjvndssdjfdsfjJDJFKEUFJ";
$rand_str = '';

//we want only 8 char string
for($i = 0; $i < 8; $i++){
    
    //apend it
    $rand_str .= $chars[rand(0, strlen($chars) - 1)];
}

$_SESSION['catcha_text'] = $rand_str;

//this img string we will store in session so we can compare with our imput




$str = $rand_str; // this text we will make it dynamic letter
//create img
$img = imagecreate(150,50);// width & height
$img_bg = imagecolorallocate($img, 255,255,255);  //rgba color name as white
$text_color = imagecolorallocate($img ,51,122,183); //sky color text image color
imagestring($img,4,30,25, $str,$text_color);
imagesetthickness($img, 3);
header("Content-type: image/png");  // we want png image
imagepng($img);
imagecolordeallocate($img, $img_bg);  //background color
imagecolordeallocate($img, $text_color); // image text color
imagedestroy($img);
