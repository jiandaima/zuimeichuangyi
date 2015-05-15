<?php
error_reporting(E_ALL & ~E_NOTICE); 
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
        <!-- <li class="active"><a href="modules.php">分类</a></li> -->
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
    </div>
  </div><!-- /.container-fluid -->
</nav>

<!-- 内容 -->
<div class="container">
<div class="alert alert-success">
<h4 class="text-center" style="margin-bottom: 0px;">当前分类是:
<?php 
    $modulesname = $_GET['modulesname'];
    $page = $_GET['page'];
    echo $modulesname;
    if ($page > 1) {
    echo ' 第' . $page . '页</h4>';
    }
?>
</div>
<div class="row">
<?php 
     $mouid = getkey($class,$modulesname);
     if (empty($page)) {
        $page = 0;
     } else{
      $page = $page -1;
     }
     $pageno = $page*10;
     $host = 'http://115.28.54.40:8080/beautyideaInterface/api/v1/resources/getResourcesByModulesId?&imieId=8188F0E88298ED8DDAB8AA4C94DD7F8F';
     $url = $host . '&pageNo=' . $pageno . '&modulesId=' . $mouid;
     $obj = getdata($url);
     $resources = $obj[resources];
     $arrlen = count($resources);
     for ($i=0; $i <$arrlen; $i++) {
       $objs = $resources[$i];
       $rsid = $objs[rsId];
       $view = $objs[viewCount];
       $comment = $objs[commentcount];
       $duration = $objs[duration];
       $title = $objs[title];
       $modulesid = $objs[modules][modulesId];
       $thumbnail = $objs[thumbnail];
       $modulesname = $class[$modulesid];
       echo '<div class="col-xs-6">';
       echo '<a target="_blank" href="./play.php?rsid=' . $rsid . '"><img src="' . eximg($thumbnail) . '"></a>';
       echo '<div class="info">';
       echo '<span class="glyphicon glyphicon glyphicon glyphicon-th"><h6>' . $modulesname . '</h6></span>';
       echo '<span class="glyphicon glyphicon glyphicon-play" ><h6>' . $view . '</h6></span>';
       echo '<span class="glyphicon glyphicon glyphicon-film"><h6>' . _t($duration) . '</h6></span>';
       echo '<h6>' . $title . '</h6>';
       echo '</div>';
       echo '</div>';
   }
?>

</div>

 <nav>
  <ul class="pager">
<?php 
     if ($page < 1) {
       echo '<li class="previous disabled">';
     } else {
       echo '<li class="previous"><a href="./modules.php?modulesname=' . $modulesname . '&page=' . $page . '><span aria-hidden="true">&larr;</span>上一页';
     }
?>
    </a></li>
<?php 
      $pagen = $page+2;
      if ($arrlen < 10) {
      echo '<li class="next disabled">';
    } else echo '<li class="next"><a href=./modules.php?modulesname=' . $modulesname . '&page=' . $pagen . '>下一页<span aria-hidden="true">&rarr;';
?>
     </span></a></li>
  </ul>
</nav>
</div>
<!-- 脚部 -->
<?php require_once('inc/footer.php'); ?>
