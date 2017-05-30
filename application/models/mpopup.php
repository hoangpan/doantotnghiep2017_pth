<?php

class Mpopup extends CI_Model{
    public $rules = array(
        array(
            'field' => 'namePopup',
            'label' => 'Tên Popup',
            'rules' => 'required'
        ),       
                
        array(
            'field' => 'descriptionsPopup',
            'label' => 'Mô tả Popup',
            'rules' => 'required'
        )
        
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function listPopup(){        
        $query = $this->db->get('popup');
        $data = $query->result_array();
        return $data;
    }
        
    public function uploadPopup(){
        
        $config['upload_path'] = 'public/images/admin/popup';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        
        $this->load->library('upload', $config);                
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('imagesPopup')){
            $error = array($this->upload->display_errors());
        }else{
            $image_data = $this->upload->data();
            return $image_data;    
        }
        
    }
    
    public function get_a_record_popup($id){
        $query = $this->db->get_where('popup', array('id'=>$id));
        $data = $query->row_array();
        return $data;
    }
    
    public function insertPopup($data){
        $this->db->insert('popup', $data);
    }
    
    public function updatePopup($id, $data){
        $this->db->where('id', $id);
        $this->db->update('popup', $data);
    }
    
    //update all
    public function updateAllPopup($data){
        $this->db->update('popup', $data);
    }
    
    public function delPopup($id){
        $this->db->delete('popup', array('id'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    public function showpopup(){        
        $query = $this->db->get_where('popup', array('status'=>1));
        $data = $query->row_array();
        return $data;
    }
    
}