<?php

class Thanhvien extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mthanhvien');
        $this->load->library('form_validation');
    }
    
    
    /* ------ Hiển thị slide  ------- */
    public function index(){
        //load model, libraries...        
        
        //process...
        $thanhvien = $this->mthanhvien->listThanhvien();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/thanhvien/listthanhvien',
            'css' => 'thanhvien/thanhvien.css',
            'thanhvien' => $thanhvien,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function addthanhvien(){
        //load model, libraries...        
        
        //process...                                
        $this->form_validation->set_rules($this->mthanhvien->rules);
        if($this->form_validation->run()){
                      
            
                $dataInsert = array(
                    'tai_khoan' => $this->input->post('taikhoan'),
                    
                    'mat_khau' =>md5($this->input->post('matkhau')),
					'quyen_truy_cap' => $this->input->post('quyentruycap')
                    
                );
            
                $this->mthanhvien->insertThanhvien($dataInsert);
                redirect('admin/thanhvien');   
                          
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/thanhvien/insertthanhvien',
            'css' => 'thanhvien/insertthanhvien.css',
			'username' => $this->session->userdata('tk')                     
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function editthanhvien($id){
        //load model, libraries...        
        
        //process...     
            // data Old
        $dataOld = $this->mthanhvien->get_a_record_thanhvien($id);
                                           
        $this->form_validation->set_rules($this->mthanhvien->rules);
        if($this->form_validation->run()){
                       
           
            
                $dataInsert = array(
                    'tai_khoan' => $this->input->post('taikhoan'),
                    'mat_khau' => $this->input->post('matkhau'),
                    'quyen_truy_cap' => $this->input->post('quyentruycap'),
                    
                );
            
                $this->mthanhvien->updateThanhvien($id, $dataInsert);
                redirect('admin/thanhvien');   
                           
            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/thanhvien/editthanhvien',
            'css' => 'thanhvien/editthanhvien.css',            
            'dataOld' => $dataOld,
			'username' => $this->session->userdata('tk')    
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function delthanhvien($id){
        $this->mthanhvien->delThanhvien($id);
        redirect('admin/thanhvien');
    }
    
    
    
}