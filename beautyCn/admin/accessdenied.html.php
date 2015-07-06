<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/30
 * Time: 15:38
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php';
?>

<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <title>拒绝访问</title>
    </head>
    <body>
        <h1>拒绝访问</h1>
        <p><?php  htmlout($error);?></p>
        <p><a href="/admin/">返回</a></p>
    </body>
</html>