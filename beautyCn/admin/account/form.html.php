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
                <label for="name">用户名：
                    <input type="text" name="name" id="name" value="<?php htmlout($name); ?>">
                </label>
                <label for="email">邮箱：
                    <input type="text" name="email" id="email" value="<?php htmlout($email); ?>">
                </label>
                <div>
                    <label for="password">设置您的密码: <input type="password" name="password" id="password"></label>
                </div>
                <fieldset>
                    <legend>选择你的用户角色和权限：</legend>
                    <?php for ($i = 0; $i < count($roles); $i++): ?>
                        <div>
                            <label for="role<?php echo $i; ?>">
                                <input type="checkbox" name="roles[]" id="role<?php echo $i; ?>" value="<?php htmlout($roles[$i]['id']); ?>"
                                    <?php
                                        if($roles[$i]['selected'])
                                        {
                                            echo ' checked';
                                        }
                                    ?>
                                    >
                                <?php htmlout($roles[$i]['id']); ?>
                            </label>:
                            <?php htmlout($roles[$i]['description']); ?>
                        </div>
                    <?php endfor; ?>
                </fieldset>
                <div>
                    <input type="hidden" name="id" value="<?php htmlout($id); ?>">
                    <input type="submit" value="<?php htmlout($button); ?>">
                </div>
            </div>
        </form>
        <?php include '../logout.inc.html.php';?>

    </body>
</html>
