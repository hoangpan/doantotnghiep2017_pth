<?php

class mProducts extends CI_Model{
    
    
    // rules of products (các điều kiện kiểm tra form thêm , sửa sp)
    public $rules = array(
            
        array(
            'field'=> 'ten_sp',
            'label'=> 'Tên sản phẩm',
            'rules'=> 'required'
        ),
        array(
            'field'=> 'id_dm',
            'label'=> 'Danh mục sản phẩm',
            'rules'=> 'required'
        ),
        
        array(
            'field'=> 'gia_sp',
            'label'=> 'Giá sản phẩm',
            'rules'=> 'required|numeric'
        ),
        
        array(
            'field'=> 'bao_hanh',
            'label'=> 'Bảo hành',
            'rules'=> 'required'
        ),
        
        array(
            'field'=> 'phu_kien',
            'label'=> 'Đi kèm',
            'rules'=> 'required'
        ),
        
        array(
            'field'=> 'tinh_trang',
            'label'=> 'Tình trạng',
            'rules'=> 'required'
        ),
        
        array(
            'field'=> 'khuyen_mai',
            'label'=> 'Khuyến mại',
            'rules'=> 'required'
        ),
        
        array(
            'field'=> 'trang_thai',
            'label'=> 'Còn hàng',
            'rules'=> 'required'
        ),
        
        array(
            'field'=> 'chi_tiet_sp',
            'label'=> 'Thông tin chi tiết sản phẩm',
            'rules'=> 'required|min_length[6]'
        ),
        
        
        
    );
    
    // rules of comment (các điều kiện kiểm tra form comment)
    public $rulesCom = array(
        array(
            'field' => 'ten',
            'label' => 'Tên',
            'rules' => 'required'
        ),
        
        array(
            'field' => 'dien_thoai',
            'label' => 'Số điện thoại',
            'rules' => 'required|min_length[10]|max_length[11]'
        ),
        
        array(
            'field' => 'binh_luan',
            'label' => 'Bình luận',
            'rules' => 'required'
        )
    );
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        
    }               
            
    public function get_all_categories(){
        $query = $this->db->get('dmsanpham');        
        $data = $query->result_array();
        return $data;
    }            
    
    public function get_a_record_product($id_sp){
        $query = $this->db->get_where('sanpham', array('id_sp'=>$id_sp));        
        $data = $query->row_array();
        return $data;
    }

    public function totalRows(){        
        $totalRows = $this->db->count_all('sanpham');
        return $totalRows;
    }
    
    public function listPro($rowsPerPage, $perRow){        
        $query = $this->db->query("SELECT * FROM sanpham 
            INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm 
            ORDER BY id_sp DESC 
            LIMIT $rowsPerPage, $perRow");
                    
        if($query->num_rows() > 0){
            $arr = $query->result_array();  
            return $arr;                         
        }         
    }
    
    public function uploadFile(){
        
        $config['upload_path'] = 'public/images/admin';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        
        $this->load->library('upload', $config);                
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('anh_sp')){
            $error = array($this->upload->display_errors());
        }else{
            $image_data = $this->upload->data();
            return $image_data;    
        }
        
    }
    
    public function addPro($data = array()){
        $this->db->insert('sanpham', $data);
    }
    
    public function editPro($id_sp, $data = array()){
        $this->db->update('sanpham', $data, array('id_sp' => $id_sp));
    }     
    
    public function delPro($id_sp){
        $this->db->delete('sanpham', array('id_sp'=>$id_sp));
    }   
        
    /*-----  FRONTEND  -----*/
    
       
    
    
    
    /*----------  sản phẩm đặc biệt  -------------*/
    public function listProSpecial(){
        $query = $this->db->query("SELECT * FROM sanpham 
            WHERE dac_biet = 1
            ORDER BY id_sp DESC 
            LIMIT 6");
            
        $arr = array();
        if($query->num_rows() > 0){
            $arr = $query->result_array();                           
        } 
        return $arr;
    }
    
    /*----------  sản phẩm mới  -------------*/
    public function listProNew(){
        $query = $this->db->query("SELECT * FROM sanpham             
            ORDER BY id_sp DESC 
            LIMIT 6");
            
        $arr = array();
        if($query->num_rows() > 0){
            $arr = $query->result_array();                           
        } 
        return $arr;
    }
    
    /*----------  Lấy sản phẩm theo danh mục  -------------*/
    public function listProCat($id_dm, $rowsPerPage, $perRow){
        $query = $this->db->query("SELECT * FROM sanpham 
            WHERE id_dm = $id_dm 
            ORDER BY id_sp DESC 
            LIMIT $rowsPerPage, $perRow");
        $data = $query->result_array();
        return $data;                        
    }
    
    
    /*----------  Lấy thông tin danh mục theo id_dm  -------------*/
    public function get_a_record_categories($id_dm){
        $query = $this->db->get_where('dmsanpham', array('id_dm'=>$id_dm));        
        $data = $query->row_array();
        return $data;
    }
    
    /*----------  Tổng số sản phẩm thuộc id_dm -------------*/
    public function totalRowsProCat($id_dm){
        $query = $this->db->get_where('sanpham', array('id_dm' => $id_dm));
        $totalRows = $query->num_rows();
        return $totalRows;
    }
    
    /*----------  Lay comment theo sản phẩm  -------------*/
    public function commentPro($id_sp){
        $query = $this->db->get_where('blsanpham', array('id_sp'=>$id_sp));
        $data = $query->result_array();
        return $data;
    }
    
    /*----------  Thêm comment vào CSDL theo sản phẩm  -------------*/
    public function addComment($data = array()){
        $this->db->insert('blsanpham', $data);
    }
    
}
