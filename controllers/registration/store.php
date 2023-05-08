<?php

 use Core\Database;
 use Core\Validator;
 use Core\App;

 $db = App::resolve(Database::class);


 $email = $_POST['email'];
 $password = $_POST['password'];

//  validate the user of the input
 $email=[];
 if (!Validator::email($email)) {
     $errors['email'] = 'Please provide a valid email address.';
  }
 
  if (!Validator::string($password, 7, 255)) {
      $errors['password'] = 'Please provide a password of at least seven characters.';
  }
 
  if (! empty($errors)) {
      return view('registration/create.view.php', [
          'errors' => $errors
      ]);
  }
 

  $user= $db->queries('select * from users where email = :email', [
     'email'=> $email
 ])->find();

    if($user){
     header('location: /');
     exit;
    }else{

     $db->queries('INSERT INTO users (email, password ) VALUES (:email, :password)',[
         'email'=> $email,
         'password'=> $password
        ]);

        $_SESSION['users']=[
         'email'=>$email
        ];

        header('location: /');
        exit;
    }


