<?php

use Core\Validator;
use Core\App;
use Core\Database;


$db= App::resolve(Database::class);

$errors=[];
//checking errors for empty forms
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $validator= new Validator();

    if (! $validator->string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    if (! empty($errors)) {
        //validaiton issue

       return  View("notes/create.view.php",[
            'heading'=>'Create Note',
            'errors'=>$errors
         ]);
         
    }
    
        $db->queries('INSERT INTO note(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

        header('location: /notes');
        exit();
    }
