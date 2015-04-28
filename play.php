<?php 
require_once('inc/header.php');
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
        <li><a href="./">首页</a></li>
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
      <li><a href="about.php">关于</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container" style="width:1170px;">
<embed
<?php 

$rsid = $_GET['rsid'];
echo "src=\"http://player.youku.com/player.php/sid/".$rsid."/v.swf\"";
 ?>
play="true"
allowFullScreen="true" 
quality="high" 
width="1140"
height="640" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"
flashvars="isShowRelatedVideo=false&showAd=0&isAutoPlay=true&isDebug=false&UserID=&winType=interior&playMovie=true&MMControl=false&MMout=false"
</embed>




