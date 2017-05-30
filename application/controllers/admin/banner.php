<?php

class Banner extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('mbanner');
        $this->load->library('form_validation');
    }
    
    
    /* ------ Hiển thị banner  ------- */
    public function index(){
        //load model, libraries...        
        
        //process...
        $banner = $this->mbanner->listBanner();
        
        
        //data to view
        $data = array(
            '_content' => 'backend/banner/listbanner',
            'css' => 'banner/banner.css',
            'banner' => $banner,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function addbanner(){
        //load model, libraries...        
        
        //process...                                
        $this->form_validation->set_rules($this->mbanner->rules);
        if($this->form_validation->run()){
            $image_data = $this->mbanner->uploadBanner();           
            if($this->input->post('statusBner')){
                $status = $this->input->post('statusBner');
            }else{
                $status = 0;
            }
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('nameBner'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsBner'),
                    'status' => $status
                );
            
                $this->mbanner->insertBanner($dataInsert);
                redirect('admin/banner');   
            }                
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/banner/insertbanner',
            'css' => 'banner/insertbanner.css',
			'username' => $this->session->userdata('tk')                     
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function editbanner($id){
        //load model, libraries...        
        
        //process...     
            // data Old
        $dataOld = $this->mbanner->get_a_record_banner($id);
                                           
        $this->form_validation->set_rules($this->mbanner->rules);
        if($this->form_validation->run()){
            $image_data = $this->mbanner->uploadBanner();           
            if($this->input->post('statusBner')){
                $status = $this->input->post('statusBner');
            }else{
                $status = 0;
            }
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('nameBner'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsBner'),
                    'status' => $status
                );
            
                $this->mbanner->updateBanner($id, $dataInsert);
                redirect('admin/banner');   
            }                 
            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/banner/editbanner',
            'css' => 'banner/editbanner.css',            
            'dataOld' => $dataOld,
			'username' => $this->session->userdata('tk')    
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function delbanner($id){
        $this->mbanner->delBanner($id);
        redirect('admin/banner');
    }
    
    
    public function updatebanner(){
        $arrId = $this->input->post('showBanner');
        $this->mbanner->updateAllBanner(array('status'=>0));
        foreach($arrId as $v){            
            $data = array('status' => 1);                                           
            $this->mbanner->updateBanner($v, $data);
        }
        redirect('admin/banner');
        
    }
}