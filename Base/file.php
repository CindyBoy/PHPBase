<?php

//Example one
// 打开文件
// 将文件的内容读取出来，在开头加入Hello World
// 将拼接好的字符串写回到文件当中
// Hello 7891234567890
//
$file = './hello.txt';
$handle = fopen($file, 'r');
$content = fread($handle, filesize($file));
$content = 'Hello World'. $content;
fclose($handle);
$handle = fopen($file, 'w');
fwrite($handle, $content);
fclose($handle);


//Example Two
$dir = 'folder_name';

// 打开目录
// 读取目录当中的文件
// 如果文件类型是目录，继续打开目录
// 读取子目录的文件
// 如果文件类型是文件，输出文件名称
// 关闭目录
//

function loopDir($dir)
{
    $handle = opendir($dir);

    while(false!==($file = readdir($handle)))
    {
        if ($file != '.' && $file != '..')
        {
            echo $file. "\n";
            if (filetype($dir. '/'. $file) == 'dir')
            {
                loopDir($dir. '/'. $file);
            }
        }
    }
}

loopDir($dir);