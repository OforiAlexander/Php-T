<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Form\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if(! $form->validate($email, $password)){
    return view('session/create.view.php',[
                 'errors'=>$form->errors()
             ]);
};
// //validation
// $errors=[];
// $validator= new Validator();


// if(! $validator::email($email)){
//     $errors['email']= 'Please provide a valid email address';
// }

//  if(! $validator::string($password)){
//      $errors['password']= 'Please provide a valid password ';
//  }

// if(!empty($errors)){
//     return view('session/create.view.php',[
//         'errors'=>$errors
//     ]);
// }

//match the user credentials

$user = $db->queries('select * from users where email = :email',[
    'email'=>$email,
])->find();

if($user){
  if(password_verify($password, $user['password'])){
    login([
        'email'=> $email
    ]);

    header('location: /');
    exit;
}
}


//if the if function does not pick or the password given does not match the one registed with show the error below

return view('session/create.view.php',[
    'errors'=>
    [
        'email'=> 'No matching account found for the email and password given'
    ]
]);



