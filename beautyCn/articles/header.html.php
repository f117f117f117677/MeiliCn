<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title><?php echo $article['title']; ?></title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/meili.css" rel="stylesheet">
        <link href="../css/yqintro.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <header>
            <div class="container">
                <div class="row">
                    <nav id="hnav" class="navbar navbar-default navbar-static-top" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation </span>
                                <span> </span>
                                <span> </span>
                                <span> </span>
                            </button>

                            <a class="" href="#">
                                <img src="images/icon/logo.png">
                            </a>
                        </div><!---->
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form><!---->
                        <div id="navbar" class="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.html"><strong>HOME</strong>首页</a></li>
                                <li><a href="yqintro.html"><strong>ABOUT</strong>走进园区</a></li>
                                <li><a href="trends.html"><strong>NEWS</strong>资讯</a></li>
                                <li><a href="case.html"><strong>SERVICES</strong>服务</a></li>
                                <li><a href="contact.html"><strong>CONTACT</strong>联系我们</a></li>
                            </ul>
                        </div><!---->

                    </nav>
                </div>
            </div>
        </header>

        <section class="container top_picture">
            <div class="row">
                <img src="images/carousel/detail_top.jpg">
            </div>
        </section>