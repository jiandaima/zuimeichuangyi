<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php

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


    $i = 1;
    $page = 0;
    for ($i=1; $i<15; $i+=1){
    	// echo "<br/>".$class[$i].$i."正在获取...<br/>";
    	for ($page=0; $page< 500; $page+=10){ 
           
           //url片段
           $geturl = "http://115.28.54.40:8080/beautyideaInterface/api/v1/resources/getResourcesByModulesId?";
           $pagesize = "&pageSize=10";
           $imieid = "&imieId=8188F0E88298ED8DDAB8AA4C94DD7F8F";
           $modulesid = "&modulesId=".$i;
           $pageno = "pageNo=".$page;

           // echo $modulesid;
           // echo $pageno;

           //整合url
           $url = $geturl.$pageno.$pagesize.$modulesid.$imieid;

           //初始化
           $curl = curl_init();

          //设置抓取的url
          curl_setopt($curl, CURLOPT_URL, $url);

          //设置头文件的信息作为数据流输出
          curl_setopt($curl, CURLOPT_HEADER, 0);

          //设置获取的信息以文件流的形式返回，而不是直接输出。
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

          // echo $url;

           //执行命令
           $data = curl_exec($curl);

           //关闭URL请求
           curl_close($curl);

           //创建json文件
           $file = fopen("json/json"."-".$i."-".$page.".json", "w") or die("创建文件失败!");

           //写入json
           fwrite($file, $data);

           //关闭文件
           fclose($file);
           
           //文件目录
           $filepath = "json/json"."-".$i."-".$page.".json";

           //判断文件是否写入
           if (file_exists($filepath)) {

               echo $class[$i]."第".$i."页信息获取成功!<br/>";

           } else echo "失败!";

           //判断返回数据的长度
           $len = strlen($data);

          //判断返回值，如果小于默认值，则赋值page使循环中止
    	   if ($len<20) {
    		 $page = 500;    		
    		}

          sleep(5);
    	}
    }
?>
</body>
</html>