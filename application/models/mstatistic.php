<?php

class Mstatistic extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        
    }
    
    public function addCount(){
        $fp = 'counter.txt';
        $fo = fopen($fp, 'r');            
            $count = fread($fo, filesize($fp));
            $count++;    
        $fc = fclose($fo);
        
        $fo = fopen($fp, 'w');
            $fw = fwrite($fo, $count);
        $fc = fclose($fo);
        
    }
    
    public function showCount(){
        $fp = 'counter.txt';
        $fo = fopen($fp, 'r');            
        $count = fread($fo, filesize($fp));
        return $count;
    }
}

?>