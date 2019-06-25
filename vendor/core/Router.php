<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 21.06.19
 * Time: 15:27
 */

namespace vendor\core;

class Router
{
     protected  static  $routes =[];
     protected  static  $route =[];

     public  static  function  add($regexp, $route=[]){

         self::$routes[$regexp]= $route;


     }

     public  static  function getRoutes(){

         return  self::$routes;
     }

        public  static  function getRout(){
            return self::$route;
        }

        public  static  function  matchRoute($url){

            $roures = explode('/',$url);
            var_dump($roures);
            $route=[];
            $route['controller'] = $roures[1];
            $route['action'] = $roures[2];

//         foreach (self::$routes as $pattern=>$route){
//             var_dump($pattern);
//             var_dump($url);
//             if(preg_match("#$pattern#i",$url, $matches)){
//
//                 foreach ($matches as $k=>$v){
//                     if(is_string($k)) {
//                         $route[$k] = $v;
//                     }
//                 }
//
//
//             }
//         }
            if(!isset($route['action'])){
                    $route['action']='index';
                 }

            if($route['controller']==""){
                $route['controller']='Main';
            }
                self::$route = $route;
                 echo "<br>";
                var_dump(self::$route);
                 return true;
         return false;
        }

        public static function dispatch($url){
         if(self::matchRoute($url)){
           // $controller = self::$route['controller'];
            $controller=self::upperCammalCase(self::$route['controller']);
            var_dump($controller);
            if(class_exists($controller)){
                $cObj = new $controller();
                $action = self::loverCammalCase(self::$route['action']). 'Action';
                if(method_exists($cObj,$action)){
                   $cObj->$action();

                }else{
                    echo "Mathod  <b>$controller::$action</b>not faund";
                }
            }else{
                echo "Controller <b>$controller</b>not faund";
            }
         }else{
            http_response_code(404);
         }
        }

        protected static function upperCammalCase($name){
           return $name =  str_replace(' ','', ucwords(str_replace('-',' ',$name)));

        }

    protected static function loverCammalCase($name){
        return lcfirst(self::upperCammalCase($name));
     }
}