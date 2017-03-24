<?php
//统计文件
    $countfile    =    'count.txt';

    //读方式打开统计文件
    if($fp        =    fopen($countfile,'r+')){
        $num    =    fread($fp,8);
        $num    =    $num+1;
    }
    fclose($fp);

    //写方式打开统计文件
    $fp            =    fopen($countfile,'w+');
    fwrite($fp,$num);
    fclose($fp);
    //只读方式打开统计文件
    $fp                =    fopen($countfile,'r');
    $n                =    0;
    $countarray        =    array();
    while(false!==($countnum=fgetc($fp))){
        $countarray[$n]    =    $countnum;
        $n++;
    }
    $countstr        =    "";
    $emptystr        =   "";
    foreach($countarray as $value){
       // 根据情况调用相应的数字图片 
        //$countstr.=       $emptystr ."images/" .$value.".jpg";
        //$emptystr=       "&nbsp;&nbsp;";
		$countstr.=$value;
    }
   
?>
