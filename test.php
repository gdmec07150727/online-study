<?php
    /*sort()函数的使用*/
    $arry = array("a"=>"html","b"=>"java","c"=>"php");
    sort($arry);
    echo "sort()函数：";
    print_r($arry);
    /*asort()函数的使用*/
    echo "<br>";
    asort($arry);
    echo "asort()函数：";
    print_r($arry);
    /*rsort()函数的使用*/
    echo "<br>";
    rsort($arry);
    echo "rsort()函数：";
    print_r($arry);
    /*ksort()函数的使用*/
    echo "<br>";
    ksort($arry);
    echo "ksort()函数：";
    print_r($arry);
    /*natsort()函数的使用*/
    echo "<br>";
    natsort($arry);
    echo "natsort()函数：";
    print_r($arry);

    /*array_push函数的使用*/
    echo "<br>";
    echo "<br>";
    array_push($arry,'C#','python');
    echo "array_push()函数的使用：";
    print_r($arry);
    /*array_pop()函数的使用*/
    echo "<br>";
    $arr = array_pop($arry);
    echo "被弹出的单元是：".$arr."<br>";
    print_r($arry);
    /*array_shift()函数的使用*/
    echo "<br>";
    $result = array_shift($arry);
    echo "删除第一个元素：".$result."<br>";
    print_r($arry);
    /*array_unshift()函数的使用*/
    echo "<br>";
    $arr = array_unshift($arry,'VB','VC');
    echo "在前面插入VB、VC元素后:";
    print_r($arry);
?>