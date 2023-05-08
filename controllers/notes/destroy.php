<?php

use Core\App;
use Core\Database;


$db= App::resolve(Database::class);

 $currentUseId=1;

      //FORM WAS SUBMITED DELETE THE CURRENT NOTE

    $note = $db->queries('select * from note where id= :id', [
        'id'=> $_POST['id']
        ])->findOrAbout();
       
        authorize($note['user_id'] === $currentUseId);
    $db->queries('delete from note where id = :id', [
        'id'=> $_GET['id']
    ]);

    header('location: /notes');
    exit();
