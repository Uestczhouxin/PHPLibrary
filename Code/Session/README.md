代码由 [迹忆博客](http://www.onmpw.com) 提供
# PHP重写session机制
使用方法：
```php
$session = new onmpwSessionHandler($config);
session_set_save_handler($session,true);
```
其中参数$config是配置选项
```php
$config = array(
    'SAVE_HANDLE'=>'Redis',
    'HOST'=>'127.0.0.1',
    'PORT'=>6379,
    'AUTH'=>null,    //是否有用户验证，默认无密码验证。如果不是为null，则为验证密码
    'TIMEOUT'=>0,   //连接超时
    'RESERVED'=>null,
    'RETRY_INTERVAL'=>100,  //单位是 ms 毫秒
    'RECONNECT'=>false, //连接超时是否重连  默认不重连
);
```
使用示例如下
```php
include 'onmpwSessionHandler.php';
$session = new onmpwSessionHandler(array(
    'HOST'=>'192.168.5.111',
    'PORT'=>6379
));
session_set_save_handler($session,true);
session_start();
$_SESSION['name'] = 'onmpw';
```
关于如何重写对session机制进行重写，可以参考[《PHP重写session机制》](http://www.onmpw.com/tm/xwzj/prolan_143.html)这篇文章
