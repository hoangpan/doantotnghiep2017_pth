<?php

class Adsside extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		
		 $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
        $this->load->model('madsside');
        $this->load->library('form_validation');
    }
    
    public function index(){
        //load model, libraries...        
        
        //process...
        $adsside = $this->madsside->listAdsside();
                
        //data to view
        $data = array(
            '_content' => 'backend/adsside/listadsside',
            'css' => 'adsside/adsside.css',
            'adsside' => $adsside,
			'username' => $this->session->userdata('tk')
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function addadsside(){
        //load model, libraries...        
        
        //process...                                
        $this->form_validation->set_rules($this->madsside->rules);
        if($this->form_validation->run()){
            $image_data = $this->madsside->uploadAdsside();           
            if($this->input->post('statusAds')){
                $status = $this->input->post('statusAds');
            }else{
                $status = 0;
            }
            
            if($this->input->post('sideAds')){
                $side = $this->input->post('sideAds');
            }else{
                $side = 0;
            }
            
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('nameAds'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsAds'),
                    'side' => $side,
                    'links' => $this->input->post('linksAds'),
                    'status' => $status
                );
            
                $this->madsside->insertAdsside($dataInsert);
                redirect('admin/adsside');   
            }                
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/adsside/insertadsside',
            'css' => 'adsside/insertadsside.css' ,
			'username' => $this->session->userdata('tk')                    
                
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function editadsside($id){
        //load model, libraries...        
        
        //process...     
            // data Old
        $dataOld = $this->madsside->get_a_record_adsside($id);
                                           
        $this->form_validation->set_rules($this->madsside->rules);
        if($this->form_validation->run()){
            $image_data = $this->madsside->uploadAdsside();           
            if($this->input->post('statusAds')){
                $status = $this->input->post('statusAds');
            }else{
                $status = 0;
            }
            
            if($this->input->post('sideAds')){
                $side = $this->input->post('sideAds');
            }else{
                $side = 0;
            }
            
            if($image_data['file_name'] != ''){
                $dataInsert = array(
                    'name' => $this->input->post('nameAds'),
                    'images' => $image_data['file_name'],
                    'descriptions' => $this->input->post('descriptionsAds'),
                    'side' => $side,
                    'links' => $this->input->post('linksAds'),
                    'status' => $status
                );
            
                $this->madsside->updateadsside($id, $dataInsert);
                redirect('admin/adsside');   
            }                 
            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/adsside/editadsside',
            'css' => 'adsside/editadsside.css',            
            'dataOld' => $dataOld,
			'username' => $this->session->userdata('tk')    
        );
                
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    public function deladsside($id){
        $this->madsside->delAdsside($id);
        redirect('admin/adsside');
    }
    
    
    public function updateadsside(){
        $arrIdShow = $this->input->post('showAdsside');
        $this->madsside->updateAllAdsside(array('status'=>0));
        foreach($arrIdShow as $id){            
            $data = array(
                'status' => 1,                
            );                                           
            $this->madsside->updateAdsside($id, $data);
        }
        
        $arrIdSide = $this->input->post('sideAdsside');
        $this->madsside->updateAllAdsside(array('side'=>0));
        foreach($arrIdSide as $id){            
            $data = array(
                'side' => 1,                
            );                                           
            $this->madsside->updateAdsside($id, $data);
        }
        
        $links = $this->input->post('linksAdsside');
        foreach($links as $id => $link){ 
            $data = array(
                'links' => $link,                
            ); 
            $this->madsside->updateAdsside($id, $data);
        }
        
        redirect('admin/adsside');
        
    }
}