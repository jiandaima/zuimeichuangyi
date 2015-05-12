<?php 
require_once('inc/header.php');
require_once('./functions.php');
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
      <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="热词、分类、关键字" name="condition">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>
      <li><a href="about.php">关于</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container" style="width:1170px;">
<?php 
@ $rsid = $_GET['rsid'];
@ $ykurl = "https://openapi.youku.com/v2/videos/show_basic.json?client_id=9a2160d074803eba&video_id=".$rsid;
      // echo $ykurl;
      $curl = curl_init();                               
      curl_setopt($curl, CURLOPT_URL, $ykurl);           
      curl_setopt($curl, CURLOPT_HEADER, 0);             
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
      // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);     
      $data = curl_exec($curl);                          
      curl_close($curl);
      $data = json_decode($data);
      // print_r($data);
      $ykdata = object_array($data);   
// print_r($ykdata);
@ $title = $ykdata[title];
@ $description = $ykdata[description];
// echo $title;
echo "<h4>".$title."</h4>";
echo "<embed src=\"http://player.youku.com/player.php/sid/".$rsid."/v.swf\"";
 ?>
play="true"
allowFullScreen="true" 
quality="high" 
width="1140"
height="640" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"
flashvars="isShowRelatedVideo=false&isAutoPlay=true&isDebug=false&UserID=&winType=interior&playMovie=true&MMControl=false&MMout=false"
</embed>
<?php echo "<h4>".$description."</h4>";?>
</div>
<?php require_once('inc/footer.php'); ?>






