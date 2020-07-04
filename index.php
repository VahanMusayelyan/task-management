<?php
session_start();
spl_autoload_register(function($class){
    if(file_exists($class.'.php')){
        include $class.'.php';
    }
});

$uri = substr($_SERVER['REQUEST_URI'],1);
$uri = explode('/',$uri);


use system\Routes;
new Routes($uri);
