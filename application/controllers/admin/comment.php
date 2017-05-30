<?php

class Comment extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mcomment');
        $this->load->library('form_validation');        
        
        $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
    }
    
    public function index(){
        //load model, libraries...        
        
        //process...
        $comment = $this->mcomment->listComment();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/comment/listcomment',
            'css' => 'comment/comment.css',
            'comment' => $comment,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function addcomment(){
        //load model, libraries...        
        $categories = $this->mcomment->get_all_comment();
        //process...                                
        $this->form_validation->set_rules($this->mcomment->rules);
        if($this->form_validation->run()){
                      
            
                $dataInsert = array(
                    'ten' => $this->input->post('tenbl'),
                    'ten_sp' => $this->input->post(tensp),
                    'binh_luan' => $this->input->post('binhluan'),
					'dien_thoai' => $this->input->post('dienthoai'),
                    'ngay_gio' => $this->input->post('ngaygio')
                );
            
                $this->mcomment->insertComment($dataInsert);
                redirect('admin/comment');   
                          
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/comment/insertcomment',
            'css' => 'comment/insertcomment.css',
			'categories'=> $categories,
			'username' => $this->session->userdata('tk')                     
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function editcomment($id_bl){
        //load model, libraries...        
        
        //process...     
	    $categories = $this->mcomment->get_all_comment();
            // data Old
        $dataOld = $this->mcomment->get_a_record_comment($id_bl);
                                           
        $this->form_validation->set_rules($this->mcomment->rules);
        if($this->form_validation->run()){
                       
               $dataInsert = array(
                    'ten' => $this->input->post('tenbl'),
                    'ten_sp' => $this->input->post(tensp),
                    'binh_luan' => $this->input->post('binhluan'),
					'dien_thoai' => $this->input->post('dienthoai'),
                    'ngay_gio' => $this->input->post('ngaygio')
                );
				
                $this->mthanhvien->updateComment($id_bl, $dataInsert);
                redirect('admin/thanhvien');   
                           
            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/comment/editcomment',
            'css' => 'comment/editcomment.css',            
            'dataOld' => $dataOld, 
			'categories'=> $categories,
			'username' => $this->session->userdata('tk')    
			  
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function delcomment($id_bl){
        $this->mcomment->delComment($id_bl);
        redirect('admin/comment');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}