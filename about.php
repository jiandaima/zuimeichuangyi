<?php 
require_once('inc.php');
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
        <!-- 标题 -->
    <div class="navbar-header">
      <!-- <img src="img/ico2.png" alt="" width="320px" height="50px"> -->
      <a class="navbar-brand" href="http://zmcy.yangzhongchao.com">最美创意</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./">首页</a></li>
        <li><a href="album.php">专辑</a></li>
        <!-- <li><a href="modules.php">分类</a></li> -->
        <li class="dropdown">
        <a id="drop1" class="dropdown-toggle" aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" href="#">分类
        <span class="caret"></span>
        </a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
           <li><a href="modules.php?modulesname=游戏/动漫">游戏/动漫</a></li>
           <li><a href="modules.php?modulesname=旅游/指南">旅游/指南</a></li>
           <li><a href="modules.php?modulesname=运动/极限">运动/极限</a></li>
           <li><a href="modules.php?modulesname=汽车/安全">汽车/安全</a></li>
           <li><a href="modules.php?modulesname=奇趣/科技">奇趣/科技</a></li>
           <li><a href="modules.php?modulesname=科技/产品">科技/产品</a></li>
           <li><a href="modules.php?modulesname=时尚/经典">时尚/经典</a></li>
           <li><a href="modules.php?modulesname=亲子/情感">亲子/情感</a></li>
           <li><a href="modules.php?modulesname=读书/教育">读书/教育</a></li>
           <li><a href="modules.php?modulesname=生活/烦恼">生活/烦恼</a></li>
           <li><a href="modules.php?modulesname=公益/社会">公益/社会</a></li>
           <li><a href="modules.php?modulesname=公益/设计">公益/设计</a></li>
          </ul>
         </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="热词、分类、关键字" name="condition">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <li class="active"><a href="about.php">关于</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container left">
  <h3>欢迎留言</h3>
  <hr>
  <h5>-------2015-05-12------</h5>
  <h5>说点什么呢，今天网站算是完成了,如果有什么问题，请在这里留言</h5></h5>
  <h5>算是自己独立完成的第一个网站<a href="https://github.com/yangzhongchao1011/zuimeichuangyi">源码</a>。当然，难免有些bug和不足</h5>
  <h5>这里的数据来自移动端app《最美创意》,如果你喜欢，请支持app哦</h5>
  <h5>(貌似下面的多说评论框老是刷新不出)</h5>
  <h5>-------2015-10-20------</h5>
  <h5>偶然发现这么多人关注,比博客浏览量都高...</h5>
  <h5>app的图片链接变了，一直很忙没改，今天再抓一下数据，改了一下</h5>
  <h5>打算重新用php框架写一下，看着之前的代码真没脸见人</h5>

  <h5>欢迎来我的博客<a href="http://www.yangzhongchao.com">草原</a></h5>
  <h5><img src="img/erwei.png" alt="扫一下！！"></h5>
  <hr>
    <div class="ds-thread" data-thread-key="1" data-title="about" data-url="zmcy.yangzhongchao.com"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"zmcy"};
  (function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] 
     || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
  </script>
<!-- 多说公共JS代码 end -->
</div>
<?php require_once('inc/footer.php'); ?>