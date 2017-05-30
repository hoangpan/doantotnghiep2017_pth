<?php

class Madsside extends CI_Model{
    public $rules = array(
        array(
            'field' => 'nameAds',
            'label' => 'Tên Adsside',
            'rules' => 'required'
        ),                    
                
        array(
            'field' => 'descriptionsAds',
            'label' => 'Mô tả Adsside',
            'rules' => 'required'
        )
        
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function listAdsside(){        
        $query = $this->db->get('adsside');
        $data = $query->result_array();
        return $data;
    }
        
    public function uploadAdsside(){
        
        $config['upload_path'] = 'public/images/admin/adsside';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        
        $this->load->library('upload', $config);                
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('imagesAds')){
            $error = array($this->upload->display_errors());
        }else{
            $image_data = $this->upload->data();
            return $image_data;    
        }
        
    }
    
    public function get_a_record_adsside($id){
        $query = $this->db->get_where('adsside', array('id'=>$id));
        $data = $query->row_array();
        return $data;
    }
    
    public function insertAdsside($data){
        $this->db->insert('adsside', $data);
    }
    
    public function updateAdsside($id, $data){
        $this->db->where('id', $id);
        $this->db->update('adsside', $data);
    }
    
    //update all
    public function updateAllAdsside($data){
        $this->db->update('adsside', $data);
    }
    
    public function delAdsside($id){
        $this->db->delete('adsside', array('id'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    /*----------  Lấy ra quảng cáo bên phải -------------*/
    public function sideright(){
        $query = $this->db->get_where('adsside', array('status'=>1, 'side'=>1));
        $data = $query->result_array(); 
        $sideRight = array();
        foreach($data as $row){
            $sideRight[$row['links']] = $row['images'];            
        }       
        
        return $sideRight;
    }
    
    
    /*----------  Lấy ra quảng cáo bên trái -------------*/
    public function sideleft(){
        $query = $this->db->get_where('adsside', array('status'=>1, 'side'=>0));
        $data = $query->result_array(); 
        $sideLeft = array();
        foreach($data as $row){
            $sideLeft[$row['links']] = $row['images'];            
        }       
        
        return $sideLeft;
    }
    
    
}