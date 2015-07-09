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
        <link href="../../css/bootstrap.css" rel="stylesheet">
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

        <div class="col-md-6">
            <table class="table table-bordered">
                <tbody>
                <tr class="info">
                    <th>#</th>
                    <th>账户名</th>
                    <th>
                        <a class="btn btn-success" href="..">返回</a>
                        <a class="btn btn-danger" href="?add">添加新用户</a>
                    </th>
                </tr>
                <?php $i = 1;?>
                <?php foreach($usrs as $usr): ?>
                    <tr>
                        <th><?php echo $i++; ?></th>
                        <td><?php htmlout($usr['usrname']); ?></td>
                        <td>
                            <form action="" method="post">
                                <div>
                                    <input type="hidden" name="id" value="<?php echo $usr['usrId']; ?>">
                                    <input type="submit" name="action" value="Edit">
                                    <input type="submit" name="action" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
        <?php include '../logout.inc.html.php';?>
    </body>

</html>

