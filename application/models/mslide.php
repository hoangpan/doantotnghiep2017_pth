<?php

class Mslide extends CI_Model{
    public $rules = array(
        array(
            'field' => 'nameSlide',
            'label' => 'Tên Slide',
            'rules' => 'required'
        ),       
                
        array(
            'field' => 'descriptionsSlide',
            'label' => 'Mô tả Slide',
            'rules' => 'required'
        )
        
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function listSlide(){        
        $query = $this->db->get('slide');
        $data = $query->result_array();
        return $data;
    }
        
    public function uploadSlide(){
        
        $config['upload_path'] = 'public/images/admin/slide';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        
        $this->load->library('upload', $config);                
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('imagesSlide')){
            $error = array($this->upload->display_errors());
        }else{
            $image_data = $this->upload->data();
            return $image_data;    
        }
        
    }
    
    public function get_a_record_slide($id){
        $query = $this->db->get_where('slide', array('id'=>$id));
        $data = $query->row_array();
        return $data;
    }
    
    public function insertSlide($data){
        $this->db->insert('slide', $data);
    }
    
    public function updateSlide($id, $data){
        $this->db->where('id', $id);
        $this->db->update('slide', $data);
    }
    
    //update all
    public function updateAllSlide($data){
        $this->db->update('slide', $data);
    }
    
    public function delSlide($id){
        $this->db->delete('slide', array('id'=>$id));
    }
    
    
    
    
    /*--------------  FRONTEND   ----------------*/
    /*----------  slideshow  -------------*/
    public function slideshow(){
        $query = $this->db->get_where('slide', array('status'=>1));
        $data = $query->result_array();
        return $data;
    } 
    
}