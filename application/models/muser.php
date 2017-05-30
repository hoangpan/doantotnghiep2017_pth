<?php

class mUser extends CI_Model{
    
    public $rules = array(
        array(
             'field'   => 'tk', 
             'label'   => 'Tài khoản', 
             'rules'   => 'trim|required'
        ),
        array(
             'field'   => 'mk',
             'label'   => 'Mật khẩu',
             'rules'   => 'required'
        ),
    );
    
    public function __construct(){
        $this->load->database();
        $this->load->library('session');
    } 
    
    public function login($tk, $mk){        
        $query = $this->db->get_where('thanhvien', array(
            'tai_khoan'=>$tk,
            'mat_khau'=>$mk,
            'quyen_truy_cap'=> 2
        ));
        if($query->num_rows() > 0){            
            $tai_khoan = $query->row();            
            $this->session->set_userdata('tk', $tai_khoan);            
            return true;
        }else{
            return false;
        }
    }
    
    public function logout(){
        $this->session->unset_userdata('tk');                
    }
        
}

?>