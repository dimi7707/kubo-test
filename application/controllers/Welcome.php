<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('Products_model', 'products');	
		$this->load->model('Purchase_model', 'purchase');			
		$this->load->model('Order_model', 'order');		
	}


	public function index()
	{
		$data = $this->products->get_all();		
		$this->load->view('welcome_message',  ['data' =>  $data]);
	}

	public function send_json_output(array $response)
	{
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function get_products_on_cart()
	{
		$cart = $this->session->userdata('cart');
		$this->send_json_output($cart ?? []);
	}

	public function get_product_info()
	{
		$id_product = (int) $this->input->post('idProduct');		
		$this->send_json_output([ $this->products->get_by_criteria(['id_product' => $id_product], true) ]);
	}

	public function add_to_cart()
	{
		$id_product = (int) $this->input->post('idProduct');
		$quantity = (int) $this->input->post('quantity');
		$product = $this->products->get_by_criteria(['id_product' => $id_product], true);
		$cart = $this->session->userdata('cart');
		if (!$cart) 
		{
			$cart = [
				$id_product => [
					'name'			=> $product->name,
					'description' 	=> $product->description,
					'price' 		=> $product->price,
					'image'			=> $product->image,
					'quantity'		=> $quantity
				]
			];
		}
		elseif (isset($cart[$id_product]))
		{
			$cart[$id_product]['quantity'] += $quantity;
		}
		else
		{
			$cart[$id_product] = [
                'name'          => $product->name,
                'description'   => $product->description,
                'price'         => $product->price,
                'image'         => $product->image, 
                'quantity'      => $quantity
            ];
		}
		$this->session->set_userdata('cart', $cart);
		$this->send_json_output($cart);
	}
	
	public function go_to_checkout()
	{
		$this->load->view('checkout');
		
	}

	public function finish_purchase()
	{
		$cart = $this->session->userdata('cart');		
		$acumTotal = 0;
		foreach ($cart as $key => $product) 
		{
			$acumTotal += $product['price'] * $product['quantity'];
		}

		$id_last_order =  $this->order->save([
			'total_order'	 	=> $acumTotal,
			'date'			 	=> date('Y-m-d')
		]);

		// save every product purchased
		foreach ($cart as $key => $product) 
		{
			$this->purchase->save([
				'id_product'  	=> (int) $key,
				'date'			=> date('Y-m-d'),
				'quantity'		=> $product['quantity'],
				'id_order'		=> (int) $id_last_order
			]);
		}
		$this->send_json_output(['success' => true]);
		
	}
}
