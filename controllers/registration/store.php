<?php

use Core\Database;
use Core\Validator;
use Core\App;


$email = $_POST['email'];
$password = $_POST['password'];

//validate the user of the input
$email=[];
if(! Validator::email($email)){
    $errors['email']= "Please provide a valid email address";
}
if(! Validator::string($password, 7, 255)){
    $errors['password']= "Please provide a password of at least seven characters long";
}

if( ! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
//check if the input or the account does not already exist
 $result= $db->queries('select * from users where email = :email', [
    'email'=> $email
])->find();

dd($result);
   //if yes then alert the user and redirect to the login page

   //if not save the input to the database and log the user in and redirect