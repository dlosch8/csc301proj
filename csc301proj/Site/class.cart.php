<?php

    class Cart implements iterator {
        private $arr;
        
        public function __construct( $cart ) {
            $this->arr = $cart;
        }
        
        public function rewind() {
            return reset($this->arr);
        }
        
        public function current() {
            $var = current($this->arr);
            return $var;
        }
        
        public function key() {
            $var = key($this->arr);
            return $var;
        }
        
         public function next() {
            $var = next($this->arr);
            return $var;
        }
        
        public function valid() {
            $key = key($this->arr);
            $var = ($key !== NULL && $key !== FALSE);
            return $var;
        }
    
    function addToCart($key, $quantity) {
        if (!isset($this->arr[$key])) {
        $this->arr[$key] = $quantity;
        }
        else {
            $this->arr[$key] = $quantity;
        }
    }
    
    function remove($key) {
        unset($this->arr[$key]);
    }
}


?>