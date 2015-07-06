<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 16/6/15
 * Time: 3:49 PM
 */

try
{
    $pdo = new PDO('mysql:host=localhost; dbname=beautyCn', 'admin','cjp13557879');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8" ');
    echo "success";
}
catch (PDOException $e)
{
    $error = 'Unable to connect to the database server:'.$e->getMessage();
    include 'error.html.php';
    exit();
}