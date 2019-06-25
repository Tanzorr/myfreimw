<?php

$query = $_SERVER['REQUEST_URI'];

define('WWW', __DIR__);
define('CORE', dirname(__DIR__). '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__).'/app');


require '../vendor/core/Router.php';


spl_autoload_register(function ($class){
    $file = APP ."/controllers/$class.php";
    var_dump($class);
    if(is_file($file)){
        require_once $file;
    }
});



Router::add('^$',['controller'=>'Main','action'=>'index']);
Router::add('([a-z-]+)/([a-z-]+)');




\vendor\core\Router::dispatch($query);



?>
<html>
  <head>
    <title>Welcome to Example.com!</title>
  </head>
  <body>
    <h1>Success!  The example.com virtual host is working!</h1>
  </body>
</html>
