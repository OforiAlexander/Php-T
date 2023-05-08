<?php


namespace Core;

use Exception;
class Container{
 

    //add a container
    protected $bindings= [];
    public function bind($key, $resolver){
        $this->bindings[$key]= $resolver;
    }


    //remove a container
    public function resolve($key){

        if(! array_key_exists($key, $this->bindings)){
            throw new Exception("No matching found for {$key}");
        }
            $resolver = $this->bindings[$key];
           return call_user_func($resolver);
    }
}