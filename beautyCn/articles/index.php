<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/6
 * Time: 14:42
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

if(isset($_GET['conId']))
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/appConfig.inc.php';

    $conId = $_GET['conId'];

    $sql = 'SELECT * FROM content WHERE contentId = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id',$conId);
    $s->execute();

    $article = $s->fetch();

    $article['img'] = get_web_path($article['img']);
    $article['video'] = get_web_path($article['video']);
    $article['threeD'] = get_web_path($article['threeD']);

    include 'body.html.php';
    exit();
}

//describe the article of web
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

try
{
    $result = $pdo->query('SELECT * FROM content');

}
catch (PDOException $e)
{
    $error = 'Error fetching content form database.';
    include 'error.html.php';
    exit();
}

foreach($result as $row)
{
    $articles[] = array( 'conId' => $row['contentId'], 'cateId' => $row['categoryId'], 'title' => $row['title'],
                       'mainT' => $row['mainText'], 'video'=> $row['video'], 'img' => $row['img'],
                        'threeD' => $row['threeD'], 'addId' => $row['addPersonId'], 'addedDate' => $row['addedDate']);
}

include 'articles.html.php';