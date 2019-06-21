<?php

$query = $_SERVER['QUERY_STRING'];

require '../vendor/core/Router.php';

Router::add('/posts/add',['controller'=>'Posts','action'=>'add']);
Router::add('/posts',['controller'=>'Posts','action'=>'index']);
Router::add('',['controller'=>'Main','action'=>'index']);


var_dump(Router::getRoutes());

if(Router::matchRoute($query)) {
    var_dump(Router::getRout());
}else{
    echo "404";
}
?>
<html>
  <head>
    <title>Welcome to Example.com!</title>
  </head>
  <body>
    <h1>Success!  The example.com virtual host is working!</h1>
  </body>
</html>
