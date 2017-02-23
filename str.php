<?php

/**
 * 序列化是将变量转换为可保存或传输的字符串的过程；
 * 反序列化就是在适当的时候把这个字符串再转化成原来的变量使用。
 * 这两个过程结合起来，可以轻松地存储和传输数据，使程序更具维护性。
 */


//1、serialize和unserialize函数
$a = array('a' => 'Apple' ,'b' => 'banana' , 'c' => 'Coconut');
//序列化数组
$s = serialize($a);
echo $s;
//输出结果：a:3:{s:1:"a";s:5:"Apple";s:1:"b";s:6:"banana";s:1:"c";s:7:"Coconut";}
echo '<br /><br />';
//反序列化
$o = unserialize($s);
print_r($o);

//2、当数组值包含如双引号、单引号或冒号等字符时，它们被反序列化后，可能会出现问题。
//为了克服这个问题，一个巧妙的技巧是使用base64_encode和base64_decode。
$obj = array();
//序列化
$s = base64_encode(serialize($obj));
//反序列化
$original = unserialize(base64_decode($s));

//3、但是base64编码将增加字符串的长度。为了克服这个问题，可以和gzcompress一起使用。

//定义一个用来序列化对象的函数
function my_serialize( $obj )
{
    return base64_encode(gzcompress(serialize($obj)));
}

//反序列化
function my_unserialize($txt)
{
    return unserialize(gzuncompress(base64_decode($txt)));
}

//4、json_encode 和 json_decode
$a = array('a' => 'Apple' ,'b' => 'banana' , 'c' => 'Coconut');
//序列化数组
$s = json_encode($a);
echo $s;
//输出结果：{"a":"Apple","b":"banana","c":"Coconut"}
echo '<br /><br />';
//反序列化
$o = json_decode($s);


//5、var_export 和 eval
//var_export 函数把变量作为一个字符串输出；eval把字符串当成PHP代码来执行，反序列化得到最初变量的内容。
$a = array('a' => 'Apple' ,'b' => 'banana' , 'c' => 'Coconut');
//序列化数组
$s = var_export($a , true);
echo $s;
//输出结果： array ( 'a' => 'Apple', 'b' => 'banana', 'c' => 'Coconut', )
echo '<br /><br />';
//反序列化
eval('$my_var=' . $s . ';');
print_r($my_var);

//6、wddx_serialize_value 和 wddx deserialize
//wddx_serialize_value函数可以序列化数组变量，并以XML字符串形式输出。
$a = array('a' => 'Apple' ,'b' => 'banana' , 'c' => 'Coconut');

//序列化数组
$s = wddx_serialize_value($a);
echo $s;
//输出结果（查看输出字符串的源码）：<wddxPacket version='1.0'><header/><data><struct><var name='a'><string>Apple</string></var><var name='b'><string>banana</string></var><var name='c'><string>Coconut</string></var></struct></data></wddxPacket>
echo '<br /><br />';
//反序列化
$o = wddx_deserialize($s);
print_r($o);
//输出结果：Array ( [a] => Apple [b] => banana 1 => Coconut )