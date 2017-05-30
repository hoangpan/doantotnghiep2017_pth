<?php

class Fgioithieu extends CI_Controller{
    
    public $slideshow = NULL;
    public $categories = NULL;
    public $banner = NULL;        
    public $adsright = NULL;
    public $adsleft = NULL;
    public $popupImg = NULL;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mproducts');   
        $this->load->model('mbanner');
        $this->load->model('mslide'); 
        $this->load->model('madsside');
        $this->load->model('mpopup');
		$this->load->library('cart');
        $this->load->model('mstatistic'); 
        
        $this->slideshow = $this->mslide->slideshow();   
        $this->categories = $this->mproducts->get_all_categories();   
        $this->banner = $this->mbanner->banner();
        $this->adsright = $this->madsside->sideright();
        $this->adsleft = $this->madsside->sideleft();  
        $this->popupImg = $this->mpopup->showpopup(); $this->load->model('mpopup'); 
		$this->mstatistic->addCount(); 
		$this->count = $this->mstatistic->showCount();   
    }
    
    public function index(){
        
        //load model, libraries...        
        
        //process...    
            // slideshow
        //$slide = $this->mproducts->slideshow();
            
            // product
        $proSpecial = $this->mproducts->listProSpecial();
        $proNew = $this->mproducts->listProNew();        
        
            // categories
        //$categories = $this->mproducts->get_all_categories();
        
        //data to view
        $data = array(
            'proSpecial' => $proSpecial,
            'proNew' => $proNew,
            'categories' => $this->categories,
            'slide' => $this->slideshow,
            'banner' => $this->banner,
            'adsleft' => $this->adsleft,
            'adsright' => $this->adsright,
            'popupImg' => $this->popupImg,
            'popupCondition' => 'show',
			'cartItem' => $this->cart->total_items(),   
            'count' => $this->count,
            '_content' => 'frontend/common/menungang/gioithieu',
            'css' => 'gioithieu.css'
        );
        
        //load view
        $this->load->view('frontend/common/layout', $data);
        
    }
    // Vào chi tiết sản phẩm
    public function detail($id_sp){
        //load model, libraries...
        
        //process...            
            // products
        $product = $this->mproducts->get_a_record_product($id_sp);                    
        
            // process form comment        
        $this->load->library('form_validation');                
        $this->form_validation->set_rules($this->mproducts->rulesCom);
        if($this->form_validation->run()){
            $dataCom = array(
                'id_sp' => $id_sp,
                'ten' => $this->input->post('ten'),
                'dien_thoai' => $this->input->post('dien_thoai'),
                'binh_luan' => $this->input->post('binh_luan'),
                'ngay_gio' => date('Y-m-d h:i:s')
            );            
            $this->mproducts->addComment($dataCom);
        }
        
            // comment
        $comment = $this->mproducts->commentPro($id_sp);
        
        //data to view
        $data = array(     
            'categories' => $this->categories,
            'slide' => $this->slideshow,
            'banner' => $this->banner, 
            'adsleft' => $this->adsleft,
            'adsright' => $this->adsright,     
            'product' => $product,
            'comment' => $comment,
			'cartItem' => $this->cart->total_items(),   
            'count' => $this->count,
            '_content' => 'frontend/products/prodetail',            
            'css' => 'chitietsp.css'
        );
        
        //load view
        $this->load->view('frontend/common/layout', $data);
    }
 //Vào từng danh mục để xem sản phẩm   
    public function productsCat($id_dm){
        
        //load mode, libraries
        $this->load->library('pagination');
        $this->load->helper('url');
        
        //process...              
            // get name's this category for $id_dm 
        $cat = $this->mproducts->get_a_record_categories($id_dm);
        
        $config['base_url'] = base_url("fproducts/productsCat/$id_dm");
        $config['total_rows'] = $this->mproducts->totalRowsProCat($id_dm);
        $config['per_page'] = 3;
        $config['uri_segment'] = 4; 
        
        //show pagination
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        
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
        
        if($this->uri->segment(4)){
            $page = $this->uri->segment(4);                
        }else{
            $page = 1;
        }
        
        $perRow = $config['per_page'];
        $rowsPerPage = ($page -1)*$perRow;
        
        $proCat = $this->mproducts->listProCat($id_dm, $rowsPerPage, $perRow);
        
        $data = array(
            'categories' => $this->categories,
            'slide' => $this->slideshow,
            'banner' => $this->banner,
            'adsleft' => $this->adsleft,
            'adsright' => $this->adsright,
            'cat' => $cat,
            'proCat' => $proCat,
			'cartItem' => $this->cart->total_items(),
            'count' => $this->count, 
            '_content' => 'frontend/products/procategories',
            'css' => 'danhsachsp.css'
        );
        
        $this->load->view('frontend/common/layout', $data);
        
    }
    
}