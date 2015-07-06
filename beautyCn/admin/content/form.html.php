<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 28/6/15
 * Time: 10:02 AM
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php'; ?>

<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <title><?php htmlout($pageTitle); ?></title>
    </head>
    <body>
        <h1><?php htmlout($pageTitle); ?></h1>
        <form action="?<?php htmlout($action); ?>" method="post" enctype="multipart/form-data">

            <div>
                <label for="title">输入标题：
                    <input type="text" name="title" id="title" value="<?php htmlout($title); ?>">
                </label>
            </div>
            <div>
                <label>输入内容</label>
                <textarea id="text" name="text" rows="3" cols="120"><?php htmlout($text); ?></textarea>
            </div>

            <div>
                <label for="account">选择发布者：</label>
                <select name="account" id="account">
                    <option value="">Select one</option>
                    <?php foreach( $accounts as $account): ?>
                        <option value="<?php htmlout($account['id']); ?>"
                            <?php
                                if($account['id'] == $usrId)
                                {
                                    echo ' selected';
                                }
                            ?>>
                            <?php htmlout($account['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="category">选择分类：</label>
                <select name="category" id="category">
                    <option value="">select one</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php htmlout($category['id']); ?>">
                            <?php
                                if($category['id'] == $categoryId)
                                {
                                    echo ' selected';
                                }
                            ?>
                            <?php htmlout($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>



            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <label for="image">上传图片：</label>
                <input type="file" name="files[]" id="image" value="image" size="30" />
            </div>
            <div>
                <label for="video">上传视频文件：</label>
                <input type="file" name="files[]" id="video" value="video" size="30" />
            </div>

            <div>
                <label for="3d">上传三维建筑文件：</label>
                <input type="file" name="files[]" id="3d" value="3d" size="30" />
            </div>

            <div>
                <input type="hidden" name="id" value="<?php htmlout($id); ?>">
                <input type="submit" value="<?php htmlout($button); ?>">
            </div>
        </form>
    </body>
</html>
