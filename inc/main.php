<!-- 主要内容 -->
<div class="row">

<?php 
     $thumbnail = "http://beautyidea.oss-cn-hangzhou.aliyuncs.com/video_thumb/";
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

<!--     <div class="col-md-6">
      <a href="play.php?id=XODQ1NzA5Mzg4"><img src="img/4.jpg"></a>
      <div class="info">
      <span class="glyphicon glyphicon glyphicon-play" aria-hidden="true"><h6>5454</h6></span>
      <span class="glyphicon glyphicon glyphicon-comment" aria-hidden="true"><h6>131</h6></span>
      <span class="glyphicon glyphicon glyphicon-film" aria-hidden="true"><h6>3:00</h6></span>
      <h6>【酷】《蝙蝠侠大战超人：正义黎明》首款先导预告片</h6>
      </div>
    </div> -->



<!-- 
    <div class="col-md-6">
      <img src="img/8.jpg" alt="">
    </div>
    <div class="col-md-6">
      <img src="img/5.jpg" alt="">
    </div>
    <div class="col-md-6">
      <img src="img/6.jpg" alt="">
    </div>
    <div class="col-md-6">
      <img src="img/7.jpg" alt="">
    </div> -->
  </div>
</div>