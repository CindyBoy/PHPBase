<?php

//Example one
$str = '中文';
$pattern = '/[\x{4e00}-\x{9fa5}]/u';  //$match is 中
// $pattern = '/['.chr(0xb0).'-'.chr(0xf7).']['.chr(0xa1).'-'.chr(0xfe).']/';  //This way is messy code
preg_match($pattern, $str, $match);
var_dump($match);

//Example two
// 请写出以139开头的11位手机号码的正则表达式
$str = '13988888888';
$pattern = '/^139\d{8}$/';
preg_match($pattern, $str, $match);
var_dump($match);


//Example three
// 请匹配所有img标签中的src的值
$str = '<img alt="高清无码" id="av" src="av.jpg" />';
$pattern = '/<img.*?src="(.*?)".*?\/?>/i';
preg_match($pattern, $str, $match);
var_dump($match);
