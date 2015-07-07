<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 18/6/15
 * Time: 2:46 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/helpers.inc.php'; ?>

<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <title> 用户管理 </title>
    </head>
    <body>
        <h1>用户管理</h1>
        <p><a href="?add">添加新用户</a></p>
        <ul>
            <?php foreach($usrs as $usr): ?>
            <li>
                <form action="" method="post">
                    <div>
                        <?php htmlout($usr['usrname']); ?>
                        <input type="hidden" name="id" value="<?php echo $usr['usrId']; ?>">
                        <input type="submit" name="action" value="Edit">
                        <input type="submit" name="action" value="Delete">
                    </div>
                </form>
            </li>
            <?php endforeach; ?>
        </ul>
        <p><a href="..">返回</a></p>
        <?php include '../logout.inc.html.php';?>
    </body>

</html>

