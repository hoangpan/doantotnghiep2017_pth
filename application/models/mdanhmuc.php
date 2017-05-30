<?php

class Mdanhmuc extends CI_Model{
    public $rules = array(

		 array(
            'field' => 'tendm',
            'label' => 'Tên danh mục',
            'rules' => 'required'
        )
 
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function listDanhmuc(){  
	    $this->db->order_by("id_dm", "desc");      
        $query = $this->db->get('dmsanpham');
        $data = $query->result_array();
        return $data;
    }
        
   
    
    public function get_a_record_danhmuc($id){
        $query = $this->db->get_where('dmsanpham', array('id_dm'=>$id));
        $data = $query->row_array();
        return $data;
    }
    
    public function insertDanhmuc($data){
        $this->db->insert('dmsanpham', $data);
    }
    
    public function updateDanhmuc($id, $data){
        $this->db->where('id_dm', $id);
        $this->db->update('dmsanpham', $data);
    }
    
   
    
    public function delDanhmuc($id){
        $this->db->delete('dmsanpham', array('id_dm'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    /*----------  slideshow  -------------*/
  //  public function thanh_vien(){
     //   $query = $this->db->get('thanhvien');
      //  $data = $query->result_array();
      //  return $data;
  //  } 
    
}