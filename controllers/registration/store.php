<?php

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];
$errors=[];
$validator= new Validator();


if(! $validator::email($email)){
    $errors['email']= 'Please provide a valid email address';
}


 if(! $validator::string($password, 7 , 255)){
     $errors['password']= 'Please provide a valid password address';
 }

  if(! empty($errors)){
      return view('registration/create.view.php',[
          'errors'=> $errors
      ]);
  }

  $db = App::resolve(Database::class);

  $user = $db->queries('select * from users where email = :email',[
    'email'=>$email
  ])->find();

if($user){


    header('location: /');
    exit;

}else{
    $db->queries('INSERT INTO users (email, password ) VALUES (:email, :password)',[
        'email'=> $email,
        'password'=> password_hash($password, PASSWORD_BCRYPT)
       ]);

    $_SESSION['user']=[
        'email'=>$email
    ];


    header('location: /');
    exit;
}