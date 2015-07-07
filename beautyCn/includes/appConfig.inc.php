<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/2
 * Time: 15:02
 */

define("HOST_WWW_ROOT","/Applications/XAMPP/xamppfiles/htdocs/beautyCn");
//define('HOST_WWW_ROOT','D:/xampp/htdocs/beautyCn');

function get_web_path($file_system_path)
{
    return str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_system_path);
}