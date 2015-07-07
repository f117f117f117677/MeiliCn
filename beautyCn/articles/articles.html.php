<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/6
 * Time: 15:15
 */
?>

<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <title>显示所有内容</title>
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ContentId</th>
                <th>CategoryId</th>
                <th>Title</th>
                <th>Maintext</th>
                <th>Image</th>
                <th>Video</th>
                <th>3D</th>
                <th>Author</th>
                <th>Date</th>
                <th>Oper</th>
            </tr>
                <?php foreach($articles as $article):?>
                    <tr>
                        <td><?php echo $article['conId'] ?></td>
                        <td><?php echo $article['cateId'] ?></td>
                        <td><?php echo $article['title'] ?></td>
                        <td><?php echo $article['mainT'] ?></td>
                        <td><?php echo $article['video'] ?></td>
                        <td><?php echo $article['img'] ?></td>
                        <td><?php echo $article['threeD'] ?></td>
                        <td><?php echo $article['addId'] ?></td>
                        <td><?php echo $article['addedDate'] ?></td>
                        <td><a href="?conId=<?php echo $article['conId']; ?>" class="btn-success">View</a></td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>
