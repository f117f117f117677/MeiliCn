<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/30
 * Time: 15:41
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php';
?>

<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <title>登录页</title>
    </head>
    <body>
        <h1>登录页</h1>
        <p>访问此页面，请先登录您的账户！</p>

        <?php if(isset($loginError)): ?>
            <P style="color: #ff2700"><?php htmlout($loginError); ?></P>
        <?php endif; ?>

        <form action="" method="post">
            <div>
                <label for="email">邮箱/Email: <input type="text" name="email" id="email"></label>
            </div>
            <div>
                <label for="password">密码/Password: <input type="password" name="password" id="password"></label>
            </div>
            <div>
                <input type="hidden" name="action" value="login">
                <input type="submit" value="登录/Login">
            </div>
        </form>
        <p><a href="/admin/">返回</a></p>
    </body>
</html>