<?php

class Danhmuc extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mdanhmuc');
        $this->load->library('form_validation');
    }
    
    
    /* ------ Hiển thị slide  ------- */
    public function index(){
        //load model, libraries...        
        
        //process...
        $danhmuc = $this->mdanhmuc->listDanhmuc();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/danhmuc/listdanhmuc',
            'css' => 'danhmuc/danhmuc.css',
            'danhmuc' => $danhmuc,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function adddanhmuc(){
        //load model, libraries...        
        
        //process...                                
        $this->form_validation->set_rules($this->mdanhmuc->rules);
        if($this->form_validation->run()){
                      
            
                $dataInsert = array(
                    'ten_dm' => $this->input->post('tendm'),
                    
                );
            
                $this->mdanhmuc->insertDanhmuc($dataInsert);
                redirect('admin/danhmuc');   
                          
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/danhmuc/insertdanhmuc',
            'css' => 'danhmuc/insertdanhmuc.css',
			'username' => $this->session->userdata('tk')                     
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function editdanhmuc($id){
        //load model, libraries...        
        
        //process...     
            // data Old
        $dataOld = $this->mdanhmuc->get_a_record_danhmuc($id);
                                           
        $this->form_validation->set_rules($this->mdanhmuc->rules);
        if($this->form_validation->run()){
                       
           
            
                $dataInsert = array(
                    'ten_dm' => $this->input->post('tendm'),
                   
                );
            
                $this->mdanhmuc->updateDanhmuc($id, $dataInsert);
                redirect('admin/danhmuc');   
                           
            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/danhmuc/editdanhmuc',
            'css' => 'danhmuc/editdanhmuc.css',            
            'dataOld' => $dataOld,
			'username' => $this->session->userdata('tk')    
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function deldanhmuc($id){
        $this->mdanhmuc->delDanhmuc($id);
        redirect('admin/danhmuc');
    }
    
    
    
}