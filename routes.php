<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->post('/notes', 'notes/store.php');
$router->get('/notes/create', 'notes/create.php');

//section routes
$router->get('/register', 'registration/create.php')->only('guests');
$router->post('/register', 'registration/store.php')->only('guests');

// login
$router->get('/login', 'session/create.php')->only('guests');
$router->post('/session', 'session/store.php')->only('guests');
$router->delete('/session', 'session/destroy.php')->only('auth');


