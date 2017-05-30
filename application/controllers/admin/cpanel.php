<?php

class Cpanel extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
    }
    
    public function index(){
        
        $data = array(   
		    'username' => $this->session->userdata('tk'),     
            '_content'=> 'backend/gioithieu',
			
        );
        
        $this->load->view('backend/common/layout', $data);
    }
}