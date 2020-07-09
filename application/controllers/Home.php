<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Product_model');
		if (!$this->session->userdata('id_user')) {
			redirect('/auth');
		}
	}

	public function index()
	{
		$data = [
			'user' => $this->User_model->getUserById($this->session->userdata('id_user')),
			'attraction' => $this->Product_model->getProductByCategory(1),
			'tour' => $this->Product_model->getProductByCategory(2),
			'beauty' => $this->Product_model->getProductByCategory(3),
			'food' => $this->Product_model->getProductByCategory(4),
			'game' => $this->Product_model->getProductByCategory(5),
			'class' => $this->Product_model->getProductByCategory(6),
			'playground' => $this->Product_model->getProductByCategory(7),
			'event' => $this->Product_model->getProductByCategory(8)
		];
		$this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}
