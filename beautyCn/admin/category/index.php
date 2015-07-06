<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 27/6/15
 * Time: 2:31 PM
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';

if(!userIsLoggedIn())
{
    include '../login.html.php';
    exit();
}

if(!userHasRole('Site Administrator'))
{
    $error = '对不起，只有栏目分类管理员才能浏览此页面。';
    include '../accessdenied.html.php';
    exit();
}

if(isset($_GET['add']))
{
    $pageTitle = '添加分类';
    $action = 'addform';
    $name = '';
    $id = '';
    $pId = '';
    $button = 'Add category';

    include "form.html.php";
    exit();
}

if(isset($_GET['addform']))
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
    try
    {
        $sql = 'INSERT INTO category SET name = :name, pId = :pId ';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':pId', $_POST['pId']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error add category. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

if(isset($_POST['action']) and $_POST['action'] == 'Delete')
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

    try
    {
        $sql = 'DELETE FROM category WHERE categoryId = :id ';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id',$_POST['id']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error delete category. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }
}

if( isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

    try
    {
        $sql = 'select * from category where categoryId = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id',$_POST['id']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error fetching category details. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }

    $row = $s->fetch();

    $pageTitle = '编辑分类';
    $action = 'editform';
    $name = $row['name'];
    $id = $row['categoryId'];
    $pId = $row['pId'];
    $button = 'Edit category';

    include "form.html.php";
    exit();

}

if(isset($_GET['editform']))
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
    try
    {
        $sql = 'update category set name = :name, pId = :pId where categoryId = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':pId', $_POST['pId']);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error updating submitted category details. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

//Display the category list
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

try
{
    $result = $pdo->query('select * from category');
}
catch (PDOException $e)
{
    $error = 'Error fetching categories from database! '. $e->getMessage();
    include_once 'error.html.php';
    exit();
}

foreach($result as $row)
{
    $cates[] = array( 'id' => $row['categoryId'], 'name' => $row['name'], 'pId'=> $row['pId']);
}

include 'categories.html.php';

