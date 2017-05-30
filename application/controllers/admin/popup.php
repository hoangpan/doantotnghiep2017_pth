<?php

class Popup extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mpopup');
        $this->load->library('form_validation');
    }
    
    
    /* ------ Hiển thị popup  ------- */
    public function index(){
        //load model, libraries...        
        
        //process...
        $popup = $this->mpopup->listPopup();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/popup/listpopup',
            'css' => 'popup/popup.css',
            'popup' => $popup,
			 'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function addpopup(){
        //load model, libraries...        
        
        //process...                                
        $this->form_validation->set_rules($this->mpopup->rules);
        if($this->form_validation->run()){
            $image_data = $this->mpopup->uploadPopup();           
            if($this->input->post('statusPopup')){
                $status = $this->input->post('statusPopup');
            }else{
                $status = 0;
            }
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('namePopup'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsPopup'),
                    'links' => $this->input->post('linksPopup'),
                    'status' => $status
                );
            
                $this->mpopup->insertPopup($dataInsert);
                redirect('admin/popup');   
            }                
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/popup/insertpopup',
            'css' => 'popup/insertpopup.css',
			 'username' => $this->session->userdata('tk')                     
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function editpopup($id){
        //load model, libraries...        
        
        //process...     
            // data Old
        $dataOld = $this->mpopup->get_a_record_popup($id);
                                           
        $this->form_validation->set_rules($this->mpopup->rules);
        if($this->form_validation->run()){
            $image_data = $this->mpopup->uploadPopup();           
            if($this->input->post('statusPopup')){
                $status = $this->input->post('statusPopup');
            }else{
                $status = 0;
            }
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('namePopup'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsPopup'),
                    'links' => $this->input->post('linksPopup'),
                    'status' => $status
                );
            
                $this->mpopup->updatePopup($id, $dataInsert);
                redirect('admin/popup');   
            }                 
            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/popup/editpopup',
            'css' => 'popup/editpopup.css',            
            'dataOld' => $dataOld,
			 'username' => $this->session->userdata('tk')    
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function delpopup($id){
        $this->mpopup->delPopup($id);
        redirect('admin/popup');
    }
    
    
    public function updatepopup(){
        $arrId = $this->input->post('showPopup');
        $this->mpopup->updateAllPopup(array('status'=>0));
        foreach($arrId as $id){            
            $data = array('status' => 1);                                           
            $this->mpopup->updatePopup($id, $data);
        }
        
        $links = $this->input->post('linkPopup');
        foreach($links as $id => $link){ 
            $data = array(
                'links' => $link,                
            ); 
            $this->mpopup->updatePopup($id, $data);
        }
        
        redirect('admin/popup');
        
    }
}