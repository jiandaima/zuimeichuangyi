<?php 
require_once('inc.php');
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
        <!-- 标题 -->
    <div class="navbar-header">
      <!-- <img src="img/ico2.png" alt="" width="320px" height="50px"> -->
      <a class="navbar-brand" href="#">最美创意</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">首页</a></li>
        <li><a href="album.php">专辑</a></li>
        <li><a href="modules.php">分类</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="输入热词、分类、关键字">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <li class="active"><a href="about.php">关于</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container center">
  <hr>
  <h6>说点什么呢，我只是想练练手而已</h6>
  <h6>如果有什么问题</h6>
  <h6>证明网站还没有做完</h6>
  <h6>我也没办法，一直是我一个人哦</h6>
  <h6>如果你喜欢，请支持app哦</h6>
  <h6><img src="img/erwei.png" alt=""></h6>
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
