<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('id_user')) {
            redirect('/auth');
        }
    }

    public function index($id)
    {
        $data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));
        switch ($id) {
            case 0:
                $data['name'] = "All";
                $data['category_id'] = $id;
                break;
            case 1:
                $data['name'] = "Attraction";
                $data['category_id'] = $id;
                break;
            case 2:
                $data['name'] = "Tour";
                $data['category_id'] = $id;
                break;
            case 3:
                $data['name'] = "Beauty";
                $data['category_id'] = $id;
                break;
            case 4:
                $data['name'] = "Food";
                $data['category_id'] = $id;
                break;
            case 5:
                $data['name'] = "Game";
                $data['category_id'] = $id;
                break;
            case 6:
                $data['name'] = "Class";
                $data['category_id'] = $id;
                break;
            case 7:
                $data['name'] = "Playground";
                $data['category_id'] = $id;
                break;
            case 8:
                $data['name'] = "Event";
                $data['category_id'] = $id;
                break;
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/product', $data);
        $this->load->view('admin/footer');
    }
}
