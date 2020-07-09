<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Product_model');
		$this->load->model('Order_model');
		if (!$this->session->userdata('id_user')) {
			redirect('/auth');
		}
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data = [
			'user' => $this->User_model->getUserById($id_user),
			'attraction' => $this->Product_model->getProductByCategory(1),
			'tour' => $this->Product_model->getProductByCategory(2),
			'beauty' => $this->Product_model->getProductByCategory(3),
			'food' => $this->Product_model->getProductByCategory(4),
			'game' => $this->Product_model->getProductByCategory(5),
			'class' => $this->Product_model->getProductByCategory(6),
			'playground' => $this->Product_model->getProductByCategory(7),
			'event' => $this->Product_model->getProductByCategory(8),
			'cart' => $this->Order_model->getCountCartByUser($id_user),
			'wishlist' => $this->Order_model->getCountWishlistByUser($id_user),
			'total' => $this->Order_model->getTotalHarga($id_user)
		];
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}

	public function updateUser()
	{
		$id_user = $this->session->userdata('id_user');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$province = $this->input->post('province');

		$data = [
			'id' => $id_user,
			'name' => $name,
			'address' => $address,
			'city' => $city,
			'province' => $province
		];

		if ($this->User_model->updateUser($data)) {
			redirect('order/checkout');
		} else {
			echo "update gagal";
		}
	}
}
