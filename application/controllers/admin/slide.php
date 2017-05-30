<?php

class Slide extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mslide');
        $this->load->library('form_validation');
    }
    
    
    /* ------ Hiển thị slide  ------- */
    public function index(){
        //load model, libraries...        
        
        //process...
        $slide = $this->mslide->listSlide();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/slide/listslide',
            'css' => 'slide/slide.css',
            'slide' => $slide,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function addslide(){
        //load model, libraries...        
        
        //process...                                
        $this->form_validation->set_rules($this->mslide->rules);
        if($this->form_validation->run()){
            $image_data = $this->mslide->uploadSlide();           
            if($this->input->post('statusSlide')){
                $status = $this->input->post('statusSlide');
            }else{
                $status = 0;
            }
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('nameSlide'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsSlide'),
                    'status' => $status
                );
            
                $this->mslide->insertSlide($dataInsert);
                redirect('admin/slide');   
            }                
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/slide/insertslide',
            'css' => 'slide/insertslide.css',
			'username' => $this->session->userdata('tk')                     
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function editslide($id){
        //load model, libraries...        
        
        //process...     
            // data Old
        $dataOld = $this->mslide->get_a_record_slide($id);
                                           
        $this->form_validation->set_rules($this->mslide->rules);
        if($this->form_validation->run()){
            $image_data = $this->mslide->uploadSlide();           
            if($this->input->post('statusSlide')){
                $status = $this->input->post('statusSlide');
            }else{
                $status = 0;
            }
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('nameSlide'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsSlide'),
                    'status' => $status
                );
            
                $this->mslide->updateSlide($id, $dataInsert);
                redirect('admin/slide');   
            }                 
            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/slide/editslide',
            'css' => 'slide/editslide.css',            
            'dataOld' => $dataOld,
			'username' => $this->session->userdata('tk')    
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function delslide($id){
        $this->mslide->delSlide($id);
        redirect('admin/slide');
    }
    
    
    public function updateslide(){
        $arrId = $this->input->post('showSlide');
        $this->mslide->updateAllSlide(array('status'=>0));
        foreach($arrId as $v){            
            $data = array('status' => 1);                                           
            $this->mslide->updateSlide($v, $data);
        }
        redirect('admin/slide');
        
    }
}