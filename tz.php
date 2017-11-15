<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
//连接数据库
$con=mysqli_connect("localhost","jiyin","jiyin2017720jiyin","jiyin");

//查询商品数量是否大于0,大于0才能下单,并减少库存

$fp = fopen("lock.txt", "r");
//加锁
if(flock($fp,LOCK_EX | LOCK_NB))
{
$res=mysqli_fetch_assoc(mysqli_query($con,'SELECT rmb FROM overall WHERE id=1 LIMIT 1'));
if($res['rmb']>0){mysqli_query($con,'UPDATE overall SET rmb=rmb-1  WHERE id=1');}
//执行完成解锁
flock($fp,LOCK_UN);
}
//关闭文件
fclose($fp);
unset($res);
mysqli_close($con);
?>