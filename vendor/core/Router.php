<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 21.06.19
 * Time: 15:27
 */

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
         foreach (self::$routes as $pattern=>$route){
             if($url == $pattern){
                 self::$route = $route;
                 return true;
             }
         }
         return false;
        }
}