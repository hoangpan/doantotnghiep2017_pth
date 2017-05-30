<?php

class User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();        
        $this->load->model('muser');
    }
    
    public function userLogin(){          
        // load model, libraries        
        
        // process
        if($this->session->userdata('tk')){       
            redirect('admin/cpanel');
            return ;                                  
        }else{
            //validation...
            $this->load->library('form_validation');
            $this->form_validation->set_rules($this->muser->rules);
            // process form
            if($this->form_validation->run()){
                $tk = $this->input->post('tk', true);
                $mk = md5($this->input->post('mk', true));            
                $login = $this->muser->login($tk, $mk);
                if($login){                
                    redirect('admin/cpanel');                                               
                } 
            }           
        }
                        
        // data to view
        $data = array();
        
        // load view
        $this->load->view('backend/login', $data);
            
    }
    
    public function userLogout(){
        $this->muser->logout();
        redirect('admin/user/userLogin');
        //echo 'ngon';
    }
    
    
    
}