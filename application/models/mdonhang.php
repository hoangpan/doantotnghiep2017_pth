<?php

class Mdonhang extends CI_Model{
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
    
    public function listDonhang(){  
	    $this->db->order_by("id_dh", "desc");      
        $query = $this->db->get('donhang');
        $data = $query->result_array();
        return $data;
    }
        
    public function get_a_record_donhang($id){
        $query = $this->db->get_where('donhang', array('id_dh'=>$id));
        $data = $query->row_array();
        return $data;
    }

    public function insertDonhang($data){
        $this->db->insert('donhang', $data);
    }
    
    public function delDonhang($id){
        $this->db->delete('donhang', array('id_dh'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    /*----------  slideshow  -------------*/
    //public function thanh_vien(){
      //  $query = $this->db->get('thanhvien');
       // $data = $query->result_array();
       // return $data;
    //} 
    
}