<?php

class Donhang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mdonhang');
        $this->load->library('form_validation');
    }
    
    
    /* ------ Hiển thị slide  ------- */
    public function index(){
        //load model, libraries...        
        
        //process...
        $donhang = $this->mdonhang->listDonhang();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/donhang/listdonhang',
            'css' => 'donhang/donhang.css',
            'donhang' => $donhang,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    
    
   
    public function deldonhang($id){
        $this->mdonhang->delDonhang($id);
        redirect('admin/donhang');
    }
    
    
    
}