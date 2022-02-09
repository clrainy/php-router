Route
=====

简单的PHP路由

### 安装

```
composer require cdyun/php-router dev-master
```

### 例子

引入文件:

```PHP
use Cdyun\PhpRouter\Route;
```
基本用法
```PHP
Route::get('/', function() {
  echo 'Hello world!';
});

Route::get('/(:any)', function($arg) {
  echo '传参: ' . $arg;
});

Route::dispatch();
```

HTTP请求方法

```PHP
Route::get('/', function() {
  echo 'GET请求';
});

Route::post('/', function() {
  echo 'POST请求';
});

Route::any('/', function() {
  echo 'GET/POST请求';
});

Route::dispatch();
```
错误路由

```PHP
Route::error(function() {
  echo '404 :: Not Found';
});
```


解析路由到控制器/方法
=====

index.php:

```php
require('vendor/autoload.php');

use Cdyun\PhpRouter\Route;

Route::get('/', 'Controllers\demo@index');
Route::get('page', 'Controllers\demo@page');
Route::get('view/(:num)', 'Controllers\demo@view');

Route::dispatch();
```

demo.php:

```php
<?php
namespace Controllers;

class Demo {

    public function index()
    {
        echo 'home';
    }

    public function page()
    {
        echo 'page';
    }

    public function view($id)
    {
        echo $id;
    }

}
```

路由重写.

.htaccess(Apache):

```
RewriteEngine On
RewriteBase /

# Allow any files or directories that exist to be displayed directly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php?$1 [QSA,L]
```

.htaccess(Nginx):

```
rewrite ^/(.*)/$ /$1 redirect;

if (!-e $request_filename){
	rewrite ^(.*)$ /index.php break;
}

```

### 参考

```
noahbuscher/macaw
```
