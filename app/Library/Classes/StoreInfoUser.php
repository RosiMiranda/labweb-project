<?php

namespace App\Library\Classes;



class StoreInfoUser{
  

    private $name;


    private $email;


    function __construct(string $name, string $email){
        $this->name = $name;
        $this->email = $email;
    
    }

   
    public function getName(){
        return $this->name;

    }
    

    public function getEmail(){
        return $this->email;
        
    }


}