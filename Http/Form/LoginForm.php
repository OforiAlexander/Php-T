<?php

namespace Http\Form;

use Core\Validator;

class LoginForm{

    protected $errors =[];
    public function validate($email, $password){
         $validator= new Validator();


         if(! $validator::email($email)){
            $this -> errors['email']= 'Please provide a valid email address';
         }

          if(! $validator::string($password)){
              $this->errors['password']= 'Please provide a valid password ';
          }

         return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field]= $message;
    }
}