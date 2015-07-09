<?php include 'header.html.php'; ?>
<div class="container">
    <article id="content" class="col-lg-9">
        <header>
            <h2><?php echo $article['title'];?></h2>
            <p><?php echo $article['addedDate'];?></p>
        </header>

        <ol>
            <li><?php echo $article['mainText']; ?></li>
            <li></li>
        </ol>

        <div class="three">
            <img src="<?php echo $article['img']?>">
        </div>

        <div>
            <video width="640" height="320" controls preload="auto">
                <!--Chrome$ safari-->
                <source src="<?php echo $article['video'] ;?>" type="video/mp4"/>
                <!--Firefox-->
                <source src="<?php echo $article['video'] ;?>" type="video/egg"/>
                <!--flash-->
                <embed src="<?php echo $article['video'] ;?>" type="application/x-shockwave-flash" width="1024" height="798"
                       allowscriptaccess="always" allowfullscreen="true"></embed>
            </video>
        </div>

        <div>
            <embed allownetworking="none" allowscriptaccess="never" width="960" height="182" loop="false"
                   menu="false" play="true" pluginspage="http://www.macromedia.com/go/getflashplayer"
                   src="<?php echo $article['video'] ;?>" type="application/x-shockwave-flash"wmode="window"></embed>
        </div>

        <div>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="960" height="182" title="flash">
                <param name="movie" value="images/BANNER.swf" />
                <param name="quality" value="high" />
                <embed src="<?php echo $article['video'] ;?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="960" height="182"></embed>
            </object>
        </div>

        <span id="threeD" title="<?php echo $article['threeD']; ?>"></span>

        <div id="unityPlayer">
            <div>
                <a href="http://unity3d.com/webplayer/" title="请下载三维场景播放器">
                    <img alt="安装三维场景播放器！" src="http://webplayer.unity3d.com/installation/getunity.png"
                         width="193" height="63" />
                </a>
            </div>
        </div>

    </article>

    <aside id="jinxuan" class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-title">
                <button href="#" class="btn btn-block btn-success"><span class="pull-left">经典案例</span><span class="glyphicon glyphicon-plus pull-right"></span></button>
            </div>

            <div class="panel-body">
                <ul>
                    <li><p><a href="xihushan.html">西湖山水度假整体设计</a></p></li>
                    <li><p><a href="tianTongShan.html">天铜山温泉</a></p></li>
                    <li><p><a href="zhinengjiaju.html">智能家庭影院</a></p></li>
                    <li><p><a href="control4.html">智能光照系统设计</a></p></li>
                </ul>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-title">
                <button href="#" class="btn btn-block btn-success"><span class="pull-left">入驻企业</span><span class="glyphicon glyphicon-plus pull-right"></span></button>
            </div>
            <div class="panel-body">
                <ul>
                    <li><p><a href="chuangYe.html">同济大学创业谷三位一体</a></p></li>
                    <li><p><a href="ruiMei.html">锐美集思的空间美学</a></p></li>
                    <li><p><a href="chengzhong.html">城中建筑设计的想象力</a></p></li>
                    <li><p><a href="yilianyitong.html">易通易联智能生活</a></p></li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-title">
                <button href="#" class="btn btn-block btn-success"><span class="pull-left">设计展示</span><span class="glyphicon glyphicon-plus pull-right"></span></button>
            </div>
            <div class="panel-body side-pic">
                <img src="images/details/side1.jpg">
            </div>
        </div>

    </aside>
</div>

<?php include 'footer.html.php'; ?>