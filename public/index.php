<?php

use Core\Session;

session_start();
//working with sessions in php

const BASE_PATH = __DIR__.'/../';
require BASE_PATH.'Core/functions.php';

spl_autoload_register(function ($class){
   $class= str_replace('\\', DIRECTORY_SEPARATOR , $class);

    require base_path("{$class}.php");
});


require base_path('bootstrap.php');

$router= new \Core\Router();
$routes= require base_path("routes.php");


$uri= parse_url($_SERVER['REQUEST_URI'])['path'];
$method= $_POST['__method_delete'] ?? $_SERVER['REQUEST_METHOD'];

 
 $router->route($uri, $method);

Session::unflash();



