<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 16/6/15
 * Time: 3:39 PM
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

if(isset($_GET['add']))
{
    $pageTitle = '添加新内容';
    $action = 'addform';
    $text = '';
    $usrId = '';
    $categoryId = '';
    $id = '';
    $title = '';
    $button = '添加新内容/Add content';

    include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

    try
    {
        $result = $pdo->query('select usrId, usrname from account');
    }
    catch (PDOException $e)
    {
        $error = 'Error fetching accounts form database. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }

    foreach($result as $row)
    {
        $accounts[]   = array('id' => $row['usrId'], 'name' => $row['usrname']);
    }

//build the list of categories
    try
    {
        $result = $pdo->query('select categoryId, name from category');
    }
    catch (PDOException $e)
    {
        $error = 'Error fetching category from database. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }

    foreach($result as $row)
    {
        $categories[] = array('id' => $row['categoryId'], 'name' => $row['name'], 'selected' => FALSE);
    }

    include 'form.html.php';
    exit();
}

if(isset($_GET['addform']))
{
    include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/appConfig.inc.php';


    /*
    if($_POST['account'] == '')
    {
        $error = 'You must choose a user for this content. Click &lsquo;back&rsquo; and try again.';
        include 'error.html.php';
        exit();
    }*/


    //different directory
    $file_dir = array(0 => '/profile_images/',
                      1 => '/profile_videos/',
                      2 => '/profile_3d/');

    //error of upload
    $php_errors = array( 1 => '超过了php.ini中最大文件限制',
                         2 => '超过html表单中最大文件限制',
                         3 => '只上传了部分文件',
                         4 => '没有选择上传文件' );

    //directory of three files
    $upload_filename = array();

    for($i = 0; $i < count( $_FILES['files']['name'] ); $i++ )
    {
        $upload_dir = HOST_WWW_ROOT . '/uploads' . $file_dir[$i];
        //
        if($_FILES['files']['error'][$i] != 0)
        {
            $error = $php_errors[$_FILES['files']['error'][$i]];
            include 'error.html.php';
            exit();
        }

        //check name of iamge
        if(!is_uploaded_file($_FILES['files']['tmp_name'][$i]))
        {
            $error = 'upload request: file named'."{$_FILES['files']['tmp_name'][$i]}";
            include 'error.html.php';
            exit();
        }

        //check whether a image
        if(!getimagesize($_FILES['files']['tmp_name'][$i]))
        {
            $error = 'your selection is not a image'."{$_FILES['files']['tmp_name'][$i]}"."不是有效图片";
            include 'error.html.php';
            exit();
        }

        //name the image
        $now = time();
        while(file_exists($upload_filename[$i] = $upload_dir . $now . '-' .$_FILES['files']['name'][$i] ))
        {
            $now++;
        }

        //move the image
        if(!move_uploaded_file($_FILES['files']['tmp_name'][$i], $upload_filename[$i]))
        {
            $error = 'we had a problem saving your image to its pernament location'."{$upload_filename[$i]}";
            include 'error.html.php';
            exit();
        }
    }



    /*
    //put a content into database.
    try
    {

        $sql = 'INSERT INTO content SET
            categoryId = :categoryId,
            title = :title,
            mainText = :mainText,
            video = :video,
            img = :img,
            threeD = :threeD,
            addedDate = CURDATE(),
            addPersonId = :usrId
            ';

        $s = $pdo->prepare($sql);
        $s->bindValue(':categoryId', $_POST['category']);
        $s->bindValue(':title', $_POST['title']);
        $s->bindValue(':mainText', $_POST['text']);
        $s->bindValue(':video', null);
        $s->bindValue(':img', $upload_filename[]);
        $s->bindValue(':threeD', null);
        $s->bindValue(':usrId',$_POST['account']);
        $s->execute();

    }
    catch(PDOException $e)
    {
        $error = 'Error inserting content into database. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }*/
}


// Display search form
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

try
{
    $result = $pdo->query('select usrId, usrname from account');
}
catch (PDOException $e)
{
    $error = 'Error fetching accounts form database. '. $e->getMessage();
    include_once 'error.html.php';
    exit();
}

foreach($result as $row)
{
    $accounts[]   = array('id' => $row['usrId'], 'name' => $row['usrname']);
}

//build the list of categories
try
{
    $result = $pdo->query('select categoryId, name from category');
}
catch (PDOException $e)
{
    $error = 'Error fetching category from database. '. $e->getMessage();
    include_once 'error.html.php';
    exit();
}

foreach($result as $row)
{
    $categories[] = array('id' => $row['categoryId'], 'name' => $row['name'], );
}

include 'searchform.html.php';