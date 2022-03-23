<?php
// $html = file_get_contents('http://www.google.com/');
/*$title = $html->find('title', 0);
$image = $html->find('img', 0);*/
// echo $html;
/*echo $title->plaintext."<br>\n";
echo $image->src;*/
$ch = curl_init("https://timesofindia.indiatimes.com/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);
print_r($content);
/*$ch=show_source("https://timesofindia.indiatimes.com/");
print_r($ch);*/
?>