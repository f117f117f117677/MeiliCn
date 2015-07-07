<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 19/6/15
 * Time: 11:37 AM
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php';
?>

<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="UTF-8">
        <title><?php htmlout($pageTitle); ?></title>
    </head>
    <body>
        <h1><?php htmlout($pageTitle); ?></h1>
        <form action="?<?php htmlout($action); ?>" method="post">
            <div>
                <label for="name">分类名：
                    <input type="text" name="name" id="name" value="<?php htmlout($name); ?>">
                </label>
                <label for="pId">父分类ID：
                    <input type="text" name="pId" id="pId" value="<?php htmlout($pId); ?>">
                </label>
                <div>
                    <input type="hidden" name="id" value="<?php htmlout($id); ?>">
                    <input type="submit" value="<?php htmlout($button); ?>">
                </div>
            </div>
        </form>
        <?php include '../logout.inc.html.php';?>
    </body>
</html>
