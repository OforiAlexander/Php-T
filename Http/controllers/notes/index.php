<?php

use Core\App;
use Core\Database;


$db= App::resolve(Database::class);

$notes = $db->queries('select * from note where user_id=1')->getAll();


View("notes/index.view.php",[
    'heading'=>'Notes',
    'notes'=>$notes
 ]);