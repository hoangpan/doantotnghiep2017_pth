<?php

class Msearch extends CI_Model{
           
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }       
       
    public function prosearch($stext, $rowsPerPage, $perRow){
        $text = trim($stext);                 
        $query = $this->db->query("SELECT * FROM sanpham WHERE ten_sp LIKE '%$text%' LIMIT $rowsPerPage, $perRow");        
        $data = $query->result_array();
        return $data;
    }
    
    public function totalRowsProSea($stext){
        $text = trim($stext); 
        $query = $this->db->query("SELECT * FROM sanpham WHERE ten_sp LIKE '%$text%'");
            
        $totalRows = $query->num_rows();
        return $totalRows;
    }
}