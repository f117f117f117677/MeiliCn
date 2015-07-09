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
        <link href="../../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>

        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">访问此页面，请先登录您的账户！</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3">邮箱/Email: </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-md-3">密码/Password: </label>
                            <div class="col-md-4">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-4">
                                <input type="hidden" name="action" value="login">
                                <input type="submit" value="登录/Login">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <?php if(isset($loginError)): ?>
                        <P style="color: #ff2700"><?php htmlout($loginError); ?></P>
                    <?php endif; ?>
                    <p><a href="/admin/">返回</a></p>
                </div>
            </div>
        </div>





    </body>
</html>