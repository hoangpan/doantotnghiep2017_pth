<?php

class Fcart extends CI_Controller{
    
    public $slideshow = NULL;
    public $categories = NULL;
    public $banner = NULL;        
    
    
    public function __construct(){
        parent::__construct();
        $this->load->model('mproducts');   
        $this->load->model('mbanner');
        $this->load->model('mdonhang');
        $this->load->model('mcart');
        $this->load->model('mslide');
        $this->load->model('madsside');
		$this->load->model('mstatistic');
        
        $this->slideshow = $this->mslide->slideshow();   
        $this->categories = $this->mproducts->get_all_categories();   
        $this->banner = $this->mbanner->banner();
        $this->adsright = $this->madsside->sideright();
        $this->adsleft = $this->madsside->sideleft(); 
		$this->mstatistic->addCount();
		$this->count = $this->mstatistic->showCount();       
               
    }    
    
    public function index(){
        //load model,...        
                
        //process..                    
        
        $list_cat = $this->mcart->listCart();
        $total_price = $this->mcart->totalPrice();
        
        //data to view
        $data = array(
            'categories' => $this->categories,
            'slide' => $this->slideshow,
            'banner' => $this->banner,
            'adsleft' => $this->adsleft,
            'adsright' => $this->adsright,
			'cartItem' => $this->cart->total_items(),
			'count' => $this->count,
            '_content' => 'frontend/cart/cart',
            'css' => 'cart.css',
            'list_cart' => $list_cat,
            'total_price' => $total_price
            
        );
        
        //load view
        $this->load->view('frontend/common/layout', $data);
        
    }
    
    public function addcart($id_sp){
        //load model,...        
        $this->load->model('mproducts');
        
        //process..
        $product = $this->mproducts->get_a_record_product($id_sp);  
        //$customer = $this->mcart->get_a_record_customer($id_kh);  

        $dataCart = array(
           'id'      => $id_sp,
           'qty'     => 1,
           'price'   => $product['gia_sp'],
           'name'    => $product['ten_sp'],
           'options' => array('anh_sp' => $product['anh_sp'])
        );    
        $this->mcart->insetCart($dataCart);
        //$this->mdonhang->insertDonhang($dataCart);
        
        redirect('fcart/index');
        //data to view
        
        //load view
  
    }
    
    public function editcart(){
        
        //process...      
        $sl = $this->cart->total_items();                             
        for($i= 1; $i<= $sl; $i++){
            $data = array(                
                'rowid' => $this->input->post('id'.$i),
                'qty'   => $this->input->post('sl'.$i)                
            );            
            $this->mcart->updateCart($data);
        }                               
        redirect('fcart/index');
        
        
        
    }
    
    public function delAproduct($rowid){
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        $this->mcart->updateCart($data);
        redirect('fcart/index');
    }
    
