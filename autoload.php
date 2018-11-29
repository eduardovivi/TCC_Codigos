<?php


class Autoloader{
    public static function  register(){
    spl_autoload_register(function($class){
       $cl = SITE_ROOT.DS.str_replace('\\',DS,$class).'.class.php'; 
       if(!file_exists($cl)){
        throw new Exception("Arquivo '{$class}' não existe!");
     }else{
        require_once ($cl);
     }   
    });
  }
}
Autoloader::register();




//function __autoload($class){
//    $cl = WWW_ROOT.DS.str_replace('\\',DS,$class).'.class.php';
//    if(!file_exists($cl)){
//        throw new Exception("Arquivo '{$class}' não existe!");
//    }else{
//        require_once ($cl);
//    }
//    
//}
//
