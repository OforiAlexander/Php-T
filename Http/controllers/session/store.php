<?php

use Core\Authenticator;
use Http\Form\LoginForm;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if($form->validate($email, $password)){
    if((new Authenticator)->attempt($email, $password)){
    redirect('/');
    }
        $form->error('email', 'No matching account found for the email and password given');
};

Session::flash('errors', $form->errors());

Session::flash('old',[
    'email' => $_POST['email'],
]);
return redirect('/login');   




