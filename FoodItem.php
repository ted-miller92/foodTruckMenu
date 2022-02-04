<?php

class FoodItem{
    public $name = '';
    public $price = 0 ;
    public $description = '';
    public $count = 0;

    public function __construct($name, $price, $description){
        $this-> name = $name;
        $this-> price = $price;
        $this-> description = $description;        
    }

    //named function by Camel-Case
    //get_name -- > getName 
    public function get_name(){
        return $this->name;
    }

    //named function by Camel-Case
    //get_price -- > getPrice 
    public function get_price(){
        return $this->price;
    }

    //named function by Camel-Case
    //get_description -- > getDescription 
    public function get_description(){
        return $this->description;
    }

    //named function by Camel-Case
    //set_count -- > setCount 
    public function set_count($count){
        $this->count = $count;
        return $this->count;
    }

    //named function by Camel-Case
    //get_count -- > getCount 
    public function get_count(){
        return $this->count;
    }
}