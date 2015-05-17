<?php 
require_once('./inc.php');
?>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="display:none;">
  Launch
</button>
<div class="modal fade" id="myModal">
  <div class="modal-dialog" style="magin-top:150px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">关于最美创意 网页版</h4>
      </div>
      <div class="modal-body">
        <p> 最美创意是一款以创意广告、游戏CG、创意短片为主的内容聚合型应用.</p>
        <p> 而最美创意网页版是以最美创意app的数据制作的适合pc浏览的网站.</p>
        <p> 有问题请在<a href="about.php">关于</a>页面留言反馈.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
        <!-- 标题 -->
    <div class="navbar-header">
      <!-- <img src="img/ico2.png" alt="" width="320px" height="50px"> -->
      <a class="navbar-brand" href="http://zmcy.yangzhongchao.com">最美创意</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li class="active"><a href="./">首页</a></li>
        <li><a href="album.php">专辑</a></li>
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
      <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="热词、分类、关键字" name="condition">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <li><a href="about.php">关于</a></li>
      </ul>
    </div><!-- /.navbar-collapse
  </div><! /.container-fluid -->
</nav>
<!-- 幻灯片 -->
<?php 
     @ $page = $_GET['page'];
     echo '<div class="container">';
     if ($page > 1) {
        echo '<div class="alert alert-success">';
        echo '<h4 class="text-center" style="margin-bottom: 0px;">';
        echo '当前在第 ' . $page . ' 页</h4></div>';
        echo '<div id="myCarousel" class="carousel slide" style="display:none;">';
     } else {
     echo '<div id="myCarousel" class="carousel slide">';
     }
?>
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>
  <!-- 幻灯片内容 -->
  <div class="carousel-inner">
   <?php 
     $url = 'http://115.28.54.40:8080/beautyideaInterface/api/v1/album/getAlbumRecommendResources?imieId=8188F0E88298ED8DDAB8AA4C94DD7F8F';
     $obj = getdata($url);
    for ($i=0; $i <5 ; $i++) {
       @ $objs = $obj[album][$i][resourceses][0];
       @ $rsid = $objs[rsId];
       @ $title = $objs[title];
       @ $thumbnail = $objs[thumbnail];
       if ($i == 0) {
         echo '<div class="item active">';
       } else {
         echo '<div class="item">';
       }
       echo '<a target="_blank\" href=./play.php?rsid=' . $rsid . '"><img src="' . eximg($thumbnail) . '"></a>';
       echo '<h6>' . $title . '</h6>';
       echo '</div>';   
} 
 ?>
</div>
  <!-- 幻灯片按钮 -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
</div>

<!-- 内容 -->
<div class="row">

<?php
     @ $page = $_GET['page'];
    if (empty($page)) {
         $page = 0;
       } else{
        $page = $page -1;
      }
     $host = 'http://115.28.54.40:8080/beautyideaInterface/api/v1/resources/getResources?&imieId=8188F0E88298ED8DDAB8AA4C94DD7F8F';               //服务器
     $pageno = '&pageNo=' . $page*10;
     $url = $host.$pageno;
     $obj = getdata($url);
     @ $arrlen = count($obj[resources]);
     for ($i=0; $i <$arrlen; $i++) {
       @ $objs = $obj[resources][$i];
       @ $rsid = $objs[rsId];
       @ $view = $objs[viewCount];
       @ $comment = $objs[commentcount];
       @ $duration = $objs[duration];
       @ $title = $objs[title];
       @ $modulesid = $objs[modules][modulesId];
       @ $thumbnail = $objs[thumbnail];
       echo '<div class="col-xs-6">';
       echo '<a target="_blank" href="./play.php?rsid=' . $rsid . '"><img src="' . eximg($thumbnail) . '"></a>';
       echo '<div class="info">';
       echo '<span class="glyphicon glyphicon glyphicon glyphicon-th"><h6>' . $class[$modulesid] . '</h6></span>';
       echo '<span class="glyphicon glyphicon glyphicon-play" ><h6>' . $view . '</h6></span>';
       echo '<span class="glyphicon glyphicon glyphicon-film"><h6>' . _t($duration) . '</h6></span>';
       echo '<h6>' . $title . '</h6>';
       echo '</div>';
       echo '</div>';
   }
 ?>
</div>
<!-- 翻页 -->
 <nav>
  <ul class="pager">
    <?php 
     if ($page < 1) {
       echo '<li class="previous disabled">';
     } else {
      // $page = $page-1;
       echo '<li class="previous"><a href="./index.php?page=' . $page . '\"><span aria-hidden="true">&larr;</span>上一页';
     }?>
    </a></li>
    <?php 
      $page = $page+2;
      if ($arrlen < 10) {
         echo '<li class="next disabled">';
      } else echo '<li class="next"><a href="./index.php?page=' . $page . '">下一页';
     ?>
   <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>
</div>
<?php require_once('inc/footer.php'); ?>