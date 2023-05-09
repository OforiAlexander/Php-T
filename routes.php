<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->post('/notes', 'controllers/notes/store.php');
$router->get('/notes/create', 'controllers/notes/create.php');

//section routes
$router->get('/register', 'controllers/registration/create.php')->only('guests');
$router->post('/register', 'controllers/registration/store.php')->only('guests');

// login
$router->get('/login', 'controllers/session/create.php')->only('guests');
$router->post('/session', 'controllers/session/store.php')->only('guests');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');


