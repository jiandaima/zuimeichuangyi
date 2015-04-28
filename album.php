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
        <li class="active"><a href="album.php">专辑</a></li>
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
<!-- 幻灯片 -->
<?php
   @ $page = $_GET['page'];
   // echo "hd".$page;
   @ $name = 'albumr';
    echo "<div class=\"container\">";
  if ($page > 1) {
     echo "<div id=\"myCarousel\" class=\"carousel slide\" style:\"display:none;\">";     
  } else {
  echo "<div id=\"myCarousel\" class=\"carousel slide\">";
  }
 ?>
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>
  <!-- 内容 -->
  <div class="carousel-inner">
   <?php 
     // $name = 'allr';
     $url = geturl($name,$page);
     // echo $url;
     $obj = getdata($url);
     // echo $data;
     // $obj = json_decode($data);
     // // print_r($obj);
     // $obj = object_array($obj);
     // print_r($obj[album][0][resourceses]);
     // print_r($obj[album][0]);
     $thumbnail = "http://202.10.79.118:8080/DTAppInterface/upload_files/video_thumb/";
     // http://202.10.79.118:8080/DTAppInterface/upload_files/video_thumb/XNzYzNzQxODA0.jpg
    for ($i=0; $i <5 ; $i++) {
       @ $objs = $obj[album][$i];
       @ $rsid = $objs[resourceses][0][rsId];
       @ $title = $objs[resourceses][0][title];
       if ($i == 0) {
         echo "<div class=\"item active\">";
       } else {
         echo "<div class=\"item\">";
       }
       echo "<a target=\"_blank\" href=\""."./play.php?rsid=".$rsid."\"><img src=\"".$thumbnail.$rsid.".jpg\"></a>";
       echo "<h6>".$title."</h6>";
       echo "</div>";    
   }
  ?>
  </div>
  <!-- 幻灯片按钮 -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
</div>

<!-- 专辑 -->
<?php 
     $name = 'album';
     @ $page = $_GET['page'];
     if (empty($page)) {
        $page = 0;
     } else{
      $page = $page -1;
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
     @ $arralbum = $obj[album];
     @ $arrlen = count($arralbum);
     @ $thumbnail = "http://202.10.79.118:8080/DTAppInterface/upload_files/video_thumb/";
  for ($i=0; $i <$arrlen; $i++) {
     @ $objs = $obj[album][$i];
     // print_r($objs);
     @ $resourceses = $objs[resourceses];
     // print_r($resourceses);
     @ $albumname = $objs[albumName];
    // echo "name".$albumname;
      echo "<div class=\"panel panel-default\">";
      echo "<div class=\"panel-heading\">";
      echo "<h3 class=\"panel-title\">".$albumname."</h3>";
      echo "</div>";
      echo "<div class=\"panel-body\">";
      echo "<div class=\"row\">";
    for ($b=0; $b <3 ; $b++) { 
      // @ $resourceses = $objs[resourceses][$i][$b][resourceses];
      @ $rsid = $resourceses[$b][rsId];
      @ $duration = $resourceses[$b][duration];
      @ $viewcount = $resourceses[$b][viewCount];
      @ $commentcount = $resourceses[$b][commentcount];
      @ $title =  $resourceses[$b][title];

      // echo $rsid;
      // echo $duration;
      // echo $viewcount;
      // echo $commentcount;
      // echo 
      echo "<div class=\"col-md-4\">";
      echo "<a target=\"_blank\" href=\"./play.php?rsid=".$rsid."\"><img src=\"".$thumbnail.$rsid.".jpg\"></a>";
      echo "<div class=\"info\">";
      echo "<span class=\"glyphicon glyphicon glyphicon-play\" ><h6>".$viewcount."</h6></span>";
      echo "<span class=\"glyphicon glyphicon glyphicon-comment\"><h6>".$commentcount."</h6></span>";
      echo "<span class=\"glyphicon glyphicon glyphicon-film\"><h6></h6>"._t($duration)."</span>";
      echo "<h6>".$title."</h6>";
      echo "</div>";
      echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

 ?>
<!-- 


       <div class="col-md-4">
       <?php  
       // echo "<a target=\"_blank\" href=\""."./play.php?rsid=\"><img src=\"http://202.10.79.118:8080/DTAppInterface/upload_files/video_thumb/XODcwOTU1Njc2.jpg\"></a>";
       // echo "<div class=\"info\">";
       // echo "<span class=\"glyphicon glyphicon glyphicon-play\" ><h6>411</h6></span>";
       // echo "<span class=\"glyphicon glyphicon glyphicon-comment\"><h6>5641</h6></span>";
       // echo "<span class=\"glyphicon glyphicon glyphicon-film\"><h6></h6>4:45</span>";
       // echo "<h6>闪闪的视觉错觉Incredible Spinning Illusion</h6>";
       // echo "</div>";
       ?>
      
       </div>
       <div class="col-md-4">

       </div>
       <div class="col-md-4">

       </div>
      

 -->

 <!-- 翻页 -->
 <nav>
  <ul class="pager">
    <?php 
     if ($page <= 1) {
       echo "<li class=\"previous disabled\"><a href=\"#\">";
     } else {
      $page = $page-1;
       echo "<li class=\"previous\"><a href=\"./album.php?page=".$page."\">";
     }
     
     ?>
    <!-- <li class="previous disabled"><a href="#"> -->
    <span aria-hidden="true">&larr;</span>上一页</a></li>
    <?php 
      $page = $page+2;
      echo "<li class=\"next\"><a href=./album.php?page=".$page.">";
     ?>
    下一页 <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>
</div>
<?php require_once('inc/footer.php'); ?>