    public function deletecart(){
        $this->mcart->deleteCart();
        redirect('fcart/index');
    }
    
    
    public function paymentcart(){
        //load model,...        
        $this->load->library('form_validation');        
        $this->load->library('email');
        
        //process.. 
        $list_cart = $this->mcart->listCart();
        $total_price = $this->mcart->totalPrice();
            
        $this->form_validation->set_rules($this->mcart->rules);
        if($this->form_validation->run()){
            $ten = $this->input->post('ten');
            $email = $this->input->post('email');
            $dt = $this->input->post('dt');
            $dc = $this->input->post('dc');                                    
        
            $customer = array(
            'ten_kh' => $ten,
            'email' => $email,
            'dien_thoai' => $dt,
            'dia_chi' => $dc
            );

           // $this->mcart->addCus($dataCus);
            $cust_id = $this->mcart->insert_thanhtoan($customer);

            $order = array(
                'id_kh' => $cust_id,
                'thoi_gian_gd' => date('Y-m-d h:i:s')
            );
            
            $ord_id = $this->mcart->insert_order($order);
            

            
           // $ord_id = $this->mcart->insert_order($order);

            if ($cart = $this->cart->contents()):
                foreach ($cart as $item):
                    $order_detail = array(
                    'id_gd' => $ord_id,
                    'id_sp' => $item['id'],
                    'ten_sp' => $item['name'],
                    'gia_sp' => $item['price'],
                    'so_luong' => $item['qty'],
                    'thoi_gian_dh' => date('Y-m-d h:i:s'),
                    'trang_thai' => 1
                );  
                $cust_id = $this->mcart->insert_order_detail($order_detail);
                endforeach;
            endif;
           // $this->load->view('tem-success');
         
            $strBody = '';
			// Thông tin Khách hàng
			$strBody = '<p>
							<b>Khách hàng:</b> '.$ten.'<br />
							<b>Email:</b> '.$email.'<br />
							<b>Điện thoại:</b> '.$dt.'<br />
							<b>Địa chỉ:</b> '.$dc.'
						</p>';
			// Danh sách Sản phẩm đã mua
			$strBody .= '	<table border="1px" cellpadding="10px" cellspacing="1px" width="100%">
								<tr>
									<td align="center" bgcolor="#3F3F3F" colspan="4"><font color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
								</tr>
								<tr id="invoice-bar">
									<td width="45%"><b>Tên Sản phẩm</b></td>
									<td width="20%"><b>Giá</b></td>
									<td width="15%"><b>Số lượng</b></td>
									<td width="20%"><b>Thành tiền</b></td>
								</tr>';
						
			foreach($list_cart as $row){				
					
					$strBody .= '<tr>
									<td class="prd-name">'.$row['name'].'</td>
									<td class="prd-price"><font color="#C40000">'.$row['price'].' VNĐ</font></td>
									<td class="prd-number">'.$row['qty'].'</td>
									<td class="prd-total"><font color="#C40000">'.$row['subtotal'].' VNĐ</font></td>
								</tr>';						
			}
			
					$strBody .= '<tr>
									<td class="prd-name">Tổng giá trị hóa đơn là:</td>
									<td colspan="2"></td>
									<td class="prd-total"><b><font color="#C40000">'.$total_price.' VNĐ</font></b></td>
								</tr>
							</table>';
					
					$strBody .= '<p align="justify">
									<b>Quý khách đã đặt hàng thành công!</b><br />
									• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
									• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
									<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của cửa hàng chúng Tôi!</b>
								</p>';  
            

                                                      
            $this->email->from('hoanghoakhet32@gmail.com', 'Phan Thế Hoàng');
            $this->email->to($email); 
            //$this->email->cc('other@their-example.com'); 
            //$this->email->bcc('them@their-example.com'); 
            
            $this->email->subject('Thư Xác Nhận Đặt Hàng Trực Tuyến');
            $this->email->message($strBody);	
            
            if($this->email->send()){
                redirect('fcart/finishcart');
            }                        
            
        }
        if($this->email->print_debugger()){
            $email_error =  $this->email->print_debugger();
        }
                
                                                
        //data to view
        $data = array(
            'categories' => $this->categories,
            'slide' => $this->slideshow,
            'banner' => $this->banner,
            'adsleft' => $this->adsleft,
            'adsright' => $this->adsright,
			'cartItem' => $this->cart->total_items(),
            'count' => $this->count, 
            '_content' => 'frontend/cart/payment',
            'css' => 'payment.css',
            'list_cart' => $list_cart,
            'total_price' => $total_price,
            'email_error' => $email_error
            
        );
        
        //load view
        $this->load->view('frontend/common/layout', $data);
        
    }
    
    public function finishcart(){
        $data = array(
            '_content' => 'frontend/cart/finish',
            'css' => 'finish.css',
            'categories' => $this->categories,
            'slide' => $this->slideshow,
            'banner' => $this->banner,
            'adsleft' => $this->adsleft,
            'adsright' => $this->adsright,
			'cartItem' => $this->cart->total_items(),
            'count' => $this->count
        );
        $this->load->view('frontend/common/layout', $data);
    }
}