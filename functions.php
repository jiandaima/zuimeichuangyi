<?php 
    function _t($t){
      $t = floor($t);                                    //去小数点后数字
      $m = floor($t/60);                                 //得分钟
      $s = $t-$m*60;                                     //得秒
      $t = $m.":".$s;                                    //添加":"
      return $t;                                         //返回数据
}

    function getdata($url){
      $curl = curl_init();                               //初始化curl
      curl_setopt($curl, CURLOPT_URL, $url);             //设置抓取的url 
      curl_setopt($curl, CURLOPT_HEADER, 0);             //设置头文件的信息作为数据流输
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);     //设置获取的信息以文件流的形式返回，而不是直接输出
      $data = curl_exec($curl);                          //获取数据
      curl_close($curl);
      $data = json_decode($data);
      $data = object_array($data);                        //关闭URL请求      
      return $data;                                      //返回数据
}
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


    function getKey($arr, $value) {                     //由value获取key
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

   function eximg($imgpath){
       if( @fopen( $imgpath, 'r' ) ) 
       { 
         return $imgpath;
       } 
       else 
       {
         $imgpath = "http://img.yangzhongchao.com/error.png";
         return $imgpath;
       }
   }