Redis操作类由 [迹忆博客](http://www.onmpw.com) 提供
# Redis操作类
下面我们来简单介绍一下使用方法

1. 实例化Redis操作对象
```php
object Redis($host,$port,[$quiet_fail[,$timeout])
# $host 连接主机
# $port 连接的端口
# $quiet_fail  可选参数，出现异常时是否提示，默认开启提示
# $timeout  读取信息流的超时时间
```
下面我们看一个例子
```php
$obj = new Redis('192.168.144.133',6379);
```
2. command()函数
```php
Redis command()
# command函数参数个数不限制
# 该函数是用来设置要执行的命令
```
看下面的例子，在这个例子中我们来设定这样一个命令：设置myblod的值为 迹忆博客
```php
$obj->command('set','myblog','迹忆博客')
```
command()函数的功能可以认为是预处理命令，只是将要执行的命令准备好，等待其他操作来执行。

3. exec() 函数
```php
int exec()
#该函数执行由command函数准备好的命令
```
使用示例如下
```php
$obj->command('set','myblog','迹忆博客')->exec();
```
4. result()函数
```php
mixed result()
# 该函数在相应的命令执行完成之后调用
# 命令正确执行，得到相应的结果
# 命令执行不正确 返回布尔值 false
```
使用示例如下
```php
$obj->command('set','myblog','迹忆博客')->exec();
$result = $obj->result();
var_dump($result);
```
5. get_errinfo()函数
```php
string get_errinfo()
# 该函数返回错误信息
# 仅当命令执行结果出现错误，也就是当 result()返回false时，调用此函数
```
下面是使用示例：
```php
$obj->command('set','myblog','迹忆博客')->exec();
$result = $obj->result();
if(!$result){
  echo $obj->get_errinfo();
}
```
