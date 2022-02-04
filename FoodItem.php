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

    public function get_name(){
        return $this->name;
    }

    public function get_price(){
        return $this->price;
    }

    public function get_description(){
        return $this->description;
    }

    public function set_count($count){
        $this->count = $count;
        return $this->count;
    }
    public function get_count(){
        return $this->count;
    }
}