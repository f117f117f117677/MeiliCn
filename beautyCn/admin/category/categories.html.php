<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 18/6/15
 * Time: 2:46 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/helpers.inc.php'; ?>

<html lang="zh-cn" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <title> 分类管理 </title>
    </head>
    <body>
        <h1>分类管理</h1>
        <p><a href="?add">添加新分类</a></p>
        <ul>
            <?php foreach($cates as $category): ?>
            <li>
                <form action="" method="post">
                    <div>
                        <label>ID: </label><?php htmlout($category['id']); ?>&nbsp;&nbsp;&nbsp;
                        <label>Name: </label><?php htmlout($category['name']); ?>&nbsp;&nbsp;&nbsp;
                        <label>ParentID: </label><?php htmlout($category['pId']); ?></br>


                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
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

