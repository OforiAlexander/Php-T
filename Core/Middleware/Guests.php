<?php

namespace Core\Middleware;


class Guests{
    public function handle(){
        if($_SESSION['user'] ?? false){
            header('location: /');
            exit;
        }
    }
}