<?php

class mcomment extends CI_Model{
  
    
    // rules of comment (các điều kiện kiểm tra form comment)
    public $rules = array(
        array(
            'field' => 'tenbl',
            'label' => 'Tên',
            'rules' => 'required'
        ),
		  array(
            'field' => 'dienthoai',
            'label' => 'Số điện thoại',
            'rules' => 'required|min_length[10]|max_length[11]'
        ),
        
        array(
            'field' => 'binhluan',
            'label' => 'Bình luận',
            'rules' => 'required'
        ),
		array(
            'field' => 'ngaygio',
            'label' => 'Thời gian',
            'rules' => 'required'
        )
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        
    }               
            
    public function get_all_comment(){
        $query = $this->db->get('sanpham');        
        $data = $query->result_array();
        return $data;
    }            
    
    public function get_a_record_comment($id_bl){
        $query = $this->db->get_where('blsanpham', array('id_bl'=>$id_bl));        
        $data = $query->row_array();
        return $data;
    }
      
  
    
    public function listComment(){        
        $query = $this->db->query("SELECT * FROM blsanpham 
            INNER JOIN sanpham ON blsanpham.id_sp = sanpham.id_sp
            ORDER BY id_bl DESC");
		                    
        if($query->num_rows() > 0){
            $arr = $query->result_array();  
            return $arr;                         
        }         
    }
    
    
   public function insertComment($data){
        $this->db->insert('blsanpham', $data);
    }
    
    public function updateComment($id_bl, $data){
        $this->db->where('id_bl', $id_bl);
        $this->db->update('blsanpham', $data);
    }
    
   
    
    public function delComment($id_bl){
        $this->db->delete('blsanpham', array('id_bl'=>$id_bl));
    }
        
    /*-----  FRONTEND  -----*/
    
     public function comment(){
        $query = $this->db->get('blsanpham');
        $data = $query->result_array();
        return $data;
    }   
    
    
}