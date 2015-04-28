<?php 
require_once('./inc.php');
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
        <li class="active"><a href="./">首页</a></li>
        <li><a href="album.php">专辑</a></li>
        <li><a href="modules.php">分类</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="输入热词、分类、关键字" name="condition">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <li><a href="about.php">关于</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- 内容 -->
<?php 
      @ $page = $_GET['page'];
      // echo "hd".$page;
      $name = 'allr';
      echodata($name,$page);
 ?>
<div class="row">
<?php
     $name = 'all';
     @ $page = $_GET['page'];
     if (empty($page)) {
        $page = 1;
     }
     // @ $page = $_GET['page']|1;
     // echo "get".$page;
     $url = geturl($name,$page);
     // echo $url;
     $obj = getdata($url);
     // echo $data;
     // $obj = json_decode($data);
     // print_r($obj);
     // $obj = object_array($obj);
     // print_r($obj[resources][$i]);
     $thumbnail = "http://202.10.79.118:8080/DTAppInterface/upload_files/video_thumb/";
     for ($i=0; $i <10 ; $i++) {
       @ $objs = $obj[resources][$i];
       @ $rsid = $objs[rsId];
       @ $view = $objs[viewCount];
       @ $comment = $objs[commentcount];
       @ $duration = $objs[duration];
       @ $title = $objs[title];
       echo "<div class=\"col-md-6\">";
       echo "<a target=\"_blank\" href=\""."./play.php?rsid=".$rsid."\"><img src=\"".$thumbnail.$rsid.".jpg\"></a>";
       echo "<div class=\"info\">";
       echo "<span class=\"glyphicon glyphicon glyphicon-play\" ><h6>".$view."</h6></span>";
       echo "<span class=\"glyphicon glyphicon glyphicon-comment\"><h6>".$comment."</h6></span>";
       echo "<span class=\"glyphicon glyphicon glyphicon-film\"><h6>"._t($duration)."</h6></span>";
       echo "<h6>".$title."</h6>";
       echo "</div>";
       echo "</div>";
   }
 ?>
</div>
<!-- 翻页 -->
 <nav>
  <ul class="pager">
    <?php 
     if ($page <= 1) {
       echo "<li class=\"previous disabled\"><a href=\"#\">";
     } else {
      // $page = $page-1;
       echo "<li class=\"previous\"><a href=\"./index.php?page=".$page."\">";
     }
     
     ?>
    <!-- <li class="previous disabled"><a href="#"> -->
    <span aria-hidden="true">&larr;</span>上一页</a></li>
    <?php 
      $page = $page+1;
      echo "<li class=\"next\"><a href=./index.php?page=".$page.">";
     ?>
    下一页 <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>
</div>
<?php require_once('inc/footer.php'); ?>