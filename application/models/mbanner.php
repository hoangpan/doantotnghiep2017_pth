<?php

class Mbanner extends CI_Model{
    public $rules = array(
        array(
            'field' => 'nameBner',
            'label' => 'Tên Banner',
            'rules' => 'required'
        ),       
                
        array(
            'field' => 'descriptionsBner',
            'label' => 'Mô tả Banner',
            'rules' => 'required'
        )
        
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function listBanner(){        
        $query = $this->db->get('banner');
        $data = $query->result_array();
        return $data;
    }
        
    public function uploadBanner(){
        
        $config['upload_path'] = 'public/images/admin/banner';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        
        $this->load->library('upload', $config);                
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('imagesBner')){
            $error = array($this->upload->display_errors());
        }else{
            $image_data = $this->upload->data();
            return $image_data;    
        }
        
    }
    
    public function get_a_record_banner($id){
        $query = $this->db->get_where('banner', array('id'=>$id));
        $data = $query->row_array();
        return $data;
    }
    
    public function insertBanner($data){
        $this->db->insert('banner', $data);
    }
    
    public function updateBanner($id, $data){
        $this->db->where('id', $id);
        $this->db->update('banner', $data);
    }
    
    //update all
    public function updateAllBanner($data){
        $this->db->update('banner', $data);
    }
    
    public function delBanner($id){
        $this->db->delete('banner', array('id'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    public function banner(){        
        $query = $this->db->get_where('banner', array('status'=>1));
        $data = $query->result_array();
        return $data;
    }
    
}