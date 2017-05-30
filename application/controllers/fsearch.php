<?php

class Fsearch extends CI_Controller{
    
    public $slideshow = NULL;
    public $categories = NULL;
    public $banner = NULL;        
    
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mproducts');   
        $this->load->model('mbanner');
        $this->load->model('mslide');
        $this->load->model('madsside');
		$this->load->library('cart');
        $this->load->model('mstatistic');
        
        $this->slideshow = $this->mslide->slideshow();   
        $this->categories = $this->mproducts->get_all_categories();   
        $this->banner = $this->mbanner->banner();
        $this->adsright = $this->madsside->sideright();
        $this->adsleft = $this->madsside->sideleft();
		$this->mstatistic->addCount(); 
	    $this->count = $this->mstatistic->showCount();         
               
    }
    
    public function search(){
        //load model, libraries..
        $this->load->model('msearch');
        $this->load->library('pagination');
        $this->load->helper('url');        
        
        //process...        
        if($this->input->post('stext')){
            if($this->input->post('stext') == ''){
                $text = 'Tìm kiếm sản phẩm';
            }else{
                $text = $this->input->post('stext', true);    
            }                
        }else{
            $text = $this->uri->segment(3);
        }                                
        
            //pagination
        $config['base_url'] = base_url("fsearch/search/$text");
        $config['total_rows'] = $this->msearch->totalRowsProSea($text);
        $config['per_page'] = 6;
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
               
        $proSearch = $this->msearch->prosearch($text, $rowsPerPage, $perRow);                                   
        
        //data to view
        $data = array(
            'categories' => $this->categories,
            'slide' => $this->slideshow,
            'banner' => $this->banner,
            'adsleft' => $this->adsleft,
            'adsright' => $this->adsright,
			'cartItem' => $this->cart->total_items(),   
            'count' => $this->count,
            '_content' => 'frontend/search/danhsachtimkiem',
            'css' => 'danhsachtimkiem.css',
            'stext' => $text,
            'proSearch' => $proSearch
        );        
        
        //load view
        $this->load->view('frontend/common/layout', $data);
        
    }
}