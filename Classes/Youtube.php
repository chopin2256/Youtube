<?php

require_once('Youtube_Base.php');
require_once('Youtube_Set.php');
require_once('Youtube_Get.php');

class Youtube extends Youtube_Base {
    
    /**
     * 
     * @Desc Set your api key here
     * @param string $key
     */    
    public function key($key){
        parent::_buildQuery(__FUNCTION__, $key);
    }
    
    /**
     * 
     * @Desc Set Youtube parameters here
     */
    public function set(){
        return new Youtube_Set();
    }
    
    /**
     * 
     * @Desc After setting Youtube parameters, you can get Youtube attributes here
     */
    public function get(){
        return new Youtube_Get();
    }
    
    /**
     * 
     * @Desc clears query string, must run after "retriving" Youtube results
     */
    public function clear() {
        parent::$_counter = 0;
        parent::$_queryString = null;
    }
}