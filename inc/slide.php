<!-- 幻灯片 -->
<?php
  if ($page >=2) {
    echo "<div class=\"container\" style=\"display:hiden\">";
  } else {
    echo "<div class=\"container\">";
  }
 ?>
  <div id="myCarousel" class="carousel slide">
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
     $name = 'allr';
     $page = '';
     $url = geturl($name,$page);
     // echo $url;
     $data = getdata($url);
     // echo $data;
     $obj = json_decode($data);
     // print_r($obj);
     $obj = object_array($obj);
     // print_r($obj[resources][$i]);
     $thumbnail = "http://202.10.79.118:8080/DTAppInterface/upload_files/video_thumb/";
     // http://202.10.79.118:8080/DTAppInterface/upload_files/video_thumb/XNzYzNzQxODA0.jpg
      for ($i=0; $i <5 ; $i++) {
       @ $objs = $obj[resources][$i];
       @ $rsid = $objs[rsId];
       @ $title = $objs[title];
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

<!--   <div class="item active">
      <a href="html/XODQ1NzA1ODAw.html"><img src="img/4.jpg"></a>
      <h6>【酷】《蝙蝠侠大战超人：正义黎明》首款先导预告片</h6>
    </div>
    <div class="item">
      <img src="img/5.jpg" alt="">
      <h6>【酷】《蝙蝠侠大战超人：正义黎明》首款先导预告片</h6>

    </div>
    <div class="item">
      <img src="img/6.jpg" alt="">
      <h6>【酷】《蝙蝠侠大战超人：正义黎明》首款先导预告片</h6>
    </div>
    <div class="item">
      <img src="img/7.jpg" alt="">
      <h6>【酷】《蝙蝠侠大战超人：正义黎明》首款先导预告片</h6>
    </div>
    <div class="item">
      <img src="img/8.jpg" alt="">
      <h6>【酷】《蝙蝠侠大战超人：正义黎明》首款先导预告片</h6>
    </div> -->

  </div>
  <!-- 幻灯片按钮 -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
</div>