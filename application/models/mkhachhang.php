<?php

class Mkhachhang extends CI_Model{
    public $rules = array(
        array(
            'field' => 'tenkh',
            'label' => 'Tên khách hàng',
            'rules' => 'required'
        ),       
                
        array(
            'field' => 'email',
            'label' => 'Email khách hàng',
            'rules' => 'required'
        ),
		 array(
            'field' => 'dienthoai',
            'label' => 'Số điện thoại',
            'rules' => 'required'
        ),
		 array(
            'field' => 'diachi',
            'label' => 'Địa chỉ',
            'rules' => 'required'
        )
 
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function listKhachhang(){  
	    $this->db->order_by("id_kh", "desc");      
        $query = $this->db->get('khachhang');
        $data = $query->result_array();
        return $data;
    }
        
   
    
    public function get_a_record_khachhang($id){
        $query = $this->db->get_where('khachhang', array('id_kh'=>$id));
        $data = $query->row_array();
        return $data;
    }
    
    public function insertKhachhang($data){
        $this->db->insert('khachhang', $data);
    }
    
    public function updateKhachhang($id, $data){
        $this->db->where('id_kh', $id);
        $this->db->update('khachhang', $data);
    }
    
   
    
    public function delKhachhang($id){
        $this->db->delete('khachhang', array('id_kh'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    /*----------  slideshow  -------------*/
    //public function thanh_vien(){
        //$query = $this->db->get('thanhvien');
       // $data = $query->result_array();
       // return $data;
   // } 
    
}