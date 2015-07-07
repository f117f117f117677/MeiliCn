<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 28/6/15
 * Time: 8:40 AM
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/helpers.inc.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>管理内容</title>
    </head>
    <body>
        <h1>管理内容</h1>
        <p><a href="?add">发布新的内容</a></p>
        <form action="" method="get">
            <p>按照不同的条件检索内容：</p>
            <div>
                <label>按发布者检索：</label>
                <select name="account" id="account">
                    <option value="">任意发布者</option>
                    <?php foreach($accounts as $account ): ?>
                        <option value="<?php htmlout($account['id']); ?>"><?php htmlout($account['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>按内容所属的分类检索：</label>
                <select>
                    <option>任意分类</option>
                    <?php foreach( $categories as $category ): ?>
                        <option value="<?php htmlout($category['id']); ?>"><?php htmlout($category['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="text">按内容包含的关键字检索：</label>
                <input type="text" name="text" id="text">
            </div>
            <div>
                <input type="hidden" name="action" value="search">
                <input type="submit" value="search">
            </div>
        </form>
        <p><a href="..">返回</a></p>
        <?php include '../logout.inc.html.php';?>
    </body>
</html>