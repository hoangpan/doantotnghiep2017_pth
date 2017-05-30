<?php

class Products extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('mproducts');
        $this->load->library('form_validation');        
        
        $this->load->library('session');
        if(!$this->session->userdata('tk')){
            redirect('admin/user/userLogin');
        }
    }
    
    public function index(){
        //load model, libraries...
        $this->load->library('pagination');
       
        
        //process...
        $config['base_url'] = base_url('admin/products');
        $config['total_rows'] = $this->mproducts->totalRows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3; 
        
        //show pagination
        $config['full_tag_open'] = '<span id="pagination">';
        $config['full_tag_close'] = '</span>';
        
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div>';
        $config['first_tag_close'] = '</div>';
        
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div>';
        $config['last_tag_close'] = '</div>';
        
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<div>';
        $config['next_tag_close'] = '</div>';
        
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<div>';
        $config['prev_tag_close'] = '</div>';
        
        $config['cur_tag_open'] = '<b>';
        $config['cur_tag_close'] = '</b>';
        
        $config['num_tag_open'] = '<div>';
        $config['num_tag_close'] = '</div>';
        
        $this->pagination->initialize($config);
        
        if($this->uri->segment(3)){
            $page = $this->uri->segment(3);                
        }else{
            $page = 1;
        }
        
        $perRow = $config['per_page'];
        $rowsPerPage = ($page -1)*$perRow;
        
        //data to view
        $data['products'] = $this->mproducts->listPro($rowsPerPage, $perRow);
        $data['_content'] = 'backend/products/danhsachsp';
        $data['css'] = 'danhsachsp.css';
		$data['username'] = $this->session->userdata('tk');
        
        //load view
        $this->load->view('backend/common/layout', $data);
    }
    
    
    public function addproduct(){        
        //load model, libraries...                
        
        //process...
            //get categories
        $categories = $this->mproducts->get_all_categories();
        
            //insert product        
        $this->form_validation->set_rules($this->mproducts->rules);        
        if($this->form_validation->run()){            
            $dataInsert = $this->input->post();    
            $image_data = $this->mproducts->uploadFile();
            if($image_data['file_name'] != ''){
                $dataInsert['anh_sp'] = $image_data['file_name'];
                $this->mproducts->addPro($dataInsert);
                redirect('admin/products'); 
            }                             
        }
       
        //data to view
        $data = array(
            '_content' => 'backend/products/themsp',
            'css'=> 'themsp.css',
            'categories'=> $categories,
			'username' => $this->session->userdata('tk')
            
        );
        
        //load view
        $this->load->view('backend/common/layout', $data);
        
        
    }
        
    public function editproduct($id_sp){        
        //load model, libraries...                
        
        //process...
            //get old product info
        $dataOld = $this->mproducts->get_a_record_product($id_sp);        
        
            //get categories
        $categories = $this->mproducts->get_all_categories();
                
            //update product           
        $this->form_validation->set_rules($this->mproducts->rules);        
        if($this->form_validation->run()){                                                
            $dataUpdate = $this->input->post();                
            $image_data = $this->mproducts->uploadFile();
            if($image_data['file_name'] != ''){
                $dataUpdate['anh_sp'] = $image_data['file_name'];
                $this->mproducts->editPro($id_sp, $dataUpdate);
                redirect('admin/products'); 
            }            
            
        }
        
        //data to view
        $data = array(
            '_content' => 'backend/products/suasp',
            'css'=> 'suasp.css',
            'categories'=> $categories,
            'dataOld'=> $dataOld,
			'username' => $this->session->userdata('tk')
        );
        
        //load view
        $this->load->view('backend/common/layout', $data);        
        
    }
    
    public function delproduct($id_sp){
        $this->mproducts->delPro($id_sp);
        redirect('admin/products');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}