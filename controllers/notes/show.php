<?php


use Core\App;
use Core\Database;


$db= App::resolve(Database::class);

 $currentUseId=1;


    //else show the note for the user

 $note = $db->queries('select * from note where id= :id', [
     'id'=> $_GET['id']
     ])->findOrAbout();
    
     authorize($note['user_id'] === $currentUseId);


 View("notes/show.view.php",[
     'heading'=>'Note',
     'note'=> $note
  ]);

