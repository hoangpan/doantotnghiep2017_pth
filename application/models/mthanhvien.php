<?php

class Mthanhvien extends CI_Model{
    public $rules = array(
        array(
            'field' => 'taikhoan',
            'label' => 'Tài khoản',
            'rules' => 'required'
        ),       
                
        array(
            'field' => 'matkhau',
            'label' => 'Mật khẩu',
            'rules' => 'required'
        ),
		 array(
            'field' => 'quyentruycap',
            'label' => 'Quyền truy cập',
            'rules' => 'required'
        )
 
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function listThanhvien(){  
	    $this->db->order_by("id_thanhvien", "desc");      
        $query = $this->db->get('thanhvien');
        $data = $query->result_array();
        return $data;
    }
        
   
    
    public function get_a_record_thanhvien($id){
        $query = $this->db->get_where('thanhvien', array('id_thanhvien'=>$id));
        $data = $query->row_array();
        return $data;
    }
    
    public function insertThanhvien($data){
        $this->db->insert('thanhvien', $data);
    }
    
    public function updateThanhvien($id, $data){
        $this->db->where('id_thanhvien', $id);
        $this->db->update('thanhvien', $data);
    }
    
   
    
    public function delThanhvien($id){
        $this->db->delete('thanhvien', array('id_thanhvien'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    /*----------  slideshow  -------------*/
    public function thanh_vien(){
        $query = $this->db->get('thanhvien');
        $data = $query->result_array();
        return $data;
    } 
    
}