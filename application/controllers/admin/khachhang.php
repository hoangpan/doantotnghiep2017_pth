<?php

class Khachhang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mkhachhang');
        $this->load->library('form_validation');
    }
    
    
    /* ------ Hiển thị slide  ------- */
    public function index(){
        //load model, libraries...        
        
        //process...
        $khachhang = $this->mkhachhang->listKhachhang();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/khachhang/listkhachhang',
            'css' => 'khachhang/khachhang.css',
            'khachhang' => $khachhang,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function delkhachhang($id){
        $this->mkhachhang->delKhachhang($id);
        redirect('admin/khachhang');
    }
    
    
    
}