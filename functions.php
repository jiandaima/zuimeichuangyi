<?php 
   function geturl($name,$page){
	   
     $host = 'http://115.28.54.40:8080/beautyideaInterface/api/v1/';               //服务器

	   $hostkey  = array( 'all' =>'resources/getResources?',                         //获取所有资源的url
	                     'allr' => 'resources/getAllRecommendResources?',            //获取所有资源下幻灯片的url
	                    'album' =>'album/getAlbumHotResources?',                     //专辑url
                    'albumr'  => 'album/getAlbumRecommendResources?',              //专辑下幻灯片url
                    'modules' => 'modules/getModules?');

     @ $no = $page*10;
     $imieid ='&imieId=8188F0E88298ED8DDAB8AA4C94DD7F8F';
     if ($name == 'all') {
      $url = $host.$hostkey[$name]."&pageNo=".$no.$imieid;
     } else if($name == 'album'){
      $url = $host.$hostkey[$name]."&pageNo=".$no.$imieid;
     } else{
      $url = $host.$hostkey[$name].$imieid;
     }
     return $url;
     
}
    function _t($t){
     $t = floor($t);      //去小数点后数字
     $m = floor($t/60);   //得分钟
     $s = $t-$m*60;       //得秒
     $t = $m.":".$s;      //添加":"
     return $t;           //返回数据
}

    function getdata($url){
      $curl = curl_init();                               //初始化curl
      curl_setopt($curl, CURLOPT_URL, $url);             //设置抓取的url 
      curl_setopt($curl, CURLOPT_HEADER, 0);             //设置头文件的信息作为数据流输
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);     //设置获取的信息以文件流的形式返回，而不是直接输出
      $data = curl_exec($curl);                          //获取数据
      curl_close($curl);
      $data = json_decode($data);
      // print_r($obj);
      $data = object_array($data);                                 //关闭URL请求      
      return $data;                                      //返回数据
}

    //$obj = json_decode($data,true);                    转换数组
    
    function object_array($array) { 
    if(is_object($array)) { 
        $array = (array)$array; 
     } if(is_array($array)) { 
         foreach($array as $key=>$value) { 
             $array[$key] = object_array($value); 
             } 
     } 
     return $array; 
}


   $class = array("1" =>"游戏/动漫",
                  "2" =>"旅游/指南",
                  "3" => "运动/极限",
                  "4" => "汽车/安全",
                  "5" => "奇趣/科技",
                  "6" => "科技/产品",
                  "7" => "时尚/经典",
                  "8" => "财经",
                  "9" => "亲子/情感",
                  "10" => "读书/教育",
                  "11" => "生活/烦恼",
                  "12" => "公益/社会",
                  "13" => "app",
                  "14" => "公益/设计");


function getKey($arr, $value) {
 if(!is_array($arr)) return null;
 foreach($arr as $k =>$v) {
  $return = getKey($v, $value);
  if($v == $value){
   return $k;
  }
  if(!is_null($return)){
   return $return;
  }
 }
}



  function echodata($name,$page){
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
  </div>
  <!-- 幻灯片按钮 -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
</div>
<?php
}
?>