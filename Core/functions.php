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

function login($user){
  //this is just the login in session for the user

  $_SESSION['user']=[
    'email'=> $user['email'],
];

}