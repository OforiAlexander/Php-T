<?php

use Core\App;
use Core\Database;
use Core\Validator;
$db= App::resolve(Database::class);

 $currentUseId=1;


    // show the note for the user or find the note for the user

 $note = $db->queries('select * from note where id= :id', [
     'id'=> $_POST['id']
     ])->findOrAbout();

     //authorize that the current user can edit the note

     authorize($note['user_id']=== $currentUseId);

     //validate the form for the user

   $errors=[];
   $validator= new Validator();

   if (! $validator->string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    //if no validation errors update  the record in the user database

    if(count($errors)){
        return view('notes/edit.view.php', [
            'heading'=> 'Update Note',
            'errors'=> $errors,
            'note'=> $note
        ]);
    }

    $db->queries('update note set body = :body where id = :id', [
        'id'=> $_POST['id'],
        'body'=> $_POST['body']
    ]);

    //redirect the user

    header('location: /notes');
    exit();