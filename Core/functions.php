<?php 

use Core\Response;
function dd($value){
    echo "<pre>";

    var_dump($value);

    echo "</pre>";
    die();
};

function urlIs($value){
  return  $_SERVER['REQUEST_URI'] === $value;
};

function abort($code=404){

  http_response_code($code);

  require base_path("views/{$code}.php");
  die();
}

function authorize($condition, $status=Response::FORBIDDEN){
  if(!$condition){
    abort($status);
  }
}

function base_path($path){
  return BASE_PATH . $path;
}

function view($path, $attribute=[]){
  extract($attribute);
  require base_path('Views/' . $path);
}

//this is a login function for the user

function login($user)
{
      $_SESSION['user']=[
        'email'=> $user['email'],
    ];

    session_regenerate_id(true);
}

function logout()
{
$_SESSION= [];
session_destroy();

//this next code is to destroy the cookie inside the memory of the user browser
$params = session_get_cookie_params();
setcookie('PHPSESSID' , '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}